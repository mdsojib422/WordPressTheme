<?php
/* 
Template Name: Contact
*/
get_header();
?>
<section class="breadcrumb-section set-bg"
    style="background-image: url(<?php echo get_field("contact_us_breadcrumb", "options")['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?php the_title(); ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo home_url(); ?>">
                            <?php esc_html_e("Home", "ysorganic"); ?>
                        </a>
                        <span><?php the_title(); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact spad">
    <div class="container">
        <div class="row">
            <?php
            $contacttext = get_field("contact_content", "options");
            if ($contacttext) :
                foreach ($contacttext as $text) :
            ?>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span>
                        <?php echo $text['icons']; ?>
                    </span>
                    <h4><?php echo $text['headings']; ?></h4>
                    <p><?php echo $text['description']; ?></p>
                </div>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
<div class="map">
    <?php
    echo get_field("google_map", "option");
    ?>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4><?php echo get_field("location_text", "option")['location_name']; ?></h4>
            <ul>
                <li> <?php echo get_field("location_text", "option")['phone_number']; ?></li>
                <li> <?php echo get_field("location_text", "option")['address_text']; ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2><?php echo get_field("location_text", "option")['leave_message']; ?></h2>
                </div>
            </div>
        </div>
        <?php
        echo do_shortcode('[contact-form-7 id="194" title="Contact Form"]');
        ?>
    </div>
</div>
<?php
get_footer();