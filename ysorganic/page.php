<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ysorganic
 */
 get_header();
?>
<section id="primary" class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <main id="main" class="site-main">
                <?php 
                while ( have_posts() ) : the_post(); 
                    do_action('ysorganic_page_before');
                    get_template_part( 'template-parts/contents/content', 'page' );                    
                    do_action('ysorganic_page_after');

                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>
<?php
 get_footer();