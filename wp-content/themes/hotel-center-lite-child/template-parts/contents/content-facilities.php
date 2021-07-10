<?php 
$note = get_field('note', get_the_ID() ); 
if($note == '' || $note == NUll){
    $note = get_the_title();
}
?>
<div class="site-maincontentarea-facilities">
    <h2 class="sr-title cl-title text-center">
        <span class="cl-main-title change-cl"><?php echo _e(get_the_title(),'hotel-center-lite-child') ?></span>
        <span class="cl-sub-title"><?php echo _e($note,'hotel-center-lite-child') ?></span>
    </h2>
    <div class="sm-img">
        <?php
        $sliderCat = get_field('slide_thumbnail', get_the_ID());
        // echo "<pre>";var_dump($lengthArray);exit;
        if($sliderCat && $sliderCat['img_1'] != false) :
        $lengthArray = count($sliderCat);
        ?>
        <div class="post-img-slide-wrap">
            <div id="carouselImgSlideModal" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                    <li data-target="#carouselImgSlideModal" data-slide-to="0" class="active"
                        style="background: url('<?php echo $image[0]; ?>')">
                    </li>

                    <?php endif; ?>

                    <?php for($i = 0; $i < $lengthArray; $i++) : ?>

                    <?php 
                    $nameImg = 'img_'.($i + 1);
                    if($sliderCat[$nameImg] != false) : ?>

                    <li data-target="#carouselImgSlideModal"
                        data-slide-to="<?php if(!has_post_thumbnail( get_the_ID() )) echo $i; else echo $i+1; ?>"
                        class="<?php if($i==0 && !has_post_thumbnail( get_the_ID() ))echo'active'; ?>"
                        style="background: url('<?php echo $sliderCat[$nameImg]['url'] ?>')">
                    </li>

                    <?php endif; ?>

                    <?php endfor; ?>
                </ol>
                <div class="carousel-inner">
                    <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                    <div class="carousel-item active">
                        <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                    </div>
                    <?php endif; $i = 0;?>
                    <?php foreach($sliderCat as $ks=>$vs) : ?>
                    <?php if($sliderCat[$ks] != false) : ?>
                    <div
                        class="carousel-item <?php if($ks == 'img_1' && ! has_post_thumbnail( get_the_ID() )) echo 'active'; ?>">
                        <img src="<?php echo $vs['url']; ?>" alt="<?php echo $vs['title']; ?>">
                    </div>
                    <?php $i++; endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="quote-orverlay"></div>
        </div>

        <?php else :?>

        <?php if (has_post_thumbnail( get_the_ID() ) ): ?>

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
        <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">

        <?php else :?>

        <?php $image = get_field('show_home', get_the_ID()); ?>

        <?php $image = $image['image']; ?>

        <?php if( !empty( $image ) ){ ?>

        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
            title="<?php echo get_the_title(); ?>" />

        <?php }else{ ?>

        <img src="" alt="<?php _e('No Image.','hotel-center-lite-child'); ?>">

        <?php } ?>

        <?php endif;?>

        <?php endif; ?>
    </div>
    <div class="sm-header">
        <div class="row">
            <div class="col-12">
                <div class="sm-header-content mt-3">
                    <div class="line-left space-left"></div>
                    <h3 class="post-title"><?php the_title(); ?></h3>
                    <pre><?php echo get_the_excerpt(); ?></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="sm-detail">

        <?php $basicInformation = get_field('basic_information', get_the_ID()); ?>
        <?php if($basicInformation != Null && $basicInformation['area'] != '') :?>
        <div class="line-color opacity"></div>
        <div class="smrow-utilities sm-basic row">
            <div class="apd-title smrow-title col-md-3">
                <h4><?php _e('基本情報', 'hotel-center-lite-child'); ?></h4>
            </div>
            <div class="smrow-basic-utilities col-md-9">
                <div class="row">
                    <?php if($basicInformation['area'] != ''){ ?>
                    <div class="smrow-item col-md-6">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facilities/u-f1.png"
                            alt="">
                        <div class="smrow-text"><?php echo $strArea; ?></div>
                        <div class="smrow-value"><?php echo $basicInformation['area']; ?><span>m<sup>2</sup></span>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($basicInformation['capacity'] != ''){ ?>
                    <div class="smrow-item col-md-6">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facilities/u-f4.png"
                            alt="">
                        <div class="smrow-text"><?php echo $strCapacity; ?></div>
                        <div class="smrow-value"><?php echo $basicInformation['capacity']; ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($basicInformation['location'] != ''){ ?>
                    <div class="smrow-item col-md-6">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facilities/u-f2.png"
                            alt="">
                        <div class="smrow-text"><?php echo $strLocation; ?></div>
                        <div class="smrow-value"><?php echo $basicInformation['location']; ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($basicInformation['opening_hours'] != ''){ ?>
                    <div class="smrow-item col-md-6">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facilities/u-f3.png"
                            alt="">
                        <div class="smrow-text"><?php echo $strOpeningHours; ?></div>
                        <div class="smrow-value"><?php echo $basicInformation['opening_hours']; ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="line-color opacity"></div>
        <div class="smrow-content apd-title">
            <?php the_content(); ?>
        </div>
    </div>
</div>