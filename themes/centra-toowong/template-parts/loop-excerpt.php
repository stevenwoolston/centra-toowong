<section class="col-xs-12 content-box">
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
    ?>

    <article class="col-xs-12">
        <h2><a title='View This Article' href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
        <div class="col-xs-12">
            <?php the_excerpt(); ?>
        </div>
    </article>

    <div class="col-xs-10 col-xs-offset-1">
        <hr />
    </div>
    <?php
        endwhile; endif;
        wp_reset_query();
    ?>

</section>
