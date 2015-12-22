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

    <title><?php wp_title('<<', true, 'right'); ?><?php bloginfo('name');?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<div class="right-fix-socials-icon">
    <?php
   $blacksea_facebook = get_theme_mod('blacksea_facebook');
   $blacksea_twitter = get_theme_mod('blacksea_twitter');
   $blacksea_you_tube =  get_theme_mod('blacksea_you_tube');
   $blacksea_google = get_theme_mod('blacksea_google');
   $blacksea_vk = get_theme_mod('blacksea_vk');
   $blacksea_instagram = get_theme_mod('blacksea_instagram');

    ?>
    <ul>
        <li class="search-icon"><i class="fa fa-search"></i></li>
        <?php if(!empty($blacksea_facebook)): ?>
            <li><a href="<?php echo $blacksea_facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <?php endif; ?>
        <?php if(!empty($blacksea_twitter) ): ?>
            <li><a href="<?php echo $blacksea_twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <?php endif; ?>
        <?php if(!empty($blacksea_you_tube)): ?>
            <li><a href="<?php echo $blacksea_you_tube;?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
        <?php endif; ?>
        <?php if(!empty($blacksea_google) ): ?>
            <li><a href="<?php echo $blacksea_google;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
        <?php endif;?>
        <?php if(!empty($blacksea_vk) ):?>
            <li><a href="<?php echo $blacksea_vk;?>" target="_blank"><i class="fa fa-vk"></i></a></li>
        <?php endif;?>

        <?php if(!empty($blacksea_instagram) ):?>
            <li><a href="<?php echo $blacksea_instagram;?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
        <?php endif;?>
    </ul>
</div>
    <section class="wrapper">
        <header class="navbar navbar-default">
            <div class="container header-block">
                <div class="navbar-header col-xs-2">
                    <a href="<?php echo home_url('/'); ?>"><div class="logo"><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.png"></div></a>
                </div>
            <div id="navbar-top" class="col-xs-10">
                <div class="wrap-widget-block-top">
                    <div class="reklama-widget-top col-xs-10">
                        reklama
                    </div>
                    <div class="reklama-widget-top col-xs-2">
                        <?php include('scriptsphp/timer.php');?>
                    </div>
                </div>

                <div class="col-xs-12 nav-top">
                        <?php echo wp_nav_menu( array(
                            'menu'          => 'Top menu',
                            'container'     => 'div',
                            'menu_class'    => 'nav navbar-right nav-justified',
                        ));?>
                </div>
            </div>
            </div>
        </header>
<section class="content-area-all container">
