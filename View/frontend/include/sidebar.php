<div class="col-12 col-lg-3">
    <div class="sidebar">
        <div class="about-me">
            <h2>Je suis Michel Smith</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat. Proin nec interdum sem. Quisque in porttitor magna.</p>
        </div><!-- .about-me -->

        <div class="recent-posts">
            <div class="recent-post-wrap">
                <!-- <figure>
                    <img src="public/images/thumb-1.jpg" alt="">
                </figure> -->

                <!-- <header class="entry-header">
                    <div class="posted-date">
                        January 30, 2018
                    </div>.entry-header
                
                    <h3><a href="#">My fall in love story</a></h3>
                
                    <div class="tags-links">
                        <a href="#">#winter</a>
                        <a href="#">#love</a>
                        <a href="#">#snow</a>
                        <a href="#">#january</a>
                    </div>.tags-links
                </header>.entry-header -->

            </div><!-- .recent-post-wrap -->
        </div><!-- .recent-posts -->

        <div class="tags-list">
           <?php
            while ($dataTag = $tagSide->fetch())
                {
                ?>
                <a href="#">#<?= htmlspecialchars($dataTag['tag_name']) ?></a>

            <?php
                }
                $post->closeCursor();
            ?>
        </div><!-- .tags-list -->

        <div class="sidebar-ads">
            <img src="public/images/ads.jpg" alt="ads">
        </div>
    </div><!-- .sidebar -->
</div><!-- .col -->
