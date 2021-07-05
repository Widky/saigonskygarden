<?php 
/**
 * Template Name: ページのアトラクション - Page Attractions
 */

get_header();

include get_stylesheet_directory() . '/inc/lang/translate.php';

?>
<style>
<?php include get_stylesheet_directory() . '/assets/css/page-attractions.css';
?>
</style>
<?php 
// var_dump($queried_object);
$term_name = $queried_object->name;
$term_des = $queried_object->description;
$term_id = $queried_object->term_id;

$pageTitle = $term_name;

$pageSubTitle = $term_name;

$imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-breacrumb/bc-image-attractions.png';
// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
?>
<div class="pAttractions">
    <div class="container">
        <div class="attractions-items row">
            <div class="col-12">
                <h2 class="cl-title text-center">
                    <span class="cl-main-title change-cl"><?php echo $term_name; ?></span>
                    <span class="cl-sub-title"><?php echo $term_des; ?></span>
                </h2>
            </div>
            <?php 
            $args = array(
                'post_type'         =>  'attraction',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'        =>  -1,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'      =>  'attractions',
                        'field'         =>  'id',
                        'terms'         =>  $term_id,
                        'operator'      =>  'IN'
                    ),
                )
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            // echo "<pre>"; var_dump($my_posts);exit;
            if($my_posts) :
                foreach($my_posts as $kp=>$vp) :
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="<?php echo home_url($vp->post_type . '/' .$vp->post_name . '.html'); ?>">
                    <div class="attractions-item">
                        <div class="attractions-item-wrap">
                            <div class="aiw-img">

                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $vp->ID ), 'single-post-thumbnail' ); ?>
                                <img src="<?php if (has_post_thumbnail( $vp->ID ) ){echo $image[0];} ?>"
                                    alt="<?php if (has_post_thumbnail( $vp->ID ) ){custom_the_post_thumbnail_caption();}else{echo 'Not Image';} ?>">

                                <div class="aiw-des"><?php echo $vp->post_excerpt; ?></div>
                            </div>
                            <div class="aiw-body">
                                <h3 class="aiw-title"><?php echo $vp->post_title; ?></h3>
                                <div class="aiw-line"></div>
                                <div class="aiw-content"><?php echo wpautop($vp->post_content); ?></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <!-- end post -->

        </div>
    </div>
    <!-- end container -->
    <div class="festiva-restaurant">
        <div class="festiva-restaurant-wrap">
            <?php 
            $args = array(
                'post_type'         =>  'attraction',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'        =>  1,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'      =>  'attractions',
                        'field'         =>  'slug',
                        'terms'         =>  $theAttractionsFesRes,
                        'operator'      =>  'IN'
                    ),
                )
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            if($my_posts) : ?>
            <div class="frw-item">

                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
                <img src="<?php if (has_post_thumbnail( $my_posts[0]->ID ) ){echo $image[0];} ?>"
                    alt="<?php if (has_post_thumbnail( $my_posts[0]->ID ) ){custom_the_post_thumbnail_caption();}else{echo 'Not Image';} ?>">
                <div class="fri-body">
                    <h3 class="fri-title text-center"><?php echo $my_posts[0]->post_title; ?></h3>
                    <div class="fri-content aiw-content text-center"><?php echo wpautop($my_posts[0]->post_content); ?>
                    </div>
                </div>
                <div class="fri-overlay"></div>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php 
get_footer();