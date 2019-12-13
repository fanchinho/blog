<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-header flex justify-content-center align-items-center" style="background-image: url('public/images/contact-bg.jpg')">
                    <h1>à propos</h1>
                </div><!-- .page-header -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="container">
            <div class="row">
                <div class="offset-lg-9 col-lg-3">
                    <a href="#">
                        <div class="yt-subscribe">
                            <img src="public/images/yt-subscribe.png" alt="Youtube Subscribe">
                            <h3>Hello</h3>
                        </div><!-- .yt-subscribe -->
                    </a>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .hero-section -->

    <div class="container single-page contact-page">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="content-wrap">
                    <header class="entry-header">
                        <h2 class="entry-title">Contact me or just say HI</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p><!-- ICI LE TEST -->
                            <?php 
                                $comment -> Content();
                                $comment -> Connect();
                                $comment -> test();
                            ?> 
                        </p>
                    </div><!-- .entry-content -->

                    <div class="contact-page-social">
                        <ul class="flex align-items-center">
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div><!-- .header-bar-social -->

                </div><!-- .content-wrap -->
            </div><!-- .col -->

            
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .outer-container -->


<?php $content = ob_get_clean(); ?>

<?php require('view/include/template.php'); ?>

