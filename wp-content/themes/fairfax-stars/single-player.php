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
$layout = twoot_get_frontend_func('meta', 'layout')==false? 'right':twoot_get_frontend_func('meta', 'layout');
$widget = twoot_get_frontend_func('meta', 'sidebar')==false? 'page':twoot_get_frontend_func('meta', 'sidebar');
?>
<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="site-content container pt pb clearfix">

<?php if($layout=='left') { echo twoot_generator('sidebar', $widget, $layout); } ?>

<article id="primary-wrapper" class="column eight"<?php //twoot_layout_class();?>>
	<div class="inner">

	<?php echo twoot_generator('page_title', 'page'); ?>
	
<?php 
    global $wp_query; 
    p2p_type( 'players_to_teams' )->each_connected( $wp_query, array('post_status'=>'all'), 'teams' );
?>

	<?php if (have_posts()) : the_post(); ?>

	<?php 
	    $teams = $post->teams; 
	    $player_name = get_the_title(); 
    ?>

	<div class="post-content">
		<?php the_content(); ?>
	</div>
	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_attr__( 'Pages:', 'Twoot' ), 'after' => '</div>' ) ); ?>	
	<?php endif; ?>

	</div>
</article>
<!--end #primary-->

<aside id="secondary" class="sidebar-right side-widgets-area  column four">
    <div class="inner">
        <div class="widget widget_text">
            <h3 class="title">Teams</h3>
            <ul>
                <?php foreach($teams as $post) : setup_postdata($post); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php stars_edit_link(); ?>
                    </li>
                <?php endforeach; wp_reset_postdata(); ?>
            </ul>
		</div>
		<div class="widget">
    		<h3 class="title">#<?php echo $player_name; ?></h3>
    		<?php stars_tagged_player_articles($player_name); ?>
		</div>
    </div>
</aside>

<?php if($layout=='right') { /* echo twoot_generator('sidebar', $widget, $layout); */ } ?>

</div>
</div>
<!--end #content-->

<?php get_footer(); ?>