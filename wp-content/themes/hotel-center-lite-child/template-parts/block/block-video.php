<?php
$args = array(
    'post_type'         =>  'page',
    'orderby'           =>  'date',
    'order'             =>  'DESC',
    'post_status'       =>  'publish',
    'posts_per_page'    =>  1,
    'pagename'          => 'about',
);
$query = new WP_Query($args);
$my_posts = $query->get_posts();
// var_dump($my_posts[0]->ID);exit;
if($my_posts) :
    $showAboutPage = get_field('show_about_page', $my_posts[0]->ID);
    // var_dump($showAboutPage);exit;
    if($showAboutPage != NULL){
?>

<div class="popular-video">
    <div class="container">
        <h2 class="cl-title text-center">
            <span class="cl-main-title change-cl"><?php echo _e('POPULAR VIDEO','hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php echo _e('紹介動画','hotel-center-lite-child') ?></span>
        </h2>
        <div class="content-popular-video">
            <div class="row rvideo position-relative">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="home-video">
                        <div class="card about-video">
                            <?php if($showAboutPage['video_about']['url']) : ?>
                            <div class="card-img-top">
                                <?php if($showAboutPage['video_about']['representative_image']['url'] != NULL || $showAboutPage['video_about']['representative_image'] != false){ ?>
                                <div id="background-video"
                                    style="background: url(<?php echo $showAboutPage['video_about']['representative_image']['url']; ?>) top center no-repeat; background-size: cover;">
                                    <iframe width="100%" height="560"
                                        src="<?php echo $showAboutPage['video_about']['url']; ?>&showinfo=0&rel=0"
                                        frameborder="0" allow="autoplay; encrypted-media"
                                        allowfullscreen="allowfullscreen"></iframe>
                                    <h3 class="card-title"><?php echo $showAboutPage['video_about']['video_name']; ?>
                                    </h3>
                                    <a class="btn-play" href="#">Play Button</a>
                                </div>
                                <style>
                                .card-img-top .ytp-cued-thumbnail-overlay {
                                    display: none !important;
                                }
                                </style>
                                <?php }else{ ?>
                                <iframe width="100%" height="560"
                                    src="<?php echo $showAboutPage['video_about']['url']; ?>&showinfo=0&rel=0"
                                    frameborder="0" allow="autoplay; encrypted-media"
                                    allowfullscreen="allowfullscreen"></iframe>
                                <?php } ?>
                            </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <p class="card-text"><?php echo $showAboutPage['video_about']['video_description']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 change-mgt">
                    <div class="home-video">
                        <div class="card about-video">
                            <?php if($showAboutPage['video_about_2']['url']) : ?>
                            <div class="card-img-top">
                                <?php if($showAboutPage['video_about_2']['representative_image']['url'] != NULL || $showAboutPage['video_about_2']['representative_image'] != false){ ?>
                                <div id="background-video2"
                                    style="background: url(<?php echo $showAboutPage['video_about_2']['representative_image']['url']; ?>) top center no-repeat; background-size: cover;">
                                    <iframe width="100%" height="560"
                                        src="<?php echo $showAboutPage['video_about_2']['url']; ?>&showinfo=0&rel=0"
                                        frameborder="0" allow="autoplay; encrypted-media"
                                        allowfullscreen="allowfullscreen"></iframe>
                                    <h3 class="card-title"><?php echo $showAboutPage['video_about_2']['video_name']; ?>
                                    </h3>
                                    <a class="btn-play2" href="#">Play Button</a>
                                </div>
                                <?php }else{ ?>
                                <iframe width="100%" height="560"
                                    src="<?php echo $showAboutPage['video_about_2']['url']; ?>&showinfo=0&rel=0"
                                    frameborder="0" allow="autoplay; encrypted-media"
                                    allowfullscreen="allowfullscreen"></iframe>
                                <?php } ?>
                            </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <p class="card-text"><?php echo $showAboutPage['video_about_2']['video_description']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }else{echo '<div style="margin: 50px 0;"></div>';} endif; ?>