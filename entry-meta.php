<span class="entry-date">
    <?php _e('Published') ?>
    <time class="published updated" pubdate datetime="<?php echo date( "Y-m-d", get_the_date( 'U' ) ) ?>">
	<?php echo relative_time( get_the_date( 'U' ) ); ?>
    </time>
</span>
