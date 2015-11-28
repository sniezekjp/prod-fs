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

<article id="primary-wrapper" class="twelve">
	<div class="inner">
	<?php echo twoot_generator('page_title', 'archive'); ?>

	<?php
		$q = new Twoot_Template_Grid(array(
			'columns' => twoot_get_frontend_func('opt', 'opt', 'portfolio_column'),
			'counts' => twoot_get_frontend_func('opt', 'opt', 'portfolio_counts'),
			'order' => 'DESC',
			'orderby' => 'date',
			'filter' => 'no',
			'paging' => 'yes',
			'post_type'	=> 'portfolio'
		));
		echo $q->grid();
	?>
	</div>
</article>
<!--end #primary-->

</div>
<!--end #content-->

<?php get_footer(); ?>