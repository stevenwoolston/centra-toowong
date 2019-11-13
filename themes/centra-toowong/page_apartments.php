<?php
/**
 * Template Name: Apartment Listing
 *
 * @package WordPress
 * @subpackage WWD BlankSlate
 * @since WWD BlankSlate 1.0
 */
?>
<?php get_header(); ?>

<?php query_posts('category_name=apartment&order=DESC'); ?>

<div class="content-container col-xs-12 col-sm-10 col-sm-offset-1">

    <div class="col-xs-12 col-sm-10 col-sm-offset-1 boxed-content content-box-container">
        <?php get_template_part( "template-parts/loop-content"); ?>
    </div>

</div>

<?php get_footer(); ?>
