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
                $category_slug =  get_sub_field('product_category')->slug; // Replace 'your-category-slug' with the slug of the category you want to filter by.

                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => get_sub_field('product_posts_per_page'), // Adjust the number of products to display. Use -1 for all products.
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
                                <style>
                                    .product_type_simple::after{
                                        content:"<?php echo esc_html(get_sub_field('product_filter_add_content'))?>";
                                    }
                                    .product_type_variable::after{
                                        content:"<?php echo esc_html(get_sub_field('product_filter_see_content'))?>";
                                    }
                                </style>
                            </div>
                        </div>
                <?php 
                    endwhile;
                    the_posts_pagination();
                    wp_reset_postdata(); // Important: Reset query data after the loop 
                else :
                    echo '<p>There are no products in'.' '.get_sub_field('product_category')->name .' '.'cetagory.</p>';
                endif;
                ?>



            </div>
        </div>
    </section>
    <!-- Product Filter Section Start -->
<?php endif;?>
<?php if( get_row_layout() == 'repair_services' ): ?>
    <?php 
        $repair_btn_url = get_sub_field('repair_services_button')?get_sub_field('repair_services_button')['url']:'#';
        $repair_btn_title = get_sub_field('repair_services_button')?get_sub_field('repair_services_button')['title']:'explore more';
        $repair_btn_target = get_sub_field('repair_services_button')?get_sub_field('repair_services_button')['target']:'_self';
    ?>
    <!-- discount section starat -->
    <section id="discount" class="sectionPadding" style="background-image: url('<?php $repair_bd_img= get_sub_field('repair_services_bg_img')?get_sub_field('repair_services_bg_img'):(get_template_directory_uri().'/asset/img/banner/b2.jpg');echo esc_html($repair_bd_img);?>');">
        <div class="container">
            <p><?php echo esc_html(get_sub_field('repair_services_title'))?></p>
            <h2><?php echo get_sub_field('repair_services_discount_title')?></h2>
            <a href="<?php echo  esc_html($repair_btn_url)?>" target="<?php echo  esc_html($repair_btn_target)?>"><button><?php echo  esc_html($repair_btn_title)?></button></a>
        </div>
    </section>
    
<?php endif;?>

<?php if( get_row_layout() == 'offer_up_comming' ): ?>
    <?php if (have_rows('offer_up_comming_card')): ?>
        <!-- Offer&Upcomming section -->
        <section id="OfferUpcomming" class="sectionPadding">
            <div class="container">
                <?php while (have_rows('offer_up_comming_card')): the_row(); ?>
                    <div class="Offer" style="background-image: url('<?php $offer_up_bg = get_sub_field('offer_up_comming_card_bg_img')?get_sub_field('offer_up_comming_card_bg_img'):(get_template_directory_uri().'/asset/img/banner/b17.jpg'); echo $offer_up_bg;?>');">
                        <h5><?php echo esc_html(get_sub_field('offer_up_comming_card_1st_title'))?></h5>
                        <h3><?php echo esc_html(get_sub_field('offer_up_comming_card_2nd_title'))?></h3>
                        <div class="oDescription">
                            <p><?php echo esc_html(get_sub_field('offer_up_comming_card_3rd_title'))?></p>
                        </div>
                        <?php 
                        $offer_up_btn_url = get_sub_field('offer_up_comming_card_button')?get_sub_field('offer_up_comming_card_button')['url']:'#';
                        $offer_up_btn_title = get_sub_field('offer_up_comming_card_button')?get_sub_field('offer_up_comming_card_button')['title']:'learn more';
                        $offer_up_btn_target = get_sub_field('offer_up_comming_card_button')?get_sub_field('offer_up_comming_card_button')['target']:'_self';
                        ?>
                        <a href="<?php echo $offer_up_btn_url?>" target="<?php echo $offer_up_btn_target?>"><button><?php echo $offer_up_btn_title?></button></a>
                    </div>
                <?php endwhile; ?> 
            </div>
        </section>
    <?php endif; ?>
<?php endif;?>
<?php if( get_row_layout() == 'collection' ): ?>
    <?php if (have_rows('collection_card')): ?>
        <!-- Collection  section start:  -->
    <section id="collection">
        <div class="container">
            <?php $conll_card_cont = 0; while (have_rows('collection_card')): the_row(); ?>
                <div class="collectionMain">
                    <div class="collectionbox" style="background-image: url('<?php $collectionbox_img = get_sub_field('collection_card_background_image')?get_sub_field('collection_card_background_image'):(get_template_directory_uri().'/asset/img/banner/b7.jpg');echo $collectionbox_img;?>');">
                        <h4><?php echo esc_html(get_sub_field('collection_card_title'))?></h4>
                        <h6><?php echo esc_html(get_sub_field('collection_card_sub_title'))?></h6>
                    </div>
                </div>
            <?php $conll_card_cont++; endwhile; ?> 
            <?php if($conll_card_cont > 1 && $conll_card_cont < 5):?>
                <style>
                    .collectionMain{
                        --min-1200-width:<?php echo 100/$conll_card_cont;?>%;
                    }
                </style>
            <?php elseif($conll_card_cont == 1):?>
                <style>
                    .collectionMain{
                        --min-1200-width:50%;
                    }
                </style>
            <?php else:?>
                <style>
                    .collectionMain{
                        --min-1200-width:25%;
                    }
                </style>
            <?php endif;?>
        </div>
    </section>
    <?php endif; ?>
<?php endif;?>

<?php if( get_row_layout() == 'shop' ): ?>
    <!-- Product Filter Section Start -->
    <section class="sectionPadding newArrival featureProduct">
        <div class="container">
            <div class="allFeatureProduct">

                <?php
                $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1; // Step 2: Get current page number.
                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => 12, // Adjust the number of products to display. Use -1 for all products.
                    'paged' => $paged, // Include the current page.
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
                                <style>
                                    .product_type_simple::after{
                                        content:"<?php echo esc_html('Simple Product')?>";
                                    }
                                    .product_type_variable::after{
                                        content:"<?php echo esc_html('Variavle Product')?>";
                                    }
                                </style>
                            </div>
                        </div>
                <?php 
                    endwhile;
                      // Step 3: Display pagination links.
                $big = 999999999; // Need an unlikely integer.
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $project_query->max_num_pages,
                ));
                    wp_reset_postdata(); // Important: Reset query data after the loop 
                else :
                    echo '<p>No Product</p>';
                endif;?>
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