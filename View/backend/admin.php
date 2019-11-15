<?php ob_start();
$title = 'Bienvenue sur le blog de Michel Smith'; ?>
<div class="container-fluid">
        <div class="row">
            <div class="col-12">

                
                <form action="index.php?action=adminConnect" method="post" class="comment-form">
                    <label for="login"></label>
                    <input type="text" name="login" id="login">
                    <label for="password"></label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="connexion">
                </form>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .hero-section -->

    <div class="container single-page">
        <div class="row">
            
        </div>
    </div><!-- .container -->
<?php $content = ob_get_clean();
require('view/include/template.php'); ?>