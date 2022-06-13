<?php

/**
 * Header
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage ysorganic
 * @since Ys Organic 1.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('title'); ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Page Preloder -->
    <!--     <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?php home_url(); ?>">
                <?php the_custom_logo(); ?>
            </a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>
                                    <?php
                                    the_field("header_email", "option");
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    the_field("shipping_text", "option");
                                    ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <?php
                                $icons = get_field("social_icons", "option");
                                foreach ($icons as $icon) : ?>
                                    <a href="<?php echo $icon['links']['url']; ?>">
                                        <?php echo $icon['icons']; ?>
                                    </a>
                                <?php endforeach; ?>

                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <?php if (is_user_logged_in()) :
                                    $user = wp_get_current_user();
                                    printf("<a href='%s'><i class='fa fa-user'></i>%s</a>", get_edit_profile_url($user->ID), $user->display_name);
                                ?>
                                <?php else : ?>
                                    <a href="<?php echo wp_login_url(); ?>"><i class="fa fa-user"></i> <?php echo esc_html("Login", 'ysorganic'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?php home_url(); ?>">
                            <?php the_custom_logo(); ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <?php
                        if (has_nav_menu("primary-menu")) {
                            wp_nav_menu(array(
                                "theme_location" => "primary-menu",
                            ));
                        }
                        ?>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li>
                                <a href="<?php echo site_url(); ?>/wishlist">
                                    <i class="fa fa-heart"></i>
                                    <span>
                                        <?php echo yith_wcwl_count_all_products(); ?>
                                    </span></a>
                            </li>
                            <li><a href="<?php echo wc_get_cart_url(); ?>"><i class="fa fa-shopping-bag"></i>
                                    <?php
                                    $items =  WC()->cart->get_cart_contents_count();
                                    if ($items) : ?>
                                        <span>
                                            <?php echo $items; ?>
                                        </span>
                                    <?php endif; ?>
                                </a></li>
                        </ul>
                        <div class="header__cart__price">item:
                            <?php printf("<span>%s</span>", WC()->cart->get_cart_total()); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->