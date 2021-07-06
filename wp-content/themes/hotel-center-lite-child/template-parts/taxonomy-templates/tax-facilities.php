<?php 
/**
 * The Template for displaying taxonomy posts.
 *
 * @package Hotel Center Lite
 */

get_header();

include get_stylesheet_directory() . '/inc/lang/translate.php';

$showHomePage = get_field('show_home_page');
$showAboutPage = get_field('show_about_page');

$term_name = $queried_object->name;
$term_des = $queried_object->description;
$term_id = $queried_object->term_id;

?>
<style>
<?php include get_stylesheet_directory() . '/assets/css/page-facilities.css';
?>
</style>
<?php 

$pageTitle = $bcFacilities;

$pageSubTitle = $bcFacilities;

$imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-breacrumb/bc-image-facilities.png';
// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
?>
<div id="pFacilities">
    <div class="sr-title">
        <div class="sr-title-wrap container">
            <h2 class="cl-title text-center">
                <span class="cl-main-title change-cl"><?php echo _e('特色','hotel-center-lite-child') ?></span>
                <span class="cl-sub-title"><?php echo _e($term_name,'hotel-center-lite-child') ?></span>
            </h2>
            <div class="cl-tax-share">
                <a href="#">
                    <i class="fas fa-share-alt"></i>
                    <span><?php echo $strButtonShare; ?></span>
                </a>
            </div>
        </div>
    </div>
    <div class="pfacilities-wrap container">
        <div class="pfacilities-items row row-eq-height">

            <?php      
            $args = array(
                'post_type'         =>  'facility',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'        =>  12,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'      =>  'facilities',
                        'field'         =>  'id',
                        'terms'         =>  $term_id,
                        'operator'      =>  'IN'
                    ),
                )
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            // echo "<pre>";print_r($my_posts);exit;         
            foreach($my_posts as $k=>$v) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="pfacilities-item">
                    <div class="pfacilities-img">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                        <img src="<?php if (has_post_thumbnail( $v->ID ) ){echo $image[0];} ?>" alt="<?php if (has_post_thumbnail( $v->ID ) ){custom_the_post_thumbnail_caption();}else{echo 'Not Image';} ?>">

                        <?php 
                            $getCat = get_the_terms($v->ID,'facilities');
                            foreach($getCat as $kCat=>$vCat){
                                echo '<div class="pfnote">'.$vCat->name.'</div>';
                                break;
                            }
                        ?>
                    </div>
                    <div class="pfacilities-body">
                        <div class="pfcontent">
                            <h3 class="pftitle"><?php echo $v->post_title; ?></h3>
                            <p class="pfexcerpt"><?php echo $v->post_excerpt; ?></p >
                        </div>
                        <div class="pffooter btn-direct">
                            <a href="/<?php echo $v->post_type . '/' .$v->post_name ?>.html"
                                rel="noopener noreferrer"><?php _e('もっと見る','hotel-center-lite-child') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php

get_footer();