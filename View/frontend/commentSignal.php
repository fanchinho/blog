<?php $title = "Modération d'un commentaire" ?>
<?php ob_start(); ?>
<div class="container single-page blog-page">
<div class="content-wrap">
    <h2>Vous voulez signaler le commentaire suivant</h2>

    Auteur : <?php echo $comment['author'] ?>

    <p>Commentaire : <?php echo $comment['content'] ?></p>

    L'administrateur étudiera votre demande et désactivera le message si il est contraire à la charte du site 
    <br><br>
<a href="index.php?action=signal&id=<?= $_GET['idComment'] ?>" class="link-post">Valider</a><br><br>

<a href="index.php?action=post&id=<?php echo $_GET['id'] ?>" class="link-post">Annuler et retourner à l'article</a>
</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/include/template.php'); ?>

