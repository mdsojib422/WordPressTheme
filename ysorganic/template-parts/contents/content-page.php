<?php
/**
 * @package ysorganic
 */
?>

<article id="page-<?php the_ID(); ?>">
    <div class="entry-content">
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'electro' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>

</article>