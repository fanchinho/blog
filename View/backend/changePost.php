<?php $title = 'Bienvenue sur le blog de Michel Smith'; ?>

<?php ob_start(); ?>
<div class="container single-page page-admin">
    <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                    <header class="entry-header">
                        <h1>Tableau de bord</h1>
                    </header><!-- .entry-header -->
                    <div class="comments-form">
                        <div class="comment-respond">
                            <form  action="index.php?action=changePost&amp;id=<?= $post['id'] ?>" method="post" class="comment-form" enctype="multipart/form-data">
                                <div class="image_admin"><img src="Public/images/upload/<?= $post['image'] ?>" alt="<?= $post['image'] ?>"></div>
                                <?= $post['image'] ?><br><br>
                                <span class="black">Modifier l'image :</span> 
                                <input type="file" name="photo" id="fileUpload"><br><br>
                                <label for="title" class="bold black">Titre de l'article</label>
                                <input type="text" id="title" name="title" placeholder="<?= $post['title'] ?>" value="<?= $post['title'] ?>">
                                <label for="content" class="bold black"><br>Contenu de l'article</label>

                                <textarea name="content" height="300px" class="post-content"><?= $post['content'] ?></textarea>
                                <input type="submit" value="Valider">
                                <a href="index.php?action=admin" class="link-post">Annuler</a>
                            </form><!-- .comment-form -->
                        </div><!-- .comment-respond -->
                    </div><!-- .comments-form -->
                </div>
        </div><!-- .hero-section -->

    </div><!-- .container -->
</div>

<?php $content = ob_get_clean();
require('view/include/template.php'); ?>


