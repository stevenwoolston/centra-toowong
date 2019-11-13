<?php
/**
 * Template Name: Blog
 *
 * @package WordPress
 * @subpackage WWD BlankSlate
 * @since WWD BlankSlate 1.0
 */
?>
<?php get_header(); ?>

<div class="content-container col-xs-12 col-sm-10 col-sm-offset-1 blogroll">

    <div class="col-xs-12 col-sm-8 col-md-9 content-box-container">
        <?php query_posts('category_name=news&order=DESC'); ?>
        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();

            if ( has_post_thumbnail( $post->ID ) ) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                $content_image = $image[0];
            } else {
                $content_image = get_stylesheet_directory_uri() . "/images/logo.png";
            }

            $tags = wp_get_post_tags( $post->ID );
        ?>
        <section class="col-xs-12 content-box">
            <div class='col-xs-12 col-md-4 cover-background-image' style='background-image: url(<?php echo $content_image ?>)'></div>
            <article class="col-xs-12 col-md-8">
                <div class="col-xs-12">
                    <h2><a title='View This Article' href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
                </div>
                <div class="col-xs-12">
                    <?php the_excerpt(); ?>
                    <div class="article-meta"><?php get_template_part( 'entry', 'meta' ); ?></div>
                </div>
            </article>
        </section>
        <?php
        endwhile; endif;
        wp_reset_query();
        ?>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-3 sidebar-container">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
