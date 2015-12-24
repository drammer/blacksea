<?php
add_theme_support('post-thumbnails');

function blacksea_enqueue_styles(){
    wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri().'/dist/css/bootstrap.min.css');
    wp_enqueue_style('whitesquare-style', get_stylesheet_uri());
    wp_register_style('font-style', get_stylesheet_directory_uri().'/font-style.css?family=Calibri:400,300' );
    wp_enqueue_style('font-awesome-style', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
    wp_enqueue_style('font-style');
}
add_action('wp_enqueue_scripts', 'blacksea_enqueue_styles');

function blacksea_enqueue_scripts(){
    wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
    wp_enqueue_script('html5-shim');
    wp_register_script('jwplayer', 'http://www.aloha.cdnvideo.ru/aloha/jwplayer/js_for_embed/jwplayer.js');
    wp_enqueue_script('jwplayer');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap-js', get_stylesheet_directory_uri() . '/dist/js/bootstrap.js');
    wp_enqueue_script('bootstrap-js');
    wp_register_script('action', get_stylesheet_directory_uri().'/js/action.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script('action');
}

add_action('wp_enqueue_scripts', 'blacksea_enqueue_scripts');

register_nav_menus( array(
    'header_menu'   => 'Top position menu',
    'bottom_menu'   => 'Bottom position menu',

) );

function date_news($date, $time_variant = ''){
/* $time_variant return format date
"text_mon" return date in format 22 November
 *
"number_mon" return date in format 22.10.2015
 * */
    $today = date('d.m.Y');
    $today_new = date('d.m');
    $date_news = date('d.m.Y',strtotime($date) );
    $date_news_old = date('d.m',strtotime($date) );
    $mon = array('Декабря', 'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября');
//    echo $date_news;
    if($time_variant == 'text_mon' ):

        if($today == $date_news) :
            return human_time_diff(get_the_time(date('U',strtotime($date) ) ), current_time('timestamp')) . ' назад';
        else:
            return date( 'd', strtotime($date) ) .' '. $mon[date( 'n', strtotime($date) )];
        endif;
    endif;

    if($time_variant == 'text_mon_news' ):
$old_date = $date_news_old - $today_new;

        if($today_new == $date_news_old) :
            return 'Вчера';
        endif;
            if( $old_date == 1 ):
            return 'Сегодня';
        else:
            return date( 'd', strtotime($date) ) .' '. $mon[date( 'n', strtotime($date) )];
        endif;
    endif;

    if($time_variant == 'number_mon' ):

        if($today == $date_news) :
            return human_time_diff(get_the_time(date('U',strtotime($date) ) ), current_time('timestamp')) . ' назад';
        else:
            return $date_news;
        endif;
    endif;

    if($time_variant == 'big_test_mon' ):
        if ($today_new == $date_news_old) :
            return 'Вчера';
        else:
            return date('d', strtotime($date)) . ' ' . $mon[date('n', strtotime($date))] . ' ' . date('Y', strtotime($date));
        endif;
    endif;
    if ($time_variant == 'front_news_date'):
        if ((strtotime(date('d.m.Y')) - strtotime($date)) < 86400) :
            return 'Вчера';
        else:
            return date('d', strtotime($date)) . ' ' . $mon[date('n', strtotime($date))] . ' ' . date('Y', strtotime($date));
        endif;
    endif;

    if($time_variant == 'time_news' ):
        return date( 'H:i', strtotime($date) );
    endif;
}

function register_front_sidebar(){
    register_sidebar( array(
        'name'  => sprintf(__('Сайдбар главной страницы'), $i),
        'id'    => 'front-page-sidebar',
        'description'   => 'Вывод виджетов на главной странице',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12">',
        'after_widget' => "</div>\n",
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => "</h2>\n",
    ));
}
add_action('widgets_init', 'register_front_sidebar');

function register_blacksea_front_top_widgets(){
    register_sidebar(
        array(
            'name'          => __( 'Правый верхний сайдбар', 'theme_text_domain' ),
            'id'            => 'register-blacksea-front-top-widgets',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<span class="widget-title title-cat-header ">',
            'after_title'   => '</span><div class="widget-front box-content">',
            )
    );
}

add_action('widgets_init', 'register_blacksea_front_top_widgets');

function register_blacksea_widgets(){
    register_sidebar(
        array(
            'name'          => __( 'Правый средний сайдбар', 'theme_text_domain' ),
            'id'            => 'front-widget-right',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>' )
    );
}

add_action('widgets_init', 'register_blacksea_widgets');

function register_my_widgets(){
    register_sidebar( array(
        'name' => sprintf(__('Нижний сайдбар'), $i ),
        'id' => "bottom-sidebar",
        'description' => '',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12">',
        'after_widget' => "</div>\n",
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => "</h2>\n",
    ) );
}
add_action( 'widgets_init', 'register_my_widgets' );

function register_singe_sidebar(){
    register_sidebar( array(
        'name'  => sprintf(__('Сайдбар новостных страниц'), $i),
        'id'    => 'single-news-sidebar',
        'description'   => 'Вывод виджетов в странице новостей',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12">',
        'after_widget' => "</div>\n",
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => "</h2>\n",
    ));
}
add_action('widgets_init', 'register_singe_sidebar');

function register_blog_sidebar(){
    register_sidebar( array(
        'name'  => sprintf(__('Сайдбар страницы блога'), $i),
        'id'    => 'single-blog-sidebar',
        'description'   => 'Вывод виджетов на странице блога',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12">',
        'after_widget' => "</div>\n",
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => "</h2>\n",
    ));
}
add_action('widgets_init', 'register_blog_sidebar');


// FOR WIDGET BLOG CATEGORY

class news_widget extends  WP_Widget{
    function __construct(){
        parent::__construct(
            'news_widget',
            __('NewsWidget', 'news_widget_domain'),

            array('description' => __('Виджет новостей', 'news_widget_domain'), )
        );
    }

    public function widget( $args, $instance ){
        $title = apply_filters('widget_title', $instance['title'] );

        $args['before_title'] = '<span class="widget-title title-cat-header widget-news">';
        $args['after_widget'] ='</div>';
        $args['after_title'] = '</span>';
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        ?>
        <?php
        $news_posts = new WP_Query;
        $news_posts = $news_posts->query(
            array(
                'cat'           => '2',
                'showposts'     => '10',
                'post_per_page' => '10',
                'order'         => 'post_date',
            )
        );
?>
    <div class="widget-front box-content news-widget-single">
        <ul class="list-article">
        <?php
        foreach($news_posts as $article):
            $id = $article->ID; ?>
            <li class="list-article-item">
                <a href="<?php echo get_permalink($id); ?>">
                        <div class="time-news-widget col-xs-2"><?php echo date_news($article->post_date ,'time_news'); ?></div>
                        <div class="col-xs-10 title-article-news-widget"><?php echo $article->post_title; ?></div>

                </a>
            </li>
        <?php endforeach; ?>
            </ul>
        <div class="more-news-day">
            <a href="http://blacksea.tv/news/" class="more-news-link">Больше новостей</a>
        </div>
    </div>

    <?php
        wp_reset_postdata(); wp_reset_query();
        echo $args['after_widget'];
        }

    public function form($instance){
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'News title', 'wpb_widget_domain' );
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

}
// Register and load the widget
function news_load_widget(){
    register_widget('news_widget');
}
add_action('widgets_init', 'news_load_widget');



// Creating the widget
class blog_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
            'blog_widget',

// Widget name will appear in UI
            __('BlogWidget', 'blog_widget_domain'),

// Widget description
            array( 'description' => __( 'Виджет блогов', 'blog_widget_domain' ), )
        );
    }

