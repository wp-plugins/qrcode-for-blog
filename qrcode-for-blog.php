<?php

/*
  Plugin Name: QR Code For Blog
  Plugin URI: http://www.ninjapress.net/qrcode-for-blog/
  Description: Let's associate every post and page to a Qr Code
  Version: 1.0
  Author: Ninja Press
  Author URI: http://www.ninjapress.net
  License: GPL2
 * 
 */

if (!class_exists('QRCode_For_Blog')) {

   class QRCode_For_Blog {

      /**
       * Construct the plugin object
       */
      public function __construct() {
         // register actions
         add_action('admin_init', array(&$this, 'admin_init'));

         add_filter('manage_pages_columns', array(&$this, 'my_custom_columns'));
         add_action('manage_pages_custom_column', array(&$this, 'custom_column_content'), 10, 2);
         
         add_filter('manage_posts_columns', array(&$this, 'my_custom_columns'));
         add_action('manage_posts_custom_column', array(&$this, 'custom_column_content'), 10, 2);
      }

      /**
       * Activate the plugin
       */
      public static function activate() {
         add_option('qrcode_for_blog_map', array());
      }

      /**
       * Deactivate the plugin
       */
      public static function deactivate() {
         // Do nothing
      }

      public function my_custom_columns($columns) {

         /** Add a Thumbnail Column * */
         $myCustomColumns = array(
             'qrcode' => __('QR Code', 'Aternus')
         );
         return array_merge($columns, $myCustomColumns);
      }

      public function custom_column_content($column_name, $post_id) {

         if ($column_name == 'qrcode') {
            include(sprintf("%s/templates/content.php", dirname(__FILE__)));
         }
      }

      /**
       * hook into WP's admin_init action hook
       */
      public function admin_init() {
      }

   }

}

if (class_exists('QRCode_For_Blog')) {
// Installation and uninstallation hooks
   register_activation_hook(__FILE__, array('QRCode_For_Blog', 'activate'));
   register_deactivation_hook(__FILE__, array('QRCode_For_Blog', 'deactivate'));

// instantiate the plugin class
   $wp_footer_pop_up_banner = new QRCode_For_Blog();

   if (isset($wp_footer_pop_up_banner)) {
   }
}   