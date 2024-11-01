<?php
/*
Plugin Name: WP Responsive Data Image
Description: Plugin allows using of responsive images for different screen resolutions.
Author: Roman Liutikov
Version: 1.1.5
Author URI: http://romanliutikov.com/
Plugin URI: http://wordpress.org/extend/plugins/wp-responsive-data-image/
License: GPL2
*/
/*  Copyright 2012 Roman Liutikov <roman01la@romanliutikov.com>

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
    global $rdi_plugin_dir_path;
    $rdi_plugin_dir_path = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));

    $rdi = '/wp-content/plugins/wp-responsive-data-image/responsive-data-image-1.1.5.min.js';
            function wp_rdi_init(){
                if (!is_admin()){
                    global $rdi;
                    wp_deregister_script('rdi');
                    wp_register_script('rdi', $rdi);
                    wp_enqueue_script('rdi');
                }
            }
            add_action('init', 'wp_rdi_init');

    wp_enqueue_style('rdi_style', $rdi_plugin_dir_path.'/rdi-style.css');

function rdi($atts, $content = null) {
    extract(shortcode_atts(array(
        'align' => 'aligncenter'
    ), $atts));
    return '<a><img class="'.$align.' size-full wp-image rdi-adapted" data-src="'.$content.'"></a><noscript><a href="'.$content.'"><img src="'.$content.'"></a></noscript>';  
}

add_shortcode('rdi', 'rdi');

add_action('init', 'rdi_button');

function rdi_button() {
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
     return;
   }
   if ( get_user_option('rich_editing') == 'true' ) {
     add_filter( 'mce_external_plugins', 'add_plugin' );
     add_filter( 'mce_buttons', 'register_button' );
   }
}

function register_button( $buttons ) {
 array_push( $buttons, "|", "rdi" );
 return $buttons;
}

function add_plugin( $plugin_array ) {
   $plugin_array['rdi'] = WP_CONTENT_URL.'/plugins/wp-responsive-data-image/rdi-btn.js';
   return $plugin_array;
}
?>