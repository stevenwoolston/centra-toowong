
<?php

    while ( have_posts() ) : the_post();

    if ( has_post_thumbnail( $post->ID ) ):
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
    endif;
?>

<div class="col-xs-12 home-hero full-height cover-background-image" style="background-image: url('<?php echo $image[0]; ?>')">
    <div class="col-xs-12 col-sm-8 col-lg-5 col-lg-offset-1 home-hero-text centre-text">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</div>

<?php
    endwhile;
?>
