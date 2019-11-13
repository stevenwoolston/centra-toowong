<?php
/**
 * Template Name: All Media
 *
 * @package WordPress
 * @subpackage WWD BlankSlate
 * @since WWD BlankSlate 1.0
 */
?>
<?php get_header(); ?>

<?php

$query_images_args = array(
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'post_status'    => 'inherit',
    'posts_per_page' => - 1,
    'orderby'        => 'title',
    'order'          => 'ASC'
);

$query_images = new WP_Query( $query_images_args );

$images = array();
foreach ( $query_images->posts as $image ) {
    $url = wp_get_attachment_url( $image->ID );
    $title = apply_filters( 'the_title', $image->post_title );
?>
<div style="width: 200px; float: left; border: 1px solid #ccc; margin: 10px;">
    <a href='<?php echo $url; ?>' target="_blank">
        <img src='<?php echo $url; ?>' height="200px" width="198px" /><br />
        <div style="text-align: center; background-color: #ccc;"><?php echo $title; ?></div>
    </a>
</div>
<?php
}

?>
<?php get_footer(); ?>
