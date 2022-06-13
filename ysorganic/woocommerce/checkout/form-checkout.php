<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<section class="breadcrumb-section set-bg" style="background-image: url(<?php echo YSORGA_DIR; ?>/assets/img/breadcrumb.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2><?php the_title(); ?></h2>
					<div class="breadcrumb__option">
						<a href="<?php echo site_url(); ?>">
							<?php esc_html_e("Home","yhorganic"); ?>
						</a>
						<span><?php the_title(); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="checkout spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php do_action('woocommerce_before_checkout_form', $checkout); ?>
			</div>
		</div>
		<?php
		// If checkout registration is disabled and not logged in, the user cannot checkout.
		if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
			echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
			return;
		}
		?>
		<div class="checkout__form">
			<?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()) : ?>

				<h4><?php esc_html_e('Billing &amp; Shipping', 'woocommerce'); ?></h4>

			<?php else : ?>
				<h4><?php esc_html_e('Billing details', 'woocommerce'); ?></h4>

			<?php endif; ?>
			<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

				<?php if ($checkout->get_checkout_fields()) : ?>

					<?php do_action('woocommerce_checkout_before_customer_details'); ?>

					<div class="row" id="customer_details">
						<div class="col-md-8">
							<?php do_action('woocommerce_checkout_billing'); ?>


							<?php do_action('woocommerce_checkout_shipping'); ?>
						</div>
						<div class="col-md-4">
							<div class="checkout__order">
							<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

							<h4 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h4>

							<?php do_action('woocommerce_checkout_before_order_review'); ?>

							<div id="order_review" class="woocommerce-checkout-review-order">
								<?php 
								do_action('woocommerce_checkout_order_review'); ?>
							</div>

							<?php do_action('woocommerce_checkout_after_order_review'); ?>
						</div>
						</div>
					</div>

					<?php do_action('woocommerce_checkout_after_customer_details'); ?>

				<?php endif; ?>

			</form>

			<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
		</div>
	</div>
</section>