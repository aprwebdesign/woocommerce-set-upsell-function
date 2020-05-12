<?php

//Edit the a function of someone else to fit my needs
// Source: https://stackoverflow.com/questions/53021637/replace-upsells-with-products-from-a-specific-product-category-in-woocommerce-3

add_filter( 'woocommerce_product_get_upsell_ids', 'custom_upsell_ids', 10858, 10859, 10860 );
function custom_upsell_ids( $upsell_ids, $product ){

if ( has_term( array( 'add array here of all category slugs to target'), 'product_cat' ) ) {

    // Return the custom query
    return wc_get_products( array(
        'status'    => 'publish', // published products
        'limit'     => 3, // 4 products
		'include' => array( 10860, 10859, 10858 ),
       'order' => 'ASC',
        'exclude'   => array( $product->get_id() ), // Exclude current product
        'return'    => 'ids', // Query returns only IDs
    ) );
	}
}
