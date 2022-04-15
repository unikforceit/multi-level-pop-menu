<?php
/**
 * Plugin Name:       Multi Level Pop Menu Addons
 * Plugin URI:        https://wordpress.org/plugins/multi-level-pop-menu/
 * Description:       Simple elementor addons
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            UnikForce IT
 * Author URI:        https://unikforce.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       multi-level-pop-menu
 * Elementor tested up to:     3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'MultiLevelPopMenu_PLUG_DIR', dirname(__FILE__).'/' );
define('MultiLevelPopMenu_PLUG_URL', plugin_dir_url(__FILE__));

function multi_level_pop_menu_addon() {

    // Load plugin file
    require_once( __DIR__ . '/includes/index.php' );

    // Run the plugin
    \Multi_Level_Pop_Menu\MultiLevelPopMenu::instance();

}
add_action( 'plugins_loaded', 'multi_level_pop_menu_addon' );