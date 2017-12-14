<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Option Marine</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/library/css/styles.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/library/css/styles.css?ver=<?php echo rand();?>">

   
</head>

<body class="gray-background">
    <header class="white-background master-header">
        <div class="row align-middle">
            <div class="columns small-12 medium-4">
                <div class="header-mast__logo-holder">
                    <a href="/index.php">
                        <img class="header-mast__logo-holder__logo" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/logo.png" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="header-mast__navigation columns small-12 medium-8">
                <div class="row">
                    <nav class="text-right">
                        <div class="toggle menu">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                       

<?php
wp_nav_menu( array( 
    'theme_location' => 'main-nav', 
    'container' => false,
    'menu_class'=>'nav top-nav cf' ) ); 
?>
			<?/*
                        <ul id="menu-the-main-menu" class="nav top-nav cf">
                            <li id="menu-item-5" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-5">
                                <a href="../pages/products.php">Products</a>
                            </li>
                            <li id="menu-item-20" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-20">
                                <a href="">Projects</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-172" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-172">
                                        <a href="">Project 1</a>
                                    </li>
                                    <li id="menu-item-171" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-171">
                                        <a href="">Project 2</a>
                                    </li>
                                    <li id="menu-item-175" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-175">
                                        <a href="">Project 3</a>
                                    </li>
                                    <li id="menu-item-401" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-401">
                                        <a href="">Project 4</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-402" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-402">
                                                <a href="">Project Authors</a>
                                            </li>
                                            <li id="menu-item-412" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-412">
                                                <a href="">History</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-406" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-406">
                                        <a href="">Project 7</a>
                                    </li>
                                    <li id="menu-item-405" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-405">
                                        <a href="">Project 8</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="menu-item-21" class="menu-item menu-item-type-taxonomy menu-item-object-category no-pad menu-item-21">
                                <a class="button-head hide-for-small-only" href="../pages/contact.php">Contact Us</a>
                            </li>
                        </ul>*/?>
                    </nav>
                </div>
            </div>
        </div>
