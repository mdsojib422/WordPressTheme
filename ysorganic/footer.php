<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="<?php home_url(); ?>">
                            <?php the_custom_logo(); ?>
                        </a>
                    </div>
                    <ul>
                        <?php

                        $ftcontent = get_field("right_side", 'option');

                        ?>

                        <li><?php echo $ftcontent['address']; ?></li>
                        <li><?php echo $ftcontent['phone']; ?></li>
                        <li><?php echo $ftcontent['email']; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <?php
                if (function_exists(dynamic_sidebar())); {
                    dynamic_sidebar('footer-sidebar');
                }

                ?>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <?php
                    if (function_exists(dynamic_sidebar())); {
                        dynamic_sidebar('footer-rightbar');
                    }

                    ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            <?php
                            the_field('copy_right', 'option');
                            ?>
                        </p>
                    </div>
                    <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<?php wp_footer(); ?>
</body>

</html>