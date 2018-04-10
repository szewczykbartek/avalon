<?php
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Ten plik zawiera konfiguracje: ustawie� MySQL-a, prefiksu tabel
 * w bazie danych, tajnych kluczy, u�ywanej lokalizacji WordPressa
 * i ABSPATH. Wi��ej informacji znajduje si� na stronie
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Kodeksu. Ustawienia MySQL-a mo�esz zdoby�
 * od administratora Twojego serwera.
 *
 * Ten plik jest u�ywany przez skrypt automatycznie tworz�cy plik
 * wp-config.php podczas instalacji. Nie musisz korzysta� z tego
 * skryptu, mo�esz po prostu skopiowa� ten plik, nazwa� go
 * "wp-config.php" i wprowadzi� do niego odpowiednie warto�ci.
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - mo�esz uzyska� je od administratora Twojego serwera ** //
/** Nazwa bazy danych, kt�rej u�ywa� ma WordPress */

//define('DB_NAME', 'db485005629');
//define('DB_USER', 'dbo485005629');
//define('DB_PASSWORD', 'West86thst');
//define('DB_HOST', 'db485005629.db.1and1.com');

define('DB_NAME', 'paraboli_avalon');
define('DB_USER', 'paraboli_admin');
define('DB_PASSWORD', 'admin312');
define('DB_HOST', 'localhost');



/** Kodowanie bazy danych u�ywane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8');

/** Typ por�wna� w bazie danych. Nie zmieniaj tego ustawienia, je�li masz jakie� w�tpliwo�ci. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmie� ka�dy klucz tak, aby by� inn�, unikatow� fraz�!
 * Mo�esz wygenerowa� klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generuj�cego tajne klucze witryny WordPress.org}
 * Klucze te mog� zosta� zmienione w dowolnej chwili, aby uczyni� niewa�nymi wszelkie istniej�ce ciasteczka. Uczynienie tego zmusi wszystkich u�ytkownik�w do ponownego zalogowania si�.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%tvFiT%![4~b<;U82,qKS|nW%Efcup341o3w+|D!A*k.X_GRJ P3!X=#Pv`$d0A8');
define('SECURE_AUTH_KEY',  '~|XE~3fUdRv.B~xZ>|J@yvH,9%~za&DR#Rg07Y+S3k?z<A[(Z.6r|a>6tU|(DspK');
define('LOGGED_IN_KEY',    '{>?d*|S^e`Tzh6r5~?0Fy;fB7$<d&Z]P4fj![w|!au[|S`mB4V)GAH i?.*=iZBN');
define('NONCE_KEY',        ')X|{63]i]?N+<h9d)+~ |jx$NUOd+jfl.:#>p.=r-(Rg@<bokbi9%uGmf$zJZ>I`');
define('AUTH_SALT',        'KNjMmG?5Qc,`oXOHUvQY$#&3,mF?|co=vhD+P^Z*[*@FM+X|0R,2Wu7L#!*2,aOT');
define('SECURE_AUTH_SALT', 'f]XN?J|xY,~!Z<HVx(B}]7I,uP$d0e4 PWu6;XzjW-7_!P#~muuU-b5:-lvDj*j;');
define('LOGGED_IN_SALT',   '-a_[#D(raV!ei%W2#J[sv9Y>:0g0?Drb)~A*aKc&2*+tlX<H +J)P+g=feZp:9.l');
define('NONCE_SALT',       'u4nty0nda5zdq4mmqymdgynmmxzgu3ywvkndrlotyymwu1nmzhndlinzkyntvmyz');

/**#@-*/

/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Mo�esz posiada� kilka instalacji WordPressa w jednej bazie danych,
 * je�eli nadasz ka�dej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkre�lenia, prosz�!
 */
$table_prefix  = 'wp_';

/**
 * Kod lokalizacji WordPressa, domy�lnie: angielska.
 *
 * Zmie� to ustawienie, aby w��czy� t�umaczenie WordPressa.
 * Odpowiedni plik MO z t�umaczeniem na wybrany j�zyk musi
 * zosta� zainstalowany do katalogu wp-content/languages.
 * Na przyk�ad: zainstaluj plik de_DE.mo do katalogu
 * wp-content/languages i ustaw WPLANG na 'de_DE', aby aktywowa�
 * obs�ug� j�zyka niemieckiego.
 */
//define('WPLANG', 'en_EN');

/**
 * Dla programist�w: tryb debugowania WordPressa.
 *
 * Zmie� warto� tej sta�ej na true, aby w��czy� wy�wietlanie ostrze�e�
 * podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby tw�rcy wtyczek oraz motyw�w u�ywali
 * WP_DEBUG w miejscach pracy nad nimi.
 */
define('WP_DEBUG', false);

/* To wszystko, zako�cz edycj� w tym miejscu! Mi�ego blogowania! */

/** Absolutna �cie�ka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i do��czane pliki. */
require_once(ABSPATH . 'wp-settings.php');

# Disables all core updates. Added by SiteGround Autoupdate:
define( 'WP_AUTO_UPDATE_CORE', false );
