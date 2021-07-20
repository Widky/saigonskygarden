<?php 
/**
 * The Template for displaying all single posts.
 *
 * @package Hotel Center Lite
 */

get_header();

include dirname( __FILE__ ) . '/inc/lang/translate.php';

?>
<style>
<?php include dirname(__FILE__) . '/assets/css/page-apartment.css';
?>
</style>
<?php 
// $terms = wp_get_object_terms( get_the_ID(), 'apartment');
// // var_dump($terms);
// $term_name = $terms[0]->name;
// $term_des = $terms[0]->description;

$pageTitle = 'Apartment';

$pageSubTitle = 'お部屋案内';

$imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-breacrumb/bc-image-apartment.png';
// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
?>
<div class="apartment-detail">
    <div class="apartment-detail-wrap">
        <div class="container">
            <div class="apd-tax">
                <div class="cat-main-title">
                    <div class="cat-line"></div>
                    <h3 class="cat-title"><?php echo get_field('sub_title_in_detail_page_field3', get_the_ID()); ?></h3>
                    <div class="cat-des"><?php the_title(); ?></div>
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
                    <div class="apd-info-img">
                        <?php 
                            $basicInformation = get_field('basic_infomation_field', get_the_ID());
                            $max_num = isset($basicInformation['maximum_number_of_people_in_a_room_field']) ? $basicInformation['maximum_number_of_people_in_a_room_field'] : "";
                        ?>
                        <h3 class="apdii-content">
                            <?php if(isset($basicInformation['bed_type_field'])){echo $basicInformation['bed_type_field'] ;} ; ?>(<?php echo $max_num; ?>)
                        </h3>
                    </div>
                    <?php
                        $sliderCat = get_field('slide_thumbnail', get_the_ID());
                        $lengthArray = count($sliderCat);
                        // echo "<pre>";var_dump($lengthArray);exit;
                        if($sliderCat && $sliderCat['img_1'] != false){
                            ?>
                    <div class="post-img-slide-wrap">
                        <div id="carouselImgSlide" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>

                                <li data-target="#carouselImgSlide" data-slide-to="0" class="active"></li>

                                <?php endif; ?>

                                <?php for($i = 0; $i < $lengthArray; $i++) : ?>

                                <?php 
                                $nameImg = 'img_'.($i + 1);
                                if($sliderCat[$nameImg] != false) : ?>

                                <li data-target="#carouselImgSlide"
                                    data-slide-to="<?php if(!has_post_thumbnail( get_the_ID() )) echo $i; else echo $i+1; ?>"
                                    class="<?php if($i==0 && !has_post_thumbnail( get_the_ID() ))echo'active'; ?>">
                                </li>

                                <?php endif; ?>

                                <?php endfor; ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                                <div class="carousel-item active">
                                    <img src="<?php echo $image[0]; ?>"
                                        alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                </div>
                                <?php endif; ?>
                                <?php foreach($sliderCat as $ks=>$vs) : ?>
                                <?php if($sliderCat[$ks] != false) : ?>
                                <div
                                    class="carousel-item <?php if($ks == 'img_1' && ! has_post_thumbnail( get_the_ID() )) echo 'active'; ?>">
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

                    <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
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
                                    $sliderCat = get_field('slide_thumbnail', get_the_ID());
                                    $lengthArray = count($sliderCat);
                                    // echo "<pre>";var_dump($lengthArray);exit;
                                    if($sliderCat && $sliderCat['img_1'] != false) :
                                        ?>
                                    <div class="post-img-slide-wrap">
                                        <div id="carouselImgSlideModal" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                                                <li data-target="#carouselImgSlideModal" data-slide-to="0"
                                                    class="active" style="background: url('<?php echo $image[0]; ?>')">
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
                                                    <img src="<?php echo $image[0]; ?>"
                                                        alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                                </div>
                                                <?php endif; $i = 0;?>
                                                <?php foreach($sliderCat as $ks=>$vs) : ?>
                                                <?php if($sliderCat[$ks] != false) : ?>
                                                <div
                                                    class="carousel-item <?php if($ks == 'img_1' && ! has_post_thumbnail( get_the_ID() )) echo 'active'; ?>">
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
                            <h3 class="post-title"><?php echo get_field('sub_title_decription_field', get_the_ID()) ?></h3>
                            <pre><?php echo get_the_excerpt(); ?></pre>
                        </div>
                    </div>
                </div>
            </div>
                <?php 
                $basicInformation = get_field('basic_infomation_field', get_the_ID());
                if($basicInformation) :
                ?>
  
                <div class="row  apd-basic first-detail">
                    <div class="col-12 col-md-2 apd-title apd-basic-title">
                        <h4><?php _e('基本情報', 'hotel-center-lite-child'); ?></h4>
                    </div>
                    <div class="col-12 col-md-10 apd-basic-content">
                            <div class="row">
                               <?php if($basicInformation['area_field'] != ''){ ?>
                                        <div class="apd-basic-item col-md-6 col-lg-4 col-12">
                                            <div class="apd-basic-text d-inline-block"><?php echo $strArea; ?></div>
                                            <div class="apd-basic-value d-inline-block"><?php echo $basicInformation['area_field']; ?>
                                                m<sup>2</sup></div>
                                        </div>
                                        <?php }  ?>
                                        <?php if($basicInformation['check_in'] != ''){ ?>
                                        <div class="apd-basic-item col-md-6 col-lg-4 col-12">
                                            <div class="apd-basic-text d-inline-block"><?php echo $strCheckIn; ?></div>
                                            <div class="apd-basic-value d-inline-block"><?php echo $basicInformation['check_in']; ?>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                        <?php if($basicInformation['bed_type_field'] != ''){ ?>
                                        <div class="apd-basic-item col-md-6 col-lg-4 col-12">
                                            <div class="apd-basic-text d-inline-block"><?php echo $strBedType; ?></div>
                                            <div class="apd-basic-value d-inline-block"><?php echo $basicInformation['bed_type_field']; ?>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                        <?php if($basicInformation['check_out'] != ''){ ?>
                                        <div class="apd-basic-item col-md-6 col-lg-4 col-12">
                                            <div class="apd-basic-text d-inline-block"><?php echo $strCheckOut; ?></div>
                                            <div class="apd-basic-value d-inline-block"><?php echo $basicInformation['check_out']; ?>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                        <?php if($basicInformation['maximum_number_of_people_in_a_room_field'] != ''){ ?>
                                        <div class="apd-basic-item col-md-6 col-lg-4 col-12">
                                            <div class="apd-basic-text d-inline-block"><?php echo $strMaximumNumberPeople; ?></div>
                                            <div class="apd-basic-value d-inline-block">
                                                <?php echo $basicInformation['maximum_number_of_people_in_a_room_field']; ?>
                                            </div>
                                        </div>
                                        <?php }  ?>
                            </div>
                            
                    </div>
                </div>    
                    
                <?php endif; ?>

                <?php  
                    $termsUtilities = wp_get_object_terms( get_the_ID(), 'utilities-category');
                    // var_dump($termsUtilities);
                    if($termsUtilities) :
                ?>
                 <div class="row apd-tax-detail apd-basic">
                     <div class="col-12 col-md-2 apd-title apd-basic-title">
                         <h4><?php _e('部屋の利便性', 'hotel-center-lite-child'); ?></h4>
                     </div>
                     <div class="col-12 col-md-10 apd-basic-content">
                            <div class="row">
                                  <?php  
                                    foreach($termsUtilities as $kterm=>$vterm) :
                                    ?>
                                    <div class="apd-basic-item col-md-6 col-lg-4 col-12">
                                        <div class="apd-basic-text d-inline-block">
                                            <?php 
                                            $image = get_field('apartment_image_tax', $vterm->taxonomy . '_' . $vterm->term_id);
                                            if( !empty( $image ) ): ?>
                                            <img class="basic_icon" src="<?php echo esc_url($image['url']); ?>"
                                                alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="apd-basic-value d-inline-block"><?php echo $vterm->name; ?></div>
                                    </div>
                                    <?php endforeach; ?>                     
                            </div>
                    </div>
                </div> 
                <?php endif; ?>
                <?php if(get_the_content() != '') : ?>
                <div class="row apd-tax-detail apd-basic">
                    <div class="col-12 col-md-2 apd-title apd-basic-title">
                        <h4><?php _e('情報利用', 'hotel-center-lite-child'); ?></h4>
                    </div>
                    <div class="col-12 col-md-10 apd-basic-content">
                        <?php echo wpautop(get_the_content()); ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row apd-tax-detail apd-basic">
                    <div class="apd-button col-12 text-md-right text-center p-md-0">
                        <a target="_blank" href="<?php echo get_option('booking'); ?>" class="change-cl"><?php _e('短期契約・booking.com', 'hotel-center-lite-child'); ?></a>
                        <a href="<?php echo home_url('contact.html'); ?>"><?php _e('長期契約・ご相談', 'hotel-center-lite-child'); ?></a>
                    </div>
                    <div class="clear"></div>
                </div>
       
    </div>
</div>

<section class="apd-tax-other-room">
    <div class="apd-tax-other-room-wrap">
        <h2 class="ap-title cl-title text-center">
            <span class="cl-main-title change-cl"><?php echo _e('Other Apartment', 'hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php echo _e('その他のアパート', 'hotel-center-lite-child') ?></span>
        </h2>
        <div class="apd-tax-other-room-carousel">
            <div class="container-fluid">
                <div id="multi-carousel-apartment" class="apartment-carousel">
                    <div class="owl-carousel owl-theme">
                        <?php 
                        $args = array(
                            'post_type'     =>      'apartment',
                            'orderby'       =>      'date',
                            //'order'         =>      'DESC',
                            'post_status'   =>      'publish',
                            'posts_per_page'=>      -1,
                            'post__not_in' => array( get_the_ID())
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
                                    <a href="<?php echo home_url($v->post_type . '/' .$v->post_name . '.html'); ?>"
                                        title="<?php echo $v->post_title; ?>" class="thumb">
                                        <?php if (has_post_thumbnail( $v->ID ) ): ?>
                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                        <img src="<?php echo $image[0]; ?>"
                                            alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                        <?php endif; ?>
                                        <div class="apd-cat">
                                           <?php echo $v->post_title; ?>
                                        </div>
                                        <div class="apd-content post-content">
                                            <h3 class="apd-title"><?php echo $v->post_title; ?></h3>
                                            <div class="aprt_expert"><?php echo $v->post_excerpt; ?></div>
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