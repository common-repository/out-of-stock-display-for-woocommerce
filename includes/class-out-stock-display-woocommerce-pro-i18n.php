<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       wizplugins.com
 * @since      1.0.0
 *
 * @package    Out_Stock_Display_Woocommerce_Pro
 * @subpackage Out_Stock_Display_Woocommerce_Pro/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Out_Stock_Display_Woocommerce_Pro
 * @subpackage Out_Stock_Display_Woocommerce_Pro/includes
 * @author     Wiz Plugins <hello@wizplugins.com>
 */
class Out_Stock_Display_Woocommerce_Pro_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'out-stock-display-woocommerce-pro',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
