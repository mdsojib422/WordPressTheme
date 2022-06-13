<?php
/* 
    Woocommerce Functions
*/

/**
 * Change number or products per row to 3
*/

if (!function_exists('ysorga_loop_columns')) {
	function ysorga_loop_columns()
	{
		return 3; // 3 products per row
	}
}
add_filter('loop_shop_columns', 'ysorga_loop_columns', 999);

/**
 * Change sale flash to persentage
*/

function add_percentage_to_sale_badge($html, $post, $product)
{
	if ($product->is_type('variable')) {
		$percentages = array();

		// Get all variation prices
		$prices = $product->get_variation_prices();

		// Loop through variation prices
		foreach ($prices['price'] as $key => $price) {
			// Only on sale variations
			if ($prices['regular_price'][$key] !== $price) {
				// Calculate and set in the array the percentage for each variation on sale
				$percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
			}
		}
		$percentage = max($percentages) . '%';
	} else {
		$regular_price = (float) $product->get_regular_price();
		$sale_price    = (float) $product->get_sale_price();

		if ($sale_price != 0 && $regular_price != 0) {
			$percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
		}
	}

	if ($percentage != 0) {
		return '<div class="product__discount__percent">-' . $percentage . '</div>';
	}
}
add_filter('woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3);


if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_get_items_count' ) ) {
	function yith_wcwl_get_items_count() {
	  ob_start();
	  ?>
		<a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>">
		  <span class="yith-wcwl-items-count">
			<i class="yith-wcwl-icon fa fa-heart-o"><?php echo esc_html( yith_wcwl_count_all_products() ); ?></i>
		  </span>
		</a>
	  <?php
	  return ob_get_clean();
	}
  
	add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_get_items_count' );
  }