<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url(home_url('/')); ?>">
  <label class="sr-only"><?php _e('Search for:', 'aboutblank'); ?></label>
  <div class="input-group">
    <input type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search', 'aboutblank'); ?>" required>
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default"><span class="fa fa-search"></span></button>
    </span>
  </div>
</form>
