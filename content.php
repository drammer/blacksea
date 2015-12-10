
<?php
if ( is_single() ) :
    the_title( '<h1 class="news title-cat-header">', '</h1>' );
else :
    the_title( sprintf( '<h1 class="news title-cat-header">', esc_url( get_permalink() ) ), '</h1>' );
endif;
?>

<!-- .archive-header -->

<?php /* The loop */ ?>
<section class="news-content category-content all-project-body">
    <div class="entry-content">
        <?php the_content();?>
    </div>
</section>
