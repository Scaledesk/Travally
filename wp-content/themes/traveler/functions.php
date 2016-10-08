<?php
    /**
 * @package WordPress
 * @subpackage Traveler
 * @since 1.0
 *
 * function
 *
 * Created by ShineTheme
 *
 */

if(!defined('ST_TEXTDOMAIN'))
define ('ST_TEXTDOMAIN','traveler');

if(!defined('ST_TRAVELER_VERSION'))
define ('ST_TRAVELER_VERSION','1.1.9');

$status=load_theme_textdomain(ST_TEXTDOMAIN,get_template_directory().'/language');

get_template_part('inc/class.traveler');

st();
get_template_part('demo/demo_functions'); 


add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Complete Program' );		// Rename the description tab

	$tabs['additional_information']['title'] = __( 'Hotels Information' );	// Rename the additional information tab

	return $tabs;

}


/*
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab'] = array(
		'title' 	=> __( 'Highlights', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;

}
function woo_new_product_tab_content() {

	// The new tab content

	echo '<h2>Highlights</h2>';
	echo '<p>Ÿ Tajmahal.<br>
Ÿ Boat ride in Varanasi.<br>
Ÿ Elephant ride in Jaipur.<br>
Ÿ Boat ride in Udaipur.<br>
Ÿ Eklingji & Nagda<br>
Ÿ Chittorgarh Fort<br>
Ÿ Dinner with an Indian Family in Agra (optional).<br></p>';
	
}
*/
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab'] = array(
		'title' 	=> __( 'HOTELS', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;

}
function woo_new_product_tab_content() {

	// The new tab content

	echo '<h2>HOTELS</h2>';
        echo '<img src="http://unsplash.com/photos/iPrASCMwBKE/download" alt="hotel" height="42" width="42">';
	echo '<p>Hotel description</p>';
	
}
