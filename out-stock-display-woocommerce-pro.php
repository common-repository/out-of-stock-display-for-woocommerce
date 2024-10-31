<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              wizplugins.com
 * @since             1.0.0
 * @package           Out_Stock_Display_Woocommerce_Pro
 *
 * @wordpress-plugin
 * Plugin Name:       Out of stock display for woocommerce
 * Plugin URI:        wizplugins.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.1
 * Author:            Wiz Plugins
 * Author URI:        wizplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       out-stock-display-woocommerce-pro
 * Domain Path:       /languages
 */
// If this file is called directly, abort.

if ( !function_exists( 'oosdfw_fs' ) ) {
    // Create a helper function for easy SDK access.
    function oosdfw_fs()
    {
        global  $oosdfw_fs ;
        
        if ( !isset( $oosdfw_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $oosdfw_fs = fs_dynamic_init( array(
                'id'             => '3414',
                'slug'           => 'out-of-stock-display-for-woocommerce',
                'type'           => 'plugin',
                'public_key'     => 'pk_26afcbd4001f7069f47b644e9c6d8',
                'is_premium'     => false,
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'   => 'out_of_stock_display_for_woocommerce_pro',
                'parent' => array(
                'slug' => woocommerce,
            ),
            ),
                'is_live'        => true,
            ) );
        }
        
        return $oosdfw_fs;
    }
    
    // Init Freemius.
    oosdfw_fs();
    // Signal that SDK was initiated.
    do_action( 'oosdfw_fs_loaded' );
}

if ( !defined( 'WPINC' ) ) {
    die;
}
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'out_of_stock_display_for_woocommerce_pro', '1.0.1' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-out-stock-display-woocommerce-pro-activator.php
 */
function activate_out_stock_display_woocommerce_pro()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-out-stock-display-woocommerce-pro-activator.php';
    Out_Stock_Display_Woocommerce_Pro_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-out-stock-display-woocommerce-pro-deactivator.php
 */
function deactivate_out_stock_display_woocommerce_pro()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-out-stock-display-woocommerce-pro-deactivator.php';
    Out_Stock_Display_Woocommerce_Pro_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_out_stock_display_woocommerce_pro' );
register_deactivation_hook( __FILE__, 'deactivate_out_stock_display_woocommerce_pro' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-out-stock-display-woocommerce-pro.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_out_stock_display_woocommerce_pro()
{
    $plugin = new Out_Stock_Display_Woocommerce_Pro();
    $plugin->run();
}

run_out_stock_display_woocommerce_pro();
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'oosdfw_pro_add_plugin_page_settings_link' );
function oosdfw_pro_add_plugin_page_settings_link( $links )
{
    $links[] = '<a href="' . admin_url( 'admin.php?page=out_of_stock_display_for_woocommerce_pro' ) . '">' . __( 'Settings' ) . '</a>';
    return $links;
}


if ( !function_exists( 'oosdfw_fs_uninstall_cleanup' ) ) {
    /**
     * Plugin uninstall cleanup.
     *
     * @since 1.0.0
     */
    function oosdfw_fs_uninstall_cleanup()
    {
        // Delete all the plugin options
        delete_option( 'oosdwpro_settings' );
    }
    
    oosdfw_fs()->add_action( 'after_uninstall', 'oosdfw_fs_uninstall_cleanup' );
}
