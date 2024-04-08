<?php
add_filter('woocommerce_product_add_to_cart_text', 'customize_add_to_cart_button_text', 10, 2);

function customize_add_to_cart_button_text($text, $product) {
    // You can use conditionals to change the text based on product properties
    if ($product->is_type('simple')) {
        return __('', 'cara'); // Change text for simple products
    } else if ($product->is_type('variable')) {
        return __('Select Options', 'cara'); // Change text for variable products
    }

    // Default button text for other types of products
    return __('Add to Basket', 'cara');
}


add_filter( 'woocommerce_product_add_to_cart_text', 'custom_select_options_text', 10, 2 );

function custom_select_options_text( $text, $product ) {
    if ( $product->is_type( 'variable' ) ) {
        $text = __('', 'woocommerce');
    }
    return $text;
}
?>
