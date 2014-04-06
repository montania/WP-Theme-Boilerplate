<?php get_header(); ?>

<main role="main">
    <?php get_template_part( 'loop' ) ?>
</main>

<aside role="complementary">
    <?php dynamic_sidebar( 'sidebar' ) ?>
</aside>

<?php get_footer(); ?>
