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
    <h1 class="news title-cat-header"><?php echo wp_title(''); ?></h1>
    <div id="content" class="site-content" role="main">
        <section class="news-content category-content all-project-body">
            <div class="entry-content video-project-content">
                <div class="col-xs-12 calendar-archive">
                    <form enctype="multipart/form-data" action="" method="post" name="calendar_filtr" id="calendar_filtr">
                        <?php $arr_mon = array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');?>
                       <div class="chislo-field wrapp-select">
                        <select name="name[day]">
<!--                        <select name="day" onchange="document.location=this.options[this.selectedIndex].value" >-->
                            <option selected value="">День</option>
                            <?php for($i = 1; $i <= 31; $i++){
                                echo '<option value="'. $i .'">' . $i . '</option>';
                            }
                            ?>
                        </select>
                        </div>
                        <div class="mon-field wrapp-select">
                            <select name="name[month]">
                                <option selected value="">Месяц</option>
                                <?php

                                 for($i = 0; $i < count($arr_mon); $i++ ){
                                     $m_val = $i + 1;
                                    echo '<option value="'. $m_val .'">'.$arr_mon[$i].'</option>';

                                }
                                wp_reset_query(); wp_reset_postdata();
                                ?>
                            </select>
                        </div>
                        <div class="year-field wrapp-select">
                            <select name="name[year]">
                                <option selected value="">Год</option>
                                <?php
                                global $wpdb;

                                $count_y = $wpdb->get_row("SELECT MAX(`post_date`), MIN(`post_date`) FROM `wp_posts` WHERE `post_type` = 'video';");

                                    $year_arr = array();
                                foreach($count_y as $year){
                                    $year_arr[]=get_date_from_gmt($year, 'Y');
                                }
                                $count_year = $year_arr[0] - $year_arr[1];
                                for( $i = 0; $i <= $count_year; $i++ ){
                                    $year = $year_arr[0] - $i;
                                    echo '<option value="'. $year .'">'. $year . '</option>';
                                };
                                wp_reset_query(); wp_reset_postdata();
                                ?>
                            </select>
                        </div>
                        <div class="category-field wrapp-select">
                            <select name="name[category]">
                                <option selected value="">Категория программ</option>
                                <?php
                                $myterms = get_terms('videos', 'orderby=count&hide_empty=0');
                                foreach($myterms as $term){
                                    echo '<option value="'.$term->term_id.'">'. $term->name .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
                <?php

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $term = get_queried_object();

                $post_type = 'video';
                $tax = 'videos';

                $arr_url = explode('/', $_SERVER['REQUEST_URI']);

if(is_numeric( $arr_url['2'] ) )  $url_paged = $arr_url['2'];

                if(!is_numeric($arr_url['2'])){
                    $paged = 1;
                }else{
                    $paged = str_replace("/[^0-9]/",'', $url_paged );
                }

                $terms = array($term->slug);

                $post_type = 'video';
                $tax = 'videos';
                //$terms = array('term-slug', 'term-slug-two', 'term-slug-three');
                if(empty($month)){
                    $month = '';
                }

                if(empty($day)){
                    $day = '';
                }

                if(empty($year)){
                    $year= '';
                }

                $psts = get_posts( array(
                    'posts_per_page' => -1,
                    'post_type' => $post_type,
                    'showposts' => 5,
                    'paged'     => $paged,
                ) );


                $count = wp_count_posts('video');
                $count_post = $count->publish;

                $i = 0;
                ?>
                <div id="archive-video-wrapp-content">
                <?php

                if(empty($psts)){
                    echo "Ничего не найденно";
                }else {


                    foreach ($psts as $post) {
                        //var_dump($post);
                        $id = $post->ID;
                        $id_video = get_post_meta($id, 'link_video', 1);
                        $img_video = get_post_meta($id, 'img_video', 1);
                        ?>
                        <div class="anonce-prev-img-cat-true" data-video="<?php echo $id_video; ?>">

                            <img class="play-button"
                                 src="<?php echo get_stylesheet_directory_uri(); ?>/images/play-circle-48.png">
                            <img src="<?php echo $img_video; ?>" class="anonce-category-prev-link">
                        </div>
                        <?php


                    }
                }
                wp_reset_query(); wp_reset_postdata();
                ?>
                <?php if (function_exists('wp_corenavi')) wp_corenavi(); custom_pagination($paged, $count_post); ?>
                    </div>

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