// Creating widget front-end
// This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
        $args['before_title'] = '<span class="widget-title title-cat-header">';
        $args['after_widget'] ='</div>';
        $args['after_title'] = '</span>';
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        ?>
        <?php

// This is where you run the code and display the output
        //echo __( 'Hello, World!', 'wpb_widget_domain' );

    echo '<div class="widget-front box-content blog-widget-front">';

    $blog_posts = new WP_Query;

        $blog_post = $blog_posts->query(
            array(
            'cat'               => '21',
            'post_per_page'     => '4',
            'showposts'         => '4',
            'orderby'           => 'post_date',
            )
        );

        foreach($blog_post as $post){
            $id = $post->ID; ?>
            <a href="<?php echo get_permalink($id); ?>">
                <div class="col-xs-12 blog-widget-article">
                    <div class="img-left-cat"><?php echo get_the_post_thumbnail($id,'thumbnail', 'class=img-thumbnail'); ?></div>
                    <div class="text-right-blog-widget">
                        <div class="autor-blog-type"><?php echo get_post_meta($id, 'typ_autor', true);?></div>
                       <div class="title-blog-widget-article"><?php echo get_post_meta($id, 'autor_staty', true);//echo $post->post_title;?></div>
                        <p class="blog-widget-prev"><?php echo wp_trim_words($post->post_content,  13); ?></p>
                        <hr>
                    </div>

                </div>
            </a> <?php
        } ?>
        <div class="more-news-day">
            <a href="http://blacksea.tv/blogs/" class="more-news-link">Больше авторов</a>
        </div>
        <?php

        wp_reset_postdata();
    echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'wpb_widget_domain' );
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here

