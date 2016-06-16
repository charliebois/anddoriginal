<?php get_header(); ?>

	<main>

		<div class="wrapper">

		

<div class="grid">

	<?php $loop = new WP_Query( array( 'post_type' => 'projects', 'posts_per_page' => -1 ) ); ?>

	<?php 

	$i = 0;

	while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>

	<?php if($i%2 == 0){ $class = 'odd'; } else { $class = 'even'; };  ?>
	
	<?php //echo $post->post_name; ?>
	
	<?php //if ($post->post_name == "aw-1516") { continue; }; ?>

	<figure class="effect-romeo <?php echo $class; ?> <?php echo $post->post_name;?>">
		<a href="<?php the_permalink(); ?>">
		<div class="image-wrap">
				<img src="<?php echo $feat_image; ?>" alt="img05"/>
		</div>

			<div class="project-title"><?php echo the_title(); ?></div>
		</a>
	</figure>

	<?php $i++; ?>			

	<?php endwhile; wp_reset_query(); ?>

</div>
		</div>

	</main>



<?php get_footer(); ?>

