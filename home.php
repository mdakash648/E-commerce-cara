<?php get_header()?>


<!-- other Page banner section start: -->
<section id="shopBanner" style="background-image: url('<?php $blog_banner_bg_img = get_field('blog_banner_bg_img','options')?get_field('blog_banner_bg_img','options'):(get_template_directory_uri().'/asset/img/banner/b1.jpg'); echo $blog_banner_bg_img; ?>');">
    <div class="container">
        <h2 class="other_banner_title"><?php the_field('blog_banner_title','options');?></h2>
        <div class="shopBanner_ptext">
            <p><?php echo esc_html(get_field('blog_banner_sub_title','options'))?></p>
        </div>
    </div>
</section>
<!-- other Page banner section end: -->


<!-- blog section start: -->
<section id="blog" class="sectionPadding">
    <div class="container">
        <div class="mainBolgPart">
    <audio src="1.mp3"></audio>
            <?php
            $post_per_pages = get_field('blog_post_per_pages', 'options');
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $post_per_pages, // Adjust the number of products to display. Use -1 for all products.                    
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
        </div>
        <div id="loading"></div>
        <div class="loadmore_main"><div class="loadmore"><?php $blog_load_more_button_text = get_field('blog_load_more_button_text','options')?get_field('blog_load_more_button_text','options'):'load more'; echo esc_html($blog_load_more_button_text) ?></div></div>
    </div>
</section>
<script>

    // // JavaScript to handle clicks and count
    let count = 1; // Initialize counter

    document.querySelector('.loadmore').addEventListener('click', function() {
    count++; // Increment counter
    });


    jQuery(document).ready(function ($) {
        $(".loadmore").click(function() {
            // Show loading message
            $('#loading').css('display', 'block');
            // $('#loading').html('Content is loading');
            let ajaxData = {
                'action': 'blog_load',
                'count': count,
                'total_pro': '<?php echo $total_product; ?>', // Ensure PHP variables are safely encoded
                'post_per_pages': '<?php echo $post_per_pages; ?>',
            };
            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                type: 'POST',
                data: ajaxData,
                success: function (response) {
                    // Insert the received response into the specified element
                    $('.mainBolgPart').html(response);
                    // Hide loading message
                    $('#loading').css('display', 'none');
                },
                error: function () {
                    // Handle errors
                    $('#loading').html('Failed to load content');
                    $('#loading').css('display', 'none');
                }
            });
        });
    });

</script>

<?php get_footer()?>