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



    <section class="content-area col-xs-12" id="primary">
        <div role="main" class="site-content" id="content">
            <?php if ( have_posts() ) : ?>

            <h1 class="news title-cat-header">Проекты</h1>
        <!-- .archive-header -->

        <?php /* The loop */ ?>
            <section class="news-content category-content all-project-body">
            <?php

        $myterms = get_terms('videos', 'orderby=count&hide_empty=0');

        foreach($myterms as $terms_id):

        $cat_term_time = get_option("category_$terms_id->term_id");
            //var_dump($cat_term_time);
            ?>
            <div class="col-xs-12 progect-video-item" style="background: url(<?php  if( !isset($cat_term_time['cat_img']) || empty($cat_term_time['cat_img'])): echo get_stylesheet_directory_uri().'/images/krym-project_empty.png';  else: echo $cat_term_time['cat_img']; endif;  ?>) no-repeat; background-size: 100% auto; ">
              <div class="col-xs-6 wrapp-project-left">
                    <div class="title-project"><?php echo $terms_id->name;?></div>
                    <div class="description-project"><?php echo wp_trim_words($terms_id->description, 30, '');?></div>
                  <div class="col-xs-12 project-bottom-line">
                      <div class="col-xs-6 share-project-bottom">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/share-project.png"/>
                      </div>
                      <div class="col-xs-6 more-read-button">
                          <a href="<?php $term_link = get_term_link((int)$terms_id->term_id, 'videos'); echo $term_link; ?>">Читать больше</a>
                      </div>
                  </div>
              </div>
                <?php
                $arr_day = array();
        if($cat_term_time['all_day_check'] == 'prev'){
            $arr_day[] = 'каждый день';
        }
                if($cat_term_time['mon_day_check'] == 'prev'){
            $arr_day[] = 'понедельник';
        }
                if($cat_term_time['tues_day_check'] == 'prev'){
            $arr_day[] = 'вторник';
        }
                if($cat_term_time['wedn_day_check'] == 'prev'){
            $arr_day[] = 'среда';
        }
                if($cat_term_time['thur_day_check'] == 'prev'){
            $arr_day[] = 'четверг';
        }
                if($cat_term_time['fri_day_check'] == 'prev'){
            $arr_day[] = 'пятница';
        }
                if($cat_term_time['sat_day_check'] == 'prev'){
            $arr_day[] = 'субота';
        }
                if($cat_term_time['sun_day_check'] == 'prev'){
            $arr_day[] = 'воскресенье';
        }

                ?>
                <div class="col-xs-6 wrapp-project-right">
                    <?php if( ( !empty($cat_term_time['cat_progect_time'] ) ) || isset( $cat_term_time['cat_progect_time'] ) ) : ?><div class="big-date-top-news"><span><?php echo $cat_term_time['cat_progect_time']; ?></span>
                        <?php for( $i=0; $i<= count($arr_day); $i++ ):
                       echo  '<p>' . $arr_day[$i] . '</p>';
                         endfor;?>

                        </div><?php endif; ?>
                    <a href="<?php echo $term_link; ?>" class="more-project-video-view">Смотреть видео</a>
                </div>
            </div>
            <?php


//            FOR CONTENT CATEGORY VIDEO

//        if(!empty($cat_term_time['cat_play_id'])):
//            echo $terms_id->term_id;
//            echo $terms_id->slug;
//            $post_type = 'video';
//            $tax = 'videos';
//            $terms = array($terms_id->slug);
//            $psts = get_posts( array(
//                'posts_per_page' => -1,
//                'post_type' => $post_type,
//                'tax_query' => array(
//                    'relation' => 'AND',
//                    array(
//                        'taxonomy' => $tax,
//                        'terms' => $terms,
//                        'field' => 'slug',
//                        'operator' => 'IN',
//                    )
//                ),
//                '' => '',
//            ) );
//
//            $i = 0;
//
//            $post_true = array();
//            foreach( $psts as $pst ){
//                $post_true[] = $pst->post_title;
//
//            }
//          endif;
        endforeach;

            ?>
        <?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>
        </section>
    </div><!-- #content -->


<?php //get_sidebar(); ?>

<?php get_footer(); ?>
