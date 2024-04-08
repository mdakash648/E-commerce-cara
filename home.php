<?php get_header()?>
<style>
    img{
        width: 100px;
    }
</style>
<div class="container">
<?php
//All Product Display
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1, // Adjust the number of products to display. Use -1 for all products.
);
$project_query = new WP_Query($args);

if ($project_query->have_posts()) :
    while ($project_query->have_posts()) : $project_query->the_post();
        global $product;
        $product = wc_get_product(get_the_ID()); // Ensure $product is the correct product object
        ?>

        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        <h3><?php the_field('company_name'); ?></h3>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div>
            <?php echo $product->get_price_html(); ?>
        </div>
        <?php woocommerce_template_loop_add_to_cart(); ?>
        
<?php 
    endwhile;
    the_posts_pagination();
    wp_reset_postdata(); // Important: Reset query data after the loop
else :
    echo '<p>There are no products to display.</p>';
endif;
?>
</div>
<?php get_footer()?>