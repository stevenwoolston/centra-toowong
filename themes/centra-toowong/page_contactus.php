<?php
/**
 * Template Name: With Google Map
 *
 * @package WordPress
 * @subpackage WWD BlankSlate
 * @since WWD BlankSlate 1.0
 */
?>
<?php get_header(); ?>

<div class="col-xs-12 google-map"></div>

<div class="content-container col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">

    <section>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

        <?php the_content(); ?>

        <?php endwhile; endif; ?>

    </section>
</div>

<?php get_footer(); ?>