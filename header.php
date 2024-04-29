<html lang="<?php language_attributes();?>" class="no-js">
<head>
    <meta charset="<?php bloginfo('cherset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php $fave_icon = get_field('fave_icon','options')?get_field('fave_icon','options'):(get_template_directory_uri().'/asset/img/logo.png'); 
    echo $fave_icon; ?>">
    <?php wp_head(); ?>
</head>
<body contenteditable="false" <?php body_class(); ?>>
    <!-- header section code start -->

<script>
jQuery(document).ready(function($) {
    // Function to perform the AJAX call for updating cart count

    function updateCartCount() {
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                'action': 'get_cart_counts'
            },
            success: function(data) {
                let counter = $('<span>', {
                    'class': 'counter',
                    text: data,
                });
                $('.cart').append(counter);
            },
            error: function() {
                $('.cart').attr('style', `--cart-contents:0;`);
            }
        });
    }
    
    // Update cart count after the document loads
    updateCartCount();

    // Update cart count when any specified button is clicked
    $('body').on('click', '.product_type_simple, .wc-block-components-quantity-selector__button--plus, .wc-block-components-quantity-selector__button--minus, .wc-block-cart-item__remove-link', function() {
        setTimeout(updateCartCount, 1500);
        // updateCartCount();
    });
});
</script>
    <header id="header">
        <div class="container">
            <div class="logo">
                <a href="index.html">
                    <img src="<?php $logo = get_field('site_logo','options')?get_field('site_logo','options')['url']:(get_template_directory_uri().'/asset/img/logo.png'); 
                    echo $logo; ?>" 
                    alt="<?php $logoalt = get_field('site_logo','options')?get_field('site_logo','options')['alt']:'website Logo'; 
                    echo $logoalt; ?>">
                </a>
            </div>
            <div class="menu_part">
                <nav id="mobileMenu">
                <?php 
                    $main_menu = wp_nav_menu(array('theme_location' => 'main_menu', 'menu_id' => ' ', 'menu_class' => '', 'echo' => false));
                    $main_menu = str_replace(array('<div class="menu-main-menu-container">', '</div>'), ' ' , $main_menu);
                    echo $main_menu;
                    ?>
                </nav>
                <div id="desk_menu">
                    <a href="#menu" id="menu_bars"><i class="fa-solid fa-bars-staggered"></i></a>
                    <nav id="menu">
                    <?php echo $main_menu;?>
                    </nav>
                    <li id="search" data-bs-toggle="modal" data-bs-target="#search_modal"><a><i class="fa-regular fa-magnifying-glass"></i></a></li>
                </div>

            </div>
        </div>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="search_modal" tabindex="-1" aria-labelledby="search_modal_Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title" id="search_modal_Label">Search</h5>
                    <i class="modal_close_btn fa-regular fa-xmark" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <div class="modal-body">
                    <div class="search_container">
                        <form role="search" method="get" class="search_form" action="<?php echo home_url( '/' ); ?>">
                            <input type="search" class="search-field" placeholder="Search..." name="s" id="search-input" />
                            <button id="search_btn" type="submit">Search</button>
                        </form>
                        <div id="search-results"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<script>
jQuery(document).ready(function($) {
    $('#search-input').on('keyup', function() {
        var searchTerm = $(this).val();
        if (searchTerm.length > 2) { // Adjust minimum characters to trigger

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>', 
                type: 'POST',
                data: {
                    action: 'my_ajax_search',
                    search: searchTerm
                },
                success: function(response) {
                    $('#search-results').html(response); 
                }
            });
        } else {
            $('#search-results').html(''); // Clear results on short input
        }
    });
});
</script> 