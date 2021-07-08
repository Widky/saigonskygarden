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
if($my_posts) :
    $showAboutPage = get_field('show_about_page', $my_posts[0]->ID);
?>
<div class="row position-relative">
    <div class="col-12 p-0">
        <div class="home-video">
            <div class="about-video">
                <?php if($showAboutPage['video_about']['url']) : ?>
                    <iframe width="560" height="315"
                        src="<?php echo $showAboutPage['video_about']['url']; ?>&showinfo=0&rel=0" frameborder="0"
                        allowfullscreen="allowfullscreen"></iframe>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php endif; ?>