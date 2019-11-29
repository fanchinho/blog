<?php $title = 'Bienvenue sur le blog de Michel Smith';
ob_start(); ?>
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="swiper-container hero-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hero-content flex justify-content-center align-items-center flex-column">
                                <img src="public/images/slider.png" alt="">
                            </div><!-- .hero-content -->
                        </div><!-- .swiper-slide -->

                        <div class="swiper-slide">
                            <div class="hero-content flex justify-content-center align-items-center flex-column">
                                <img src="public/images/slider.png" alt="">
                            </div><!-- .hero-content -->
                        </div><!-- .swiper-slide -->

                        <div class="swiper-slide">
                            <div class="hero-content flex justify-content-center align-items-center flex-column">
                                <img src="public/images/slider.png" alt="">
                            </div><!-- .hero-content -->
                        </div><!-- .swiper-slide -->
                    </div><!-- .swiper-wrapper -->

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- Add Arrows -->
                    <!-- <div class="swiper-button-next flex justify-content-center align-items-center">
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44"><path d="M27,22L27,22L5,44l-2.1-2.1L22.8,22L2.9,2.1L5,0L27,22L27,22z"></path></svg></span>
                    </div>
                    <div class="swiper-button-prev flex justify-content-center align-items-center">
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44"><path d="M0,22L22,0l2.1,2.1L4.2,22l19.9,19.9L22,44L0,22L0,22L0,22z"></path></svg></span>
                    </div> -->
                </div><!-- .swiper-container -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="container">
            <div class="row">
                <div class="offset-lg-9 col-12 col-lg-3">
                    <a href="#">
                        <div class="yt-subscribe">
                            <img src="public/images/yt-subscribe.png" alt="Youtube Subscribe">
                        </div><!-- .yt-subscribe -->
                    </a>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .hero-section -->

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
                            <?php $tagsPost = $tagManager->TagsbyPost($data['id']);
                        
                            
                            while ($dataTag = $tagsPost->fetch())
                            {
                            ?>
                            <a href="index.php?action=tag&id=<?= $dataTag['id'] ?>">#<?= $dataTag['tag_name'] ?></a>
                             <?php
                                }
                                $tagsPost->closeCursor();
                            ?>
                        </div><!-- .tags-links -->
                    </header><!-- .entry-header -->

                    <figure class="featured-image">
                        <img src="Public/images/upload/<?= htmlspecialchars($data['image']) ?>" alt="<?= htmlspecialchars($data['title']) ?>">
                    </figure><!-- .featured-image -->

                    <div class="entry-content">
                        <p><?= $data['content'] ?> ... </p>
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
                            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>#comments">
                            <?php  $numberComments = $commentManager->NumberComments($data['id']);
                                echo $numberComments['Nbr_comments']; 
                                ?> Commentaires
                            </a>
                        </div><!-- .comments-count -->
                    </footer><!-- .entry-footer -->
                </div><!-- .content-wrap -->
                
                <?php
                    }
                    $post->closeCursor();
                ?>
                
                <div class="pagination">
                    <ul class="flex align-items-center">
                        <?php for($i=1; $i<=$paginationInfo['2']; $i++) { ?>
                           
                            <li class="<?php if(!isset($_GET['p'])) {
                                if ($i==1){
                                    echo"active";
                                    }
                            } else if(isset($_GET['p']) && ($_GET['p']) > 0 && ($_GET['p']) == $i){ 
                                echo "active";} ?>"><a href="index.php?p=<?= $i ?>"><?= $i ?>.</a></li>
                            
                        <?php } ?>
                    </ul>
                </div>
            </div><!-- .col -->
            
            <?php require('view/include/sidebar.php'); ?>
        </div><!-- .row -->
    </div><!-- .container -->
<?php $content = ob_get_clean(); ?>
<?php require('view/include/template.php'); ?>