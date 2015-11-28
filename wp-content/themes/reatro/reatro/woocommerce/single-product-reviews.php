<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
global $woocommerce, $product;

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

if ( ! comments_open() )
	return;
?>
<div id="reviews">
	<div id="comments">
		<?php
		if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_rating_count() ) ) {
			$average = $product->get_average_rating();

			echo '<div class="comments-header" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">';

			echo '<h2 class="entry-title">';
			echo sprintf( _n('%s review', '%s reviews', $count, 'Twoot'), '<span itemprop="ratingCount" class="count">'.$count.'</span>' );
			echo '</h2>';

			echo '<div class="aggregate-rating">';
			echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'Twoot' ), $average ).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"></span></div>';
			echo '<div class="clear"></div>';
			echo '<div class="value-rating"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'Twoot' ).'</div>';
			echo '</div>';

			echo '</div>';
		} else {
			echo '<h2 class="entry-title">'.__( 'Reviews', 'Twoot' ).'</h2>';
		}
		?>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' 	=> '&larr;',
					'next_text' 	=> '&rarr;',
					'type'			=> 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'Twoot' ); ?></p>

		<?php endif; ?>
	</div>


		<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'Twoot' ) : __( 'Be the first to review', 'Twoot' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
						'title_reply_to'       => __( 'Leave a Reply to %s', 'Twoot' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'Twoot' ) . ' <span class="required">*</span></label> ' .
							            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
							'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'Twoot' ) . ' <span class="required">*</span></label> ' .
							            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
						),
						'label_submit'  => __( 'Submit', 'Twoot' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'Twoot' ) .'</label><select name="rating" id="rating">
							<option value="">' . __( 'Rate&hellip;', 'Twoot' ) . '</option>
							<option value="5">' . __( 'Perfect', 'Twoot' ) . '</option>
							<option value="4">' . __( 'Good', 'Twoot' ) . '</option>
							<option value="3">' . __( 'Average', 'Twoot' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'Twoot' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'Twoot' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Your Review', 'Twoot' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' . wp_nonce_field( 'woocommerce-comment_rating', '_wpnonce', true, false ) . '</p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'Twoot' ); ?></p>

	<?php endif; ?>
</div>