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
<?php if ( post_password_required() ) : ?>
<div id="comments">
	<p class="nopassword"><?php esc_attr_e( 'This post is password protected. Enter the password to view any comments.', 'Twoot'); ?></p>
</div><!-- #comments -->
<?php return; endif; ?>


<?php if ( have_comments() ) : ?>
<div id="comments">

	<h2 id="comments-title">
		<?php
			global $wp_query;
			$comments_number = count($wp_query->comments_by_type['comment']);
			if($comments_number > 1) {
				printf( __( '%1$s Comments', 'Twoot' ), $comments_number );
			}else{
				printf( __( '%1$s Comment', 'Twoot' ), $comments_number );
			}
		?>
	</h2>

	<ol class="commentlist">
		<?php wp_list_comments( array( 'callback' => 'twoot_comments_list', 'type' => 'comment' ) ); ?>
	</ol>

	<?php 
		if (get_comment_pages_count() > 1 && get_option('page_comments')) {
			$comment_pages = paginate_comments_links('echo=0');
			if ($comment_pages) 
			{
				echo '<div  class="comment-pagination clearfix">'.$comment_pages.'</div>';
			}
		}
	?>

</div><!-- #comments -->
<?php endif; ?>

<?php twoot_comment_form(); ?>