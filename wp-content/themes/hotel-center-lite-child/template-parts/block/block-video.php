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
<div class="home-video">

    <?php if($showAboutPage['video_about']) : ?>
    <div class="about-video">
        <?php echo $showAboutPage['video_about'] ?>
    </div>
    <?php endif; ?>
</div>

<?php endif; ?>
