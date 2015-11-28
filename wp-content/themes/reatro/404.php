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
<?php get_header(); ?>

<div class="site-content container pt pb clearfix">

<article id="primary-wrapper">
	<div class="inner">
	<div class="page-404">
		<h2><?php esc_attr_e('404', 'Twoot'); ?></h2>
		<h3><?php esc_attr_e('Oops, This Page Could Not Be Found!', 'Twoot'); ?></h3>
		<p><?php esc_attr_e('Sorry, but the page you are looking for does not exist. You can try to go to the Homepage and find your way. ','Twoot'); ?></p>
	</div>
	</div>
</article>
<!--end #primary-->

</div>
<!--end #content-->

<?php get_footer(); ?>