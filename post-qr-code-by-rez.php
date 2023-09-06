<?php
/*
* Plugin Name: Post Qr Code  By Rez
* Description: Show Your Post Qr Code.
* Version: 1.0.
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Rezwanul Haque
* Text Domain:pqc-by-rez
* Domain Path: /languages
*/
// Exit if accessed directly
if (!defined('ABSPATH')) {
   exit;
}

add_action('plugin_loaded', 'pqc_loadtextdomain');
function pqc_loadtextdomain()
{
   load_plugin_textdomain('pqc-by-rez', false, dirname(__FILE__) . "/languages");
}


// ?###### adding qr code after the post ######
require_once(plugin_dir_path(__FILE__) . '/includes/add_qr_code.php');


// ?###### adding shortcode after the post ######
require_once(plugin_dir_path(__FILE__) . '/includes/short_code.php');

// ?###### adding controls ######
require_once(plugin_dir_path(__FILE__) . '/includes/controls.php');

// ?###### adding shortcode after the post ######
require_once(plugin_dir_path(__FILE__) . '/includes/leaflet_map_shortcode.php');