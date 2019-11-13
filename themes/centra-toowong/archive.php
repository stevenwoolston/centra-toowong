<?php get_header(); ?>
<div class="content-container news-container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-9 archive-page-container">
                <?php 
                $c = 0;
                $class = '';
                $image = array();
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        if ( has_post_thumbnail( $post->ID ) ):
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                            $tags = wp_get_post_tags( $post->ID );
                        endif;
                        $c++;
                        if (count($image) == 0){
                            $media = wp_get_attachment_url(6);
                            array_push($image, $media);
                        }

                        if ($c ==1 ) $class .= " active";
                ?>
                <div class="col-xs-12 article-container">
                    <div class='col-xs-4 cover-background-image' style='background-image: url(<?php echo $image[0]; ?>)'>
                        <div class="blog-image-caption">
                            <?php exclude_post_categories("", "   |   ") ?>
                        </div>
                    </div>
                    <div class='col-xs-8'>
                       <div class="col-xs-12">
                           <h3><a title='View This Article' href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h3>
                       </div>
                       <div class="col-xs-12">
                            <?php echo content(50); ?>
                           <div class="article-meta"><?php get_template_part( 'entry', 'meta' ); ?></div>
                        </div>
                    </div>                
                </div>
                <?php
                        $class = '';
                    endwhile; endif; 
                    wp_reset_query();
                ?>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-3 sidebar-container">
            <?php get_sidebar(); ?>
            </div>
        </div>
    </div>    
</div>
<div class="container-fluid">
<?php get_footer(); ?>
</div>