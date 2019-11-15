<?php $title = 'Bienvenue sur le blog de Michel Smith'; ?>

<?php ob_start(); ?>
<div class="container single-page page-admin">
    <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                <header class="entry-header">
                    <h1>Suppression de l'article</h1>
                </header><!-- .entry-header -->
                
                    
                <?= $post['title'] ?>
                
                Pour confirmer <a href="index.php?action=deletePost&amp;id=<?= $_GET['id'] ?>">cliquez ici </a>                
                </div>
        </div><!-- .hero-section -->

    </div><!-- .container -->
</div>

<?php $content = ob_get_clean();
require('view/include/template.php'); ?>