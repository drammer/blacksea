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

                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist" id="myTabs">
                        <?php
                        //We obtain positions for a certain period of time

                        $tDayData = strtotime(date("Y-m-d"));

                        $monday = strtotime("Monday");
                        $mondayLast = strtotime("last Monday");
                        $next_monday = strtotime("next Sunday");

                        $tydayText = mb_strtolower(date('l'));

                        $dayEng = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
                        //                   $day = array('monday' => 'Понедельник', 'tuesday' => 'Вторник', 'wednesday' => 'Среда','thursday' => 'Четверг','friday' => 'Пятница', 'saturday' => 'Суббота', 'sunday' => 'Воскресенье');
                        $day = array('monday' => 'Пн', 'tuesday' => 'Вт', 'wednesday' => 'Ср', 'thursday' => 'Чт', 'friday' => 'Пт', 'saturday' => 'Сб', 'sunday' => 'Вс');

                        $myterms = get_terms('programms');

                        $post_type = 'programm';
                        $tax = 'programms';
                        $terms = array($terms_id->slug);
                        $psts = query_posts(array(
                            'post_type' => $post_type,
                            'post_status' => array('publish', 'future'),
                            'tax_query' => array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => $tax,
                                    'terms' => $dayEng,
                                    'field' => 'slug',
                                    'operator' => 'IN',
                                ),
                            ),
                            'date_query' => array(
                                'relation' => 'AND',
                                array(
                                    'after' => array(
                                        'year' => date('Y', $mondayLast),
                                        'month' => date('m', $mondayLast),
                                        'day' => date('j', $mondayLast),
                                    ),
                                    'before' => array(
                                        'year' => date('Y', $next_monday),
                                        'month' => date('m', $next_monday),
                                        'day' => date('j', $next_monday),
                                    ),
                                    'inclusive' => true,
                                ),
                            ),
                        ));

                        $timeLink = array();
                        $dayLink = array();
                        for ($i = 0; $i < count($day); $i++) { ?>
                            <li role="presentation" class="<?php echo ($tydayText == $dayEng[$i]) ? 'active' : ''; ?>">
                                <a href="#<?php echo $dayEng[$i]; ?>" aria-controls="<?php echo $dayEng[$i]; ?>"
                                   role="tab" data-toggle="tab"><?php echo $day[$dayEng[$i]]; ?></a></li>
                        <?php } ?>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content"><?php if (!empty($psts)): foreach ($psts as $anonce): ?>
                            <?php $cats = wp_get_post_terms($anonce->ID, 'programms'); ?>
                            <div role="tabpanel"
                                 class="tab-pane fade <?php echo ($tydayText == $cats[0]->slug) ? 'in active' : ''; ?> "
                                 id="<?php echo $cats[0]->slug; ?>">
                                <?php
                                var_dump($anonce);
                                echo $anonce->post_date; ?>
                                <?php $field = get_post_meta($anonce->ID);
                                print_r($field); //var_dump($psts); ?>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>

                </div>

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
