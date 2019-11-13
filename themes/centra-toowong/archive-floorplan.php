<?php get_header();

	if (have_posts()):
?>
    <div class="col-xs-12 page-floor-plan-container">
		<div class="col-xs-12 col-sm-12 col-lg-8 col-lg-offset-2 content-container text-center">
<?php
		$firstItem = true;
		while (have_posts() ) : the_post();
			$floor = get_field("floor");
			$floor_plan = get_field("floor_plan");
			if ( has_post_thumbnail( $post->ID ) ):
				$content_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			endif;
?>
		<a href="/floorplanapartment">
			<section class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 floor-plan-container<?php echo ($firstItem ? " active" : "") ?>">
				<header class="text-center">
					<h3><?php the_title(); ?><small>(Click the floor plan for a closer look)</small></h3>
				</header>
				<span class="cbd-precinct-text">Brisbane CBD</span>
				<div class="floor-plan-image">
					<img class="compass" src="<?php echo get_stylesheet_directory_uri() ?>/images/compass.png" />
					<img class="floorplan-image" src='<?php echo $floor_plan; ?>' />
				</div>
				<span class="shopping-precinct-text">Toowong Village</span>
			</section>
		</a>
<?php
			$firstItem = false;
		endwhile; 
?>
		</div>
	</div>

	<div class="col-xs-12 centra-location-map cover-background-image" style="height: 80vh; margin-top: 5vh; background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/centra-location-map.jpg')"></div>
	<script type="text/javascript">
		$(function(){

		});
	</script>
<?php
	endif;
    wp_reset_query();

	get_footer(); 
?>
