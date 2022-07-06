<?php
if (post_password_required()) : ?>
    <p class="nocomments container">
        <?php esc_html_e('This post is password protected. Enter the password to view comments.', 'ysorganic'); ?>
    </p>
<?php
    return;
endif;
?>

<!-- You can start editing here. -->
<section id="commnet_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (have_comments() && !empty($comments_by_type['comment'])) : ?>
                    <h1 id="comments" class="page_title">
                        <?php comments_number(esc_html__('0 Comments', 'ysorganic'), esc_html__('1 Comment', 'ysorganic'), '% ' . esc_html__('Comments', 'ysorganic')); ?>
                    </h1>
                <?php endif; ?>


                <?php if (have_comments()) : ?>
                    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? 
                    ?>
                        <div class="comment_navigation_top clearfix">
                            <div class="nav-previous">
                                <?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older Comments', 'ysorganic')); ?></div>
                            <div class="nav-next"><?php next_comments_link(__('Newer Comments <span class="meta-nav">&rarr;</span>', 'ysorganic')); ?></div>
                        </div> <!-- .navigation -->
                    <?php endif; // check for comment navigation 
                    ?>

                    <?php if (!empty($comments_by_type['comment'])) : ?>
                        <ol class="commentlist clearfix">
                            <?php wp_list_comments(array('type' => 'comment', 'callback' => 'et_custom_comments_display')); ?>
                        </ol>
                    <?php endif; ?>

                    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? 
                    ?>
                        <div class="comment_navigation_bottom clearfix">
                            <div class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older Comments', 'ysorganic')); ?></div>
                            <div class="nav-next"><?php next_comments_link(__('Newer Comments <span class="meta-nav">&rarr;</span>', 'ysorganic')); ?></div>
                        </div> <!-- .navigation -->
                    <?php endif; // check for comment navigation 
                    ?>

                    <?php if (!empty($comments_by_type['pings'])) : ?>
                        <div id="trackbacks">
                            <h3 id="trackbacks-title"><?php esc_html_e('Trackbacks/Pingbacks', 'ysorganic'); ?></h3>
                            <ol class="pinglist">
                                <?php wp_list_comments('type=pings&callback=et_list_pings'); ?>
                            </ol>
                        </div>
                    <?php endif; ?>
                <?php else : // this is displayed if there are no comments so far 
                ?>
                    <div id="comment-section" class="nocomments">
                        <?php if ('open' === $post->comment_status) : ?>
                            <!-- If comments are open, but there are no comments. -->

                        <?php else : // comments are closed 
                        ?>
                            <!-- If comments are closed. -->

                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ('open' === $post->comment_status) : ?>  
                    <?php 
                    $args = array(
                        'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Message" spellcheck="false"></textarea></p>',

                        'fields' => array(
                            "author" => '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="Name*..." size="30" aria-required="true""></p>',
                            "email" => '<p class="comment-form-email"><input id="email" name="email" type="email" placeholder="Email*..." size="30" aria-required="true""></p>',
                            "url" => '<p class="comment-form-website"><input id="website" name="website" type="url" placeholder="Website*..." size="30" aria-required="true""></p>',
                        ),
                        'label_submit' => esc_html__("Send", "ysorganic"),


                    );
                        
                        comment_form($args); 
                    ?>
                <?php else : ?>

                <?php endif; // if you delete this the sky will fall on your head 
                ?>
            </div>
        </div>
    </div>
</section>