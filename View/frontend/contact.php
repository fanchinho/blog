<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-header flex justify-content-center align-items-center" style="background-image: url('public/images/contact-bg.jpg')">
                    <h1>Contact</h1>
                </div><!-- .page-header -->
            </div><!-- .col -->
        </div><!-- .row -->


    </div><!-- .hero-section -->

    <div class="container single-page contact-page">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="content-wrap">
                    <header class="entry-header">
                        <h2 class="entry-title">Contact me or just say HI</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat. Proin nec interdum sem. Quisque in porttitor magna, a imperdiet est. Donec accumsan justo nulla, sit amet varius urna laoreet vitae. Maecenas feugiat fringilla metus. Nullam semper ornare quam eu sagittis. Curabitur ornare sem eu dapibus rutrum. Sed lobortis eros ut sapien lobortis, euismod dignissim odio interdum. Integer finibus molestie tellus sit amet egestas. Aliquam ullamcorper magna in ipsum sollicitudin imperdiet consectetur vitae nunc. Maecenas vel erat et erat lobortis porttitor ac id diam. </p>
                    </div><!-- .entry-content -->

                    <form class="contact-form" method="post" action="index.php?action=contactPost" >
                        <input type="text" placeholder="Votre nom" id="name" name="name">
                        <input type="email" placeholder="Votre email" id="email" name="email">
                        <textarea rows="18" cols="6" placeholder="Messages" name="message" id="message"></textarea>
                        <input type="submit" value="Read More">
                    </form><!-- .contact-form -->
                </div><!-- .content-wrap -->
            </div><!-- .col -->


        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .outer-container -->


<?php $content = ob_get_clean(); ?>

<?php require('view/include/template.php'); ?>