//REGISTER WIDGET
function blog_load_widget() {
    register_widget( 'blog_widget' );
}
add_action( 'widgets_init', 'blog_load_widget' );


//// Creating the TV widget
class TV_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
// Base ID of your widget
            'tv_widget',

// Widget name will appear in UI
            __('TV Widget', 'tv_widget_domain'),

// Widget description
            array('description' => __('Sample widget based on WPBeginner Tutorial', 'tv_widget_domain'),)
        );
    }

// Creating widget front-end
// This is where the action happens
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
// before and after widget arguments are defined by themes
        $args['before_widget'] = '<div class="live-tv-box col-xs-12 widget">';
        $args['before_title'] = '<span class="tv-title title-cat-header"><i class="fa fa-circle"></i>';
        $args['after_widget'] = '</div>';
        $args['after_title'] = '</span>';
        echo $args['before_widget'];
        ?>
           <?php if (!empty($title)): ?><?php echo $args['before_title'] . $title . $args['after_title'];?><?php endif; ?>
            <div class="box-live-video box-content">
                <div id="player"><span class="play-box"><img
                            src="<?php echo get_stylesheet_directory_uri(); ?>/images/play-circle-48.png"></span></div>
                <div class="live-chat"><span>ВОПРОС В ЭФИР</span></div>
            </div>
        <?php echo $args['after_widget']; ?>
        <?php
    }
// Widget Backend
        public function form($instance)
        {
            if (isset($instance['title'])) {
                $title = $instance['title'];
            } else {
                $title = __('New title', 'wpb_widget_domain');
            }
// Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                       name="<?php echo $this->get_field_name('title'); ?>" type="text"
                       value="<?php echo esc_attr($title); ?>"/>
            </p>
            <?php
        }

// Updating widget replacing old instances with new
        public
        function update($new_instance, $old_instance)
        {
            $instance = array();
            $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
            return $instance;
        }
}// Class wpb_widget ends here

// Register and load the widget

function tv_load_widget() {
    register_widget( 'tv_widget' );
}
add_action( 'widgets_init', 'tv_load_widget' );


