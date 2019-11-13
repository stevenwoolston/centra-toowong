<?php

    if ( have_posts() ) : while ( have_posts() ) : the_post();
        $repeater = get_field("images");
        $image = $repeater[0]["image"]["url"];
        $is_available = get_field("is_available");
        $available_on = get_field("available_on");
        $available_date = empty(get_field("available_on")) ? date("d/m/Y") : get_field("available_on");
        $parts = explode("/", $available_date, 3);
        $uk_date = $parts[2] . "-" . $parts[1] . "-" . $parts[0];
?>

<section class="apartment col-xs-12 col-md-8 col-md-offset-2">
    <article class="apartment clearfix">
        <header class="apartment-header">
            <div class="col-xs-12 col-sm-6">
                Unit <b><?php the_title(); ?></b>
            </div>
            <div class="col-xs-12 col-md-6 text-right">
                <a href="http://www.1form.com.au" class="btn">
                    <span class="glyphicon glyphicon-heart"></span>
                    Apply Online
                </a>

                <a href='<?php the_field("booking_inspection_link") ?>' class="btn">
                    <span class="glyphicon glyphicon-search"></span>
                    Book Inspection
                </a>
            </div>
        </header>
        <div class="apartment-body">
            <div class="clearfix apartment-specification-container">
                <div class="apartment-specification">
                    <div class="title">Available</div>
                  <p>
                    <?php echo strtotime($uk_date) > strtotime(date("d-m-Y")) ? $available_on : 'Now' ?>
                  </p>
                </div>
                <div class="apartment-specification">
                    <div class="title">Bed</div>
                    <p><?php the_field("total_bedrooms") ?></p>
                </div>
                <div class="apartment-specification">
                    <div class="title">Bath</div>
                    <p><?php the_field("total_bathrooms") ?></p>
                </div>
                <div class="apartment-specification">
                    <div class="title">Furnished?</div>
                    <p><?php echo (get_field("furnished") == 1 ? 'Yes' : 'No') ?></p>
                </div>
                <div class="apartment-specification">
                    <div class="title">Price</div>
                    <p>$<?php the_field("price") ?> pw</p>
                </div>
            </div>

            <div class="col-xs-12 apartment-attributes">
                <ul>
                    <li>Balcony space: <span><?php the_field("balcony_space") ?>m<sup>2</sup></span></li>
                    <li>Floor space: <span><?php the_field("floor_space") ?>m<sup>2</sup></span></li>
                    <li>Pets? <span><?php the_field("pets_allowed") ?></span></li>
                </ul>
            </div>
            <div class="col-xs-12 apartment-description">
                <?php the_field("description") ?>
            </div>

            <div class="col-xs-12 apartment-image-carousel">
                <?php if( have_rows('images') ): ?>

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                            $isIndicatorActive = "active";
                            $count = 0;
                            while( have_rows('images') ): the_row();
                        ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $count ?>" class="<?php echo $isIndicatorActive ?>"></li>

                        <?php 
                            $count++;
                            $isIndicatorActive = "";
                            endwhile;
                        ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $isActive = "active";
                        while( have_rows('images') ): the_row();
                            $image = get_sub_field('image');
                            $content = get_sub_field('title');
                        ?>
                        <div class="item <?php echo $isActive ?>">
                            <a href="<?php echo $image['url']; ?>" target="_blank">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>">
                            </a>
                            <div class="carousel-caption">
                                <?php echo $content; ?>
                            </div>
                        </div>
                        <?php 
                            $isActive = "";
                            endwhile; 
                        ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <?php endif; ?>
            </div>
        </div>
        <footer class="apartment-footer clearfix"></footer>
    </article>
</section>

    <?php endwhile; endif; ?>