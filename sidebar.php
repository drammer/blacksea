<?php
/**
 * Created by PhpStorm.
 * User: drammer
 * Date: 02.11.15
 * Time: 12:22
 */
?>

            <?php if( ! dynamic_sidebar()):?>
<aside class="sidebar col-xs-4">
                <div class="sidebar-list">
    <?php if(function_exists('dynamic_sidebar')) dynamic_sidebar('register-blacksea-front-top-widgets'); ?>
    <?php if(function_exists('dynamic_sidebar')) dynamic_sidebar('front-widget-right'); ?>
                </div>
</aside>
<?php endif; ?>