if(class_exists( 'WP_Customize_Panel' )):


    function blacksea_register_theme_customizer($wp_customize)
    {

        $wp_customize->add_panel('panel_general', array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_support' => '',
            'title' => __('Настройки соцсетей', 'blacksea'),
        ));

        $wp_customize->add_section('blacksea_socials_section', array(
            'title' => __('Настройки линков для соцсетей в боковом меню', 'blacksea'),
            'priority' => 1,
            'panel' => 'panel_general',
        ));


        $wp_customize->add_setting('blacksea_facebook', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_facebook', array(
            'label' => __('Линк для facebook', 'blacksea'),
            'section' => 'blacksea_socials_section',
            'settings' => 'blacksea_facebook',
            'priority' => 1,
        ));

        $wp_customize->add_setting('blacksea_twitter', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_twitter', array(
            'label' => __('Линк для twitter', 'blacksea'),
            'section' => 'blacksea_socials_section',
            'settings' => 'blacksea_twitter',
            'priority' => 3,
        ));


        $wp_customize->add_setting('blacksea_you_tube', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_you_tube', array(
            'label' => __('Линк для you tube', 'blacksea'),
            'section' => 'blacksea_socials_section',
            'settings' => 'blacksea_you_tube',
            'priority' => 5,
        ));


        $wp_customize->add_setting('blacksea_google', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_google', array(
            'label' => __('Линк для google+', 'blacksea'),
            'section' => 'blacksea_socials_section',
            'settings' => 'blacksea_google',
            'priority' => 7,
        ));


        $wp_customize->add_setting('blacksea_vk', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_vk', array(
            'label' => __('Линк для vk', 'blacksea'),
            'section' => 'blacksea_socials_section',
            'settings' => 'blacksea_vk',
            'priority' => 9,
        ));

        $wp_customize->add_setting('blacksea_instagram', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_instagram', array(
            'label' => __('Линк для instagram', 'blacksea'),
            'section' => 'blacksea_socials_section',
            'settings' => 'blacksea_instagram',
            'priority' => 10,
        ));

//    FOR FOOTER TEXT

        $wp_customize->add_panel('panel_customize_footer', array(
            'priority' => 21,
            'capability' => 'edit_theme_options',
            'theme_support' => '',
            'title' => __('Настройки подвала сайта', 'blacksea'),
        ));

        $wp_customize->add_section( 'blacksea_footer_customize_section' , array(
            'title'       => __( 'Настройки подписей подвала сайта', 'blacksea' ),
            'priority'    => 32,
            'panel' => 'panel_customize_footer'
        ));

        $wp_customize->add_setting('blacksea_text_footer', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_text_footer', array(
            'label' => __('Текс в подвале сайта', 'blacksea'),
            'type'      => 'textarea',
            'section' => 'blacksea_footer_customize_section',
            'settings' => 'blacksea_text_footer',
            'priority' => 1,
        ));

        //    FOR FOOTER SOCIAL ICONS

        $wp_customize->add_section( 'blacksea_footer_section' , array(
            'title'       => __( 'Настройки соцсетей подвала сайта', 'blacksea' ),
            'priority'    => 33,
            'panel' => 'panel_general'
        ));

        $wp_customize->add_setting('blacksea_facebook_footer', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_facebook_footer', array(
            'label' => __('Линк для facebook', 'blacksea'),
            'section' => 'blacksea_footer_section',
            'settings' => 'blacksea_facebook_footer',
            'priority' => 1,
        ));

        $wp_customize->add_setting('blacksea_twitter_footer', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_twitter_footer', array(
            'label' => __('Линк для twitter', 'blacksea'),
            'section' => 'blacksea_footer_section',
            'settings' => 'blacksea_twitter_footer',
            'priority' => 1,
        ));

        $wp_customize->add_setting('blacksea_you_tube_footer', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_you_tube_footer', array(
            'label' => __('Линк для you tube', 'blacksea'),
            'section' => 'blacksea_footer_section',
            'settings' => 'blacksea_you_tube_footer',
            'priority' => 1,
        ));

        $wp_customize->add_setting('blacksea_google_footer', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_google_footer', array(
            'label' => __('Линк для google+', 'blacksea'),
            'section' => 'blacksea_footer_section',
            'settings' => 'blacksea_google_footer',
            'priority' => 1,
        ));

        $wp_customize->add_setting('blacksea_vk_footer', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_vk_footer', array(
            'label' => __('Линк для vk', 'blacksea'),
            'section' => 'blacksea_footer_section',
            'settings' => 'blacksea_vk_footer',
            'priority' => 1,
        ));

        $wp_customize->add_setting('blacksea_instagram_footer', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_instagram_footer', array(
            'label' => __('Линк для instagram', 'blacksea'),
            'section' => 'blacksea_footer_section',
            'settings' => 'blacksea_instagram_footer',
            'priority' => 1,
        ));

