<?php 
/**
 * The Template for displaying taxonomy posts.
 *
 * @package Hotel Center Lite
 */

get_header();

include get_stylesheet_directory() . '/inc/lang/translate.php';

?>
<style>
<?php include get_stylesheet_directory() . '/assets/css/page-apartment.css';
?>
</style>
<?php 
// var_dump($queried_object);
$term_name = $queried_object->name;
$term_des = $queried_object->description;
$term_id = $queried_object->term_id;

$pageTitle = $term_name;

$pageSubTitle = $term_name;

$imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-breacrumb/bc-image-apartment.png';
// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);

$args = array(
    'post_type'         =>  'apartments',
    'orderby'           =>  'date',
    'order'             =>  'DESC',
    'post_status'       =>  'publish',
    'posts_per_page'        =>  1,
    'tax_query'         =>  array(
        array(
            'taxonomy'      =>  'apartment',
            'field'         =>  'id',
            'terms'         =>  $term_id,
            'operator'      =>  'IN'
        ),
    )
);
$query = new WP_Query($args);
$my_posts = $query->get_posts();
// echo "<pre>";print_r($my_post);exit;
if( $my_posts ) :
?>
<div class="apartment-detail">
    <div class="apartment-detail-wrap">
        <div class="container">
            <div class="apd-tax">
                <div class="cat-main-title">
                    <div class="cat-line"></div>
                    <h3 class="cat-title"><?php echo $term_name; ?></h3>
                    <div class="cat-des"><?php echo $term_des; ?></div>
                </div>
                <div class="apd-tax-share">
                    <a href="#">
                        <i class="fas fa-share-alt"></i>
                        <span><?php echo $strButtonShare; ?></span>
                    </a>
                </div>
            </div>
            <div class="apd-tax-slide">
                <div class="csti-img">
                    <?php
                        $sliderCat = get_field('slide_thumbnail', $my_posts[0]->ID);
                        $lengthArray = count($sliderCat);
                        // echo "<pre>";var_dump($lengthArray);exit;
                        if($sliderCat && $sliderCat['img_1'] != false){
                            ?>
                    <div class="post-img-slide-wrap">
                        <div id="carouselImgSlide" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php if (has_post_thumbnail( $my_posts[0]->ID ) ): ?>

                                <li data-target="#carouselImgSlide" data-slide-to="0" class="active"></li>

                                <?php endif; ?>

                                <?php for($i = 0; $i < $lengthArray; $i++) : ?>

                                <?php 
                                $nameImg = 'img_'.($i + 1);
                                if($sliderCat[$nameImg] != false) : ?>

                                <li data-target="#carouselImgSlide"
                                    data-slide-to="<?php if(!has_post_thumbnail( $my_posts[0]->ID )) echo $i; else echo $i+1; ?>"
                                    class="<?php if($i==0 && !has_post_thumbnail( $my_posts[0]->ID ))echo'active'; ?>">
                                </li>

                                <?php endif; ?>

                                <?php endfor; ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php if (has_post_thumbnail( $my_posts[0]->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
                                <div class="carousel-item active">
                                    <img src="<?php echo $image[0]; ?>"
                                        alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                </div>
                                <?php endif; ?>
                                <?php foreach($sliderCat as $ks=>$vs) : ?>
                                <?php if($sliderCat[$ks] != false) : ?>
                                <div
                                    class="carousel-item <?php if($ks == 'img_1' && ! has_post_thumbnail( $my_posts[0]->ID )) echo 'active'; ?>">
                                    <img src="<?php echo $vs['url']; ?>" alt="<?php echo $vs['title']; ?>">
                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <a class="carousel-control carousel-control-prev" href="#carouselImgSlide" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control carousel-control-next" href="#carouselImgSlide" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="quote-orverlay"></div>
                    </div>
                    <div class="apd-tax-slide-lightbox">
                        <button id="btnLightbox" class="button" type="button" data-toggle="modal"
                            data-target="#modal-slide-apm">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/lightboxA.png" alt="">
                        </button>
                    </div>
                    <?php }else{ ?>

                    <?php if (has_post_thumbnail( $my_posts[0]->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                    <?php endif; ?>

                    <?php } ?>

                    <?php if($sliderCat){ ?>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-slide-apm" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <?php
                                    $sliderCat = get_field('slide_thumbnail', $my_posts[0]->ID);
                                    $lengthArray = count($sliderCat);
                                    // echo "<pre>";var_dump($lengthArray);exit;
                                    if($sliderCat && $sliderCat['img_1'] != false) :
                                        ?>
                                    <div class="post-img-slide-wrap">
                                        <div id="carouselImgSlideModal" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <?php if (has_post_thumbnail( $my_posts[0]->ID ) ): ?>
                                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
                                                <li data-target="#carouselImgSlideModal" data-slide-to="0"
                                                    class="active" style="background: url('<?php echo $image[0]; ?>')">
                                                </li>

                                                <?php endif; ?>

                                                <?php for($i = 0; $i < $lengthArray; $i++) : ?>

                                                <?php 
                                                $nameImg = 'img_'.($i + 1);
                                                if($sliderCat[$nameImg] != false) : ?>

                                                <li data-target="#carouselImgSlideModal"
                                                    data-slide-to="<?php if(!has_post_thumbnail( $my_posts[0]->ID )) echo $i; else echo $i+1; ?>"
                                                    class="<?php if($i==0 && !has_post_thumbnail( $my_posts[0]->ID ))echo'active'; ?>"
                                                    style="background: url('<?php echo $sliderCat[$nameImg]['url'] ?>')">
                                                </li>

                                                <?php endif; ?>

                                                <?php endfor; ?>
                                            </ol>
                                            <div class="carousel-inner">
                                                <?php if (has_post_thumbnail( $my_posts[0]->ID ) ): ?>
                                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
                                                <div class="carousel-item active">
                                                    <img src="<?php echo $image[0]; ?>"
                                                        alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                                </div>
                                                <?php endif; $i = 0;?>
                                                <?php foreach($sliderCat as $ks=>$vs) : ?>
                                                <?php if($sliderCat[$ks] != false) : ?>
                                                <div
                                                    class="carousel-item <?php if($ks == 'img_1' && ! has_post_thumbnail( $my_posts[0]->ID )) echo 'active'; ?>">
                                                    <img src="<?php echo $vs['url']; ?>"
                                                        alt="<?php echo $vs['title']; ?>">
                                                </div>
                                                <?php $i++; endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                            <a class="carousel-control carousel-control-prev"
                                                href="#carouselImgSlideModal" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control carousel-control-next"
                                                href="#carouselImgSlideModal" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                        <div class="quote-orverlay"></div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <div class="modal-footer-right">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span
                                                class="close-text"><?php _e('閉じる', 'hotel-center-lite-child') ?></span>
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="apd-tax-header">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-12">
                        <div class="apd-tax-header-content">
                            <h3 class="post-title"><?php echo $my_posts[0]->post_title; ?></h3>
                            <pre><?php echo $my_posts[0]->post_excerpt; ?></pre>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-12">
                        <div class="tax-btn-contact">
                            <a href="<?php echo home_url($strLinkContact . '.html'); ?>"><?php echo $strTextContact; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="apd-tax-detail">
                <div class="line-color"></div>
                <div class="apd-basic">
                    <div class="apd-title apd-basic-title">
                        <h4><?php _e('基本情報', 'hotel-center-lite-child'); ?></h4>
                    </div>
                    <div class="apd-basic-content">
                        <?php 
                        $basicInformation = get_field('basic_infomation', $my_posts[0]->ID);
                        ?>
                        <div class="apd-basic-item">
                            <div class="apd-basic-text"><?php echo $strArea; ?></div>
                            <div class="apd-basic-value"><?php echo $basicInformation['area']; ?>
                                m<sup>2</sup></div>
                        </div>
                        <div class="apd-basic-item">
                            <div class="apd-basic-text"><?php echo $strCheckIn; ?></div>
                            <div class="apd-basic-value"><?php echo $basicInformation['check_in']; ?>
                            </div>
                        </div>
                        <div class="apd-basic-item">
                            <div class="apd-basic-text"><?php echo $strPriceApartment; ?></div>
                            <div class="apd-basic-value">
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
                            </div>
                        </div>
                        <div class="apd-basic-item">
                            <div class="apd-basic-text"><?php echo $strBedType; ?></div>
                            <div class="apd-basic-value"><?php echo $basicInformation['bed_type']; ?>
                            </div>
                        </div>
                        <div class="apd-basic-item">
                            <div class="apd-basic-text"><?php echo $strCheckOut; ?></div>
                            <div class="apd-basic-value"><?php echo $basicInformation['check_out']; ?>
                            </div>
                        </div>
                        <div class="apd-basic-item">
                            <div class="apd-basic-text"><?php echo $strMaximumNumberPeople; ?></div>
                            <div class="apd-basic-value">
                                <?php echo $basicInformation['maximum_number_of_people_in_a_room']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line-color opacity"></div>
                <div class="apd-convenience apd-basic">
                    <div class="apd-title apd-convenience-title">
                        <h4><?php _e('部屋の利便性', 'hotel-center-lite-child'); ?></h4>
                    </div>
                    <div class="apd-basic-utilities">
                        <?php  
                        $termsUtilities = wp_get_object_terms( $my_posts[0]->ID, 'utilities-category');
                        // var_dump($termsUtilities);
                        foreach($termsUtilities as $kterm=>$vterm) :
                        ?>
                        <div class="utilities-item apd-basic-item">
                            <div class="utilities-icon apd-basic-text">
                                <?php 
                                $image = get_field('apartment_image_tax', $vterm->taxonomy . '_' . $vterm->term_id);
                                if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="utilities-title apd-basic-value"><?php echo $vterm->name; ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="line-color opacity"></div>
                <div class="apd-info">
                    <div class="apd-title apd-info-title">
                        <h4><?php _e('情報利用', 'hotel-center-lite-child'); ?></h4>
                    </div>
                    <div class="apd-info-content">
                        <?php echo wpautop($my_posts[0]->post_content); ?>
                    </div>
                </div>
                <div class="line-color opacity"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<section class="apd-tax-other-room">
    <div class="apd-tax-other-room-wrap">
        <h2 class="ap-title cl-title text-center">
            <span class="cl-main-title change-cl"><?php echo _e('他の部屋', 'hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php echo _e('施設', 'hotel-center-lite-child') ?></span>
        </h2>
        <div class="apd-tax-other-room-carousel">
            <div class="container-fluid">
                <div id="multi-carousel-apartment" class="apartment-carousel">
                    <div class="owl-carousel owl-theme">
                        <?php 
                    $args = array(
                        'post_type'     =>      'apartments',
                        'orderby'       =>      'date',
                        'order'         =>      'DESC',
                        'post_status'   =>      'publish',
                        'posts_per_page'=>      -1,
                        // 'tax_query'         =>  array(
                        //     array(
                        //         'taxonomy'      =>  'apartment',
                        //         'field'         =>  'slug',
                        //         'terms'         =>  $terms[0]->slug,
                        //         'operator'      =>  'NOT IN'
                        //     ),
                        // )
                    );
                    $query = new WP_Query($args);
                    $myPosts = $query->get_posts();
                    // echo "<pre>";print_r($myPosts);exit;
                    foreach($myPosts as $k=>$v) :
                    ?>
                        <div class="item">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>"
                                        title="<?php echo $v->post_title; ?>" class="thumb">
                                        <?php if (has_post_thumbnail( $v->ID ) ): ?>
                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                        <img src="<?php echo $image[0]; ?>"
                                            alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                        <?php endif; ?>
                                        <div class="apd-cat">
                                            <?php 
                                        $getCat = get_the_terms($v->ID,'apartment');
                                        // var_dump($getCat);
                                        foreach($getCat as $kCat=>$vCat){
                                            echo $vCat->name;
                                            break;
                                        }
                                        ?>
                                        </div>
                                        <div class="apd-content post-content">
                                            <h3 class="apd-title"><?php echo $v->post_title; ?></h3>
                                            <div class="post-price">
                                                <?php 
                                            $priceDollar = get_post_meta($v->ID,'price_dollar', true);
                                            $currentConversionRateToVND = get_post_meta($v->ID,'currency_conversion_rate_to_vnd', true);
                                            $currentConversionUnit = get_post_meta($v->ID, $strCurrentConversionUnit, true);
                                            $leaseTerm = get_post_meta($v->ID, $strLeaseTerm, true);
                                            ?>
                                                <span class="pp-dollar">
                                                    <?php echo '$'.$priceDollar; ?>
                                                </span>
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
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();