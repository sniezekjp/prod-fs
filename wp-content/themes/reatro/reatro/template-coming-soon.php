<?php
/**
 * Template Name: Coming Soon
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
<?php wp_head(); ?>
<?php if($analytics_code=twoot_get_frontend_func('opt', 'opt', 'analytics_code')) { echo stripslashes($analytics_code); } ?>
</head>
<body id="page-coming-soon" <?php body_class(); ?>>
<div id="page" class="wrapper">
<div class="rows">

	<div class="site-content container">
	<div class="inner">

		<header class="site-logo">
			<?php echo twoot_generator('logo'); ?>
		</header>
		<!--end #logo-->

		<div class="countdown clearfix">

			<h3 class="title"><?php esc_attr_e( 'Coming Soon', 'Twoot' ); ?></h3>

			<div class="clock days">
				<span class="time">00</span>
				<span class="text">days</span>
			</div>
			<div class="clock hours">
				<span class="time">00</span>
				<span class="text">hours</span>
			</div>
			<div class="clock minutes">
				<span class="time">00</span>
				<span class="text">minutes</span>
			</div>
			<div class="clock seconds">
				<span class="time">00</span>
				<span class="text">seconds</span>
			</div>
		</div>
		<!--end #countdown-->

	</div>
	</div>

	<footer class="site-footer">
		<section class="container">
		<div class="inner">
			<?php $show_icons = twoot_get_frontend_func('opt', 'opt', 'show_bottom_social_icons'); echo twoot_generator('social_icons', 'bottom', $show_icons); ?>
			<?php if($copy_text=twoot_get_frontend_func('opt', 'opt', 'copy_text')): ?>
				<div class="site-copy"><?php echo stripslashes($copy_text); ?></div>
			<?php endif; ?>
		</div>
		</section>
	</footer>
	<!--end #copyright-->

</div>
</div><!--end #warpper-->

<?php wp_footer(); ?>
<?php echo twoot_generator('retina_logo'); ?>

<?php if($date = trim(twoot_get_frontend_func('opt', 'opt', 'coming_soon_date'))) : ?>
<script type="text/javascript">
	jQuery(document).ready( function() {
		jQuery('.countdown').countdown({ 
			'date' : '<?php echo $date; ?>', 
			'format': 'on'
		});
	});
</script>
<?php endif; ?>
</body>
</html>