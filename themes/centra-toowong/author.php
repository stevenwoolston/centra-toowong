<?php get_header(); ?>

<div class="content-container col-xs-12 col-sm-10 col-sm-offset-1">

    <h1 class="entry-title author"><?php _e( 'Author Archives', 'blankslate' ); ?>: <?php the_author_link(); ?></h1>
    <?php if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
    <?php rewind_posts(); ?>

    <div class="col-xs-12 col-sm-8 col-md-9 boxed-content content-box-container">
        <?php get_template_part( "template-parts/loop-excerpt"); ?>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-3 sidebar-container">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>