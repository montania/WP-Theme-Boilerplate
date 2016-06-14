<?php if (!defined('ABSPATH')) die();

if (have_posts()) : while (have_posts()) : the_post() ?>

    <article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header>


            <?php if (!is_single() && !is_page()) : ?>
                <h2>
                    <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
            <?php else : ?>
                <h1 class="entry-title">
                    <?php the_title() ?>
                </h1>
            <?php endif; ?>


            <?php if (is_single() || is_home()) : ?>
                <div class="entry-meta">
                    <?php get_template_part('entry', 'meta'); ?>
                </div>
            <?php endif; ?>

        </header>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>

    </article>

<?php endwhile; endif; ?>