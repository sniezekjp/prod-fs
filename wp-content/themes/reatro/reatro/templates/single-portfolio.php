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
$layout = twoot_get_frontend_func('meta', 'layout')==false? 'half':twoot_get_frontend_func('meta', 'layout');
$columns = $layout=='half'? '2':'3';
$type = twoot_get_frontend_func('meta', 'type')==false? 'slider':twoot_get_frontend_func('meta', 'type');
$gallery_id = twoot_get_frontend_func('meta', 'gallery_id');
$video_type = twoot_get_frontend_func('meta', 'video_player');
$video_url = twoot_get_frontend_func('meta', 'video_url');
$video_embed = twoot_get_frontend_func('meta', 'video_code');
?>
<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="site-content container pt pb">

<article id="primary-wrapper" class="twelve clearfix">

	<?php if (have_posts()) : the_post(); ?>

	<div class="post-portfolio clearfix">
	<?php if($layout=='full') : ?>
	<div class="twelve">
	<div class="inner full-media">
	<?php 
		switch($type)
		{
			case 'slider': echo twoot_generator('post_slider', $gallery_id, 940, 600, true, true); break;
			case 'image': echo twoot_generator('post_image', $gallery_id, 940, 600, true, true); break;
			case 'masonry': echo twoot_generator('post_masonry', $gallery_id, 460, 9999, false, true, $columns); break;
			case 'video': echo twoot_generator('post_video', $video_type, $video_url, $video_embed, 940, null); break;
		}
	?>
	</div>
	<div class="eight column full">
		<div class="inner full-content">
		<div class="entry-content"><?php the_content(); ?></div>
		</div>
	</div>
	<div class="four column full">
		<div class="inner full-excerpt">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<nav class="post-pagenation">
			<ul class="clearfix">
			<?php if( get_previous_post() ) : ?><li class="prev"><?php previous_post_link('%link', __( '<i class="twoot-icon-left-open"></i>', 'Twoot' )) ?></li><?php endif; ?>
			<?php if( $portfolio_page_id = twoot_get_frontend_func('opt', 'opt', 'portfolio_page_id') ) : ?><li class="back"><a href="<?php echo get_page_link($portfolio_page_id); ?>"><i class="twoot-icon-th"></i></a></li><?php endif; ?>
			<?php if( get_next_post() ) : ?><li class="next"><?php next_post_link('%link', __( '<i class="twoot-icon-right-open"></i>', 'Twoot' )) ?></li><?php endif; ?>
			</ul>
		</nav>
		<?php if(get_the_excerpt()) : ?>
		<div class="entry-desc"><?php the_excerpt(); ?></div>
		<?php endif; ?>
		<?php echo twoot_generator('portfolio_meta'); ?>
		</div>
	</div>
	<div class="clear"></div>
	</div>
	<?php endif; ?>
	<!--end full-->

	<?php if($layout=='half') : ?>
	<div class="eight column half">
		<div class="inner half-media">
		<?php
			switch($type)
			{
				case 'slider': echo twoot_generator('post_slider', $gallery_id, 940, 600, true, true); break;
				case 'image': echo twoot_generator('post_image', $gallery_id, 940, 600, true, true); break;
				case 'masonry': echo twoot_generator('post_masonry', $gallery_id, 460, 9999, false, true, $columns); break;
				case 'video': echo twoot_generator('post_video', $video_type, $video_url, $video_embed, 620, null); break;
			}
		?>
		<?php if(get_the_content()) : ?>
		<div class="entry-content"><?php the_content(); ?></div>
		<?php endif; ?>
		</div>
	</div>
	<div class="four column half">
		<div class="inner half-content">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<nav class="post-pagenation">
			<ul class="clearfix">
			<?php if( get_previous_post() ) : ?><li class="prev"><?php previous_post_link('%link', __( '<i class="twoot-icon-left-open"></i>', 'Twoot' )) ?></li><?php endif; ?>
			<?php if( $portfolio_page_id = twoot_get_frontend_func('opt', 'opt', 'portfolio_page_id') ) : ?><li class="back"><a href="<?php echo get_page_link($portfolio_page_id); ?>"><i class="twoot-icon-th"></i></a></li><?php endif; ?>
			<?php if( get_next_post() ) : ?><li class="next"><?php next_post_link('%link', __( '<i class="twoot-icon-right-open"></i>', 'Twoot' )) ?></li><?php endif; ?>
			</ul>
		</nav>
		<?php if(get_the_excerpt()) : ?>
		<div class="entry-desc"><?php the_excerpt(); ?></div>
		<?php endif; ?>
		<?php echo twoot_generator('portfolio_meta'); ?>
		</div>
	</div>
	<?php endif; ?>
	<!--end half-->
	</div>

	<?php
		$q = new Twoot_Template_Related_Posts(array(
			'title' => esc_attr__('Related Works', 'Twoot'), 
			'counts' => twoot_get_frontend_func('opt', 'opt', 'portfolio_related_counts'),
			'posts' => twoot_get_frontend_func('meta', 'related_posts'),
			'order' => twoot_get_frontend_func('opt', 'opt', 'portfolio_related_order'),
			'orderby' => twoot_get_frontend_func('opt', 'opt', 'portfolio_related_orderby'),
			'post_type'	=> 'portfolio',
			'taxonomy'  => 'portfolio_cat'
		));
		$do_query=(twoot_get_frontend_func('opt', 'opt', 'portfolio_related_layout')=='carousel')? $q->carousel():$q->grid();

		echo $do_query;
	?>

	<?php endif; ?>

</article>
<!--end #primary-->

</div>
</div>
<!--end #content-->

<?php get_footer(); ?>