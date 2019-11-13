<?php get_header(); ?>

<div class="content-container col-xs-12 col-sm-10 col-sm-offset-1">

    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 boxed-content content-box-container">
        <?php get_template_part( "template-parts/loop-content"); ?>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
        comments_template();
        endif;
        ?>

    </div>

    <div class="col-xs-12 col-sm-4 col-md-3 sidebar-container hidden">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
