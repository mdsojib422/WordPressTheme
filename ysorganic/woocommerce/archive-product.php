<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');
?>
<section class="breadcrumb-section set-bg" style="background-image: url(<?php echo YSORGA_DIR ?>/assets/img/breadcrumb.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2><?php woocommerce_page_title(); ?></h2>
					<div class="breadcrumb__option">
						<a href="<?php echo home_url(); ?>">Home</a>
						<span>Shop</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php

				do_action('woocommerce_sidebar');
				?>
			</div>
			<div class="col-md-9">
				<div class="product__discount">
					<div class="section-title product__discount__title">
						<h2>Sale Off</h2>
					</div>
					<div class="row">
						<div class="product__discount__slider owl-carousel">
						<?php						
							$args = array(
								'post_type' => 'product',
								'posts_per_page' => '5',
								'meta_query'     => array(
									array(
										'key'           => '_sale_price',
										'value'         => 0,
										'compare'       => '>',
										'type'          => 'numeric'
									)
								)
							);
							$query = new WP_Query($args);

							if($query->have_posts()){
								while($query->have_posts()){
									$query->the_post();
								?>
	<div class="col-lg-4">
		<div class="product__discount__item">
			<div class="product__discount__item__pic set-bg"  style="background-image: url(<?php the_post_thumbnail_url(); ?>);">

				<?php woocommerce_show_product_loop_sale_flash(); ?>
				<ul class="product__item__pic__hover">
				<li>
					<?php echo do_shortcode("[yith_wcwl_add_to_wishlist]"); ?>
				</li>

				<li>
					<a href="<?php echo site_url(); ?>?action=yith-woocompare-add-product&id=<?php echo get_the_ID(); ?>" class="compare" data-product_id="<?php echo get_the_ID(); ?>" rel="nofollow"><i class="fa fa-retweet"></i></a>
				</li>


				<li>
					<a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-product_id="<?php echo get_the_ID(); ?>" class="add_to_cart_button ajax_add_to_cart">
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
	</div>

							<?php	}
							}
						
						?>


</div>
</div>
</div>
				<?php
				if (woocommerce_product_loop()) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action('woocommerce_before_shop_loop');

					woocommerce_product_loop_start();

					if (wc_get_loop_prop('total')) {
						while (have_posts()) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action('woocommerce_shop_loop');

							wc_get_template_part('content', 'product');
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action('woocommerce_after_shop_loop');
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action('woocommerce_no_products_found');
				}
				?>

			</div>
		</div>
	</div>
</section>


<?php



get_footer('shop');
