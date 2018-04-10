<?php
$fileLocation = "../mail/" . date('Y-m-d H:i:s') . ' ' . $_POST['Imie'] . ' ' . $_POST['Nazwisko'] . ".html";
$file = fopen($fileLocation, "w");

$message = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head><body style="background: #f6f6f6; padding: 60px;">';
$message .= 'Imię i Nazwisko: ' . $_POST['Imie'] . ' ' . $_POST['Nazwisko'] . '<br />
Email: ' . $_POST['Email'] . '<br />
Telefon: ' . $_POST['Telefon'] . '<br />
Wiadomość: ' . $_POST['Wiadomosc'];
$message .= '</body></html>';

fwrite($file, $message);
fclose($file);



define('WP_USE_THEMES', false);
header("HTTP/1.1 200 OK");
header("Status: 200 All rosy");
require('../../../../wp-load.php');

require_once('../libs/PHPMailer-5.2.14/class.phpmailer.php');
include("../libs/PHPMailer-5.2.14/class.smtp.php");

$mail = new PHPMailer(true);
$mail->IsSMTP();


$subject = 'Avalon Residence - Formularz kontaktowy';

try {
    $mail->IsHTML(true);
    $mail->CharSet = "UTF-8";
    $mail->Host = "serwer1606847.home.pl";
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->Username = "kontakt@avalondg.pl";
    $mail->From = "kontakt@avalondg.pl";
    $mail->Password = "y32j!4F-x^@J";

    $mail->AddAddress('kontakt@avalondg.pl', 'Avalon');
    //$mail->AddAddress('szewczyk.bartek@gmail.com', 'Avalon');

    $mail->FromName = "Avalon";
    $mail->Subject = $subject;
    $mail->AltBody = $message;
    $mail->Body = $message;

    $mail->Send();
} catch (phpmailerException $e) {
    //echo $e->errorMessage();
} catch (Exception $e) {
    //echo $e->getMessage();
}
