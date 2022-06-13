<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
?>

<section class="breadcrumb-section set-bg" style="background-image: url(<?php echo YSORGA_DIR ?>/assets/img/breadcrumb.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2><?php the_title(); ?></h2>
					<div class="breadcrumb__option">
						<a href="<?php echo site_url(); ?>">Home</a>
						<?php $cat = $product->get_categories();
						echo $cat;
						?>
						<span><?php the_title(); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<section class="product-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="product__details__pic">
					<div class="product__details__pic__item">
						<?php woocommerce_show_product_images(); ?>
					</div>
					<div class="product__details__pic__slider owl-carousel owl-loaded owl-drag">




						<div class="owl-stage-outer">
							<div class="owl-stage" style="transform: translate3d(-575px, 0px, 0px); transition: all 1.2s ease 0s; width: 1726px;">
								<div class="owl-item cloned" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/product/details/thumb-1.jpg" alt=""></div>
								<div class="owl-item cloned" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/product/details/thumb-2.jpg" alt=""></div>
								<div class="owl-item cloned" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/product/details/thumb-3.jpg" alt=""></div>
								<div class="owl-item cloned" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/product/details/thumb-4.jpg" alt=""></div>
								<div class="owl-item active" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/product/details/thumb-1.jpg" alt=""></div>
								<div class="owl-item active" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/product/details/thumb-2.jpg" alt=""></div>
								<div class="owl-item active" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/product/details/thumb-3.jpg" alt=""></div>
								<div class="owl-item active" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/product/details/thumb-4.jpg" alt=""></div>
								<div class="owl-item cloned" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/product/details/thumb-1.jpg" alt=""></div>
								<div class="owl-item cloned" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/product/details/thumb-2.jpg" alt=""></div>
								<div class="owl-item cloned" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/product/details/thumb-3.jpg" alt=""></div>
								<div class="owl-item cloned" style="width: 123.755px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/product/details/thumb-4.jpg" alt=""></div>
							</div>
						</div>
						<div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
						<div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="product__details__text">
					<h3><?php the_title(); ?></h3>
					<div class="product__details__rating">
						<!-- <i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<span>(18 reviews)</span> -->

						<?php 
						woocommerce_template_single_rating();
						?>
					</div>
				
					<?php woocommerce_template_single_price(); ?>
					
					<p><?php the_content(); ?></p>
					<div class="product__details__quantity">
                        <div class="quantity">
                         <div class="pro-qty">	
<input type="number" id="quantity" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" inputmode="numeric" autocomplete="off">
							</div>
                        </div>
                    </div>				
					<a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-product_id="<?php echo get_the_ID(); ?>" class="primary-btn add_to_cart_button ajax_add_to_cart">
						ADD TO CARD
					</a>



					<?php echo do_shortcode("[yith_wcwl_add_to_wishlist]"); ?>


					<ul>
						<li>
							<b>Availability</b> 
							<span>
								<?php 
								if($product->is_in_stock()){
									echo _e("In Stock","ysorganic");
								}else{
									echo _e("Stock Out","ysorganic");
								} 
								?>	
							</span>
						</li>

						<li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
						<li><b>Weight</b> <span>0.5 kg</span></li>
						<li><b>Share on</b>
							<div class="share">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-12">
				<?php woocommerce_output_product_data_tabs(); ?>
			</div>
		</div>
	</div>
</section>
<?php 
woocommerce_output_related_products();
?>
