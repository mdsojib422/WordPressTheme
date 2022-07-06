<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage ysorganic
 * @since Ys Organic 1.0
 */
?>
<section class="blog-details-hero set-bg" style="background-image: url(<?php echo get_field("contact_us_breadcrumb", "options")['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2><?php the_title(); ?></h2>
                    <ul>
                        <li><?php esc_html_e('By ', 'ysorganic');
                            the_author(); ?></li>
                        <li><?php the_date(); ?></li>
                        <li><?php comments_number(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <?php
                    if (is_active_sidebar("blog-sidebar")){
                        dynamic_sidebar('blog-sidebar');
                    }?>
                </div>

            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <?php echo get_the_post_thumbnail(get_the_ID(), "single_post_thumb"); ?>
                    <?php the_content(); ?>
                </div>
                <div class="blog__details__content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                </div>
                                <div class="blog__details__author__text">
                                    <h6><?php the_author(); ?></h6>
                                    <span>
                                        <?php
                                        $authorID = get_the_author_meta('ID');
                                        $theAuthorDataRoles = get_userdata($authorID);
                                        $theRolesAuthor = $theAuthorDataRoles->roles;
                                        echo ucwords($theRolesAuthor[0]);
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <ul>
                                    <li>
                                        <span>
                                            <?php esc_html_e("Categories", "ysorganic") ?>:
                                        </span>

                                        <?php
                                        $i = 1;
                                        $cats = get_the_category();
                                        foreach ($cats as $cat) {
                                            echo $cat->name;
                                            echo ($i < count($cats)) ? ' ,' : " ";
                                            $i++;
                                        }
                                        ?>
                                         </li>
                                    <li>
                                        <span><?php esc_html_e("Tags", "ysorganic"); ?>:</span>
                                        <?php
                                        $i = 1;
                                        $tags = get_the_tags();
                                        foreach ($tags as $tag) {
                                            echo $tag->name;
                                            echo ($i < count($tags)) ? " ," : " ";
                                            $i++;
                                        }
                                        ?>
                                    </li>
                                </ul>
                                <div class="blog__details__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>