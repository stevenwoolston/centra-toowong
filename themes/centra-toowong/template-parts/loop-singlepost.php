<section class="col-xs-12 content-box">
    <?php
    //  disable "system" categories
    global $query_string;
    //query_posts($query_string . '&cat=-2');

    if ( have_posts() ) : while ( have_posts() ) : the_post();
    ?>

    <article class="col-xs-12">
        <h2><?php the_title(); ?></h2>
        <div class="col-xs-12">
            <?php the_content(); ?>
        </div>

    </article>

    <?php endwhile; endif; ?>

</section>
