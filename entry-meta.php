<span class="entry-date">
    <?php _e('Published') ?>
    <time class="published updated" pubdate datetime="<?php echo date( "Y-m-d", get_the_date( 'U' ) ) ?>">
        <?php 	if(explode('_', get_locale())[0] === 'sv') {
			echo relative_time_sv( get_the_date( 'U' ) ); 
		} else {
			echo relative_time( get_the_date( 'U' ) ); 
		} ?>
    </time>
</span>