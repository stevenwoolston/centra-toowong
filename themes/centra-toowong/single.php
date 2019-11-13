<?php get_header(); ?>

<?php
    if ( in_category( 'apartment' ) ) {
        get_template_part( "template-parts/loop-singleapartment");
    }
    else {
        get_template_part( "template-parts/loop-singlepost");

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    }
?>

<?php get_footer(); ?>
