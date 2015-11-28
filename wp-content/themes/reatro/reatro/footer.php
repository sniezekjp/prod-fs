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
$class=twoot_get_frontend_func('opt', 'opt', 'show_widgets')==true? 'class="site-bottom has-line"':'class="site-bottom"';
?>
<div class="site-footer clear-fixed">
<?php echo twoot_generator('bottom_menu'); ?>
<?php echo twoot_generator('bottom_widgets'); ?>
<footer <?php echo $class; ?>>
	<section class="container">
	<div class="inner">
	<?php $show_icons = twoot_get_frontend_func('opt', 'opt', 'show_bottom_social_icons'); echo twoot_generator('social_icons', 'bottom', $show_icons); ?>
	<?php if($copy_text=twoot_get_frontend_func('opt', 'opt', 'copy_text')): ?>
		<div class="site-copy"><?php echo stripslashes($copy_text); ?></div>
	<?php endif; ?>
	</div>
	</section>
</footer>
</div>
<!--end #footer-->

</div>
</div><!--end #warpper-->

<?php if(twoot_get_frontend_func('opt', 'opt', 'show_gotop')) : ?>
<div id="gotop"><i class="twoot-icon twoot-icon-up-open-big"></i></div>
<?php endif; ?>
<?php echo twoot_generator('retina_logo'); ?>

<?php wp_footer(); ?>
</body>
</html>