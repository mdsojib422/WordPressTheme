<?php 


if(!function_exists("ysorga_setup_theme")){
    function ysorga_setup_theme(){
        add_theme_support("custom-logo");

        
        register_sidebar(array(
                'name' => 'Footer Sidebar',
                'id' => 'footer-sidebar',
                'before_title' => '<h6>',
                'after_title' => '</h6>',
                'after_widget' => '</div>',
                'before_widget' => '<div class="footer__widget">',
        ));
        register_sidebar(array(
                'name' => 'Footer RightSide',
                'id' => 'footer-rightbar',
                'before_title' => '<h6>',
                'after_title' => '</h6>',
                'after_widget' => '',
                'before_widget' => '',
        ));

        add_theme_support('woocommerce'); 
        register_nav_menu("primary-menu","Primary Menu");

 
    }
    add_action("after_setup_theme","ysorga_setup_theme");
}