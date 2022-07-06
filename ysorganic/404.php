<?php
/**
 * The template for displaying 404 page. 
 *
 * @package ysorganic
 */
 get_header();
?>
<section class="breadcrumb-section set-bg"
    style="background-image: url(<?php echo get_field('contact_us_breadcrumb', 'option')['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>
                        <?php esc_html_e("Error Page","ysorganic") ?>
                    </h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo home_url(); ?>">
                            <?php esc_html_e("Home", "ysorganic"); ?>
                        </a>
                        <span><?php esc_html_e("404- Not Found"); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="404-page" class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="err-image mt-2 mb-2">
                    <img src="<?php echo YSORGA_DIR ?>/assets/img/error-image.png" alt="">
                </div>
                <h3><?php esc_html_e("Opps!! Looks like something went wrong","ysorganic"); ?></h3>
                <div class="back-home_btn mt-5">
                    <a class="site-btn" href="<?php echo home_url(); ?>">Go Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
get_footer();
?>