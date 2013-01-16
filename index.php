<?php get_header(); ?>

<div role="main">
	<?php get_template_part( 'loop' ) ?>
</div>

<aside role="complementary">
	<?php dynamic_sidebar( 'sidebar' ) ?>
</aside>

<?php get_footer(); ?>