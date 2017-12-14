<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Option Marine</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/library/css/styles.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/library/css/styles.css?ver=<?php echo rand();?>">
   
</head>

<body class="bg-grey">
    <header class="master-header">
        <div class="row align-middle">
            <div class="columns small-12 medium-4">
                <div class="header-mast__logo-holder">
                    <a href="/index.php">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/logo.png"alt="logo" />
                    </a>
                </div>
            </div>
            <div class="header-mast__navigation columns small-12 medium-8">
                <div class="row">
                    <nav>
                        <div class="toggle menu">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                        <?php
                        wp_nav_menu( array( 
                            'theme_location' => 'main-nav',
                            'container' => false,
                            'container_class' => 'custom-menu-class',
                            'menu_class'=>'nav top-nav cf' ) ); 
                        ?>
                    </nav>
                </div>
            </div>
        </div> 
    </header>
   