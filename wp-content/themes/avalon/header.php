<?php
global $u_agent, $ieVersion, $Horror;
$u_agent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/linux/i', $u_agent)) {
    $platform = 'linux';
} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
    $platform = 'mac';
} elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'windows';
}

if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
    $bname = 'ie';
    $ub = "ie";
} elseif (preg_match('/Firefox/i', $u_agent)) {
    $bname = 'firefox';
    $ub = "firefox";
} elseif (preg_match('/Chrome/i', $u_agent)) {
    $bname = 'chrome';
    $ub = "chrome";
} elseif (preg_match('/Safari/i', $u_agent)) {
    $bname = 'safari';
    $ub = "safari";
} elseif (preg_match('/Opera/i', $u_agent)) {
    $bname = 'opera';
    $ub = "opera";
}

global $menuArray, $menuArrayId;
$menuArray = $menuArrayId = array();


global $actId, $actIdParent;
$actId = get_the_ID();

$postId = get_post(get_the_ID());
$actIdParent = $postId->post_parent;

$ieVersion = 'ieNo';
if ($bname == "ie") {
    preg_match('/MSIE (.*?);/', $u_agent, $matches);
    if (count($matches) > 1) {
        $ieOld = $matches[1];

        if ($ieOld <= 9) {
            $ieVersion = 'ie ieOld';
        } else {
            $ieVersion = 'ie Noeffect';
        }
    }
}
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) {
    $ieVersion = 'ie ie11';
}

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
global $deviceType;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

