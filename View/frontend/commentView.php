<?php $title = htmlspecialchars($post['title']); ?>
<?php ob_start(); ?>
<h1>Modifier un commentaire</h1>

<h2>Article : <?php echo $post['title'] ?></h2>

Auteur : <?php echo $comment['author'] ?>

<p>Commentaire : <?php echo $comment['comment'] ?></p>


<h2>Pour modifier remplissez le formulaire</h2>
<form action="index.php?action=updateComment&amp;id=<?= $post['id'] ?>&amp;idComment=<?= $comment['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" value="<?php echo $comment['author'] ?>"/>
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"><?php echo $comment['comment'] ?>
        </textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('view/include/template.php'); ?>

<p><a href="index.php?action=post&id=<?php echo $post['id'] ?>">Retour à l'article</a></p>
