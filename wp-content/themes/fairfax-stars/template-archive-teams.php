<?php
/**
 * Template Name: Team Archives
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

<article id="primary-wrapper" <?php twoot_layout_class();?>>
	<div class="inner">    
	<?php echo twoot_generator('page_title', 'page'); ?>    

	<div class="post-content">
	    <?php if(isset($_GET['season']) && !empty($_GET['season'])) : ?>	        
	        <div class="shortcode-columns outer clearfix">
                <div class="six column">
                    <div class="inner"><?php stars_teams('boys', $_GET['season']); ?></div>
                </div>
                <div class="six column">
                    <div class="inner"><?php stars_teams('girls', $_GET['season']); ?></div>
                </div>
            </div>            
	    <?php else: ?>
    	    <p>Select a season</p>
    	    <?php 
    	        $args = array(
    	            'parent' => 0
    	        );
    	        $seasons = get_terms('season', $args); 
    	        foreach($seasons as $season){
        	        echo '<p class="season"><a href="?season='.$season->slug.'">'.$season->name.'</a></p>';
    	        }
            ?>
	    <?php endif; ?>
	</div>


	</div>
</article>
<!--end #primary-->

<?php if($layout=='right') { echo twoot_generator('sidebar', $widget, $layout); } ?>

</div>
</div>
<!--end #content-->

<?php get_footer(); ?>