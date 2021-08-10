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
$pageTitle = 'Apartment';

$pageSubTitle = 'お部屋案内';

$imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-breacrumb/bc-image-apartment.png';
// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
?>
<style>
.apartment-detail .apd-tax-header {
    margin-top: 70px;
    margin-bottom: 70px;
}
.apartment-detail .apd-tax-header img{
    width: 100%;
}
</style>
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
                                        alt="<?php custom_the_post_thumbnail_caption(); ?>" id="btnLightbox"
                                        class="button" type="button" data-toggle="modal" data-target="#modal-slide-apm">
                                </div>
                                <?php endif; ?>
                                <?php foreach($sliderCat as $ks=>$vs) : ?>
                                <?php if($sliderCat[$ks] != false) : ?>
                                <div
                                    class="carousel-item <?php if($ks == 'img_1' && ! has_post_thumbnail( get_the_ID() )) echo 'active'; ?>">
                                    <img src="<?php echo $vs['url']; ?>" alt="<?php echo $vs['filename']; ?>"
                                        id="btnLightbox" class="button" type="button" data-toggle="modal"
                                        data-target="#modal-slide-apm">
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
                    <div class="col-12">
                        <div class="apd-tax-header-content">
                            <h3 class="post-title"><?php echo get_field('sub_title_decription_field', get_the_ID()) ?>
                            </h3>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
get_footer();