<?php get_header(); ?>

<?php
	$floor = !empty( $_GET['f'] ) ? $_GET['f'] : '';
	$order = ($floor == '' ? 'DESC' : 'ASC');

	$floor_query = [];

	if ($floor != "") {

		$floor_query[] = array( 
			'relation'  => 'AND',
			'key'       => 'floor', 
			'value'     => $floor
		);
	}

	// $args = array(
	// 	'post_status'	=> 'publish',
	// 	'posts_per_page'	=> 50,
	// 	'post_type'		=> 'floorplan_apartment',
	// 	//'category_name' => 'floor-plan-apartment',
	// 	'meta_query'	=> $floor_query,
	// 	'meta_key'		=> 'apartment_number',
	// 	'orderby'       => 'meta_value',
	// 	'order'         => $order
	// );

	// //print_r ($args);
	// query_posts($args);

	if (have_posts()):
?>
    <div class="col-xs-12 page-floor-plan-container">
		<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 content-container">
			<header class="col-xs-12">
				<div class="col-xs-12 col-md-6">
					<h3 class='floor-plan-apartments'>Level <?php echo $floor ?> Apartments Listing</h3>
				</div>
				<div class="col-xs-12 col-md-6 text-right">
					<a href="/floorplan">Return To Floors</a>
				</div>
			</header>
<?php
		$firstItem = true;
		while (have_posts() ) : the_post();
			$floor = get_field("floor");
			$apartment_number = get_field("apartment_number");
			$floor_plan = get_field("floor_plan");

			if ( has_post_thumbnail( $post->ID ) ):
				$content_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			endif;
?>
			<div class="col-xs-4">
				<section class="clearfix floor-plan-apartment-container">
					<header class="text-center">
						<h3><?php echo "Apartment " . $apartment_number; ?></h3>
					</header>
					<div class="floor-plan-image">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo $floor_plan; ?>" />
						</a>
					</div>
					<div style="font-size: 0.8em; text-align: center">(Click the image for a closer look)</div>
				</section>
			</div>
<?php
			$firstItem = false;
		endwhile; 
?>
		</div>
	</div>

	<script type="text/javascript">
		$(function(){

		});
	</script>
<?php
	endif;
    wp_reset_query();

	get_footer(); 
?>
