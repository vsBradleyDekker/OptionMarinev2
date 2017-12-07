<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Option Marine</title>
        <link rel="stylesheet" href="http://localhost/library/css/styles.css">
        <link rel="stylesheet" href="http://localhost/library/css/styles.css?ver=<?php echo rand();?>">
    </head>
    <body class="gray-background">
        <header class="white-background header-secondary">
            <div class="row align-middle">
                <div class="columns small-12 medium-4">
                    <div class="header-mast__logo-holder">
                        <a href="/index.php">
                            <img class="header-secondary__logo header-mast__logo-holder__logo" src="../images/logo.png" alt="logo" />
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div class="columns small-12 medium-12 test-menu float-right">
            <nav>
                <ul class="main-menu">
                    <li class="main-menu-child"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li class="main-menu-child"><a href="#">Projects</a>
                        <ul class="submenu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li class="main-menu-child"><a href="#">Projects</a>
                                <ul class="submenu">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Projects</a></li>
                                <ul>
                            </li>
                        <ul>
                    </li>
                </ul>
            </nav>
        </div>
        <section class="section-top-menu">
            <div class="columns small-12 medium-12 text-center">
                <nav class="top-menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li class="top-menu-children"><a href="#">About</a>
                            <ul class="top-menu-submenu swing">
                                <li><a href="#">History</a></li>
                                <li class="top-menu-children"><a href="#">Sponsors</a>
                                    <ul class="top-menu-submenu">
                                        <li><a href="#">Kmart</a></li>
                                        <li><a href="#">Big w</a></li>  
                                        <li><a href="#">Target </a></li>      
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="top-menu-children"><a href="#">Projects</a>
                            <ul class="top-menu-submenu">
                                <li><a href="#">Rustic</a></li>
                                <li><a href="#">Industry</a></li>
                                <li class="top-menu-children"><a href="#">Pop Art</a>
                                    <ul class="top-menu-submenu ">
                                        <li class="swing"><a href="#">Pop Art 1</a></li>
                                        <li class="swing"><a href="#">Pop Art 2</a></li>  
                                        <li class="swing"><a href="#">Pop Art 3</a></li>      
                                    </ul>
                                </li>
                                <li><a href="#">Imagination</a></li>
                            </ul>
                        </li>   
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </section>
        <aside class="side-menu">
            <a class="menu-button"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                        <li class="side-menu-children"><a href="#">About</a>
                            <ul class="side-menu-submenu">
                                <li><a href="#">History</a></li>
                                <li class="side-menu-children swing"><a href="#">Sponsors</a>
                                    <ul class="side-menu-submenu">
                                        <li class="swing"><a href="#">Kmart</a></li>
                                        <li class="swing"><a href="#">Big w</a></li>  
                                        <li class="swing"><a href="#">Target </a></li>      
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="side-menu-children"><a href="#">Projects</a>
                            <ul class="side-menu-submenu">
                                <li class="swing"><a href="#">Rustic</a></li>
                                <li class="swing"><a href="#">Industry</a></li>
                                <li class="side-menu-children"><a href="#">Pop Art</a>
                                    <ul class="side-menu-submenu ">
                                        <li class="swing"><a href="#">Pop Art 1</a></li>
                                        <li class="swing"><a href="#">Pop Art 2</a></li>  
                                        <li class="swing"><a href="#">Pop Art 3</a></li>      
                                    </ul>
                                </li>
                                <li><a href="#">Imagination</a></li>
                            </ul>
                        </li>   
                    <li><a href="#">Contact Us</li>
                </ul>
            </nav>
        </aside>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(function() {
                $('.menu-button').click(function () {
                    $('nav').toggleClass('active');
                })
                });
        });
    </script>
</html>