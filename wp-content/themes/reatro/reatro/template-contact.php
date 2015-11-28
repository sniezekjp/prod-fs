<?php
/**
 * Template Name: Contact
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

$show_gmap=twoot_get_frontend_func('opt', 'opt', 'show_gmap');
$gmap_height=twoot_get_frontend_func('opt', 'opt', 'gmap_height');
$gmap_lat=twoot_get_frontend_func('opt', 'opt', 'gmap_lat');
$gmap_lng=twoot_get_frontend_func('opt', 'opt', 'gmap_lng');
$gmap_icon=twoot_get_frontend_func('opt', 'opt', 'gmap_icon');
$gmap_zoom=twoot_get_frontend_func('opt', 'opt', 'gmap_zoom');
$gmap_dragging=twoot_get_frontend_func('opt', 'opt', 'gmap_dragging');
$gmap_mousewheel=twoot_get_frontend_func('opt', 'opt', 'gmap_mousewheel');
$contact_form_id=twoot_get_frontend_func('opt', 'opt', 'contact_form');
$contact_form_name=twoot_get_frontend_func('page_name', $contact_form_id);
?>
<?php get_header(); ?>

<?php
	if($show_gmap) {
		echo do_shortcode('[gmap height="'.$gmap_height.'" lat="'.$gmap_lat.'" lng="'.$gmap_lng.'" icon="'.$gmap_icon.'" zoom="'.$gmap_zoom.'" dragging="'.$gmap_dragging.'" mousewheel="'.$gmap_mousewheel.'"]'); 
	}
?>

<div class="site-content container pt pb clearfix">

<article id="primary-wrapper" class="twelve">

	<div class="contact-page">
		<div class="column six">
			<div class="inner">
			<?php echo do_shortcode('[contact-form-7 id="'.$contact_form_id.'" title="'.$contact_form_name.'"]'); ?>
			</div>
		</div>
		<!--end contact form-->

		<div class="column six">
			<div class="inner">
			<?php if (have_posts()) : the_post(); ?>
				<?php if(get_the_content()) : ?><div class="post-content"><?php the_content(); ?></div><?php endif; ?>
			<?php endif; ?>
			</div>
		</div>
		<!--end text-->
	</div>

</article>
<!--end #primary-->

</div>
<!--end #content-->

<?php get_footer(); ?>