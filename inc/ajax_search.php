<?php

function my_ajax_search() {

    if ( isset($_POST['search']) ) {

        $search_term = sanitize_text_field( $_POST['search'] );

        $args = array(

            's' => $search_term,

            'posts_per_page' => 5 // Adjust number of results

        );

        $query = new WP_Query( $args );



        // Format results (customize this)

        if ( $query->have_posts() ) {

            while ( $query->have_posts() ) {

                $query->the_post();

                // Get the post thumbnail (featured image) URL

                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); // You can change 'thumbnail' to another size ('medium', 'large', etc.)

                

                // Check if the post has a featured image

                if ($thumbnail_url) {

                    echo '<div class="search_result_con">';

                    echo '<div class="left_box">';

                    echo '<a href="'.get_the_permalink().'"><img class="sear_res_img" src="'.$thumbnail_url.'" alt="'.get_the_title().'"></a>';

                    echo '</div>';

                    echo '<div class="right_box">';

                    echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';

                    echo '</div>';

                    echo '</div>';

                    

                } else {

                    // Display the result without a featured image

                    echo '<div class="search_result_con">';

                    echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';

                    echo '</div>';

                }

            }

        } else {

            echo 'No results found.';

        }

    }

    wp_die(); // Required for AJAX in WordPress

}



add_action( 'wp_ajax_my_ajax_search', 'my_ajax_search' );           

add_action( 'wp_ajax_nopriv_my_ajax_search', 'my_ajax_search' );  // For non-logged-in users





