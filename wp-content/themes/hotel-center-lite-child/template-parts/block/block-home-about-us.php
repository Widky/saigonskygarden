<?php
$the_slug = 'about';
$query  = new WP_Query(array(
    'post_type'         =>  'post',
    'orderby'           =>  'date',
    'order'             =>  'DESC',
    'post_status'       =>  'publish',
    'posts_per_page'        =>  1,
    'tax_query'         =>  array(
        array(
            'taxonomy'      =>  'category',
            'field'         =>  'slug',
            'terms'         =>  $the_slug,
            'operator'      =>  'IN'
        ),
    )
));
$my_posts = $query->get_posts();
// echo "<pre>"; var_dump($my_posts);exit;
?>
<section id="block_about" class="section-home-about">
    <div class="container">
        <div class="sha-wrap row">
            <?php
        if( $my_posts ) : 
            $subTitle = get_post_meta($my_posts[0]->ID,'sub_title', true);
            $subTitle2 = get_post_meta($my_posts[0]->ID,'sub_title_2', true);
        ?>
            <div class="sha-column-left col-lg-6 col-md-12 col-12">
                <h3 class="sha-title cl-title text-center">
                    <span class="cl-main-title change-cl change-font"><?php echo $my_posts[0]->post_title; ?></span>
                    <span class="sha-sub-title cl-sub-title"><?php echo $subTitle; ?></span>
                </h3>
                <div class="sha-sub-title-2 text-center">
                    <?php echo $subTitle2; ?>
                </div>
                <div class="sha-excerpt">
                    <?php echo wpautop($my_posts[0]->post_excerpt); ?>
                </div>
                <div class="sha-more text-center">
                    <a href="<?php echo home_url( $my_posts[0]->post_name .'.html' ); ?>" target="_blank"
                        rel="noopener noreferrer"><?php _e('もっと見る', 'hotel-center-lite-child') ?></a>
                </div>
            </div>
            <div class="sha-column-right col-lg-6 col-md-12 col-12">
                <?php if (has_post_thumbnail( $my_posts[0]->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
                <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                <?php endif; ?>
                <div class="sha-overlay-image"></div>
            </div>
            <?php endif; ?>
        </div>
    </div>

</section>