<?php include 'theme-variables.php'; ?>
<?php get_header(); ?>
	<main>
		<div class="wrapper">
		<?php $key = 'project-slider'; ?>
		
		<?php $themeta = get_post_meta($post->ID, $key, true); ?>
		
		<?php //echo do_shortcode($themeta); ?>
		<div class="float-divider"></div>
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			
			
			
			
				<?php the_content(); ?>
			<?php endwhile; ?>
			<?php else : ?>
		<?php endif; ?>
		
		</div>
	</main>
<?php get_footer(); ?>

