<?php
//shop page product ajax load
function shop_page_ajax_request() {

    if (isset($_POST['count'])):
        $count = intval($_POST['count']);
        $total_pro = intval($_POST['total_pro']);
        $post_per_pages = intval($_POST['post_per_pages']);
        $shop_add_content = $_POST['shop_add_content'];
        $shop_see_content = $_POST['shop_see_content'];
        $total_count = $count*$post_per_pages;

        if( $total_count >= $total_pro):?> 
         <?php
                
                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => $total_count, // Adjust the number of products to display. Use -1 for all products.                    
                );
                $shop_query = new WP_Query($args);
                if ($shop_query->have_posts()) :
                    while ($shop_query->have_posts()) : $shop_query->the_post();
                    global $product;
                    $product = wc_get_product(get_the_ID()); // Ensure $product is the correct product object
                    ?>

                    <div class="fProduct">
                        <div class="fProducttop">
                           <a href="sProduct.html" class="fProductImg">
                               <img src="<?php $product_filter_img_url = get_the_post_thumbnail_url()?get_the_post_thumbnail_url():(get_template_directory_uri().'/asset/img/products/n1.jpg'); echo $product_filter_img_url; ?>" alt="<?php $product_filter_img_alt = get_the_title()?get_the_title():'Product Image';echo $product_filter_img_alt;?>">
                           </a>
                           <p class="company_name"><?php echo esc_html(get_field('company_name'));?></p>
                           <a class = "fProduct_title" href="sProduct.html"><?php the_title()?></a>
                           <?php 
                           $rating_html = wc_get_rating_html($product->get_average_rating());

                            // Check if rating exists and display it
                            if (!empty($rating_html)) {
                                echo $rating_html;
                            }?>
                           
                        </div>
                        <div class="fProductText_bottom">
                            <h5><?php echo $product->get_price_html(); ?></h5>
                            <?php woocommerce_template_loop_add_to_cart();?>
                            <style>
                                .product_type_simple::after{
                                    content:"<?php echo $shop_add_content?>";
                                }
                                .product_type_variable::after{
                                    content:"<?php echo $shop_see_content?>";
                                }
                            </style>
                        </div>
                    </div>
                <?php 
                    endwhile;
                    wp_reset_postdata(); // Important: Reset query data after the loop 
                ?>
                <?php
                $total_product = $shop_query->found_posts;
                else :
                    echo '<p>No Product</p>';
                endif;?>
            <style> 
                .loadmore{
                    display:none;
                }
            </style>
            
        <?php else: ?>
             <?php
                
                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => $total_count, // Adjust the number of products to display. Use -1 for all products.                    
                );
                $shop_query = new WP_Query($args);
                if ($shop_query->have_posts()) :
                    while ($shop_query->have_posts()) : $shop_query->the_post();
                    global $product;
                    $product = wc_get_product(get_the_ID()); // Ensure $product is the correct product object
                    ?>

                    <div class="fProduct">
                        <div class="fProducttop">
                           <a href="sProduct.html" class="fProductImg">
                               <img src="<?php $product_filter_img_url = get_the_post_thumbnail_url()?get_the_post_thumbnail_url():(get_template_directory_uri().'/asset/img/products/n1.jpg'); echo $product_filter_img_url; ?>" alt="<?php $product_filter_img_alt = get_the_title()?get_the_title():'Product Image';echo $product_filter_img_alt;?>">
                           </a>
                           <p class="company_name"><?php echo esc_html(get_field('company_name'));?></p>
                           <a class = "fProduct_title" href="sProduct.html"><?php the_title()?></a>
                           <?php 
                           $rating_html = wc_get_rating_html($product->get_average_rating());

                            // Check if rating exists and display it
                            if (!empty($rating_html)) {
                                echo $rating_html;
                            }?>
                           
                        </div>
                        <div class="fProductText_bottom">
                            <h5><?php echo $product->get_price_html(); ?></h5>
                            <?php woocommerce_template_loop_add_to_cart();?>
                            <style>
                                .product_type_simple::after{
                                    content:"<?php echo $shop_add_content?>";
                                }
                                .product_type_variable::after{
                                    content:"<?php echo $shop_see_content?>";
                                }
                            </style>
                        </div>
                    </div>
                <?php 
                    endwhile;
                    wp_reset_postdata(); // Important: Reset query data after the loop 
                ?>
                <?php
                $total_product = $shop_query->found_posts;
                else :
                    echo '<p>No Product</p>';
                endif;?>
            <style> 
                .loadmore{
                    display:block;
                }
            </style>

        <?php endif;?>
    <?php else: ?>
        <h1>No count received.</h1>
