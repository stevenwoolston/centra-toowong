<form action="/" method="get">
    <div class="input-group">
      <input type="text" name="s" id="search" class="form-control" placeholder="Search" value="<?php the_search_query(); ?>">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></button>
      </span>
    </div><!-- /input-group -->
</form>