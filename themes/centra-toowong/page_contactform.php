<?php
/**
 * Template Name: Show Contact Form
 *
 * @package WordPress
 * @subpackage WWD BlankSlate
 * @since WWD BlankSlate 1.0
 */
?>
<?php get_header(); ?>

<div class="col-xs-12 col-md-6 col-md-offset-3">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php the_content(); ?>

  <?php endwhile; endif; ?>

  <?php echo do_shortcode( '[contact-form-7 id="6" html_class="form-horizontal" title="Contact form 1"]' ); ?>

</div>

<?php get_footer(); ?>
