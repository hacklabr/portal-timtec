<?php 
/**
 * Plugin Name: Facebook Feed
 * Plugin URI: http://webriti.com
 * Description: The Facebook Feed Plugins lets you add FaceBook feed to your wordpress website
 * Version: 1.4.2
 * Author: a.ankit , priyanshu.mittal
 * Author URI: http://webriti.com
 * License:  GPL2
 */

add_action('admin_menu', 'add_wff_menu_page');

function add_wff_menu_page()
{
add_menu_page( 'wff_settings_page', 'Webriti Facebook Feed', 'administrator', 'wff_setting','create_wff_setting_page',''); 
 }
 
 function create_wff_setting_page()
{
 require_once('facebook-feed-settings.php');
}


add_action( 'admin_enqueue_scripts', 'wff_load_custom_wp_admin_style' ); 
 
 function wff_load_custom_wp_admin_style($hook) {
   if ($hook != 'toplevel_page_wff_setting'){return;} // we dont want to load our css on other pages
        wp_register_style ('wff_custom_wp_admin_css', plugins_url('css/wff-admin.css', __FILE__));
        wp_enqueue_style( 'wff_custom_wp_admin_css' );
         wp_enqueue_style( 'wp-color-picker' ); // here we add the color picker style for use in our plugin
     
}

 function wff_load_custom_wp_admin_scripts($hook) {
  
  
  if ($hook != 'toplevel_page_wff_setting'){return;} // we dont want to load our js on other pages
  
  wp_register_script( 'wff_custom_wp_admin_js', plugin_dir_url( __FILE__ ) . 'js/my-custom.js',array('jquery','jquery-ui-core','jquery-ui-tabs','wp-color-picker'), false, '1.0.0' );
 wp_enqueue_script ('wff_custom_wp_admin_js');

       
}
add_action( 'admin_enqueue_scripts', 'wff_load_custom_wp_admin_scripts' );
 
 
 
 
 
 
  require_once('facebook-feed-shortcode.php');
 
?>