<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<li <?php wc_product_class('', $product); ?>>
	<div class="product__item">
		<div class="product__item__pic product__discount__item__pic set-bg" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
			<?php woocommerce_show_product_loop_sale_flash(); ?>
			<ul class="product__item__pic__hover">
				<li>
					<?php echo do_shortcode("[yith_wcwl_add_to_wishlist]"); ?>
				</li>

				<li>
					<a href="<?php echo site_url(); ?>?action=yith-woocompare-add-product&id=<?php echo get_the_ID(); ?>" class="compare" data-product_id="<?php echo get_the_ID(); ?>" rel="nofollow"><i class="fa fa-retweet"></i></a>
				</li>


				<li><a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-product_id="<?php echo get_the_ID(); ?>" class="add_to_cart_button ajax_add_to_cart">
						<i class="fa fa-shopping-cart"></i>
					</a>
				</li>
			</ul>
		</div>
		<div class="product__item__text ">
			<span><?php echo $product->get_categories(); ?></span>
			<h6><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>
			<h5><?php woocommerce_template_loop_price(); ?></h5>
		</div>
	</div>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>