<?php
/**
 * Template Name: Portfolio
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
if( ! twoot_get_checked_func('toolkit_activated') ) { 
	wp_die( esc_attr__( 'You have not installed the plugin: Twoot Toolkit, please install the plugin first.', 'Twoot' ) ); 
}

$layout = twoot_get_frontend_func('meta', 'layout')==false? 'full':twoot_get_frontend_func('meta', 'layout');
$widget = twoot_get_frontend_func('meta', 'sidebar')==false? 'portfolio':twoot_get_frontend_func('meta', 'sidebar');
?>
<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="site-content container pt pb clearfix">

<?php if($layout=='left') { echo twoot_generator('sidebar', $widget, $layout); } ?>

<article id="primary-wrapper" <?php twoot_layout_class();?>>
	<div class="inner">
	<?php echo twoot_generator('page_title', 'page'); ?>

	<?php if (have_posts()) : the_post(); ?>

		<?php if(get_the_content()) : ?>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
		<?php else : ?>
			<?php
				$q = new Twoot_Template_Grid(array(
					'columns' => twoot_get_frontend_func('opt', 'opt', 'portfolio_column'),
					'counts' => twoot_get_frontend_func('opt', 'opt', 'portfolio_counts'),
					'cats'=> '',
					'posts' => '',
					'order' => twoot_get_frontend_func('opt', 'opt', 'portfolio_order'),
					'orderby' => twoot_get_frontend_func('opt', 'opt', 'portfolio_orderby'),
					'filter' => 'yes',
					'paging' => 'yes',
					'post_type'	=> 'portfolio',
					'taxonomy'  => 'portfolio_cat'
				));
				echo $q->grid();
			?>
		<?php endif; ?>

	<?php endif; ?>
	</div>
</article>
<!--end #primary-->

<?php if($layout=='right') { echo twoot_generator('sidebar', $widget, $layout); } ?>

</div>
</div>
<!--end #content-->

<?php get_footer(); ?>