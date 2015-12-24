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
    <h1 class="news title-cat-header"><?php echo the_title(); ?></h1>
    <div id="content" class="site-content" role="main">
        <section class="news-content category-content all-project-body">
            <div class="entry-content blogs-content">
                <?php
                $argc = array(
                    'cat'           => '21',
                    'post_per_page' => '8',
                    'showposts'     => '8',
                    'paged'         => $paged,
                );
                $query = new WP_Query;
                $blogs = $query->query($argc);

                foreach($blogs as $blog){
                    $id = $blog->ID;
                    ?>
                    <div class="col-xs-12 blog-item">
                        <div class="thumbnail-blog-item col-xs-3">
                            <?php echo get_the_post_thumbnail($id,'thumbnail', 'class=img-rounded thumbnail-autor' ); ?>
                        </div>
                        <div class="item-content-blog col-xs-9">
                            <div class="title-blog-item"><?php echo $blog->post_title;?></div>
                            <div class="autor-blog-item"><?php echo get_post_meta($id, 'autor_staty', true); ?></div>
                            <div class="content-prev-blog-item"><?php echo wp_trim_words($blog->post_content, 35); ?></div>
                            <a href="<?php echo get_permalink($id);?>" class="permalink-blog-item">К статье</a>
                        </div>
<hr class="blog-hr">
                    </div>

                    <?php
                };

                ?>
                <?php if (function_exists('wp_corenavi')) wp_corenavi(); custom_pagination($paged); ?>

                <div class="clearfix"></div>
            </div>
        </section>

    </div><!-- #content -->
</section><!-- #primary -->

<?php if( ! dynamic_sidebar()):?>
    <aside class="sidebar col-xs-4">
        <div class="sidebar-list">
            <?php if(function_exists('dynamic_sidebar')) dynamic_sidebar('single-blog-sidebar'); ?>
        </div>
    </aside>
<?php endif; ?>

<?php get_footer(); ?>
