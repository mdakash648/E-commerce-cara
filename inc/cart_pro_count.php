<?php 
function get_cart_count() {
    if ( function_exists( 'WC' ) ) {
        echo WC()->cart->get_cart_contents_count();
    } else {
        echo '0';
    }
    wp_die(); // This is required to terminate immediately and return a proper response
}

// Adding AJAX actions for logged-in and logged-out users
add_action( 'wp_ajax_nopriv_get_cart_count', 'get_cart_count' );
add_action( 'wp_ajax_get_cart_count', 'get_cart_count' );
?>