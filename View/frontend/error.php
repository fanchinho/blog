<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="container-fluid container-error">
    <iframe src="https://giphy.com/embed/iN1aMj0XwhsNq" width="200" height="200" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/g1ft3d-gif-art-caption-iN1aMj0XwhsNq">via GIPHY</a></p>
    <h2><?= $message ?></h2>
    </div>
        

<?php $content = ob_get_clean(); ?>

<?php require('view/include/template.php'); ?>

