<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
?>
<li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<article id="comment-<?php comment_ID(); ?>" class="comment clearfix">
		<div class="entry-avatar">
			<?php
				$avatar_size='0' == $comment->comment_parent? '60':'45';
				echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', $avatar_size ), '', get_comment_author() );
			?>
		</div>

		<div class="entry-comment">
			<header class="comment-meta comment-author vcard">

				<cite class="fn" itemprop="author"><?php comment_author(); ?></cite>
				<time itemprop="datePublished" datetime="<?php echo get_comment_date('c'); ?>"><?php echo get_comment_date( __( get_option( 'date_format' ), 'Twoot' ) ); ?></time>

				<?php if ( get_option('woocommerce_enable_review_rating') == 'yes' ) : ?>
				<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf(__( 'Rated %d out of 5', 'Twoot' ), $rating) ?>">
					<span style="width:<?php echo ( intval( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ) / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo intval( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ); ?></strong> <?php _e( 'out of 5', 'Twoot' ); ?></span>
				</div>
				<?php endif; ?>

			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<div class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'Twoot' ); ?></div>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
			</section><!-- .comment-content -->
		</div><!-- .entry comment -->
	</article><!-- #comment-## -->
