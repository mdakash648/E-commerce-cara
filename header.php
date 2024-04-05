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
                    <li><a id="busket" href="<?php echo site_url()?>/cart"><i class="fa-duotone fa-cart-shopping"></i></a></li>
                    <li><a href="#"><i class="fa-regular fa-magnifying-glass"></i></a></li>
                </div>
            </div>
        </div>
    </header>