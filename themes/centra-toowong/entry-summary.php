<div class="col-xs-12 article-container">
   <div class="col-xs-12">
       <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
       <div class="article-meta hidden"><?php get_template_part( 'entry', 'meta' ); ?></div>
       <hr />
    </div>
</div>