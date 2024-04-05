<?php
function update_acf_category_choices( $field ) {

// Clear existing choices (important for removing deleted categories)
$field['choices'] = array();

// Get WooCommerce product categories
$categories = get_terms( array( 'taxonomy' => 'product_cat', 'hide_empty' => false ) );

// Build choices array for ACF
if ( $categories ) {
    foreach ( $categories as $category ) {
        $field['choices'][ $category->slug ] = $category->name; 
    }
}

return $field;
}

// Hook into ACF, specify your field name 
add_filter('acf/load_field/name=product_category', 'update_acf_category_choices');