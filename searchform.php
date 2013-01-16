<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s"><?php _e( 'Sök efter:' ) ?></label>
        <input type="text" value="<?php get_search_query() ?>" placeholder="Sök" name="s" id="s"/>
        <input type="submit" id="searchsubmit" value=""/>
    </div>
</form>
