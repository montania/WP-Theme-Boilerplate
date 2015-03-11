<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s"><?php _e( 'Search:' ) ?></label>
        <input type="text" value="<?php echo esc_attr(get_search_query()) ?>" placeholder="<?php _e( 'Search' ); ?>" name="s" id="s">
        <input type="submit" id="searchsubmit" value="">
    </div>
</form>
