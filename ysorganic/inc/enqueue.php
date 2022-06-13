<?php

/**
 * Enqueue Theme assets
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage ysorganic
 * @since Ys Organic 1.0
 */


if (!function_exists("ysorganic_assets")) {

    function ysorganic_assets(){
        /* Css */
        wp_enqueue_style('ysorga_bootstrap', YSORGA_DIR . '/assets/css/bootstrap.min.css', array(), YSORGA_VERSION);
        wp_enqueue_style('ysorga_awesome', YSORGA_DIR . '/assets/css/font-awesome.min.css', array(), YSORGA_VERSION);
        wp_enqueue_style('ysorga_elegant-icons', YSORGA_DIR . '/assets/css/elegant-icons.css', array(), YSORGA_VERSION);
        wp_enqueue_style('ysorga_nice-select', YSORGA_DIR . '/assets/css/nice-select.css', array(), YSORGA_VERSION);
        wp_enqueue_style('ysorga_jquery-ui', YSORGA_DIR . '/assets/css/jquery-ui.min.css', array(), YSORGA_VERSION);
        wp_enqueue_style('ysorga_owl.carousel', YSORGA_DIR . '/assets/css/owl.carousel.min.css', array(), YSORGA_VERSION);
        wp_enqueue_style('ysorga_slicknav', YSORGA_DIR . '/assets/css/slicknav.min.css', array(), YSORGA_VERSION);
        wp_enqueue_style('ysorga_main', YSORGA_DIR . '/assets/css/style.css', array(), YSORGA_VERSION);
        /* Scripts */
        wp_enqueue_script('ysorga_jquery', YSORGA_DIR . '/assets/js/jquery-3.3.1.min.js', array(), YSORGA_VERSION,true);

        wp_enqueue_script('ysorga_bootstrap', YSORGA_DIR . '/assets/js/bootstrap.min.js', array(), YSORGA_VERSION,true);
        wp_enqueue_script('ysorga_nice-select', YSORGA_DIR . '/assets/js/jquery.nice-select.min.js', array(), YSORGA_VERSION,true);
        wp_enqueue_script('ysorga_jquery-ui', YSORGA_DIR . '/assets/js/jquery-ui.min.js', array(), YSORGA_VERSION,true);
        wp_enqueue_script('ysorga_slicknav', YSORGA_DIR . '/assets/js/jquery.slicknav.js', array(), YSORGA_VERSION,true);
        wp_enqueue_script('ysorga_mixitup', YSORGA_DIR . '/assets/js/mixitup.min.js', array(), YSORGA_VERSION,true);
        wp_enqueue_script('ysorga_owl.carousel', YSORGA_DIR . '/assets/js/owl.carousel.min.js', array(), YSORGA_VERSION,true);
        wp_enqueue_script('ysorga_main', YSORGA_DIR . '/assets/js/main.js', array(), YSORGA_VERSION,true);
    }

    add_action("wp_enqueue_scripts", "ysorganic_assets");
}
