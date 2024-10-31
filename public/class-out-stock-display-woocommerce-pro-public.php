<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       wizplugins.com
 * @since      1.0.0
 *
 * @package    Out_Stock_Display_Woocommerce_Pro
 * @subpackage Out_Stock_Display_Woocommerce_Pro/public
 */
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Out_Stock_Display_Woocommerce_Pro
 * @subpackage Out_Stock_Display_Woocommerce_Pro/public
 * @author     Wiz Plugins <hello@wizplugins.com>
 */
class Out_Stock_Display_Woocommerce_Pro_Public
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
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }
    
    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
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
        wp_enqueue_style(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'css/out-stock-display-woocommerce-pro-public.css',
            array(),
            $this->version,
            'all'
        );
        wp_enqueue_style( 'out-stock-display-woocommerce-pro-public', plugins_url( 'public/css/out-stock-display-woocommerce-pro-public.css', dirname( __FILE__ ) ) );
    }
    
    /**
     * Register the JavaScript for the public-facing side of the site.
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
        wp_enqueue_script(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'js/out-stock-display-woocommerce-pro-public.js',
            array( 'jquery' ),
            $this->version,
            false
        );
    }

}
// add fontawesome to head
add_action( 'wp_head', 'oosdfw_fontawesome' );
function oosdfw_fontawesome()
{
    echo  '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/solid.css" integrity="sha384-r/k8YTFqmlOaqRkZuSiE9trsrDXkh07mRaoGBMoDcmA58OHILZPsk29i2BsFng1B" crossorigin="anonymous">' ;
    echo  '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/regular.css" integrity="sha384-IG162Tfx2WTn//TRUi9ahZHsz47lNKzYOp0b6Vv8qltVlPkub2yj9TVwzNck6GEF" crossorigin="anonymous">' ;
    echo  '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/brands.css" integrity="sha384-BKw0P+CQz9xmby+uplDwp82Py8x1xtYPK3ORn/ZSoe6Dk3ETP59WCDnX+fI1XCKK" crossorigin="anonymous">' ;
    echo  '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/fontawesome.css" integrity="sha384-4aon80D8rXCGx9ayDt85LbyUHeMWd3UiBaWliBlJ53yzm9hqN21A+o1pqoyK04h+" crossorigin="anonymous">' ;
}

include 'related-display.php';
// 1 column on mobile
add_action( 'wp_head', 'oosdwpro_one_columns_mobile_head' );
function oosdwpro_one_columns_mobile_head()
{
    $oosdwpro_settings = get_option( 'oosdwpro_settings' );
    if ( $oosdwpro_settings[oosdwpro_select_field_6] == 1 ) {
        ?>
<style type="text/css">
@media only screen and (max-width:600px) {	
	.jo ul.products.columns-5, .blow ul.products.columns-5, .jo ul.products.columns-4, .blow ul.products.columns-4, .jo ul.products.columns-3, .blow ul.products.columns-3, .jo ul.products.columns-2, .blow ul.products.columns-2, .oosdwpro-modal-overlay ul.products.columns-5, .oosdwpro-modal-overlay ul.products.columns-4, .oosdwpro-modal-overlay ul.products.columns-3, .oosdwpro-modal-overlay ul.products.columns-2 {
    display: flex;
    overflow-x: scroll;
    -webkit-overflow-scrolling: touch;
    scroll-snap-points-x: repeat(100%);
    scroll-snap-type: x mandatory;
}
.jo li.product, .blow li.product, .oosdwpro-modal-overlay li.product {
    width: 100%; 
    flex-shrink: 0;
    height: auto;
	margin-bottom: 20px !important;
	scroll-snap-align: start;
	scroll-snap-align: center;
}
}
</style>
<?php 
    }
}
