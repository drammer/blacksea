<?php get_header(); ?>
<article class="content-wrapper home col-xs-8">

    <article class="col-xs-12 live-tv-big">
        <div class="live-tv-box col-xs-12 widget">           <span class="tv-title title-cat-header"><i class="fa fa-circle"></i>Online TV</span>            <div class="box-live-video box-content">
                <div id="player"><span class="play-box"><img src="http://blacksea.tv/wp-content/themes/blacksea/images/play-circle-48.png"></span></div>
                <div class="live-chat"><span>ВОПРОС В ЭФИР</span></div>
            </div>
        </div>
    </article>test1

    <div class="middle-block-content">
        <div class="content-front-left">
            <div class="col-xs-6">
                <span class="day-news title-cat-header">Лента новостей</span>
                <div class="day-new-front box-content">
                    <div class="wrapp-news-top-front">
                    <?php
                        $news_posts = new WP_Query;
                        $day_news = $news_posts->query( array(
                            'cat'                   => 2,
                            'post_per_page'         => 10,
                            'category__not_in'       => 4
                        ) );

                    $today = date('d.m.Y');

                        foreach( $day_news as $day_news ):
                            $day_date_news = date('d.m.Y',strtotime($day_news->post_date) ); ?>
                            <?php if($today != $day_date_news): $today = $day_date_news; ?>
                    <div class="col-xs-12 day-article empty-text-article"><?php echo date_news($day_news->post_date, 'big_test_mon'); ?><hr></div>
                        <?php endif; ?>
                                <?php $id = $day_news->ID; ?>
                            <a href="<?php echo get_permalink($id); ?>">
                                <div class="col-xs-12 day-article">
                                    <span class="time-day-news"><?php echo date_news($day_news->post_date, 'number_mon'); ?></span>
                                    <div class="title-day-article"><?php echo $day_news->post_title;?></div>
                                    <p><?php echo wp_trim_words($day_news->post_content,  10); ?></p>
                                <hr>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                        <?php wp_reset_postdata(); ?>
                    <div class="more-news-day">
                        <a href="http://blacksea.tv/news/" class="more-news-link">Больше новостей</a>
                    </div>
                </div>
            </div>
            <div class="category-news col-xs-6">
                <?php
                $news_posts = new WP_Query;
                $day_news = $news_posts->query( array(
                    'cat'                   => 5,
                    'post_per_page'         => 3,
                ) );
                if(!empty($day_news)):
                ?>
                <span class="cat-news cat-box-1 title-cat-header"><?php echo get_cat_name(5); ?></span>
                <div class="cat-new-front box-content">
                    <?php
                        foreach( $day_news as $day_news ):
                        $day_date_news = date('d.m.Y',strtotime($day_news->post_date) ); ?>
                        <?php $id = $day_news->ID; ?>
                        <a href="<?php echo get_permalink($id); ?>">
                            <div class="col-xs-12 day-article">
                                <div class="img-left-cat"><?php echo get_the_post_thumbnail($id,'thumbnail', 'class=img-rounded'); ?></div>
                                    <div class="text-right-cat">
                                        <span class="time-day-news"><?php echo date_news($day_news->post_date, 'number_mon'); ?></span>
                                        <div class="title-day-article"><?php echo $day_news->post_title;?></div>
                                        <p><?php echo wp_trim_words($day_news->post_content,  10); ?></p>
                                        <hr>
                                    </div>

                            </div>
                        </a>
                   <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <?php endif; ?>

                <!-- CATEGORY -->
                <?php
                $news_posts = new WP_Query;
                $day_news = $news_posts->query( array(
                    'cat'                   => 6,
                    'post_per_page'         => 2,
                ) );
                if(!empty($day_news)):
                ?>
            <span class="cat-news cat-box-2 title-cat-header"><?php echo get_cat_name(6); ?></span>
            <div class="cat-new-front box-content">
                <?php
                foreach( $day_news as $day_news ):
                $day_date_news = date('d.m.Y',strtotime($day_news->post_date) ); ?>
                <?php $id = $day_news->ID; ?>
                <a href="<?php echo get_permalink($id); ?>">
                    <div class="col-xs-12 day-article">
                        <div class="img-left-cat"><?php echo get_the_post_thumbnail($id,'thumbnail', 'class=img-rounded'); ?></div>
                        <div class="text-right-cat">
                            <span class="time-day-news"><?php echo date_news($day_news->post_date, 'number_mon'); ?></span>
                            <div class="title-day-article"><?php echo $day_news->post_title;?></div>
                            <p><?php echo wp_trim_words($day_news->post_content,  10); ?></p>
                            <hr>
                        </div>

                    </div>
                </a>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>

<!-- CATEGORY -->
                <?php
                $news_posts = new WP_Query;
                $day_news = $news_posts->query( array(
                    'cat'                   => 7,
                    'post_per_page'         => 2,
                ) );
                if( !empty($day_news)):
                ?>
                <span class="cat-news cat-box-3 title-cat-header"><?php echo get_cat_name(7); ?></span>
                <div class="cat-new-front box-content">
                    <?php
                        foreach( $day_news as $day_news ):
                        $day_date_news = date('d.m.Y',strtotime($day_news->post_date) ); ?>
                        <?php $id = $day_news->ID; ?>
                        <a href="<?php echo get_permalink($id); ?>">
                            <div class="col-xs-12 day-article">
                                <div class="img-left-cat"><?php echo get_the_post_thumbnail($id,'thumbnail', 'class=img-rounded'); ?></div>
                                <div class="text-right-cat">
                                    <span class="time-day-news"><?php echo date_news($day_news->post_date, 'number_mon'); ?></span>
                                    <div class="title-day-article"><?php echo $day_news->post_title;?></div>
                                    <p><?php echo wp_trim_words($day_news->post_content,  10); ?></p>
                                    <hr>
                                </div>

                            </div>
                        </a>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <?php endif;?>

                <!-- CATEGORY -->
                <?php
                $news_posts = new WP_Query;
                $day_news = $news_posts->query( array(
                    'cat'                   => 8,
                    'post_per_page'         => 2,
                ) );
                if( !empty($day_news)):
                    ?>
                    <span class="cat-news cat-box-4 title-cat-header"><?php echo get_cat_name(8); ?></span>
                    <div class="cat-new-front box-content">
                        <?php
                        foreach( $day_news as $day_news ):
                            $day_date_news = date('d.m.Y',strtotime($day_news->post_date) ); ?>
                            <?php $id = $day_news->ID; ?>
                            <a href="<?php echo get_permalink($id); ?>">
                                <div class="col-xs-12 day-article">
                                    <div class="img-left-cat"><?php echo get_the_post_thumbnail($id,'thumbnail', 'class=img-rounded'); ?></div>
                                    <div class="text-right-cat">
                                        <span class="time-day-news"><?php echo date_news($day_news->post_date, 'number_mon'); ?></span>
                                        <div class="title-day-article"><?php echo $day_news->post_title;?></div>
                                        <p><?php echo wp_trim_words($day_news->post_content,  10); ?></p>
                                        <hr>
                                    </div>

                                </div>
                            </a>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>

        </div>

            <?php get_template_part('content', 'bottom-widget'); ?>

        </div>


    </div>
</article>
<?php if( ! dynamic_sidebar()):?>
    <aside class="sidebar front-sidebar col-xs-4">
        <div class="sidebar-list">
            <?php if(function_exists('dynamic_sidebar')) dynamic_sidebar('front-page-sidebar'); ?>
        </div>
    </aside>
<?php endif; ?>
<?php get_footer(); ?>
