<?php get_header(); ?>

<div class="content-container col-xs-12 col-sm-10 col-sm-offset-1">

    <div class="col-xs-12 col-sm-8 col-md-9 boxed-content content-box-container">
        <section class="col-xs-12 content-box">
            <h1><?php _e( 'Not Found', 'blankslate' ); ?></h1>
            <p><?php _e( 'Ooops. It looks like you have arrived at a page that does not exist any more. Click the logo above and try again.', 'blankslate' ); ?></p>
        </section>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-3 sidebar-container">
        <?php get_sidebar(); ?>
    </div>

</div>
<?php get_footer(); ?>