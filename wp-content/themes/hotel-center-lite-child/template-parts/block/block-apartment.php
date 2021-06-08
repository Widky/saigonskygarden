<?php
$currentLang = get_locale();
switch($currentLang)
{
    case 'en_US':
        $the_cat = 'studio-apartment';
        $the_cat_bed_one = 'one-bed-room';
        $the_cat_bed_two = 'two-bed-room';
        $the_cat_bed_three = 'three-bed-room';
        break;
    default:
        $the_cat = 'スタジオ';
        $the_cat_bed_one = '1ベッドルーム';
        $the_cat_bed_two = '2ベッドルーム';
        $the_cat_bed_three = '3ベッドルーム';
        break;
}
?>
<div class="apartment-wrap">
    <h2 class="ap-title cl-title text-center">
        <span class="cl-main-title"><?php echo _e('APARTMENT','hotel-center-lite-child') ?></span>
        <span class="cl-sub-title"><?php echo _e('アパート','hotel-center-lite-child') ?></span>
    </h2>
    <div class="aparment-posts">
        <div class="cat-studio">
            <div class="cat-main-title cat-studio-main-title">
                <div class="cat-line cat-studio-line"></div>
                <h3 class="cat-title cat-studio-title"><?php _e('スタジオ','hotel-center-lite-child'); ?></h3>
            </div>
            <?php 
            $args = array(
                'post_type'         =>  'apartment',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'        =>  1,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'      =>  'apartment-category',
                        'field'         =>  'slug',
                        'terms'         =>  $the_cat,
                        'operator'      =>  'IN'
                    ),
                )
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            // echo "<pre>";print_r($my_post);exit;
            if( $my_posts ) :
            ?>
            <div class="cat-studio-items">
                <div class="csti-item">
                    <div class="csti-img">
                        <?php
                        $sliderCat = get_post_meta($my_posts[0]->ID,'slide_thumbnail', true);
                        if($sliderCat){
                            echo do_shortcode('[smartslider3 slider="'.$sliderCat.'"]');
                        }else{
                        ?>
                        <?php if (has_post_thumbnail( $my_posts[0]->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
                        <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                        <?php endif; ?>
                        <?php } ?>
                    </div>
                    <div class="csti-content post-content">
                        <div class="csti-content-wrap">
                            <a href="<?php echo $my_posts[0]->guid; ?>">
                                <h3 class="post-title"><?php echo $my_posts[0]->post_title; ?></h3>
                                <pre class="post-excerpt"><?php echo $my_posts[0]->post_excerpt; ?></pre>
                                <div class="post-price">
                                    <?php 
                                    $priceDollar = get_post_meta($my_posts[0]->ID,'price_dollar', true);
                                    $currentConversionRateToVND = get_post_meta($my_posts[0]->ID,'currency_conversion_rate_to_vnd', true);
                                    switch($currentLang)
                                    {
                                        case 'en_US':
                                            $currentConversionUnit = get_post_meta($my_posts[0]->ID,'currency_conversion_unit_for_english', true);
                                            $leaseTerm = get_post_meta($my_posts[0]->ID,'lease_term_for_english', true);
                                            break;
                                        default:
                                            $currentConversionUnit = get_post_meta($my_posts[0]->ID,'currency_conversion_unit', true);
                                            $leaseTerm = get_post_meta($my_posts[0]->ID,'lease_term', true);
                                            break;
                                    }
                                    ?>
                                    <span class="pp-dollar"><?php echo '$'.$priceDollar; ?></span>
                                    <span class="pp-vnd">
                                        <?php 
                                        $priceVND = get_post_meta($my_posts[0]->ID,'price_vnd', true);
                                        if($priceVND != ''){
                                            echo '(<span class="pp-vnd-number">'.$priceVND .'</span>' . $currentConversionUnit .')' . ' ' .  $leaseTerm;
                                        }else{
                                            echo '(<span class="pp-vnd-number">'.($priceDollar*$currentConversionRateToVND) .'</span>' . $currentConversionUnit .')' . ' ' . $leaseTerm; 
                                        }
                                        ?>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="cat-bed">
            <div class="cat-bed-items">
                <?php 
                $args_bed_one = array(
                    'post_type'         =>  'apartment',
                    'orderby'           =>  'date',
                    'order'             =>  'DESC',
                    'post_status'       =>  'publish',
                    'posts_per_page'    =>  1,
                    'tax_query'         =>  array(
                        array(
                            'taxonomy'      =>  'apartment-category',
                            'field'         =>  'slug',
                            'terms'         =>  $the_cat_bed_one,
                            'operator'      =>  'IN'
                        ),
                    )
                );
                $query_bed = new WP_Query($args_bed_one);
                $my_posts_bed = $query_bed->get_posts();
                // echo "<pre>";print_r($my_posts_bed);exit;
                
                $i = 1;
                foreach($my_posts_bed as $k=>$v) : 
                ?>
                <div class="cat-bed-items-wrap">
                    <div class="cat-main-title cat-bed-title">
                        <h3 class="cat-title">
                            <?php echo "<span class='cat-title-number'>".$i."</span>"; _e('ベッドルーム', 'hotel-center-lite-child'); ?>
                        </h3>
                        <div class="cat-line <?php echo 'mgl'; ?>"></div>
                    </div>
                    <div class="cb-item">
                        <div class="cb-img">
                            <?php
                        $slider = get_post_meta($v->ID,'slide_thumbnail', true);
                        if($slider){
                            echo do_shortcode('[smartslider3 slider="'.$slider.'"]');
                        }else{
                        ?>
                            <?php if (has_post_thumbnail( $v->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                            <?php endif; ?>
                            <?php } ?>
                        </div>
                        <div class="cb-content post-content">
                            <div class="cb-content-wrap">
                                <a href="<?php echo $my_posts[0]->guid; ?>">
                                    <h4 class="post-title"><?php echo $v->post_title; ?></h4>
                                    <pre class="post-excerpt"><?php echo $v->post_excerpt; ?></pre>
                                    <div class="post-price">
                                        <?php 
                                        $priceDollar = get_post_meta($v->ID,'price_dollar', true);
                                        $currentConversionRateToVND = get_post_meta($v->ID,'currency_conversion_rate_to_vnd', true);
                                        $slider = get_field("slide_thumbnail");
                                        if($slider){
                                            echo do_shortcode($slider);
                                        }
                                        switch($currentLang)
                                        {
                                            case 'en_US':
                                                $currentConversionUnit = get_post_meta($v->ID,'currency_conversion_unit_for_english', true);
                                                $leaseTerm = get_post_meta($v->ID,'lease_term_for_english', true);
                                                break;
                                            default:
                                                $currentConversionUnit = get_post_meta($v->ID,'currency_conversion_unit', true);
                                                $leaseTerm = get_post_meta($v->ID,'lease_term', true);
                                                break;
                                        }
                                        ?>
                                        <span class="pp-dollar"><?php echo '$'.$priceDollar; ?></span>
                                        <span class="pp-vnd">
                                            <?php 
                                            $priceVND = get_post_meta($v->ID,'price_vnd', true);
                                            if($priceVND != ''){
                                                echo '(<span class="pp-vnd-number">'.$priceVND .'</span>' . $currentConversionUnit .')' . ' ' .  $leaseTerm;
                                            }else{
                                                echo '(<span class="pp-vnd-number">'.($priceDollar*$currentConversionRateToVND) .'</span>' . $currentConversionUnit .')' . ' ' . $leaseTerm; 
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
            <div class="cat-bed-items">
                <?php 
                $args_bed_two = array(
                    'post_type'         =>  'apartment',
                    'orderby'           =>  'date',
                    'order'             =>  'DESC',
                    'post_status'       =>  'publish',
                    'posts_per_page'    =>  1,
                    'tax_query'         =>  array(
                        array(
                            'taxonomy'      =>  'apartment-category',
                            'field'         =>  'slug',
                            'terms'         =>  $the_cat_bed_two,
                            'operator'      =>  'IN'
                        ),
                    )
                );
                $query_bed = new WP_Query($args_bed_two);
                $my_posts_bed = $query_bed->get_posts();
                // echo "<pre>";print_r($my_posts_bed);exit;
                
                $i = 2;
                foreach($my_posts_bed as $k=>$v) : 
                ?>
                <div class="cat-bed-items-wrap lor">
                    <div class="cat-main-title cat-bed-title">
                        <div class="cat-line mgr"></div>
                        <h3 class="cat-title">
                            <?php echo "<span class='cat-title-number'>".$i."</span>"; _e('ベッドルーム', 'hotel-center-lite-child'); ?>
                        </h3>
                    </div>
                    <div class="cb-item island">
                        <div class="cb-img">
                            <?php
                        $slider = get_post_meta($v->ID,'slide_thumbnail', true);
                        if($slider){
                            echo do_shortcode('[smartslider3 slider="'.$slider.'"]');
                        }else{
                        ?>
                            <?php if (has_post_thumbnail( $v->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                            <?php endif; ?>
                            <?php } ?>
                        </div>
                        <div class="cb-content post-content">
                            <div class="cb-content-wrap">
                                <a href="<?php echo $my_posts[0]->guid; ?>">
                                    <h4 class="post-title"><?php echo $v->post_title; ?></h4>
                                    <pre class="post-excerpt"><?php echo $v->post_excerpt; ?></pre>
                                    <div class="post-price">
                                        <?php 
                                        $priceDollar = get_post_meta($v->ID,'price_dollar', true);
                                        $currentConversionRateToVND = get_post_meta($v->ID,'currency_conversion_rate_to_vnd', true);
                                        $slider = get_field("slide_thumbnail");
                                        if($slider){
                                            echo do_shortcode($slider);
                                        }
                                        switch($currentLang)
                                        {
                                            case 'en_US':
                                                $currentConversionUnit = get_post_meta($v->ID,'currency_conversion_unit_for_english', true);
                                                $leaseTerm = get_post_meta($v->ID,'lease_term_for_english', true);
                                                break;
                                            default:
                                                $currentConversionUnit = get_post_meta($v->ID,'currency_conversion_unit', true);
                                                $leaseTerm = get_post_meta($v->ID,'lease_term', true);
                                                break;
                                        }
                                        ?>
                                        <span class="pp-dollar"><?php echo '$'.$priceDollar; ?></span>
                                        <span class="pp-vnd">
                                            <?php 
                                            $priceVND = get_post_meta($v->ID,'price_vnd', true);
                                            if($priceVND != ''){
                                                echo '(<span class="pp-vnd-number">'.$priceVND .'</span>' . $currentConversionUnit .')' . ' ' .  $leaseTerm;
                                            }else{
                                                echo '(<span class="pp-vnd-number">'.($priceDollar*$currentConversionRateToVND) .'</span>' . $currentConversionUnit .')' . ' ' . $leaseTerm; 
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
            <div class="cat-bed-items">
                <?php 
                $args_bed_three = array(
                    'post_type'         =>  'apartment',
                    'orderby'           =>  'date',
                    'order'             =>  'DESC',
                    'post_status'       =>  'publish',
                    'posts_per_page'    =>  1,
                    'tax_query'         =>  array(
                        array(
                            'taxonomy'      =>  'apartment-category',
                            'field'         =>  'slug',
                            'terms'         =>  $the_cat_bed_three,
                            'operator'      =>  'IN'
                        ),
                    )
                );
                $query_bed = new WP_Query($args_bed_three);
                $my_posts_bed = $query_bed->get_posts();
                // echo "<pre>";print_r($my_posts_bed);exit;
                
                $i = 3;
                foreach($my_posts_bed as $k=>$v) : 
                ?>
                <div class="cat-bed-items-wrap">
                    <div class="cat-main-title cat-bed-title">
                        <h3 class="cat-title">
                            <?php echo "<span class='cat-title-number'>".$i."</span>"; _e('ベッドルーム', 'hotel-center-lite-child'); ?>
                        </h3>
                        <div class="cat-line mgl"></div>
                    </div>
                    <div class="cb-item">
                        <div class="cb-img">
                            <?php
                        $slider = get_post_meta($v->ID,'slide_thumbnail', true);
                        if($slider){
                            echo do_shortcode('[smartslider3 slider="'.$slider.'"]');
                        }else{
                        ?>
                            <?php if (has_post_thumbnail( $v->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                            <?php endif; ?>
                            <?php } ?>
                        </div>
                        <div class="cb-content post-content">
                            <div class="cb-content-wrap">
                                <a href="<?php echo $my_posts[0]->guid; ?>">
                                    <h4 class="post-title"><?php echo $v->post_title; ?></h4>
                                    <pre class="post-excerpt"><?php echo $v->post_excerpt; ?></pre>
                                    <div class="post-price">
                                        <?php 
                                        $priceDollar = get_post_meta($v->ID,'price_dollar', true);
                                        $currentConversionRateToVND = get_post_meta($v->ID,'currency_conversion_rate_to_vnd', true);
                                        $slider = get_field("slide_thumbnail");
                                        if($slider){
                                            echo do_shortcode($slider);
                                        }
                                        switch($currentLang)
                                        {
                                            case 'en_US':
                                                $currentConversionUnit = get_post_meta($v->ID,'currency_conversion_unit_for_english', true);
                                                $leaseTerm = get_post_meta($v->ID,'lease_term_for_english', true);
                                                break;
                                            default:
                                                $currentConversionUnit = get_post_meta($v->ID,'currency_conversion_unit', true);
                                                $leaseTerm = get_post_meta($v->ID,'lease_term', true);
                                                break;
                                        }
                                        ?>
                                        <span class="pp-dollar"><?php echo '$'.$priceDollar; ?></span>
                                        <span class="pp-vnd">
                                            <?php 
                                            $priceVND = get_post_meta($v->ID,'price_vnd', true);
                                            if($priceVND != ''){
                                                echo '(<span class="pp-vnd-number">'.$priceVND .'</span>' . $currentConversionUnit .')' . ' ' .  $leaseTerm;
                                            }else{
                                                echo '(<span class="pp-vnd-number">'.($priceDollar*$currentConversionRateToVND) .'</span>' . $currentConversionUnit .')' . ' ' . $leaseTerm; 
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>