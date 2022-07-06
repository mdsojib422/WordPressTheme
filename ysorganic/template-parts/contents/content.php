<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage ysorganic
 * @since Ys Organic 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(['col-md-6']) ?>>
    <div class="blog__item">
        <div class="blog__item__pic">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
        </div>
        <div class="blog__item__text">
            <ul>
                <li><i class="fa fa-calendar-o"></i><?php echo "  ".get_the_date("F j, Y"); ?></li>
                <li><i class="fa fa-comment-o"></i><?php comments_number(); ?></li>
            </ul>
            <h5><a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a></h5>
            <p>
                <?php 
                    if(has_excerpt()){
                        the_excerpt();
                    }else{
                        $content = get_the_content();
                        echo wp_trim_words($content, 15);
                    }
                ?>
            </p>
            <a href="<?php the_permalink(); ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
        </div>
    </div>
</article>