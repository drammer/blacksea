<?php
/**
 * Created by PhpStorm.
 * User: drammer
 * Date: 19.11.15
 * Time: 15:44
 */

/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area col-xs-8">
    <div id="content" class="site-content" role="main">

        <?php if ( have_posts() ) : ?>
                <h1 class="news title-cat-header"><?php echo single_cat_title( '', false ); ?></h1>
        <!-- .archive-header -->

            <?php /* The loop */ ?>
            <section class="news-content category-content">

                <div class="top-news">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $news_posts = new WP_Query;
                    $news = $news_posts->query( array(
                        'cat'  => 2,
                        'showposts' => 31,
                        'post_per_page' => -1,
                        'paged'=>$paged,
                    ) );
                    $count = 0;
                    $today = date('d.m.Y');
                    $title_today = date('d.m.Y');
                    foreach( $news as $news_article ):
                        $id = $news_article->ID;
if($count++ >= 2):
    $day_date_news = date('d.m.Y',strtotime($news_article->post_date) ); ?>

    <?php if($today != $day_date_news): $today = $day_date_news; ?>

    <div class="col-xs-12 category-news hr-article"><span><?php echo date_news($news_article->post_date, 'text_mon_news'); ?></span><hr></div>
<?php endif;
                       ?>
                            <a href="<?php echo get_permalink($id); ?>">
                                <div class="col-xs-12 artikle-news-one">
                                    <div class="news-top-time col-xs-2"><?php echo date_news($news_article->post_date, 'time_news'); ?></div>
                                        <h3 class="news-top-title <?php $top_news = get_the_category($id); echo $top_news[1]->category_nicename;?>"><?php echo $news_article->post_title;?></h3>
                                </div>
                            </a>
    <?php else:?>
    <a href="<?php echo get_permalink($id); ?>">
        <div class="category-news-block-top box-content col-xs-6 box-article-<?php echo $count;?>">
            <div class="big-date-top-news"><span><?php echo get_post_time('j', true, $id, true) ?></span><p><?php echo get_post_time('M', true, $id, true) ?></p></div>
            <?php echo  remove_img_attribute( get_the_post_thumbnail($id) ); ?>
            <div class="prev-top-block-category">

                <div class="left-top-prev col-xs-12">
                    <h3><?php echo $news_article->post_title;?></h3>
                </div>

            </div>
        </div>
    </a>

    <?php endif;?>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); wp_reset_query(); ?>

<hr class="news-line">
                    <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
                </div>

                    <?php //twentythirteen_paging_nav(); ?>

                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
            </section>
    </div><!-- #content -->
    <?php get_template_part('content', 'bottom-widget'); ?>
</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
