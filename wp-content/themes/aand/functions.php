<?php
/* 
Woocommerce
*/

add_filter( 'use_default_gallery_style', '__return_false' );

add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) { unset($tabs['reviews']); return $tabs; }
function wc_remove_related_products( $args ) { return array(); }
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10);
add_theme_support( 'woocommerce' );
add_filter('show_admin_bar', '__return_false');

/* 
This function Enques Scripts
*/

function html5_default_scripts() {
  wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'html5_default_scripts' );

/* 
This function add Custom Post Type: Events
*/
add_action( 'init', 'create_post_event' );
function create_post_event() {
	register_post_type( 'projects',
		array(
			'labels' => array(
				'name' => __( 'Projects' ),
				'singular_name' => __( 'Projects' ),
				
			),
		'rewrite' => array('slug'=>'projects','with_front' => false),	
		'public' => true,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'cats', 'excerpt'  ),
		'taxonomies' => array('category')
		)
	);
	flush_rewrite_rules( false );
};

/* 
This function add Custom Post Type: Slides
*/


add_action( 'init', 'create_post_slides' );
function create_post_slides() {
	register_post_type( 'slides',
		array(
			'labels' => array(
				'name' => __( 'Slides' ),
				'singular_name' => __( 'Slides' ),
				
			),
		'rewrite' => array('slug'=>'slides','with_front' => false),	
		'public' => true,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'cats', 'excerpt'  ),
		'taxonomies' => array('category')
		)
	);
	flush_rewrite_rules( false );
};

/* 
This function adds Custom Post Type to RSS
*/
function events_to_rss() {
    if(get_post_type() == 'projects' && $my_meta_value = get_post_meta(get_the_ID(), 'event_date', true)) {
        ?>
        <event_date><?php echo $my_meta_value ?></event_date>
        <?php
    }
}
add_action('rss2_item', 'events_to_rss');

/* 
This function adds Theme support for featured image
*/
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'projects', 'slides' ) );



/* 
This function adds custom footer in admin section
*/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<p>Welcome to Custom Wordpress Theme! Need help? Contact the developer <a href="mailto:coneill.designs@gmail.com">here</a>. For WordPress Tutorials visit: <a href="http://www.wpbeginner.com" target="_blank">WPBeginner</a></p>';
}

/* 
This function adds custom footer in admin section
*/
function remove_footer_admin () {
echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Designed & Developed by <a href="http://www.destroyproductions.ca/portfolio" target="_blank">coDESIGN</a></p>';
}

add_filter('admin_footer_text', 'remove_footer_admin');


/* 
This function add custom logo to admin panel
*/
//hook the administrative header output
add_action('admin_head', 'my_custom_logo');

function my_custom_logo() {
echo '
<style type="text/css">
#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/custom-logo.gif) !important; }
</style>
';
}


function wpbeginner_remove_version() {
return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');


/* 
This function adds google analytics to the footer
*/
add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() {
// Paste your Google Analytics code from Step 6 here
 }

/* 
This function adds menus tab to WP admin section
*/
function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => __( 'Header Menu' ), 'extra-menu' => __( 'Extra Menu' ))
  );
}
add_action( 'init', 'register_my_menus' );


/*
	This function will return an atahced image per post. 

	If there is no attached image for a post a generic image will be returned
*/
function get_post_image($postId,$Wdt,$Hgt,$outputResults = true) 
{
	/*
		we give user the option to manually select a thumbnail to attach to this post
		The value must be http://www.domain.com/wp-content/uploads/..../image.[extension]
	*/
	$thumbnail = get_post_meta($postId,'thumbnail',true);

	//
	if( $thumbnail )
	{
		$image_src = $thumbnail;
	}
	else
	{
		$arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $postId );

		if( $arrImages ) 
		{
			$arrKeys = array_keys($arrImages);
			$num_elements = count( $arrKeys);
			$last_element = $arrKeys[$num_elements-1];
			// This is the full location to the image
			$sImageUrl = wp_get_attachment_url($last_element);
			// The URL to the homepage
			$place= get_bloginfo('url');

			$output = str_replace($place, "", $sImageUrl);

			$name = get_bloginfo('template_url');

			$image_src = $name .'/scripts/timthumb.php?src=' . $output . '&amp;w=' . $Wdt . '&amp;h=' . $Hgt . '&amp;zc=1&amp;q=100';
		}
		else 
		{
			$image_src = get_bloginfo('template_url') . '/images/noimage.jpg';
		}
	}

	$sImgString = '<img src="' . $image_src . '" width="' . $Wdt . '" height="' . $Hgt . '" />';

	if( $outputResults )
		echo $sImgString;
	else
		return $sImgString;
}

/*
	This will make sure that the provided string is no longer than the desired length. 
	
	However, if it is then it will append '. . .' to the end of the string
*/
function verifyStringLength($string,$characters)
{
	if( strlen($string) > $characters )
	{
		$string = substr($string,0,$characters-5) . '.&nbsp;.&nbsp;.';
	}

	return $string;
}

// Mirror function to verifyStringLength
function verifyLength($string,$characters)
{
	return verifyStringLength($string,$characters);
}

/*
	This will return the content of the page by title.
	
	Its a shortcut method
*/
function getPageContent($pageTitle)
{
	$page = get_page_by_title($pageTitle);
	
	if( $page )
	{
		return $page->post_content;
	}
	else
	{
		return null;
	}
}

/*
	This will return the link of the page by title.

	Its a shortcut method
*/
function getPageLink($pageTitle)
{
	$page = get_page_by_title($pageTitle);
	
	if( $page )
	{
		return get_permalink($page->ID);
	}
	else
	{
		return null;
	}
}

/*
	This will return the agreed upon date in a desired and constrant format
*/
function postDateFormat($postDate,$dateFormat = "M d, Y")
{
	return mysql2date($dateFormat,$postDate);
}
?>