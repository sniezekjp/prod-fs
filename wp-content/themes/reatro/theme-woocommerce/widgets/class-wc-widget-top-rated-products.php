<?php
/**
 * Top Rated Products Widget
 *
 * Gets and displays top rated products in an unordered list
 *
 * @author 		WooThemes
 * @category 	Widgets
 * @package 	WooCommerce/Widgets
 * @version 	1.6.4
 * @extends 	WP_Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Twoot_Widget_Top_Rated_Products extends WP_Widget {

	public $widget_cssclass;
	public $widget_description;
	public $widget_id;
	public $widget_name;


	//Constructor
	public function __construct() {

		/* Widget variable settings. */
		$this->widget_cssclass 		= 'woocommerce widget_top_rated_products widget_products';
		$this->widget_description 	= __( 'Display a list of top rated products on your site.', 'woocommerce' );
		$this->widget_id            = 'top-rated-products';
		$this->widget_name 			= __( 'WooCommerce Top Rated Products', 'woocommerce' );

		$widget_ops = array( 
			'classname'   => $this->widget_cssclass, 
			'description' => $this->widget_description 
		);

		parent::__construct( $this->widget_id, $this->widget_name, $widget_ops );
	}


	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	function widget($args, $instance) {
		global $woocommerce;

		$cache = wp_cache_get('widget_top_rated_products', 'widget');

		if ( !is_array($cache) ) $cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Top Rated Products', 'woocommerce' ) : $instance['title'], $instance, $this->id_base);

		if ( !$number = (int) $instance['number'] ) $number = 10;
		else if ( $number < 1 ) $number = 1;
		else if ( $number > 15 ) $number = 15;

		add_filter( 'posts_clauses',  array( $woocommerce->query, 'order_by_rating_post_clauses' ) );

		$query_args = array('posts_per_page' => $number, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product' );

		$query_args['meta_query'] = $woocommerce->query->get_meta_query();

		$top_rated_posts = new WP_Query( $query_args );

		if ($top_rated_posts->have_posts()) :

			echo $before_widget;

			if ( $title ) echo $before_title . $title . $after_title;
				?>
				<ul class="product_list_widget">
					<?php while ($top_rated_posts->have_posts()) : $top_rated_posts->the_post(); global $product;
					?>
					<li class="clearfix">
						<?php if(has_post_thumbnail()) : ?>
						<figure class="featured-image img-preload img-hover post-image">
							<a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( $top_rated_posts->post->ID, 'shop_thumbnail' ); ?>
							<div class="overlay"></div>
							</a>
						</figure>
						<?php endif; ?>
						<section class="post-entry">
							<?php echo $product->get_rating_html(); ?>
							<div class="title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
							<div class="price"><?php echo $product->get_price_html(); ?></div>
						</section>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php
			echo $after_widget;
		endif;

		wp_reset_query();
		remove_filter( 'posts_clauses', array( $woocommerce->query, 'order_by_rating_post_clauses' ) );

		$content = ob_get_clean();

		if ( isset( $args['widget_id'] ) ) $cache[$args['widget_id']] = $content;

		echo $content;

		wp_cache_set('widget_top_rated_products', $cache, 'widget');
	}

	/**
	 * update function.
	 *
	 * @see WP_Widget->update
	 * @access public
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_top_rated_products']) ) delete_option('widget_top_rated_products');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_top_rated_products', 'widget');
	}

	/**
	 * form function.
	 *
	 * @see WP_Widget->form
	 * @access public
	 * @param array $instance
	 * @return void
	 */
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'woocommerce' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of products to show:', 'woocommerce' ); ?></label>
		<input id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>
<?php
	}

}