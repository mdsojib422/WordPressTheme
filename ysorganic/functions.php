<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage ysorganic
 * @since Ys Organic 1.0
 */


 /* Repeated fucntion with const */

 define("YSORGA_DIR",get_template_directory_uri());
 define("YSORGA_PATH",get_template_directory());
 define("YSORGA_VERSION",wp_get_theme()->get( 'Version' ));


 /* Include Files */

 if(file_exists(YSORGA_PATH.'/inc/enqueue.php')){
     require_once(YSORGA_PATH.'/inc/enqueue.php');
 }
 if(file_exists(YSORGA_PATH.'/inc/setup-theme.php')){
     require_once(YSORGA_PATH.'/inc/setup-theme.php');
 }
 if(file_exists(YSORGA_PATH.'/inc/acf.php')){
     require_once(YSORGA_PATH.'/inc/acf.php');
 }
 if(file_exists(YSORGA_PATH.'/inc/woo.php')){
     require_once(YSORGA_PATH.'/inc/woo.php');
 }


 function ysorga_submenu_class( $classes ) {
    $classes[] = 'header__menu__dropdown';
    return $classes;
}
add_filter( 'nav_menu_submenu_css_class','ysorga_submenu_class' );

function special_nav_class ($classes) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 1);

