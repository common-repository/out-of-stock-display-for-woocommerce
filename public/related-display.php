<?php

// Related below title
add_action( 'woocommerce_single_product_summary', 'woo_out_of_stock_related_products_below_title_pro', 6 );
function woo_out_of_stock_related_products_below_title_pro()
{
    $oosdwpro_settings = get_option( 'oosdwpro_settings' );
    //check to see if settings are enabled. If so return the following functions
    if ( isset( $oosdwpro_settings[oosdwpro_checkbox_field_0] ) == '1' ) {
        // if below title is selected make sure to return results
        
        if ( isset( $oosdwpro_settings[oosdwpro_select_field_1] ) && $oosdwpro_settings[oosdwpro_select_field_1] == '2' ) {
            global  $product ;
            $availability = $product->get_availability();
            /*check if availability in the array = string 'Out of Stock'
            **if so display on page.
            */
            
            if ( $availability['availability'] == 'Out of stock' ) {
                // set a div for styling
                echo  '<div class="oosdwpro-related">' ;
                $oosdwpro_settings = get_option( 'oosdwpro_settings' );
                
                if ( isset( $oosdwpro_settings[oosdwpro_text_field_6] ) && !empty($oosdwpro_settings[oosdwpro_text_field_6]) ) {
                    //create title
                    echo  '<p class="oosdwpro-title">' ;
                    echo  $oosdwpro_settings[oosdwpro_text_field_6] ;
                    echo  '</p>' ;
                }
                
                $oosdwpro_settings = get_option( 'oosdwpro_settings' );
                
                if ( isset( $oosdwpro_settings[oosdwpro_text_field_11] ) && !empty($oosdwpro_settings[oosdwpro_text_field_11]) ) {
                    echo  '<p class="oosdwpro-subtitle">' ;
                    echo  $oosdwpro_settings[oosdwpro_text_field_11] ;
                    echo  '</p>' ;
                }
                
                //Create args to display related products free version
                $args = array(
                    'posts_per_page' => 3,
                    'columns'        => 3,
                    'orderby'        => rand,
                );
                //output results
                echo  '<div class="jo">' ;
                woocommerce_related_products( apply_filters( 'woo_out_of_stock_related_products_args', $args ) );
                echo  '</div>' ;
                echo  '<div class="blow">' ;
                woocommerce_upsell_display( 3, 3 );
                // Display 3 products in rows of 3
                echo  '</div>' ;
            } else {
                return $availability;
            }
            
            ?>
</div>
	
	<?php 
        }
    
    }
}

// Related products above content
add_action( 'woocommerce_before_single_product', 'woo_out_of_stock_related_products_above_content_pro', 6 );
function woo_out_of_stock_related_products_above_content_pro()
{
    $oosdwpro_settings = get_option( 'oosdwpro_settings' );
    if ( isset( $oosdwpro_settings[oosdwpro_checkbox_field_0] ) == '1' ) {
        
        if ( isset( $oosdwpro_settings[oosdwpro_select_field_1] ) && $oosdwpro_settings[oosdwpro_select_field_1] == '1' ) {
            global  $product ;
            $availability = $product->get_availability();
            /*check if availability in the array = string 'Out of Stock'
            **if so display on page.
            */
            
            if ( $availability['availability'] == 'Out of stock' ) {
                // set a div for styling
                echo  '<div class="oosdwpro-related">' ;
                $oosdwpro_settings = get_option( 'oosdwpro_settings' );
                
                if ( isset( $oosdwpro_settings[oosdwpro_text_field_6] ) && !empty($oosdwpro_settings[oosdwpro_text_field_6]) ) {
                    //create title
                    echo  '<p class="oosdwpro-title">' ;
                    echo  $oosdwpro_settings[oosdwpro_text_field_6] ;
                    echo  '</p>' ;
                }
                
                $oosdwpro_settings = get_option( 'oosdwpro_settings' );
                
                if ( isset( $oosdwpro_settings[oosdwpro_text_field_11] ) && !empty($oosdwpro_settings[oosdwpro_text_field_11]) ) {
                    echo  '<p class="oosdwpro-subtitle">' ;
                    echo  $oosdwpro_settings[oosdwpro_text_field_11] ;
                    echo  '</p>' ;
                }
                
                //Create args to display related products free version
                $args = array(
                    'posts_per_page' => 3,
                    'columns'        => 3,
                    'orderby'        => rand,
                );
                //output results
                echo  '<div class="jo">' ;
                woocommerce_related_products( apply_filters( 'woo_out_of_stock_related_products_args', $args ) );
                echo  '</div>' ;
                if ( isset( $oosdwpro_settings[oosdwpro_checkbox_field_5] ) == '1' ) {
                    echo  '<div class="oosdwpro-button"><a class="button visit-shop" href="' . ($shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ) . '">' . $oosdwpro_settings[oosdwpro_text_field_23] . '</a></div>') ;
                }
                echo  '<div class="blow">' ;
                woocommerce_upsell_display( 3, 3 );
                // Display 3 products in rows of 3
                echo  '</div>' ;
            } else {
                return $availability;
            }
            
            ?>
</div>
	
	<?php 
        }
    
    }
}
