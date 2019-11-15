<?php $title = 'Bienvenue sur le blog de Michel Smith'; ?>

<?php ob_start(); ?>
<div class="container single-page page-admin">
    <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                    <header class="entry-header">
                        <h1>Tableau de bord</h1>
                        <p>liste des commentaires de l'article : <?= htmlspecialchars($post['title']) ?></p>
                        <a href="index.php?action=admin" class="link-post">Retour à la liste des articles</a><br><br>
                    </header><!-- .entry-header -->
                    <div class="comments">
                    <?php
                    while ($comment = $comments->fetch())
                    {
                    
                    ?>
                        <div class="comment">
                        
                        <h3 class="black">
                        <?= htmlspecialchars($comment['author']) ?>
                        </h3>
                        <p>
                        <?= htmlspecialchars($comment['content']) ?>      
                        </p>
                        Statut du commentaire : 
                        <?php
                        if($comment['status']==0) { ?>
                                en attente de modération / <a href="index.php?action=CommentOnline&amp;id=<?= $post['id']?>&amp;idComment=<?= $comment['id']?>">Valider</a>;
                        <?php }
                            else if ($comment['status']==1) { ?>
                                Visible en ligne / <a href="index.php?action=CommentOffline&amp;id=<?= $post['id']?>&amp;idComment=<?= $comment['id']?>">Désactiver</a>;
                                 <?php } ?>
                                        
                        </div>
                    <?php
                    }
                    $comments->closeCursor();
                    ?>
                    
                    </div><!-- .comments-form -->
                </div>
        </div><!-- .hero-section -->

    </div><!-- .container -->
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>