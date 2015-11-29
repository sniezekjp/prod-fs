<?php
/**
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if($icon=twoot_get_frontend_func('opt', 'opt', 'favicon_icon')) : ?>
<!-- For favicon-->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $icon; ?>" />
<link rel="icon" type="image/x-icon" href="<?php echo $icon; ?>" />
<?php endif; ?>
<?php if($icon_144=twoot_get_frontend_func('opt', 'opt', 'touch_icon_144')) : ?>
<!-- For iPad3 with retina display: -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $icon_144; ?>" />
<?php endif; ?>
<?php if($icon_114=twoot_get_frontend_func('opt', 'opt', 'touch_icon_114')) : ?>
<!-- For first- and second-generation iPad: -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $icon_114; ?>" />
<?php endif; ?>
<?php if($icon_72=twoot_get_frontend_func('opt', 'opt', 'touch_icon_72')) : ?>
<!-- For first- and second-generation iPad: -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $icon_72; ?>">
<?php endif; ?>
<?php if($icon_57=twoot_get_frontend_func('opt', 'opt', 'touch_icon_57')) : ?>
<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
<link rel="apple-touch-icon-precomposed" href="<?php echo $icon_57; ?>" /> 
<?php endif; ?>
<?php if($analytics_code=twoot_get_frontend_func('opt', 'opt', 'analytics_code')) { echo stripslashes($analytics_code); } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="wrapper">
<div class="rows">

<?php if(twoot_get_checked_func('woo_activated')) { woocommerce_demo_store(); } ?>

<?php echo twoot_generator('top_widgets'); ?>

<div class="site-header">

<?php if(twoot_get_frontend_func('opt', 'opt', 'show_topbar')) : ?>
<header class="site-topbar">
	<section class="container">
	<div class="inner clearfix">
	<?php $show_icons = twoot_get_frontend_func('opt', 'opt', 'show_top_social_icons'); echo twoot_generator('social_icons', 'top', $show_icons); ?>

	<div class="topbar-right">
	<?php if(twoot_get_checked_func('wpml_activated')) { echo twoot_wpml_generator('language_switcher'); } ?>
	<?php if(twoot_get_checked_func('woo_activated')) { echo twoot_woo_generator('user_menu'); } ?>
	<?php echo twoot_generator('search'); ?>
	</div>
	</div>
	</section>

	<?php if(twoot_get_frontend_func('opt', 'opt', 'show_top_widgets')) : ?>
	<a href="#" class="top-widgets-area-switch twoot-icon open" id="toggle-top-widgets-area"></a>
	<?php endif; ?>
</header>
<!--end #topbar-->
<?php endif; ?>

<header class="site-logo">
	<section class="container">
	<div class="inner">
	<?php //echo twoot_generator('logo'); ?>
		<div class="rows clearfix">
			<div class="column six">
				<h1>
					<a href="/">
						<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.jpg" alt="">
					</a>
				</h1>
				<p><?php echo get_bloginfo('description'); ?></p>
			</div>
			<div class="column six">
				<img class="gey-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/girls-elite-youth.png" alt="Girls Elite Youth Basketball">
			</div>
		</div>
	</div>
	</section>
</header>
<!--end #logo-->

<header class="site-menu">
	<section class="container">
	<div class="inner non-responsive clearfix">
	<?php echo twoot_generator('menu'); ?>
	<?php if(twoot_get_checked_func('woo_activated')) { echo twoot_woo_generator('mini_cart'); } ?>
	</div>
	<?php echo twoot_generator('responsive_menu'); ?>
	</section>
</header>
<!--end #menu-->

</div>
<!--end #header-->
<div class="clear"></div>

<?php
	$slider_id=twoot_get_frontend_func('meta', 'slideshow');
	if($slider_id && is_page()) {
		echo do_shortcode('[layerslider id="'.$slider_id.'"]'); 
	}
?>