<?php ob_start();?>
<?php $title = 'Bienvenue sur le blog de Michel Smith'; ?>
<div class="container single-page page-admin">
    <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                <header class="entry-header">
                    <h1 class="entry-title">Tableau de bord</h1>
                    <h2 class="entry-title">

                    </h2>
                </header><!-- .entry-header -->
                <div class="tab-post">

                        <?php
                        while ($post = $adminPost->fetch())
                        {
                            if ($post==NULL) {
                                echo "pas de post";
                            }
                            else { ?>
                                <div class="row">
                                    <div class="col"><?= $post['title'] ?></div>
                                    <div class="col"><?= $post['date_creation'] ?></div>
                                    <div class="col">
                                        <?php $numberComments = $postCommentManager -> NumberComments($post['id']);
                                        echo $numberComments['Nbr_comments']; 
                                        ?> Commentaires <br>
                                        <a href="index.php?action=adminComments&amp;id=<?= $post['id'] ?>" class="link-post"><?php $numberComments = $postCommentManager -> NumberCommentsToModerate($post['id']);
                                        echo $numberComments['Nbr_comments']; 
                                        ?> Commentaires à modérer</a>
                                    </div>
                                    <div class="col">
                                        <a href="index.php?action=adminPost&amp;id=<?= $post['id'] ?>" class="link-post">Modifier l'article</a>
                                        <a href="index.php?action=advertDeletePost&amp;id=<?= $post['id'] ?>" class="link-post">Supprimer</a>
                                    </div>
                                </div>
                           <?php }
                            }
                            $adminPost->closeCursor();
                            ?>
                </div>
                <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                    <a href="index.php?action=deconnexion" class="read-more">
                        Deconnexion
                    </a>
                    <a href="index.php?action=createPost" class="read-more">
                        Ajouter un article
                    </a>
                </footer>
            </div>

        </div><!-- .hero-section -->

    </div><!-- .container -->
</div>
<?php $content = ob_get_clean();
require('view/include/template.php'); ?>