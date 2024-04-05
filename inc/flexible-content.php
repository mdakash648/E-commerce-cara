<?php
include('Extra-function.php');
if (have_rows('easy_content')) {
    $j = 1;
    while (have_rows('easy_content')) : the_row(); 
?>

<?php if( get_row_layout() == 'home_banner' ): ?>
    <!-- banner section start:  -->
    <section id="banner">
        <div class="container">
            <div class="banner_text">
                <h4 class="offer"><?php echo esc_html(get_sub_field('banner_offer_title'))?></h4>
                <h2 class="deals"><?php echo esc_html(get_sub_field('banner_deals_title'))?></h2>
                <h1 class="product"><?php echo esc_html(get_sub_field('banner_products_title'));?></h1>
                <div class="banner_ptext">
                    <p><?php echo esc_html(get_sub_field('banner_coupons_text'));?></p>
                </div>
                <?php 
                    $banner_btn_url = get_sub_field('shop_page_link')?get_sub_field('shop_page_link')['url']: '#';
                    $banner_btn_title = get_sub_field('shop_page_link')?get_sub_field('shop_page_link')['title']:'Shop';
                    $banner_img_url = get_sub_field('banner_image')?get_sub_field('banner_image')['url']:(get_template_directory_uri().'/asset/img/banner.png');
                    $banner_img_alt = get_sub_field('banner_image')?get_sub_field('banner_image')['alt']:'Banne Image';
                    
                ?>
                <a href="<?php echo $banner_btn_url;?>"><button class="button"><?php echo $banner_btn_title;?></button></a>
            </div>
            <div class="banner_img">
                <img src="<?php echo $banner_img_url;?>" alt="<?php echo $banner_img_alt?>">
            </div>
        </div>
    </section>
    <!-- feature section start: -->
<?php endif;?>

<?php if( get_row_layout() == 'other_page_banner' ): ?>
        <!-- other Page banner section start: -->
    <section id="shopBanner" style="background-image: url('<?php $other_page_bg = get_sub_field('other_page_bg')?get_sub_field('other_page_bg'):(get_template_directory_uri().'/asset/img/banner/b1.jpg'); echo $other_page_bg; ?>');">
        <div class="container">
            <h2 class="other_banner_title"><?php the_sub_field('other_page_title');?></h2>
            <div class="shopBanner_ptext">
                <p><?php echo esc_html(get_sub_field('other_page_coupons'))?></p>
            </div>
        </div>
    </section>
    <!-- other Page banner section end: -->
<?php endif;?>

<?php if( get_row_layout() == 'feature' ): ?>
    <!-- feature section start: -->
    <section id="Feature" class="sectionMargin">
        <div class="container">
        <?php $fea = 1; if (have_rows('feature_cards')): ?>
            <?php while (have_rows('feature_cards')): the_row(); ?>
        
                <div class="feature_box">
                    <style>
                        .feature_text<?php echo $fea;?>::after, .feature_img<?php echo $fea;?>::after{
                            background:<?php $feature_bd_color = get_sub_field('feature_cards_small_box_color')?get_sub_field('feature_cards_small_box_color'):generateRandomColor(); echo $feature_bd_color; ?>;
                        }
                    </style>
                    <div class="feature_img feature_img<?php echo $fea;?>">
                        <img src="<?php $feature_img_url = get_sub_field('feature_cards_image')?get_sub_field('feature_cards_image')['url']:(get_template_directory_uri().'/asset/img/features/f1.png'); echo $feature_img_url; ?>" alt="<?php $feature_img_alt = get_sub_field('feature_cards_image')?get_sub_field('feature_cards_image')['alt']:'Featuer Card Image'; echo $feature_img_alt; ?>">
                    </div>
                    <div class="feature_text feature_text<?php echo $fea;?>">
                        <h6 class="feature_text_h6"><?php echo esc_html(get_sub_field('feature_cards_title'))?></h6>
                    </div>
                </div>
        
            <?php $fea++; endwhile; ?> 
        <?php endif; ?>

        </div>
    </section>
    <!-- feature product section start -->

<?php endif;?>

<?php if( get_row_layout() == 'product_filter' ): ?>
    <!-- Product Filter Section Start -->
    <section class="sectionPadding newArrival featureProduct">
        <div class="container">
            <div class="featureProductText">
                <h2><?php echo esc_html(get_sub_field('product_filter_title')) ?></h2>
                <p><?php echo esc_html(get_sub_field('product_filter_sub_title')) ?></p>
            </div>
            <div class="allFeatureProduct">

                <?php
                $category_slug =  get_sub_field('product_category')['value']; // Replace 'your-category-slug' with the slug of the category you want to filter by.

                $args = array(
                    'post_type' => 'product',
                    // 'post_status' => 'publish',
                    'posts_per_page' => -1, // Adjust the number of products to display. Use -1 for all products.
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => $category_slug,
                        ),
                    ),
                );
                $project_query = new WP_Query($args);
                if ($project_query->have_posts()) :
                    while ($project_query->have_posts()) : $project_query->the_post();
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
                            </div>
                        </div>
                <?php 
                    endwhile;
                    the_posts_pagination();
                    wp_reset_postdata(); // Important: Reset query data after the loop 
                else :
                    echo '<p>There are no products in'.' '.get_sub_field('product_category')['label'] .' '.'cetagory.</p>';
                endif;
                ?>



            </div>
        </div>
    </section>
    <!-- Product Filter Section Start -->
<?php endif;?>

<?php
    $j++;
    endwhile;
} else {
    echo '<section class="defaultSection"><div class="container">';
    while (have_posts()) : the_post();
    the_content();
    endwhile;
    echo '</div></section>';
}
?>