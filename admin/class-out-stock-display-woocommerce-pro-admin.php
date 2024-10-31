<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       wizplugins.com
 * @since      1.0.0
 *
 * @package    Out_Stock_Display_Woocommerce_Pro
 * @subpackage Out_Stock_Display_Woocommerce_Pro/admin
 */
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Out_Stock_Display_Woocommerce_Pro
 * @subpackage Out_Stock_Display_Woocommerce_Pro/admin
 * @author     Wiz Plugins <hello@wizplugins.com>
 */
class Out_Stock_Display_Woocommerce_Pro_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private  $plugin_name ;
    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private  $version ;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }
    
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles( $hook )
    {
        if ( 'woocommerce_page_out_of_stock_display_for_woocommerce_pro' != $hook ) {
            return;
        }
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Out_Stock_Display_Woocommerce_Pro_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Out_Stock_Display_Woocommerce_Pro_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'css/out-stock-display-woocommerce-pro-admin.css',
            array(),
            $this->version,
            'all'
        );
    }
    
    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Out_Stock_Display_Woocommerce_Pro_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Out_Stock_Display_Woocommerce_Pro_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        //wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/out-stock-display-woocommerce-pro-admin.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'js/out-stock-display-woocommerce-pro-admin.js',
            array( 'wp-color-picker' ),
            false,
            true
        );
    }

}
add_action( 'admin_menu', 'oosdwpro_add_admin_menu', 67 );
add_action( 'admin_init', 'oosdwpro_settings_init' );
function oosdwpro_add_admin_menu()
{
    add_submenu_page(
        'woocommerce',
        'Out of stock display for woocommerce',
        'Out of stock display',
        'manage_options',
        'out_of_stock_display_for_woocommerce_pro',
        'oosdwpro_options_page'
    );
}

function oosdwpro_settings_init()
{
    register_setting( 'outStockDisplayPro', 'oosdwpro_settings' );
    add_settings_section(
        'oosdwpro_outStockDisplayPro_section',
        __( 'Configure your out of stock display', 'wordpress' ),
        'oosdwpro_settings_section_callback',
        'outStockDisplayPro'
    );
    // Disable everything option
    add_settings_field(
        'oosdwpro_checkbox_field_0',
        __( 'Enable', 'wordpress' ),
        'oosdwpro_checkbox_field_0_render',
        'outStockDisplayPro',
        'oosdwpro_outStockDisplayPro_section'
    );
    // Display related products
    add_settings_field(
        'oosdwpro_checkbox_field_1',
        __( 'Display related products', 'wordpress' ),
        'oosdwpro_checkbox_field_1_render',
        'outStockDisplayPro',
        'oosdwpro_outStockDisplayPro_section'
    );
    // Where to display
    add_settings_field(
        'oosdwpro_select_field_1',
        __( 'Location', 'wordpress' ),
        'oosdwpro_select_field_1_render',
        'outStockDisplayPro',
        'oosdwpro_outStockDisplayPro_section'
    );
    // Title field
    add_settings_field(
        'oosdwpro_text_field_6',
        __( 'Title', 'wordpress' ),
        'oosdwpro_text_field_6_render',
        'outStockDisplayPro',
        'oosdwpro_outStockDisplayPro_section'
    );
    // Subtitle field
    add_settings_field(
        'oosdwpro_text_field_11',
        __( 'Subtitle', 'wordpress' ),
        'oosdwpro_text_field_11_render',
        'outStockDisplayPro',
        'oosdwpro_outStockDisplayPro_section'
    );
}

/*
 * enable all settings checkbox
 */
function oosdwpro_checkbox_field_0_render()
{
    $options = get_option( 'oosdwpro_settings' );
    ?>
	<label  class="switch"><input type='checkbox' name='oosdwpro_settings[oosdwpro_checkbox_field_0]' <?php 
    checked( $options['oosdwpro_checkbox_field_0'], 1 );
    ?> value='1'><span class="slider round"></span></label>
	<?php 
}

/*
 * display related prodycts field
 */
function oosdwpro_checkbox_field_1_render()
{
    $options = get_option( 'oosdwpro_settings' );
    ?>
<label  class="switch"><input type='checkbox' name='oosdwpro_settings[oosdwpro_checkbox_field_1]' class="this" <?php 
    checked( $options['oosdwpro_checkbox_field_1'], 1 );
    ?> value='1'><span class="slider round"></span></label>
	<?php 
}

/*
 * display upsell products field
 */
function oosdwpro_checkbox_field_2_render()
{
    $options = get_option( 'oosdwpro_settings' );
    ?>
<label  class="switch"><input type='checkbox' name='oosdwpro_settings[oosdwpro_checkbox_field_2]' class="this" <?php 
    checked( $options['oosdwpro_checkbox_field_2'], 1 );
    ?> value='1'><span class="slider round"></span></label>
	<?php 
}

/*
 * where to display products
 */
function oosdwpro_select_field_1_render()
{
    $options = get_option( 'oosdwpro_settings' );
    ?>
	<select name='oosdwpro_settings[oosdwpro_select_field_1]'>
		<option value='0' <?php 
    selected( $options['oosdwpro_select_field_1'], 0 );
    ?>> </option>
		<option value='1' <?php 
    selected( $options['oosdwpro_select_field_1'], 1 );
    ?>>Above content</option>
		<option value='2' <?php 
    selected( $options['oosdwpro_select_field_1'], 2 );
    ?>>Below product title</option>
		<?php 
    ?>
	</select>

<?php 
}

/*
 * title
 */
function oosdwpro_text_field_6_render()
{
    $options = get_option( 'oosdwpro_settings' );
    ?>
	<input type="text" name="oosdwpro_settings[oosdwpro_text_field_6]" value="<?php 
    echo  $options["oosdwpro_text_field_6"] ;
    ?>">
	<?php 
}

/*
 * include google fonts for title
 */
include 'oosdwpro.php';
/*
 * subtitle text
 */
function oosdwpro_text_field_11_render()
{
    $options = get_option( 'oosdwpro_settings' );
    ?>
	<input type="text" name="oosdwpro_settings[oosdwpro_text_field_11]" value="<?php 
    echo  $options["oosdwpro_text_field_11"] ;
    ?>">
	<?php 
}

function oosdwpro_settings_section_callback()
{
    echo  __( ' ', 'wordpress' ) ;
}

function oosdwpro_options_page()
{
    ?>
	<form action='options.php' method='post'>

		<h2>Out of stock display for woocommerce</h2>

		<?php 
    settings_fields( 'outStockDisplayPro' );
    do_settings_sections( 'outStockDisplayPro' );
    submit_button();
    ?>

	</form>
	<?php 
}
