
</section>
</section>
    <footer>
        <div class="container">
            <div class="col-xs-8 left-footer-position">
                <div class="col-xs-12 left-menu-position">
                    <?php
                    wp_nav_menu( array(
                        'theme_location'  => '',
                        'menu'            => 'Bottom menu',
                        'container'       => 'div',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'bottom_menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0
                    ) );

                    ?>
                </div>
                <?php
                        $blacksea_text_footer = get_theme_mod('blacksea_text_footer');
                    if(!empty($blacksea_text_footer)): ?>
                <div class="col-xs-12 left-text-footer">
                        <?php echo $blacksea_text_footer; ?>
                </div>
                    <?php endif; ?>

            </div>
            <div class="col-xs-4 right-footer-position">
                <div class="col-xs-12 footer-socials">

                        <?php
                        $blacksea_facebook = get_theme_mod('blacksea_facebook_footer');
                        $blacksea_twitter = get_theme_mod('blacksea_twitter_footer');
                        $blacksea_you_tube =  get_theme_mod('blacksea_you_tube_footer');
                        $blacksea_google = get_theme_mod('blacksea_google_footer');
                        $blacksea_vk = get_theme_mod('blacksea_vk_footer');
                        $blacksea_instagram = get_theme_mod('blacksea_instagram_footer');

                        ?>
                        <ul>
                            <?php if(!empty($blacksea_facebook)): ?>
                                <li><a href="<?php echo $blacksea_facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($blacksea_instagram) ):?>
                                <li><a href="<?php echo $blacksea_instagram;?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <?php endif;?>
                            <?php if(!empty($blacksea_you_tube)): ?>
                                <li><a href="<?php echo $blacksea_you_tube;?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($blacksea_google) ): ?>
                                <li><a href="<?php echo $blacksea_google;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif;?>
                            <?php if(!empty($blacksea_twitter) ): ?>
                                <li><a href="<?php echo $blacksea_twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($blacksea_vk) ):?>
                                <li><a href="<?php echo $blacksea_vk;?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                            <?php endif;?>

                        </ul>

                </div>
                <?php wp_footer(); ?>
            </div>
        </div>
    </footer>
</body>
</html>
