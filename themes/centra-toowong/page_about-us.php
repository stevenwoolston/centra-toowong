<?php
/**
 * Template Name: About Us
 *
 * @package WordPress
 * @subpackage WWD BlankSlate
 * @since WWD BlankSlate 1.0
 */
?>
<?php get_header(); ?>

<?php query_posts('category_name=about-layout&order=DESC');
    
    if ( have_posts() ) : while ( have_posts() ) : the_post();

        if ( has_post_thumbnail( $post->ID ) ) {

            if ( has_post_thumbnail( $post->ID ) ):
                $content_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            endif;

            if ( in_category('feature-image-background') ) {
?>

    <div class="row aboutus-post-item">
        <div class="cover-background-image about-post-hero-container" style="background-image: url('<?php echo $content_image[0]; ?>')">
            <div class="container">
<?php
            if ( trim(str_replace('&nbsp;','',strip_tags($post->post_content))) != '' ) {
?>
                <div class="text-container col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <?php the_content(); ?>
                </div>
<?php       } ?>
            </div>
       </div>
<?php
    if ( has_excerpt( $post->ID ) ) {
?>
        <div class="col-xs-12 hero-excerpt">
            <div class="col-xs-12 col-md-8 col-md-offset-2 hero-excerpt-text">
                <?php the_excerpt(); ?>
            </div>
        </div>
<?php
    }
    ?>
    </div>

<?php
            } elseif ( in_category('feature-image-left') ) {
?>

    <div class="row about-post-left-container aboutus-post-item">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="hidden-xs col-sm-4">
                <img src="<?php echo $content_image[0]; ?>" />
            </div>
            <div class="col-xs-12 col-sm-8 text-container">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
    </div>

<?php
            } elseif ( in_category('feature-image-right') ) {
?>

    <div class="row about-post-right-container aboutus-post-item">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="col-xs-12 col-sm-8 text-container">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
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

    <div class="row about-post-container aboutus-post-item">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <div class="text-container">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
    </div>

<?php
        }

    endwhile; endif;
    wp_reset_query();

?>

<?php get_footer(); ?>
