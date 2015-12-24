<!doctupe html>
<html>
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $robots = get_post_meta(get_the_ID(), 'robots', 1);
    if ($robots == 'closed'): ?>
        <meta name="robots" content="noindex">
    <?php endif; ?>

    <title><?php wp_title('<<', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>

    <link rel="stylesheet" id="mobile_style" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile-style.css"
          type="text/css" media="all"/>

</head>
<body <?php body_class(); ?>>
<section class="wrapper">


    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="live-button-fixed" href="#"><i class="fa fa-play-circle-o"></i></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php $mobile_logo = get_theme_mod('blacksea_mobile_logo');
                if (!empty($mobile_logo)): ?>
                    <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
                        <div class="logo"><img src="<?php echo $mobile_logo; ?>"/></div>
                    </a>
                <?php endif; ?>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php echo wp_nav_menu(array(
                    'menu' => 'Top menu',
                    'container' => 'div',
                    'menu_class' => 'nav navbar-right nav-justified',
                )); ?>


            </div>
            <!--/.nav-collapse -->
            <div class="right-fix-socials-icon">
                <?php
                $blacksea_facebook = get_theme_mod('blacksea_facebook');
                $blacksea_twitter = get_theme_mod('blacksea_twitter');
                $blacksea_you_tube = get_theme_mod('blacksea_you_tube');
                $blacksea_google = get_theme_mod('blacksea_google');
                $blacksea_vk = get_theme_mod('blacksea_vk');
                $blacksea_instagram = get_theme_mod('blacksea_instagram');
                ?>
                <ul>
                    <li class="search-icon"><i class="fa fa-search"></i></li>
                    <?php if (!empty($blacksea_facebook)): ?>
                        <li><a href="<?php echo $blacksea_facebook; ?>" target="_blank"><i
                                    class="fa fa-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php if (!empty($blacksea_twitter)): ?>
                        <li><a href="<?php echo $blacksea_twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($blacksea_you_tube)): ?>
                        <li><a href="<?php echo $blacksea_you_tube; ?>" target="_blank"><i
                                    class="fa fa-youtube"></i></a></li>
                    <?php endif; ?>
                    <?php if (!empty($blacksea_google)): ?>
                        <li><a href="<?php echo $blacksea_google; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($blacksea_vk)): ?>
                        <li><a href="<?php echo $blacksea_vk; ?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                    <?php endif; ?>

                    <?php if (!empty($blacksea_instagram)): ?>
                        <li><a href="<?php echo $blacksea_instagram; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="fixed-live-block">
        <article class="col-xs-12 live-tv-big">
            <div class="live-tv-box col-xs-12 widget">
                <div class="box-live-video box-content">
                    <div id="player-mobile">

                    </div>
                    <div class="live-chat"><span>ВОПРОС В ЭФИР</span></div>
                </div>
            </div>
        </article>
    </div>

    <section class="content-area-all container">