<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
// Get Query
$query = new Twoot_Query(array(
	'counts' => 16,
	'order' => 'DESC',
	'orderby' => 'date',
	'post_type'	=> 'product',
	'taxonomy'  => 'product_cat'
));

$products = new WP_Query($query->do_related_query());
?>

<?php if ( $products->have_posts() ) : ?>

<div class="related-products the-carousel-list">

	<h5 class="carousel-title"><?php _e( 'Related Products', 'Twoot' ); ?></h5>

	<ul id="related-product-carousel" class="products products-carousel clearfix">

	<?php while ( $products->have_posts() ) : $products->the_post(); ?>

		<li class="product-item column">
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<header class="item-head">
			<h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
		</header>
		</li>

	<?php endwhile; // end of the loop. ?>

	<?php wp_reset_postdata(); ?>

	</ul>

</div>

<?php endif; ?>
