<?php get_header(); ?>

		<div id="inside-page">

				<h1 class="entry-title"><?php printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

						get_template_part( 'loop', 'category' );
				?>

		</div><!-- #inside-page -->

<?php get_footer(); ?>
