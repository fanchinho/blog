<?php $title = 'Bienvenue sur le blog de Michel Smith'; ?>

<?php ob_start(); ?>
<div class="container single-page page-admin">
    <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                    <h1 class="black">Tableau de bord</h1>
                <div class="comments-form">
                    <div class="comment-respond">
                        <form  action="index.php?action=addPost" method="post" class="comment-form" enctype="multipart/form-data">
                            <label for="fileUpload">Fichier:</label>
                            <input type="file" name="photo" id="fileUpload"><br><br>
                            <label for="title">Renseignez le titre de l'article</label>
                            <input type="text" id="title" name="title">
                            <label for="tags">Tags (séparez par une virgule)</label>
                            <input type="text" id="tags" name="tags">
                            <label for="content">Contenu de l'article</label>
                            <textarea name="content" height="300px" class="post-content"> </textarea>
                            <input type="submit" value="Valider la création de l'article">
                        </form><!-- .comment-form -->
                    </div><!-- .comment-respond -->
                </div><!-- .comments-form -->
            </div>
        </div><!-- .hero-section -->

    </div><!-- .container -->
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>