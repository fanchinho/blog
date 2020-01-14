    <?php $title = htmlspecialchars($post->get_title()).' par Jean Forteroche'; ?>
    <?php ob_start(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-header flex justify-content-center align-items-center" style="background-image: url('public/images/blog-bg.jpg')">
                    <h1>The Story</h1>
                </div><!-- .page-header -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="container">
            <div class="row">
                <div class="offset-lg-9 col-lg-3">
                    <a href="#">
                        <div class="yt-subscribe">
                            <img src="public/images/yt-subscribe.png" alt="Youtube Subscribe">
                            <h3>Hello</h3>
                        </div><!-- .yt-subscribe -->
                    </a>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .hero-section -->

    <div class="container single-page blog-page">
        <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                    <header class="entry-header">
                        <div class="posted-date">
                            <?= $post->get_date_creation() ?>

                        </div><!-- .posted-date -->

                        <h2 class="entry-title"><?= htmlspecialchars($post->get_title())?></h2>

                        <div class="tags-links">
                            <?php
                            while ($dataTag = $tagsPost->fetch())
                            {
                            ?>
                            <a href="#">#<?= $dataTag['tag_name'] ?></a>
                             <?php
                                }
                                $tagsPost->closeCursor();
                            ?>
                        </div><!-- .tags-links -->
                    </header><!-- .entry-header -->

                    <figure class="featured-image">
                        <img src="Public/images/upload/<?= htmlspecialchars($post->get_image()) ?>" alt="<?= htmlspecialchars($post->get_title()) ?>">
                    </figure><!-- .featured-image -->

                    <div class="entry-content">
                        <p><?= $post->get_content() ?> </p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                        <ul class="post-share flex align-items-center order-3 order-lg-1">
                            <label>Partager</label>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul><!-- .post-share -->

                        <div class="comments-count order-1 order-lg-3">
                            <a href="#comments"><?= $numberComments['Nbr_comments'] ?> Commentaires</a>
                        </div><!-- .comments-count -->
                    </footer><!-- .entry-footer -->
                </div><!-- .content-wrap -->

                <div class="content-area">
                    <div class="post-comments" id="comments">
                        <h3 class="comments-title">Commentaires</h3>

                     

                        <ol class="comment-list">
                           
                            <?php

                                foreach($comments as $com){
                                       
                                    if ($com->get_status() ==1) {

                                        ?>
                                        
                                        <li class="comment">
                                            <div class="comment-body flex justify-content-between">
                                                <!-- <figure class="comment-author-avatar">
                                                    <img src="public/images/user-1.jpg" alt="user">
                                                </figure> --><!-- .comment-author-avatar -->

                                                <div class="comment-wrap">
                                                    <div class="comment-author flex flex-wrap align-items-center">
                                                        <span class="author_comment fn">
                                                            <?= htmlspecialchars($com->get_author()) ?>  
                                                        </span><!-- .fn -->

                                                        <span class="comment-meta"> le <?= $com -> get_comment_date(); ?>
                                                        </span><!-- .comment-meta -->
                                                    </div><!-- .comment-author -->
                                                    <p>
                                                    <?= htmlspecialchars($com->get_content()) ?>
                                                    </p>
                                                </div><!-- .comment-wrap -->
                                                <a href="signaler-<?=$com->get_id()?>-<?= $_GET['id'] ?>">Signaler</a>
                                            </div><!-- .comment-body -->
                                        </li><!-- .comment -->

                                        <?php
                                    }

                                }
                                //$comments->closeCursor();
                            ?>
                        </ol><!-- .comment-list -->
                    </div><!-- .post-comments -->

                    <div class="comments-form">
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Laissez un commentaire</h3>

                            <form  action="index.php?action=addComment&amp;id=<?= $post->get_id() ?>" method="post" class="comment-form">
                                <input type="text" placeholder="Pseudo" id="pseudo" name="pseudo" required> 
                                <input type="email" placeholder="Email" id="email" name="email" required>
                                <textarea rows="18" cols="6" placeholder="Message" id="message" name="message" required
                                ></textarea>
                                <input type="submit" value="Envoyer mon commentaire">
                            </form><!-- .comment-form -->
                        </div><!-- .comment-respond -->
                    </div><!-- .comments-form -->
                </div><!-- .content-area -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->

<footer class="sit-footer">
    <div class="outer-container">
        <div class="container-fluid">
            <div class="row footer-recent-posts">
                <?php
                    foreach($lastPosts as $lastPost)
                    {
                    if($lastPost->get_id() != ($_GET['id'])) {
                ?>         
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer-post-wrap flex flex-column justify-content-between">
                        <figure>
                        <img src="Public/images/upload/<?= htmlspecialchars($lastPost->get_image()) ?>" alt="<?= htmlspecialchars($lastPost->get_title()) ?>">
                        </figure>

                        <div class="footer-post-cont flex flex-column justify-content-between">
                            <header class="entry-header">
                                <div class="posted-date">
                                    <?= $lastPost->get_date_creation();?>
                                </div><!-- .entry-header -->

                                <h3><a href="index.php?action=post&id=<?= $lastPost->get_id() ?>"><?= $lastPost->get_title()?></a></h3>

                                <div class="tags-links">
                                    <?php $tagsPost = $tagManager->TagsbyPost($lastPost->get_id());
                                        while ($dataTag = $tagsPost->fetch())
                                        {
                                        ?>
                                        <a href="articles-tag-<?= $dataTag['id'] ?>">#<?= htmlspecialchars($dataTag['tag_name']) ?></a>

                                        <?php
                                        }
                                        $tagsPost->closeCursor();
                                    ?>
                                </div><!-- .tags-links -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer">
                                <a class="read-more" href="index.php?action=post&id=<?= $lastPost->get_id()?>">Lire l'article</a>
                            </footer><!-- .entry-footer -->
                        </div><!-- .footer-post-cont -->
                    </div><!-- .footer-post-wrap -->
                </div><!-- .col -->
                <?php
                    }
                    }
                ?>
        
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .outer-container -->
<?php $content = ob_get_clean(); ?>
<?php require('view/include/template.php'); ?>    