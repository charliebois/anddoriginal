<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

// if thre is a thumbnail or product gallery images set display them in the product slider
if ( $attachment_ids || has_post_thumbnail() ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	?>
	<div class="cycle-slideshow" data-paused="true">
		<div class="cycle-prev"></div>
   		<div class="cycle-next"></div>
		<?php
			// shows main product image
			if (has_post_thumbnail()) {
		     	$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
			  	$image_link    = wp_get_attachment_url( get_post_thumbnail_id() );
			  	$image         = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
			  		'title'	=> get_the_title( get_post_thumbnail_id() )
			  	) );

			  	$attachment_count = count( $product->get_gallery_attachment_ids() );

			  	if ( $attachment_count > 0 ) {
			  		$gallery = '[product-gallery]';
			  	} else {
			  		$gallery = '';
			  	}

			  	echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', $image_link, $image_caption, $image, $post->ID) );
		     }

		     // shows product gallery images
			foreach( $attachment_ids as $attachment_id ) 
			{
				$image_link = wp_get_attachment_url( $attachment_id );
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', $image_link, $image_caption, $image, $post->ID) );
			}
		?>

	</div>
	<?php
}
