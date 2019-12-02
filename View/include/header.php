<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo($title); ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="public/css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="public/css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="public/style.css">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'.post-content'});</script>

</head>
<body>
<div class="outer-container">
    <header class="site-header">
        <div class="top-header-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 flex align-items-center">
                        <div class="header-bar-text d-none d-lg-block">
                            <p>Bonjour, mon nom est Jean</p>
                        </div><!-- .header-bar-text -->

                        <div class="header-bar-email d-none d-lg-block">
                            <a href="mailto:contactme@jean-forteroche.com">contactme@jean-forteroche.com</a>
                        </div><!-- .header-bar-email -->
                    </div><!-- .col -->

                    <div class="col-12 col-lg-6 flex justify-content-between justify-content-lg-end align-items-center">
                        <div class="header-bar-social d-none d-md-block">
                            <ul class="flex align-items-center">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div><!-- .header-bar-social -->

                        <!--<div class="header-bar-search d-none d-md-block">
                            <form>
                                <input type="search" placeholder="Rechercher">
                            </form>
                        </div> .header-bar-search -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container-fluid -->
        </div><!-- .top-header-bar -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="site-branding flex flex-column align-items-center">
                        <h1 class="site-title"><a href="index.php" rel="home">Jean Forteroche</a></h1>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation">
                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->

                        <ul class="flex-lg flex-lg-row justify-content-lg-center align-content-lg-center">
                            <li class="current-menu-item"><a href="index.php">Home</a></li>
                            <li><a href="index.php?action=about">à propos</a></li>
                            <li><a href="index.php?action=contact">Contact</a></li>
                            <!--<?php 
                                
                                if(isset($_SESSION['status']) && ($_SESSION['status'] == 'connected')) {
                                    echo ('<li><a href="index.php?action=admin">Administration</a></li>');
                                }
                            ?>-->
                        </ul>
                    </nav><!-- .site-navigation -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </header><!-- .site-header -->