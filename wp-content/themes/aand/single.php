<?php get_header(); ?>

<div id="inside-page">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>
			
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-## -->
	
	<?php endwhile; ?>

</div><!-- #inside-page -->

<?php get_footer(); ?>

