<div class="col-xs-12 carousel-container">
    <div id="col-xs-12 index-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="hover" data-interval="<?php echo get_option( 'carousel_speed' ) ?>000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner home-hero <?php echo get_option( 'carousel_transition' ) ?>" role="listbox">
            <?php
            $c = 0;
            $class = '';
            if ( have_posts() ) : while ( have_posts() ) : the_post();

            if ( has_post_thumbnail( $post->ID ) ):
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            endif;

            $c++;
            if ($c == 1 ) $class .= " active";
            ?>
            <div class='col-xs-12 item cover-background-image <?php echo $class ?>' style='background-image: url(<?php echo $image[0]; ?>)'>
                <div class="col-xs-12 carousel-caption">
                    <a href='<?php the_permalink(); ?>'>
                        <?php the_excerpt(); ?>
                    </a>
                </div>
            </div>
            <?php
            $class = '';
            endwhile; endif;
            ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#index-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#index-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
