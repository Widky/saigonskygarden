<?php 

get_header();

include get_stylesheet_directory() . '/inc/lang/translate.php';

?>
<style>
<?php include get_stylesheet_directory() . '/assets/css/page-service.css';
?>
</style>
<?php 
// var_dump($queried_object);
$term_name = $queried_object->name;
$term_des = $queried_object->description;
$term_id = $queried_object->term_id;

$pageTitle = $term_name;

$pageSubTitle = $term_name;

$imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-breacrumb/bc-image-services.png';
// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
?>
<div id="pService">

    <div class="container">
        <div class="sr-title">
            <div class="sr-title-wrap container">
                <h2 class="cl-title text-center">
                    <span class="cl-main-title change-cl"><?php echo _e('Services','hotel-center-lite-child') ?></span>
                    <span class="cl-sub-title"><?php echo $term_name; ?></span>
                </h2>
                <div class="cl-tax-share">
                    <a href="#">
                        <i class="fas fa-share-alt"></i>
                        <span><?php echo $strButtonShare; ?></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row service-items">
            <?php      
            $args = array(
                'post_type'         =>  'service',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'        =>  -1,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'      =>  'services',
                        'field'         =>  'id',
                        'terms'         =>  $term_id,
                        'operator'      =>  'IN'
                    ),
                )
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            // echo "<pre>";print_r($my_posts);exit;  
            $i = 1;
            if($my_posts) :       
            foreach($my_posts as $k=>$v) : ?>
            <div class="col-12 <?php if($i%2==0) echo 'nth' ?>">
                <div class="service-item row">
                    <div class="si-img col-lg-7 col-md-12">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                        <img src="<?php if (has_post_thumbnail( $v->ID ) ){echo $image[0];} ?>"
                            alt="<?php if (has_post_thumbnail( $v->ID ) ){custom_the_post_thumbnail_caption();}else{echo 'Not Image';} ?>">
                    </div>
                    <div class="si-body col-lg-5 col-md-12">
                        <h3 class="si-title"><?php echo $v->post_title; ?></h3>
                        <div class="si-cat">
                            <?php 
                                $getCat = get_the_terms($v->ID,'services');
                                // var_dump($getCat);
                                if($getCat){
                                    foreach($getCat as $kCat=>$vCat){
                                        echo $vCat->name;
                                        break;
                                    }
                                }
                                
                            ?>
                        </div>
                        <p class="si-excerpt"><?php echo $v->post_excerpt; ?></p>
                        <div class="btn-direct">
                            <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>">もっと見る</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php 

get_footer();