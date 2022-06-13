<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;


?>
<section class="breadcrumb-section set-bg" style="background-image: url(<?php echo YSORGA_DIR; ?>/assets/img/breadcrumb.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2><?php the_title(); ?></h2>
					<div class="breadcrumb__option">
						<a href="<?php echo site_url(); ?>">Home</a>
						<span><?php the_title(); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="shoping-cart spad">
	<div class="container">
	<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
		<div class="row">
			<div class="col-lg-12">
				<div class="shoping__cart__table">

			
						
					
					<?php do_action('woocommerce_before_cart_table'); ?>

						<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
							<thead>
								<tr>

									<th class="shoping__product"><?php esc_html_e('Product', 'woocommerce'); ?></th>
									<th class="product-price"><?php esc_html_e('Price', 'woocommerce'); ?></th>
									<th class="product-quantity"><?php esc_html_e('Quantity', 'woocommerce'); ?></th>
									<th class="product-subtotal"><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
									<th class="product-remove">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php do_action('woocommerce_before_cart_contents'); ?>

								<?php
								foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
									$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
									$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

									if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
										$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
								?>
										<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">



											<td class="shoping__cart__item " data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
												<?php
												$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

												echo $thumbnail; // PHPCS: XSS ok.
												if (!$product_permalink) {
													echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
												} else {
													echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s"><h5>%s</h5></a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
												}

												do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

												// Meta data.
												echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

												// Backorder notification.
												if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
													echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
												}
												?>
											</td>

											<td class="product-price shoping__cart__price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
												<?php
												echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
												?>
											</td>

											<td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
												<?php
												if ($_product->is_sold_individually()) {
													$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
												} else {
													$product_quantity = woocommerce_quantity_input(
														array(
															'input_name'   => "cart[{$cart_item_key}][qty]",
															'input_value'  => $cart_item['quantity'],
															'max_value'    => $_product->get_max_purchase_quantity(),
															'min_value'    => '0',
															'product_name' => $_product->get_name(),
														),
														$_product,
														false
													);
												}

												echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
												?>
											</td>

											<td class="product-subtotal shoping__cart__total" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
												<?php
												echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
												?>
											</td>
											<td class="product-remove shoping__cart__item__close">
												<?php
												echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
													'woocommerce_cart_item_remove_link',
													sprintf(
														'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><span class="icon_close"></span></a>',
														esc_url(wc_get_cart_remove_url($cart_item_key)),
														esc_html__('Remove this item', 'woocommerce'),
														esc_attr($product_id),
														esc_attr($_product->get_sku())
													),
													$cart_item_key
												);
												?>
											</td>

										</tr>
								<?php
									}
								}
								?>
							</tbody>
						</table>
						<?php do_action('woocommerce_after_cart_table'); ?>
				
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="shoping__cart__btns">
					<a href="<?php $shop_page_url = get_permalink(wc_get_page_id('shop'));
								echo $shop_page_url; ?>" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

							
						<button type="submit" class="primary-btn cart-btn cart-btn-right" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button> 


					<?php do_action('woocommerce_cart_actions'); ?>

					<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
				</div>
			</div>
			<div class="col-lg-6">
				<?php do_action('woocommerce_cart_contents'); ?>

				<?php if (wc_coupons_enabled()) { ?>
					<div class="shoping__continue">
						<div class="shoping__discount">
						<h5><?php esc_html_e("Discount Codes","woocommerce") ?></h5>					
						<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" />
						 <button type="submit" class="site-btn" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_attr_e('Apply coupon', 'woocommerce'); ?></button>
						<?php do_action('woocommerce_cart_coupon'); ?>
					</div>
					</div>
				<?php } ?>

				<?php do_action('woocommerce_after_cart_contents'); ?>

			</div>
			<div class="col-lg-6">
				<?php

				do_action('woocommerce_before_cart'); ?>



				<?php do_action('woocommerce_before_cart_collaterals'); ?>			
				<?php
				/**
				 * Cart collaterals hook.
				 *
				 * @hooked woocommerce_cross_sell_display
				 * @hooked woocommerce_cart_totals - 10
				 */
				do_action('woocommerce_cart_collaterals');
				?>
				
			</div>
		</div>
		</form>
	</div>
</section>



<?php do_action('woocommerce_after_cart'); ?>