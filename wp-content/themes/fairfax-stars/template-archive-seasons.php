<?php
/**
 * Template Name: Season Archive
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
$layout = twoot_get_frontend_func('meta', 'layout')==false? 'right':twoot_get_frontend_func('meta', 'layout');
$widget = twoot_get_frontend_func('meta', 'sidebar')==false? 'page':twoot_get_frontend_func('meta', 'sidebar');
?>
<?php get_header(); ?>

<div class="site-content container pt pb clearfix">

<?php if($layout=='left') { echo twoot_generator('sidebar', $widget, $layout); } ?>

<article id="primary-wrapper" <?php twoot_layout_class();?>>
	<div class="inner">

	<?php echo twoot_generator('page_title', 'page'); ?>

    <?php
        $args = array(
            'hide_empty' => false,
            'hierarchical' => true,
            'parent' => 0
        );
        $terms = get_terms( 'season', $args );
        foreach($terms as $term){
            $child_args = array(
                'child_of' => $term->ID
            );
            $child = get_terms('season', $child_args);
            echo '<h3>'. $term->name .'</h3>';
            foreach($child as $child_term){
                echo '<p>'.$child_term->name.'</p>';
            }
        }
    ?>
	<?php
	// Query
	$query = new Twoot_Query(array(
		'counts' => 15,
		'order' => 'DESC',
		'orderby' => 'date',
		'post_type'	=> 'team',
		'taxonomy'  => 'season'
	));

	$do_query = new WP_Query($query->do_template_query());
	?>

	<?php if ( $do_query || $do_query->posts ) : ?>

		<div class="post-archive">
			<ul>
			<?php while ( $do_query->have_posts() ) : $do_query->the_post(); ?>
				<li class="post-item clearfix">
				<?php echo twoot_generator( 'load_template', 'loop-archive' ); ?>
				</li>
			<?php endwhile; ?>
			</ul>
		</div>

		<?php echo twoot_generator('pagination', $do_query); ?>

	<?php else : ?>

		<div class="the-not-posts"><?php esc_attr_e('Sorry, there is no posts in for your query.', 'Twoot'); ?></div>

	<?php endif; ?>

	</div>
</article>
<!--end #primary-->

<?php if($layout=='right') { echo twoot_generator('sidebar', $widget, $layout); } ?>

</div>
<!--end #content-->

<?php get_footer(); ?>