<?php
$currentLang = get_locale();
switch($currentLang)
{
    case 'en_US':
        $the_slug = 'about';
        break;
    default:
        $the_slug = '私たちに関しては';
        break;
}
$query  = new WP_Query(array(
    'name'          =>  $the_slug,
    'post_type'     =>  'post',
    'post_status'   =>  'publish',
    'numerposts'    =>  1,
    'fileds'        =>  'ids'
));
$my_posts = $query->get_posts();
// echo "<pre>"; var_dump($my_posts);exit;
?>
<section id="block_about" class="section-home-about">
    <div class="sha-wrap">
        <?php
        if( $my_posts ) : 
            switch($currentLang)
            {
                case 'en_US':
                    $subTitle = get_post_meta($my_posts[0]->ID,'sub_title_english', true);
                    $subTitle2 = get_post_meta($my_posts[0]->ID,'sub_title_2_english', true);
                    break;
                default:
                    $subTitle = get_post_meta($my_posts[0]->ID,'sub_title', true);
                    $subTitle2 = get_post_meta($my_posts[0]->ID,'sub_title_2', true);
                    break;
            }
        ?>
        <div class="sha-column-left">
            <h3 class="sha-title cl-title text-center">
                <span class="cl-main-title"><?php echo $my_posts[0]->post_title; ?></span>
                <span class="sha-sub-title cl-sub-title"><?php echo $subTitle; ?></span>
            </h3>
            <div class="sha-sub-title-2 text-center">
                <?php echo $subTitle2; ?>
            </div>
            <div class="sha-excerpt">
                <pre><?php echo $my_posts[0]->post_excerpt; ?></pre>
            </div>
            <div class="sha-more text-center">
                <a href="<?php echo $my_posts[0]->post_name; ?>.html" target="_blank"
                    rel="noopener noreferrer"><?php _e('もっと見る', 'hotel-center-lite-child') ?></a>
            </div>
        </div>
        <div class="sha-column-right">
            <?php if (has_post_thumbnail( $my_posts[0]->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
            <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
            <?php endif; ?>
            <div class="sha-overlay-image"></div>
        </div>
        <?php endif; ?>
    </div>
</section>