// FOR MOBILE THEME CUSTOM

        $wp_customize->add_panel('panel_general_mobile', array(
            'priority' => 40,
            'capability' => 'edit_theme_options',
            'theme_support' => '',
            'title' => __('Настройки мобильной версии', 'blacksea'),
        ));

        $wp_customize->add_section('blacksea_mobile_custom', array(
            'title' => __('Настройки верхней части', 'blacksea'),
            'priority' => 1,
            'panel' => 'panel_general_mobile',
        ));


        /* LOGO	*/
        $wp_customize->add_setting('blacksea_mobile_logo', array('sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'themeslug_logo', array(
            'label' => __('Logo', 'blacksea'),
            'section' => 'blacksea_mobile_custom',
            'settings' => 'blacksea_mobile_logo',
            'priority' => 1,
        )));
        /* SOCIALS ICONS */
        $wp_customize->add_setting('blacksea_mobile_facebook', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_mobile_facebook', array(
            'label' => __('Линк для facebook', 'blacksea'),
            'section' => 'blacksea_mobile_custom',
            'settings' => 'blacksea_mobile_facebook',
            'priority' => 2,
        ));

        $wp_customize->add_setting('blacksea_mobile_twitter', array('sanitilize_callback' => 'esc_url_raw'));
        $wp_customize->add_control('blacksea_mobile_twitter', array(
            'label' => __('Линк для twitter', 'blacksea'),
            'section' => 'blacksea_mobile_custom',
            'settings' => 'blacksea_mobile_twitter',
            'priority' => 3,
        ));




    }
    add_action('customize_register', 'blacksea_register_theme_customizer');

endif;

function remove_img_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    return $html;
}


function wp_corenavi() {
    global $wp_query;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a = array(
        'base'      => str_replace(999999999, '%#%', get_pagenum_link(999999999)),
        'total'     => $max,
        'current'   => $current,
        'format'    => '',
        'mid_size'  => 3, //сколько ссылок показывать слева и справа от текущей
        'end_size'  => 1, //сколько ссылок показывать в начале и в конце
        'prev_text'  => '«', //текст ссылки "Предыдущая страница"
        'next_text'  => '»', //текст ссылки "Следующая страница"
    );
    $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить

    if ($max > 1) echo '<div class="pagination">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница </span>'."\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';
}



/************************************************************************************************

/**
 * Определим константу, которая будет хранить путь к папке single
 */
define( SINGLE_PATH, TEMPLATEPATH . '/single' );

/**
 * Добавим фильтр, который будет запускать функцию подбора шаблонов
 */
add_filter( 'single_template', 'my_single_template' );

/**
 * Функция для подбора шаблона
 */
function my_single_template( $single ) {
    global $wp_query, $post;

    /**
     * Проверяем наличие шаблонов по ID поста.
     * Формат имени файла: single-ID.php
     */
    if ( file_exists( SINGLE_PATH . '/single-' . $post->ID . '.php' ) ) {
        return SINGLE_PATH . '/single-' . $post->ID . '.php';
    }

    /**
     * Проверяем наличие шаблонов для категорий, ищем по ID категории или слагу
     * Формат имени файла: single-cat-SLUG.php или single-cat-ID.php
     */
    foreach ( (array) get_the_category() as $cat ) :

        if ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->slug . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
        } elseif ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
        }

    endforeach;

    /**
     * Проверяем наличие шаблонов для тэгов, ищем по ID тэга или слагу
     * Формат имени файла: single-tag-SLUG.php или single-tag-ID.php
     */
    $wp_query->in_the_loop = true;
    foreach ( (array) get_the_tags() as $tag ) :

        if ( file_exists( SINGLE_PATH . '/single-tag-' . $tag->slug . '.php' ) ) {
            return SINGLE_PATH . '/single-tag-' . $tag->slug . '.php';
        } elseif ( file_exists( SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php' ) ) {
            return SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php';
        }

    endforeach;
    $wp_query->in_the_loop = false;

    /**
     * Если ничего не найдено открываем стандартный single.php
     */
    if ( file_exists( SINGLE_PATH . '/single.php' ) ) {
        return SINGLE_PATH . '/single.php';
    }

    return $single;
}

