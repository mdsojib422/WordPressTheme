<?php
/* 
    Template Name: Home
*/
get_header();
?>
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        <?php
                        $cats = get_categories(array(
                            'taxonomy' => 'product_cat',
                            'hide_empty' => true,
                        ));
                        foreach ($cats as $cat) { ?>
                            <li><a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo $cat->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5><?php the_field("phone", 'options'); ?></h5>
                            <span><?php the_field("phone-message", 'option'); ?></span>
                        </div>
                    </div>
                </div>
                <?php
                $banner = get_field("home-banner", "options")
                ?>
                <div class="hero__item set-bg" data-setbg="" style="background-image:url(<?php echo $banner['image']['url']; ?>);">

                    <div class="hero__text">
                        <span><?php echo $banner['sub_title']; ?></span>
                        <h2><?php echo $banner['title']; ?></h2>
                        <p><?php echo $banner['description']; ?></p>
                        <a href="<?php echo $banner['button_link']; ?>" class="primary-btn"><?php echo $banner['button_text']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">

                <?php


                $terms = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => false,
                ));

                foreach ($terms as $term) {
                    $thumbnail =  get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
                    $image = wp_get_attachment_url($thumbnail);
                ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" style="background-image:url(<?php echo $image; ?>);">
                            <h5><a href="<?php echo get_category_link($term->term_id); ?>"><?php echo $term->name; ?></a></h5>
                        </div>
                    </div>
                <?php

                }


                ?>





            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-1.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-2.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-3.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-4.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-5.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-6.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-7.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-8.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <?php
                    $ads1 = get_field("ads_banner", "options");
                    ?>
                    <img src="<?php echo $ads1['ads_image']['url']; ?>" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?php echo $ads1['ads_image_2']['url']; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php
                            global $product;
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 3,
                            );
                            $loop = new WP_Query($args);
                            if ($loop->have_posts()) {
                                while ($loop->have_posts()) : $loop->the_post();
                            ?>
                                    <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php the_title(); ?></h6>
                                            <?php
                                            if ($product->get_regular_price()) {
                                                printf("<span>$%s</span>", $product->get_regular_price());
                                            } else {
                                                printf("<span>Collection</span>");
                                            }
                                            ?>

                                        </div>
                                    </a>

                            <?php endwhile;
                            } else {
                                echo __('No products found');
                            }
                            wp_reset_postdata();
                            ?>


                        </div>
                        <div class="latest-prdouct__slider__item">

                            <?php

                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 3,
                                'offset' => 3,
                            );
                            $loop = new WP_Query($args);
                            if ($loop->have_posts()) {
                                while ($loop->have_posts()) : $loop->the_post();

                            ?>
                                    <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php the_title(); ?></h6>
                                            <?php
                                            if ($product->get_regular_price()) {
                                                printf("<span>$%s</span>", $product->get_regular_price());
                                            } else {
                                                printf("<span>Collection</span>");
                                            }
                                            ?>

                                        </div>
                                    </a>

                            <?php endwhile;
                            } else {
                                echo __('No products found');
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                        <?php 
                        $rated = new WP_Query( array(
                            'posts_per_page' => 3,
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => 1,
                            'meta_key' => 'total_sales',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC',
                        ));
                        if($rated->have_posts()) :
                            while($rated->have_posts()) : $rated->the_post();
                            ?>
                                    <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php the_title(); ?></h6>
                                            <?php
                                            if ($product->get_regular_price()) {
                                                printf("<span>$%s</span>", $product->get_regular_price());
                                            } else {
                                                printf("<span>Collection</span>");
                                            }
                                            ?>

                                        </div>
                                    </a>

                        <?php                   
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        
                        ?>


                        </div>
                    <div class="latest-prdouct__slider__item">
                        <?php 
                        $rated = new WP_Query( array(
                            'posts_per_page' => 3,
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => 1,
                            'meta_key' => 'total_sales',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC',
                        ));
                        if($rated->have_posts()) :
                            while($rated->have_posts()) : $rated->the_post();
                            ?>
                                    <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php the_title(); ?></h6>
                                            <?php
                                            if ($product->get_regular_price()) {
                                                printf("<span>$%s</span>", $product->get_regular_price());
                                            } else {
                                                printf("<span>Collection</span>");
                                            }
                                            ?>

                                        </div>
                                    </a>

                        <?php                   
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                    <div class="latest-prdouct__slider__item">
                        <?php 
                        $reviewed = new WP_Query( array(
                            'posts_per_page' => 3,
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => 1,
                            'meta_key' => 'total_sales',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC',
                        ));
                        if($reviewed->have_posts()) :
                            while($reviewed->have_posts()) : $reviewed->the_post();
                            ?>
                                    <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php the_title(); ?></h6>
                                            <?php
                                            if ($product->get_regular_price()) {
                                                printf("<span>$%s</span>", $product->get_regular_price());
                                            } else {
                                                printf("<span>Collection</span>");
                                            }
                                            ?>

                                        </div>
                                    </a>

                        <?php                   
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        
                        ?>
                        </div>
                        <div class="latest-prdouct__slider__item">
                        <?php 
                        $reviewed = new WP_Query( array(
                            'posts_per_page' => 3,
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => 1,
                            'meta_key' => 'total_sales',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC',
                        ));
                        if($reviewed->have_posts()) :
                            while($reviewed->have_posts()) : $reviewed->the_post();
                            ?>
                                    <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php the_title(); ?></h6>
                                            <?php
                                            if ($product->get_regular_price()) {
                                                printf("<span>$%s</span>", $product->get_regular_price());
                                            } else {
                                                printf("<span>Collection</span>");
                                            }
                                            ?>

                                        </div>
                                    </a>

                        <?php                   
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        
                        ?>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
            
            $posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => '3',
                    'post_status' => 'publish',
            ));
            
            if($posts->have_posts()):
                while($posts->have_posts()):$posts->the_post();
            ?>


            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                <img src="<?php echo the_post_thumbnail_url(); ?>" alt="" />
                    </div>
                    <div class="blog__item__text">
                    <ul>
                        <li>
                            <i class="fa fa-calendar-o"></i> 
                            <?php echo get_the_date("F j,Y"); ?>
                        </li>
                            <li><i class="fa fa-comment-o"></i> 
                            <?php comments_number(); ?>
                        </li>
                        </ul>
                        <h5>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                        </h5>                       
                        <p>
                            <?php 
                                if(has_excerpt()){
                                    the_excerpt();
                                }else{                
                                    $content = get_the_content();
                                   echo wp_trim_words($content,15);
                                }
                            
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <?php 
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </div>



        </div>
    </div>
</section>
<!-- Blog Section End -->

<?php get_footer(); ?>