<?php endif;?>
<?php
    wp_die(); // This is required to terminate immediately and return a proper response
}

// Hooking up our function to wp_ajax_ and wp_ajax_nopriv_ hooks
add_action('wp_ajax_product_load', 'shop_page_ajax_request');
add_action('wp_ajax_nopriv_product_load', 'shop_page_ajax_request');
?>



<?php
//Blog page product ajax load
function blog_page_ajax_request() {

    if (isset($_POST['count'])):
        $count = intval($_POST['count']);
        $total_pro = intval($_POST['total_pro']);
        $post_per_pages = intval($_POST['post_per_pages']);
        $shop_add_content = $_POST['shop_add_content'];
        $shop_see_content = $_POST['shop_see_content'];
        $total_count = $count*$post_per_pages;

        if( $total_count >= $total_pro):?> 
         <?php
                
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => $total_count, // Adjust the number of products to display. Use -1 for all products.                    
                );
                $shop_query = new WP_Query($args);
                if ($shop_query->have_posts()) :
                    while ($shop_query->have_posts()) : $shop_query->the_post();
                    global $product;
                    $product = wc_get_product(get_the_ID()); // Ensure $product is the correct product object
                    ?>

                <div class="singleBlog">
                    <div class="blogImg">
                    <img src="<?php $product_filter_img_url = get_the_post_thumbnail_url()?get_the_post_thumbnail_url():(get_template_directory_uri().'/asset/img/products/n1.jpg'); echo $product_filter_img_url; ?>" alt="<?php $product_filter_img_alt = get_the_title()?get_the_title():'Product Image';echo $product_filter_img_alt;?>">
                        <h2><?php echo get_the_date(); ?></h2>
                    </div>
                    <div class="blogText">
                        <h5><?php the_title(); ?></h5>
                        <div class="blogP">
                            <p><?php the_excerpt()?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>"><?php $blog_continue_reading_text = get_field('blog_continue_reading_text','options')?get_field('blog_continue_reading_text','options'):'continue reading'; echo esc_html($blog_continue_reading_text) ?></a>
                    </div>
                </div>
                <?php 
                    endwhile;
                    wp_reset_postdata(); // Important: Reset query data after the loop 
                ?>
                <?php
                $total_product = $shop_query->found_posts;
                else :
                    echo '<p>No Product</p>';
                endif;?>
            <style> 
                .loadmore{
                    display:none;
                }
            </style>
            
        <?php else: ?>
            <?php
                
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => $total_count, // Adjust the number of products to display. Use -1 for all products.                    
                );
                $shop_query = new WP_Query($args);
                if ($shop_query->have_posts()) :
                    while ($shop_query->have_posts()) : $shop_query->the_post();
                    global $product;
                    $product = wc_get_product(get_the_ID()); // Ensure $product is the correct product object
                    ?>

                <div class="singleBlog">
                    <div class="blogImg">
                    <img src="<?php $product_filter_img_url = get_the_post_thumbnail_url()?get_the_post_thumbnail_url():(get_template_directory_uri().'/asset/img/products/n1.jpg'); echo $product_filter_img_url; ?>" alt="<?php $product_filter_img_alt = get_the_title()?get_the_title():'Product Image';echo $product_filter_img_alt;?>">
                        <h2><?php echo get_the_date(); ?></h2>
                    </div>
                    <div class="blogText">
                        <h5><?php the_title(); ?></h5>
                        <div class="blogP">
                            <p><?php the_excerpt()?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>"><?php $blog_continue_reading_text = get_field('blog_continue_reading_text','options')?get_field('blog_continue_reading_text','options'):'continue reading'; echo esc_html($blog_continue_reading_text) ?></a>
                    </div>
                </div>
                <?php 
                    endwhile;
                    wp_reset_postdata(); // Important: Reset query data after the loop 
                ?>
                <?php
                $total_product = $shop_query->found_posts;
                else :
                    echo '<p>No Product</p>';
                endif;?>
            <style> 
                .loadmore{
                    display:block;
                }
            </style>
        <?php endif;?>
    <?php else: ?>
        <h1>No count received.</h1>
<?php endif;?>
<?php
    wp_die(); // This is required to terminate immediately and return a proper response
}

// Hooking up our function to wp_ajax_ and wp_ajax_nopriv_ hooks
add_action('wp_ajax_blog_load', 'blog_page_ajax_request');
add_action('wp_ajax_nopriv_blog_load', 'blog_page_ajax_request');
?>
