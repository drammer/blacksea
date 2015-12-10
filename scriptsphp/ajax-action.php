<?php

// подгружаем среду WP
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

//var_dump($_POST);
// фильтруем POST данные, передаваемые этому файлу с Javascript
$day = htmlspecialchars(trim($_POST['name']['day']));
$month = htmlspecialchars(trim($_POST['name']['month']));
$year = htmlspecialchars(trim($_POST['name']['year']));
$cat = htmlspecialchars(trim($_POST['name']['category']));


?>

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

if(empty($month)){
    $month = '';
}

if(empty($cat)){
    $myterms = get_terms('videos', 'orderby=count&hide_empty=0');
    $cat = array();
    foreach($myterms as $terms_id){
        $cat[] = $terms_id->term_id;
    }
}

//var_dump($cat);

if(empty($day)){
    $day = '';
}

if(empty($year)){
    $year= array(date('Y'), 1970) ;
}


//$psts = get_posts( array(
//    'posts_per_page' => -1,
//    'post_type' => $post_type,
//    'showposts' => 5,
//    'paged'     => $paged,
//    'date_query' => array(
//        'year'      => $year,
//        'month'     => $month,
//        'day'       => $day,
//    ),
//) );

$psts = get_posts( array(
    'posts_per_page' => -1,
    'post_type' => $post_type,
    //'showposts' => 5,
    'paged'     => $paged,
    'date_query' => array(
        'year'      => $year,
        'month'     => $month,
        'day'       => $day,
    ),
    'tax_query' => array(
        'relation' => 'OR',
        array(
        'taxonomy'  => 'videos',
        'field'     => 'tax_id',
        'terms'     =>  $cat,
        ''
        ),
    ),
) );


$count = wp_count_posts('video');
$count_post = $count->publish;

$i = 0;

if(empty($psts)){
    echo "Ничего не найденно";
}else {
?>
    <div class="ajax-archive-video-wrapp">
<?php
    foreach ($psts as $post) {

        //var_dump($post);
        echo $post->count;
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
</div>
<?php //if (function_exists('wp_corenavi')) wp_corenavi(); custom_pagination($paged, $count_post); ?>