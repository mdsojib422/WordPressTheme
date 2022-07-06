<?php
/**
 * The template for displaying search results pages.
 */

get_header(); ?>
<section class="breadcrumb-section set-bg"
    style="background-image: url(<?php echo get_field("contact_us_breadcrumb", "options")['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2> <?php esc_html_e("Search Results For: ");  the_search_query(); ?>
                    </h2>
                    <div class="breadcrumb__option">
                        <a href="http://localhost/ys_organic">
                            Home </a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="search_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-5">
                <div id="content_box">
                    <div class="search_box_wrapper w-50 m-auto">
                        <?php get_search_form(); ?>
                    </div>

                    <?php if(have_posts()): ?>
                    <?php endif; ?>
                    <div class="row">
                        <?php $j = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php 						
                    get_template_part("template-parts/contents/content");
                    ?>
                        <?php endwhile; else: ?>
                    </div>
                    <div class="no-results">
                        <h1 class="text-center"><?php
							$keyword = "<span class='text-danger'>".get_search_query() . "</span>";
						echo __("No Results For: $keyword","ysorganic"); ?></h1>
                        <h4 class="text-center">
                            <?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.', 'ysorganic' ); ?>
                        </h4>
                    </div>
                    <!--noResults-->
                    <?php endif; ?>
                    <?php if ( $j !== 0 ) { // No pagination if there is no posts ?>
                    <?php echo get_the_posts_pagination(); ?>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>