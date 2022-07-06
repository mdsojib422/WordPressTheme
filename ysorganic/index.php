<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage ysorganic
 * @since Ys Organic 1.0
 */
get_header(); ?>
<section class="breadcrumb-section set-bg" style="background-image: url(<?php echo get_field('contact_us_breadcrumb', 'option')['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>
                        <?php echo single_post_title(); ?>
                    </h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo home_url(); ?>">
                            <?php esc_html_e("Home", "ysorganic"); ?>
                        </a>
                        <span><?php single_post_title(); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5yourreith">
                    <?php get_sidebar(); ?>
            </div>
            <div class="col-lg-8 col-md-7">

                <div class="row">
                    <?php
                    if (have_posts()) {

                        // Load posts loop.
                        while (have_posts()) {
                            the_post();

                            get_template_part('template-parts/contents/content', get_theme_mod('display_excerpt_or_full_post', 'excerpt'));
                        }
                    } else {

                        // If no content, include the "No posts found" template.
                        get_template_part('template-parts/contents/content-none');
                    }

                    ?>
                </div>
                <?php 
                    the_posts_pagination(
                        array(
                            "next_text" => '<i class="fa fa-long-arrow-right"></i>',
                            "prev_text" => '<i class="fa fa-long-arrow-left"></i>',
                            'class'=> 'blog__pagination'
                        )
                    );
                
                ?>

            </div>
        </div>
    </div>
</section>


<?php

get_footer();
