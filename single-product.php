<?php get_header();?>
<?php
$product_id = get_the_ID(); // Get the current product ID. Replace with a specific product ID if necessary.
$product = wc_get_product($product_id); // Get the product object

$attachment_ids = $product->get_gallery_image_ids(); // Get all gallery image IDs

if ($attachment_ids && $product->get_image_id()) {
    foreach ($attachment_ids as $attachment_id) {
        // You can use wp_get_attachment_url() to get the full image URL
        $image_url = wp_get_attachment_url($attachment_id);
        
        // Display the image URL within an <img> tag
        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) . '">';
    }
}

?>
<?php get_footer();?>