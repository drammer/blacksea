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
    <h1 class="news title-cat-header">TV Программа</h1>

    <div id="content" class="site-content" role="main">
        <section class="news-content category-content all-project-body">
            <div class="entry-content video-project-content">
                <?php
                $terms = get_terms("programms");
                $count = count($terms);
                if ($count > 0) {
                    echo "<ul>";
                    foreach ($terms as $term) {
                        echo "<li>" . $term->name . "</li>";

                    }
                    echo "</ul>";
                } ?>


            </div>
        </section>

    </div>
    <!-- #content -->
</section><!-- #primary -->

<?php if (!dynamic_sidebar()): ?>
    <aside class="sidebar col-xs-4">
        <div class="sidebar-list">
            <?php if (function_exists('dynamic_sidebar')) dynamic_sidebar('single-news-sidebar'); ?>
        </div>
    </aside>
<?php endif; ?>

<?php get_footer(); ?>
