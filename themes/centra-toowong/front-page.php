<?php
    $bedrooms = !empty( $_GET['bedrooms'] ) ? $_GET['bedrooms'] : '';
    $search_furnished = !empty( $_GET['furnished'] ) ? $_GET['furnished'] : '';
    $sortprice = !empty( $_GET['sortprice'] ) ? $_GET['sortprice'] : '';

    $meta_query = [];

    $meta_query[] = array( 
        'relation'  => 'AND',
        'key'       => 'is_available', 
        'value'     => '1' 
    );

    if ( $bedrooms != '' ) {
        $meta_query[] = array( 
            'relation'  => 'AND',
            'key' => 'total_bedrooms', 
            'value' => $bedrooms 
        );
    }

    if ( $search_furnished != '' ) {
        $meta_query[] = array( 
            'relation'  => 'AND',
            'key'       => 'furnished', 
            'value'     => $_GET['furnished'] == 'true' ? '1' : '0',
            'compare'   => '=='
        );
    }

    $args = array(
        'numberposts'	=> -1,
        'post_type'		=> 'apartment',
        'meta_query'	=> $meta_query,
        'meta_key'    => 'available_on',
        'orderby'       => 'meta_value',
        'order'         => ($sortprice == '' ? 'ASC' : 'ASC')            
    );

    $the_query = new WP_Query( $args );
    $total_records = $the_query->post_count;
    $emptySearchResultsMessage = "There were no results for your search";
    $isInternalReferrer = (preg_match('/\.centratoowong\.(com|org)/', $_SERVER['HTTP_REFERER']));
    if ($total_records == 0) {
        if (!$isInternalReferrer) {
            header("Location: /about-centra/");
            die();
        } else {
            $emptySearchResultsMessage = "<p>We are completely full at the moment.</p><p style='margin-top: 2em;'><a href='/contact/'>Click here to contact us.</a></p>";
        }
    }
?>
<?php 
    get_header(); 
?>

<div class="hero-video cover-background-image parallax">
    <div class="col-xs-12 search-results-roll">

        <?php if( $the_query->have_posts() ): ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
            $repeater = get_field("images");
            $image = $repeater[0]["image"]["url"];
            $is_available = get_field("is_available");
            $furnished = get_field("furnished");
            $available_on = get_field("available_on");
            $available_date = empty(get_field("available_on")) ? date("d/m/Y") : get_field("available_on");
            $parts = explode("/", $available_date, 3);
            $uk_date = $parts[2] . "-" . $parts[1] . "-" . $parts[0];
        ?>
        <section class="apartment col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <article class="apartment clearfix">
                <header class="apartment-header">
                    <a href="<?php the_permalink(); ?>">
                        <div class="col-xs-6">
                            Unit <b><?php the_title(); ?></b>
                        </div>
                        <div class="col-xs-6 text-right">
                            <small>Details &raquo;</small>
                        </div>
                    </a>
                </header>
                <div class="apartment-body">
                    <div class="clearfix apartment-specification-container">
                        <div>
                            <div class="apartment-specification">
                                <div class="title">Available</div>
                                <p><?php echo strtotime($uk_date) > strtotime(date("d-m-Y")) ? $available_on : 'Now' ?></p>
                            </div>
                            <div class="apartment-specification">
                                <div class="title">Price</div>
                                <p>$<?php the_field("price") ?> pw</p>
                            </div>
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
                            <p><?php echo (get_field("furnished") ? 'Yes' : 'No') ?></p>
                        </div>
                    </div>
                </div>
                <div class="apartment-image col-xs-12">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $image; ?>" style="width: 200px; height: 200px;" />
                    </a>
                </div>
                <footer class="apartment-footer clearfix">
                    <a href="http://www.1form.com.au" class="btn">
                        <span class="glyphicon glyphicon-heart"></span>
                        Apply Online
                    </a>

                    <a href='<?php the_field("booking_inspection_link") ?>' class="btn">
                        <span class="glyphicon glyphicon-search"></span>
                        Book Inspection
                    </a>
                </footer>
            </article>
        </section>
        <?php
            endwhile;
			else :
		?>
			<center><h2 style="color: #fff">Sorry.....</h2></center>
			<center><h4 style="color: #fff"><?php echo $emptySearchResultsMessage; ?></h4></center>
        <?php
            endif;
            wp_reset_query();
        ?>
    </div>

    <div class="hidden col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 home-coming-soon">
      <center>
        <h2>Coming Soon</h2>
      </center>
      <p style="text-align: center">
        We are working hard to bring you new and updated information about our apartments.
      </p>
      <p style="text-align: center">
        Come back regularly to check for updates.
      </p>
    </div>

</div>
<?php get_footer(); ?>

<style>
  .home-coming-soon {
    margin-top: 50px;
    background-color: #d9edf7;
    padding: 50px 0;
  }

</style>