function the_single_breadcrump( ){
    $rrr = get_the_category( get_the_ID() );
    $catID = $rrr[0]->term_taxonomy_id;
    return get_category_link($catID);
}

function the_breadcrump(){
    $rrr = get_ancestors( get_the_ID() , 'page' );
    $home = 'Главная';
    if($lang == 'ru') $home = 'Главная';
    if( !is_front_page() ){
        echo '<ol class="breadcrumb">';
        echo '<li><a href="';
        echo get_option('home');
        echo '">'.$home;
        echo '</a></li>';
        $parent_title = get_the_title($rrr[0]);
        if( $rrr[0] ){
            echo '<li><a href="' . get_permalink($rrr[0]) .
                '" title="' . $parent_title . '">' . $parent_title . '</a> </li> ';
        }

        if(is_category() || is_single() ){
            echo '<li>';
            the_category(' ');
            echo '</li>';
            if(is_single() ){
                echo '<li class="active">';
                the_title();
                echo '</li>';
            }

        } elseif( is_page()){
            echo '<li class="active">';
            the_title();
            echo '</li>';
        }
        echo '</ol>';
    }

}

function custom_pagination($paged, $count_post = ''){
    global $wp_query;

    $term = get_queried_object();
if(empty($count_post)){
    $count_post = $term->count;
}

    $view_page = 5;

    $pages = '';
    $chislo = $count_post / $view_page;

    $max = ceil( $chislo );

//    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a = array(
        'base'      => '?page=%#%',
        'total'     => $max,
        'current'   => $paged,
        'format'    => '',
        'mid_size'  => 3, //сколько ссылок показывать слева и справа от текущей
        'end_size'  => 1, //сколько ссылок показывать в начале и в конце
        'prev_text'  => '«', //текст ссылки "Предыдущая страница"
        'next_text'  => '»', //текст ссылки "Следующая страница"
    );
    $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить

    if ($max > 1) echo '<div class="pagination">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница </span>'."\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';

}


// прикрепляем js файл, который будет инициировать ajax запрос
wp_enqueue_script( 'my-ajax-request', get_template_directory_uri() . '/js/ajax.js', array( 'jquery' ) );
// указываем ссылку на файл, который будет обрабатывать AJAX запрос (wp-admin/admin-ajax.php)
//wp_localize_script( 'my-ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
wp_localize_script( 'my-ajax-request', 'MyAjax', array( 'ajaxurl' =>  get_stylesheet_directory_uri().'/scriptsphp/ajax-action.php?' ) );

if(isset($_REQUEST['action']) ) {
    do_action( 'wp_ajax_nopriv_' . $_REQUEST['action'] );
};

//для неавторизованных пользователей
add_action( 'wp_ajax_nopriv_test', 'my_ajax_guest');
//для авторизованных пользователей
add_action( 'wp_ajax_test', 'my_ajax_guest');

function my_ajax_guest() {
    print_r( $_POST );

    wp_die();
}


function my_custom_post_face()
{
    $labels = array(
        'name' => _x('Все ведущие', 'post type general name'),
        'singular_name' => _x('Ведущие', 'post type singular name'),
        'add_new' => _x('Добавить ведущего', 'anonce_post'),
        'add_new_item' => __('Добавить нового ведущего'),
        'edit_item' => __('Редактировать ведущего'),
        'new_item' => __('Новый ведущий'),
        'all_items' => __('Все ведущие'),
        'view_item' => __('Просмотр ведущих'),
        'search_items' => __('Поиск ведущих'),
        'not_found' => __('Содержимое не найдено'),
        'not_found_in_trash' => __('Содержимое не найденно в Корзине'),
        'parent_item_colon' => '',
        'menu_name' => 'Ведущие'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our face ',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail', 'editor', 'face'),
        'has_archive' => true,
    );
    register_post_type('face', $args);
}

add_action('init', 'my_custom_post_face');





?>
