<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<?php include 'theme-variables.php'; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php bloginfo('name'); ?><?php wp_title( '|', true, 'left' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo $stylesheets_url; ?>slicknav.css">
</head>
<body <?php body_class(); ?>>
<ul id="menu">
		<li><a href="http://anddoriginal.com/projects/">Projects</a></li>
    <li><a href="http://anddgorginal.com/shop/">Shop</a></li>
    <li><a href="http://anddgorginal.com/about/">About</a></li>
    <li><a href="http://anddgorginal.com/contact/">Contact</a></li>
    <li><a href="https://instagram.com/anddoriginal/">Instagram</a></li>
</ul>
<?php if(is_home()) { ?>
    <?php echo do_shortcode("[metaslider id=198 percentwidth=100 percentheight=100]"); ?>
	<?php echo do_shortcode("[metaslider id=111 percentwidth=100 percentheight=100]"); ?>
<?php } elseif(is_single()) {  ?>
<?php } elseif(wp_is_mobile()) {  ?>
<?php };  ?>
<!-- #header -->
<header>	
	<div class="wrapper">
		<div id="logo">
		<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
		</div>
		<?php
			$defaults = array(
				'theme_location'  => 'Main Menu',
				'menu'            => 'Main Menu',
				'container'       => 'nav',
				'container_class' => false,
				'container_id'    => false,
				'menu_class'      => false,
				'menu_id'         => 'header-menu',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="https://instagram.com/anddoriginal/"><img style="margin-top:8px;" src="http://anddgarments.com/wp-content/themes/aand/images/insta.png" /></a></li></ul>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults );
		?>	
		<div class="float-divider"></div>
	</div>
</header>
<!-- #header -->