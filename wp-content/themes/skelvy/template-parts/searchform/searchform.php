<?php $unique_id = esc_attr(uniqid('search-form-')); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <div class="input-group">
    <input type="search"
           class="form-control"
           id="<?php echo $unique_id; ?>"
           placeholder="<?php esc_attr_e('Search...', 'skelvy'); ?>"
           value="<?php echo get_search_query(); ?>"
           name="s" />
    <div class="input-group-append">
      <button type="submit" class="btn btn-outline-light">
        <i class="fas fa-search px-2 mr-1"></i>
      </button>
    </div>
  </div>
</form>
