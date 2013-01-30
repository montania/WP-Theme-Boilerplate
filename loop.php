<?php if ( have_posts() ) : while ( have_posts() ) : the_post() ?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1 class="entry-title">

			<?php if ( ! is_single() && ! is_page() ) : ?>
            <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>

			<?php else : ?>
			<?php the_title() ?>

			<?php endif; ?>
        </h1>

		<?php if ( is_single() || is_home() ) : ?>
        <div class="entry-meta">
			<?php get_template_part( 'entry', 'meta' ); ?>
        </div>
		<?php endif; ?>

    </header>
    <div class="entry-content">
		<?php the_content(); ?>
    </div>

</article>

<?php endwhile; endif; ?>