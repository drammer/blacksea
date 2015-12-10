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

<section id="primary" class="content-area col-xs-8">
    <h1 class="news title-cat-header"><?php echo single_cat_title( '', false ); ?></h1>
    <div id="content" class="site-content" role="main">
        <section class="news-content category-content all-project-body">
            <div class="entry-content video-project-content">
                <?php

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $term = get_queried_object();

                            $post_type = 'video';
                            $tax = 'videos';

                if(!isset($_GET['page'])){
                    $paged = 1;
                }else{
                    $paged = str_replace("/[^0-9]/",'', $_GET['page'] );
                }

                            $terms = array($term->slug);
                            $psts = get_posts( array(
                                'posts_per_page' => -1,
                                'post_type' => $post_type,
                                'showposts' => 5,
                                'paged'     => $paged,
                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => $tax,
                                        'terms' => $terms,
                                        'field' => 'slug',
                                        'operator' => 'IN',
                                    )
                                ),
                                '' => '',
                                'caller_get_posts'=> 1,

                            ) );

                            $i = 0;

                            foreach( $psts as $post ){
                                //var_dump($post);
                                echo $post->count;
                                $id = $post->ID;
                                $id_video = get_post_meta($id, 'link_video', 1);
                                $img_video = get_post_meta($id, 'img_video', 1);
                                ?>
                                <div class="anonce-prev-img-cat-true" data-video="<?php echo $id_video;?>">

                                    <img class="play-button" src="<?php echo get_stylesheet_directory_uri();?>/images/play-circle-48.png">
                                    <img src="<?php echo $img_video; ?>" class="anonce-category-prev-link">
                                </div>
                                <?php



                            }
                ?>
                <?php if (function_exists('wp_corenavi')) wp_corenavi(); custom_pagination($paged); ?>


            </div>
        </section>

    </div><!-- #content -->
</section><!-- #primary -->

<?php if( ! dynamic_sidebar()):?>
    <aside class="sidebar col-xs-4">
        <div class="sidebar-list">
            <?php if(function_exists('dynamic_sidebar')) dynamic_sidebar('single-news-sidebar'); ?>
        </div>
    </aside>
<?php endif; ?>

<?php get_footer(); ?>
