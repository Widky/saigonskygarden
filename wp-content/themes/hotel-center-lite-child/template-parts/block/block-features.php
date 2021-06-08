<?php
$currentLang = get_locale();
switch($currentLang)
{
    case 'en_US':
        $the_cat = 'features';
        break;
    default:
        $the_cat = '特色';
        break;
}
?>
<div class="features-wrap">
    <h2 class="ap-title cl-title text-center">
        <span class="cl-main-title"><?php echo _e('FEATURES', 'hotel-center-lite-child') ?></span>
        <span class="cl-sub-title"><?php echo _e('特色', 'hotel-center-lite-child') ?></span>
    </h2>
    <?php 
        $args = array(
            'post_type'         =>  'post',
            'orderby'           =>  'date',
            'order'             =>  'DESC',
            'post_status'       =>  'publish',
            'posts_per_page'        =>  3,
            'tax_query'         =>  array(
                array(
                    'taxonomy'      =>  'category',
                    'field'         =>  'slug',
                    'terms'         =>  $the_cat,
                    'operator'      =>  'IN'
                ),
            )
        );
        $query = new WP_Query($args);
        $my_posts = $query->get_posts();
        // echo "<pre>";print_r($my_posts);exit;
        ?>
    <div class="fw">
        <div class="fw-items">
            <?php
            $i = 1;
                foreach($my_posts as $k=>$v) : 
                ?>
            <div class="fw-items-wrap">
                <a href="<?php echo $v->guid; ?>">
                    <div class="fw-img <?php if($i == 3) echo 'fw-set-orverlay'; ?>">
                        <?php if (has_post_thumbnail( $v->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                        <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                        <?php endif; ?>
                        <?php if($i == 3) echo "<div class='fw-img-orverlay' style='background:url(".'/wp-content/uploads/'.date("Y").'/'.date("m").'/overlay-feature-3.png'.")'></div>"; ?>
                    </div>
                    <div class="fw-content post-content">
                        <div class="fw-content-wrap">
                            <h3 class="post-title">
                                <?php echo "<span class='set-pos'><span class='fw-title-number'><span>".$i."</span></span></span>"; echo '<span class="fw-title-content">'.$v->post_title.'<span>' ?>
                            </h3>
                            <pre class="post-excerpt"><?php echo $v->post_excerpt; ?></pre>
                        </div>
                    </div>

                </a>
            </div>
            <?php $i++; endforeach; ?>
        </div>
    </div>
    <div class="fw-btn-direct btn-direct">
        <a href="<?php echo home_url().'/'.$the_cat; ?>" target="_blank" rel="noopener noreferrer">もっと見る</a>
    </div>
</div>