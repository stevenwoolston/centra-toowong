<?php get_header(); ?>

<div class="content-container col-xs-12 col-sm-10 col-sm-offset-1">

    <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></h1>
    <?php
    if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' );

    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $s = get_query_var('s');
    query_posts("s=$s&paged=$page");

    if ( have_posts() ) :
    ?>

    <div class="col-xs-12 col-sm-8 col-md-9 boxed-content content-box-container">
        <?php get_template_part( "template-parts/loop-excerpt"); ?>
    </div>

    <?php else : ?>

    <div class="col-xs-12 col-sm-8 col-md-9 boxed-content content-box-container">
        <section class="col-xs-12 content-box">
            <article class="col-xs-12">
                <h3 class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ); ?></h3>
                <div class="col-xs-12">
                    <p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
                </div>
            </article>
        </section>
    </div>

        <?php endif; ?>

        <div class="col-xs-12 col-sm-4 col-md-3 sidebar-container">
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>