<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="container single-page">
        <div class="row">
            <div class="col-12 col-lg-9">
                
                <?php
                while ($data = $post->fetch())
                {
                ?>
                

                <div class="content-wrap">
                    <header class="entry-header">
                        <div class="posted-date">
                            <?= $data['date_creation'] ?>
                        </div><!-- .posted-date -->

                        <h2 class="entry-title">
                        <?= htmlspecialchars($data['title']) ?></h2>

                        <div class="tags-links">
                            <a href="#">#winter</a>
                            <a href="#">#love</a>
                            <a href="#">#snow</a>
                            <a href="#">#january</a>
                        </div><!-- .tags-links -->
                    </header><!-- .entry-header -->

                    <figure class="featured-image">
                        <img src="public/images/<?= htmlspecialchars($data['image']) ?>.jpg" alt="<?= htmlspecialchars($data['title']) ?>">
                    </figure><!-- .featured-image -->

                    <div class="entry-content">
                        <p><?= $data['content'] ?> </p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                        <ul class="post-share flex align-items-center order-3 order-lg-1">
                            <label>Partager</label>
                            
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul><!-- .post-share -->

                        <a class="read-more order-2" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a>

                        <div class="comments-count order-1 order-lg-3">
                            <a href="#">2 Commentaires</a>
                        </div><!-- .comments-count -->
                    </footer><!-- .entry-footer -->
                </div><!-- .content-wrap -->
                
                <?php
                    }
                    $post->closeCursor();
                ?>
                
                <div class="pagination">
                    <ul class="flex align-items-center">
                        <li class="active"><a href="#">01.</a></li>
                        <li><a href="#">02.</a></li>
                        <li><a href="#">03.</a></li>
                    </ul>
                </div>
            </div><!-- .col -->

        </div><!-- .row -->
    </div><!-- .container -->


<?php $content = ob_get_clean(); ?>

<?php require('view/include/template.php'); ?>