global $Content;
$Content = array();

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

} else {
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html xmlns:fb="http://ogp.me/ns/fb#" class="WpReset" lang="en-EN">
    <head profile="http://gmpg.org/xfn/11">

      <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WHQKSJQ');</script>
<!-- End Google Tag Manager -->

        <title>Avalon Residence | <?php echo get_the_title(); ?></title>
        <meta name="description" content="Avalon Residence – nowoczesne osiedle domów jednorodzinnych – Warszawa Wawer ul. Poprawna 112. Kontakt: 601 861 211">

        <?php wp_head(); ?>

        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

        <meta name="Content-language" content="en" />
        <meta name="viewport" width="device-width"  content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" />
        <meta http-equiv="X-UA-Compatible" content="IE=9">

        <meta property="og:title" content="Avalon" />
        <meta property="og:url" content="http://www.avalonresidence.pl" />
        <meta property="og:site_name" content="Avalon" />
        <meta property="og:description" content="Avalon Residence – nowoczesne osiedle domów jednorodzinnych – Warszawa Wawer ul. Poprawna 112. Kontakt: 601 861 211" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="<?php bloginfo('template_url'); ?>/img/Fb.jpg" />

        <link href="<?php bloginfo('template_url'); ?>/favicon.gif" rel="SHORTCUT ICON" />

        <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.0.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.js"></script>

        <script src="<?php bloginfo('template_url'); ?>/js/jquery.mobile-events.min.js" type="text/javascript"></script>

        <script src="<?php bloginfo('template_url'); ?>/js/jquery.maphilight.js?v=<?php echo date('U'); ?>" type="text/javascript"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.mousewheel.js" type="text/javascript"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.ba-hashchange.js" type = "text/javascript" ></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.history.min.js" type="text/javascript"></script>

        <script src="<?php bloginfo('template_url'); ?>/js/jquery.tinyscrollbar.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.zoom.js?v=<?php echo date('U'); ?>"></script>

        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCn_bDjjkrN6TBjmBAOWLNO65-S4Io4BDY"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/infobox.js"></script>

        <script type="text/javascript">
            var domainHome = "<?php bloginfo('home'); ?>";
            var domainTemplate = "<?php bloginfo('template_url'); ?>";
        </script>

        <script type="text/javascript">
            var PageClass = 'home homeReady <?php
            $my_query = new WP_Query(
            array(
            'post_type' => 'page',
            'post_parent' => 0,
            'posts_per_page' => -1,
            'order' => "DESC",
            'orderby' => 'date',
            'ignore_sticky_posts' => 0,
            'post_status' => 'publish'
            )
            );
            while ($my_query->have_posts()) : $my_query->the_post();
            $idShow = $post->ID;
            echo get_the_slug($idShow) . ' ';
            echo get_the_slug($idShow) . 'Ready ';
            endwhile;
            ?>';
            var PageAll = 'home';</script>
            <script src="<?php bloginfo('template_url'); ?>/js/script.js?v=<?php echo date('U'); ?>" type="text/javascript"></script>

            <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css?v=<?php echo date('U'); ?>" />
        </head>
        <?php
        $menuOpen = '';
        $content = get_the_slug($actId);
        if(get_the_slug($actId) == 'avalonresidence.pl' || get_the_slug($actId) == 'avalon.hypotheticalpeople.com'){
            $menuOpen = 'menuOpen';
            $content = 'strona-glowna';
        }
        ?>
        <body class="LoaderStart <?php echo $menuOpen; ?> <?php echo $deviceType; ?> <?php echo $bname; ?> <?php echo $ieVersion; ?> animNone" data-content="<?php echo $content; ?>"  data-content-actual="<?php echo $content; ?>">
          <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WHQKSJQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

              <div class="Loader">
                <div class="Background"></div>
            </div>

            <?php
            $items = wp_get_nav_menu_items('Menu');
            foreach ($items as $item) {
                $menuArrayId[$item->ID] = $item->object_id;
                $menuArray[$item->ID] = $item->attr_title;
            }
            ?>

            <div id="Menu" class="hide">
                <div class="Step1">
                    <div class="BtSwitch">
                        <div class="Lines">
                            <div class="Line1"></div>
                            <div class="Line2"></div>
                            <div class="Line3"></div>
                        </div>
                        <div class="Txt">Menu</div>
                    </div>
                    <div class="Status">
                        <?php
                        $x = 1;
                        foreach ($menuArray as $key => $value) {
                            $active = '';
                            if ($actId == $key || $actIdParent == $key)
                                $active = 'active';
                            $pageId = get_post($menuArrayId[$key]);
                            if ($pageId->post_name != 'strona-glowna') {
                                ?>

                                <div data-content="<?php echo $pageId->post_name; ?>" data-template="<?php echo $value; ?>">0<?php echo $x; ?></div>

                                <?php
                                $x++;
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="Step2 grid1plus90">
                    <div class="Inside grid1plus90">
                        <a class="Logo changePage" href="<?php bloginfo('home'); ?>/" data-content="strona-glowna" data-template="home"><img class="Logo" src="<?php bloginfo('template_url'); ?>/img/Logo.svg" /></a>
                        <div class="Links">
                            <?php
                            $x = 0;
                            foreach ($menuArray as $key => $value) {
                                $active = '';
                                if ($actId == $key || $actIdParent == $key)
                                    $active = 'active';
                                $pageId = get_post($menuArrayId[$key]);
                                ?>

                                <a class="Bt changePage <?php echo $active; ?>" href="<?php echo get_permalink($pageId->ID); ?>" data-content="<?php echo $pageId->post_name; ?>" data-template="<?php echo $value; ?>">
                                    <div class="Line noPreload"></div>
                                    <div class="Title"><?php echo $pageId->post_title; ?></div>
                                    <div class="Number">0<?php echo $x; ?></div>
                                </a>

                                <?php
                                $x++;
                            }
                            ?>
                            <a class="Bt Pdf" target="_blank" href="<?php echo get_bloginfo('home'); ?>/materialy/Avalon_Broszura.pdf">
                                <div class="Line noPreload"></div>
                                <div class="Title">Sciągnij broszurę PDF</div>
                                <div class="Number">
                                    <svg class="Normal" x="0px" y="0px" width="12px" height="14px" viewBox="0 0 11.666 14" enable-background="new 0 0 11.666 14" xml:space="preserve">
                                        <path fill="#cccccc" d="M7.584,1.167v2.917h2.917v8.75H1.166V1.167H7.584z M8.166,0H0v14h11.666V3.5L8.166,0z"/>
                                    </svg>
                                    <svg class="Hover" x="0px" y="0px" width="12px" height="14px" viewBox="0 0 11.667 14" xml:space="preserve">
                                        <path fill="#cccccc" d="M11.667,3.5h-3.5V0L11.667,3.5z M7,4.667V0H0v14h11.667V4.667H7z"/>
                                    </svg>
                                </div>
                            </a>
                            <div class="Clear"></div>
                        </div>
                        <a class="Author" href="http://www.parabolicplayground.com" target="_blank">
                            projekt strony:
                            <div>parabolicplayground</div>
                        </a>
                    </div>
                </div>
                <div class="Background"></div>
                <div class="Mask"></div>
            </div>

            <div id="SliderFull">
              <div class="CloseReal actSliderFullClose"></div>
              <a class="Close actSliderFullClose">
                <svg x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                  <circle fill="none" stroke-width="2" cx="20.023" cy="19.911" r="18.564"></circle>
                  <line fill="none" stroke-width="2" x1="27" y1="12.971" x2="13.042" y2="26.925"></line>
                  <line fill="none" stroke-width="2" x1="26.997" y1="26.927" x2="13.042" y2="12.969"></line>
                </svg>
              </a>
            </div>
            
            <div id="Contents" data-loaded="">
                <?php
                foreach ($menuArray as $key => $value) {
                    $pageId = get_post($menuArrayId[$key]);

                    $active = $loaded = '';
                    if ($actId == $pageId->ID) {
                        $active = 'active';
                        $loaded = 'true';
                    }
                    echo '<div class="Content pt-page" data-template="' . $value . '" data-content="' . sanitize_title($pageId->post_title) . '" data-active="' . $active . '" data-loaded="' . $loaded . '">';
                    if ($actId == $pageId->ID) {
                        $params = array(
                            'slug' => $value,
                            );
                        getTemplatePart('action', 'loadPage', $params);
                    }
                    echo '</div>';
                }
                ?>
            </div>

            <?php } ?>
