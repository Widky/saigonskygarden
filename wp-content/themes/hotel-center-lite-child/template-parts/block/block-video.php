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
// var_dump($my_posts);exit;
if($my_posts) :
    $showAboutPage = get_field('show_about_page', $my_posts[0]->ID);
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
                                <iframe width="560" height="315"
                                    src="<?php echo $showAboutPage['video_about']['url']; ?>&showinfo=0&rel=0"
                                    frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <?php if(get_bloginfo('language') == 'ja'){?>
                                <div class="card-day"><?php echo date('Y年n月j日', strtotime($my_posts[0]->post_date)); ?></div>
                                <?php }else{ ?>
                                    <div class="card-day"><?php echo date('F j, Y', strtotime($my_posts[0]->post_date)); ?></div>
                                <?php } ?>
                                <h5 class="card-title"><?php echo $showAboutPage['video_about']['video_name']; ?></h5>
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
                                <iframe width="560" height="315"
                                    src="<?php echo $showAboutPage['video_about_2']['url']; ?>&showinfo=0&rel=0"
                                    frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                            <?php endif; ?>
                            <div class="card-body">
                            <?php if(get_bloginfo('language') == 'ja'){?>
                                <div class="card-day"><?php echo date('Y年n月j日', strtotime($my_posts[0]->post_date)); ?></div>
                                <?php }else{ ?>
                                    <div class="card-day"><?php echo date('F j, Y', strtotime($my_posts[0]->post_date)); ?></div>
                                <?php } ?>
                                <h5 class="card-title"><?php echo $showAboutPage['video_about_2']['video_name']; ?></h5>
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

<?php endif; ?>