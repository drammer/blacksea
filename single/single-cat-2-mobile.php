<?php
/**
 * Created by PhpStorm.
 * User: drammer
 * Date: 19.11.15
 * Time: 15:35
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<?php $singleID = get_the_ID(); ?>

<div id="primary" class="content-area single-news col-xs-12">
    <a class="breadcrump-single" href="<?php echo the_single_breadcrump(); ?>">&lt; Назад</a>

    <div id="content" class="site-content news-single" role="main">
        <?php
        // Start the loop.
        while (have_posts()) :
        the_post(); ?>

        <div class="title-single-news"><?php the_title(); ?></div>
        <div class="col-xs-12 time-single-news">
            <span><?php echo the_time('G:i'); ?></span> <?php echo date_news(get_the_date('Y-m-d G:i'), 'text_mon_news'); ?>
        </div>
        <div class="img-single-news-wrapp">
            <div class="img-single-news"
                 style="background: url(<?php $img = image_downsize(get_post_thumbnail_id($singleID), 'medium');
                 echo $img[0]; ?>) no-repeat; background-size: 100% auto;
                     "></div>
            <?php
            $description_img_single = get_metadata('post', $singleID, 'description_news_img_single', 1);
            if (!empty($description_img_single)):?>
                <p><?php echo $description_img_single; ?></p>
            <?php endif; ?>
        </div>
        <div class="content-single-news">
            <?php
            the_content();
            endwhile;
            ?>

        </div>

        <div class="col-xs-12 share-block-single-news">
            <hr class="single-share-hr">
            <div class="col-xs-12">Поделиться с друзьями:</div>
            <div class="col-xs-12">
                <ul class="socsety-menu-single">
                    <li><a target="_blank" rel="nofollow"
                           href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(get_the_ID()); ?>"><span
                                class="wrapp-icon"><i class="fa fa-facebook"></i></span></a></li>
                    <li><a target="_blank" rel="nofollow"
                           href="http://vk.com/share.php?url=<?php echo get_permalink(get_the_ID()); ?>"><span
                                class="wrapp-icon"><i class="fa fa-vk"></i></span></a></li>
                    <!--                    <li><a target="_blank" rel="nofollow" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl=http://sockraina.com/news/-->
                    <? //=$News->intID;?><!--" class="icon_social_odnkl"><span class="wrapp-icon"><i class="fa fa-ok"></i></span></a></li>-->
                    <li><a href="https://plus.google.com/share?url=<?php echo get_permalink(get_the_ID()); ?>"
                           onclick="window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span
                                class="wrapp-icon"><i class="fa fa-google-plus"></i></span></a></li>
                    <li>
                        <a href="http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php echo get_permalink(get_the_ID()); ?>&amp;via=SocKraina"
                           title="Поделиться ссылкой в Твиттере"
                           onclick="window.open(this.href, this.title, 'toolbar=0, status=0, width=548, height=325'); return false"
                           target="_parent"><span class="wrapp-icon"><i class="fa fa-twitter"></i></span></a></li>
                </ul>
            </div>
            <hr class="single-share-hr">
        </div>
        <div class="col-xs-12 comment-box">
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

            ?>
        </div>
        <div class="clearfix"></div>

    </div>
    <!-- #content -->
    <?php //get_template_part('content', 'bottom-widget'); ?>
</div><!-- #primary -->

<?php //if( ! dynamic_sidebar()):?>
<!--    <aside class="sidebar col-xs-4">-->
<!--        <div class="sidebar-list">-->
<!--            --><?php //if(function_exists('dynamic_sidebar')) dynamic_sidebar('single-news-sidebar'); ?>
<!--        </div>-->
<!--    </aside>-->
<?php //endif; ?>

<?php get_footer(); ?>
