<?php
/**
 * Template Name: Concierge Services
 *
 * @package WordPress
 * @subpackage WWD BlankSlate
 * @since WWD BlankSlate 1.0
 */
?>
<?php get_header();

    if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
	<div class="row concierge-post-item">
		<div class="col-xs-12 page-content-container">
			<div class="col-xs-12 col-md-8 col-md-offset-2 text-container">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
<?php
    endwhile; endif;
    wp_reset_query();

?>

<?php query_posts('post_type=layout&category_name=concierge-layout&orderby=menu_order&order=ASC');
    
    if ( have_posts() ) : while ( have_posts() ) : the_post();

        if ( has_post_thumbnail( $post->ID ) ) {

            if ( has_post_thumbnail( $post->ID ) ):
                $content_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            endif;

            if ( in_category('feature-image-background') ) {
?>

    <div class="row concierge-post-item">
        <div class="cover-background-image about-post-hero-container" style="background-image: url('<?php echo $content_image[0]; ?>')">
            <div class="container">
<?php
				if ( trim(str_replace('&nbsp;','',strip_tags($post->post_content))) != '' ) {
?>
                <div class="text-container col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
	                <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
					<a class="btn btn-primary pull-right" href="#concierge-form">Find out more</a>
                </div>
<?php	       } ?>
            </div>
       </div>
<?php
    			if ( has_excerpt( $post->ID ) ) {
?>
        <div class="col-xs-12 hero-excerpt">
            <div class="col-xs-12 col-md-8 col-md-offset-2 hero-excerpt-text">
				<h2><?php the_title(); ?></h2>
                <?php the_excerpt(); ?>
				<a class="btn btn-primary pull-right" href="#concierge-form">Find out more</a>
            </div>
        </div>
<?php  			}	?>
    </div>

<?php
            } elseif ( in_category('feature-image-left') ) {
?>

    <div class="row about-post-left-container concierge-post-item">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="hidden-xs col-sm-4">
                <img src="<?php echo $content_image[0]; ?>" />
            </div>
            <div class="col-xs-12 col-sm-8 text-container">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
				<a class="btn btn-primary pull-right" href="#concierge-form">Find out more</a>
            </div>
        </div>
    </div>

<?php
            } elseif ( in_category('feature-image-right') ) {
?>

    <div class="row about-post-right-container concierge-post-item">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="col-xs-12 col-sm-8 text-container">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
				<a class="btn btn-primary pull-right" href="#concierge-form">Find out more</a>
            </div>
            <div class="hidden-xs col-sm-4">
                <img src="<?php echo $content_image[0]; ?>" />
            </div>
        </div>
    </div>

<?php
            }

        } else {
?>

    <div class="row about-post-container concierge-post-item">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="text-container">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
				<a class="btn btn-primary pull-right" href="#concierge-form">Find out more</a>
            </div>
        </div>
    </div>

<?php
        }
    endwhile; endif;
    wp_reset_query();
?>

<hr />

<div id="concierge-form" class="col-xs-12 col-md-6 col-md-offset-3">
	<h2>Find out more information about our concierge services</h2>
	<?php echo do_shortcode( '[contact-form-7 id="1326" html_class="form-horizontal concierge-form" title="Concierge Contact Us"]' ); ?>
</div>

<?php get_footer(); ?>
