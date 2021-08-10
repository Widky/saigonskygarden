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
<?php include dirname(__FILE__) . '/assets/css/page-attractions.css';
?>
</style>
<?php
$terms = wp_get_object_terms( get_the_ID(), 'attractions');
// var_dump($terms);
$term_name = $terms[0]->name;
$term_des = $terms[0]->description;

$pageTitle = 'Attractions';

$pageSubTitle = '魅力';

$imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-breacrumb/bc-image-attractions.png';
// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
?>
<div class="single-pAttractions">
    <div class="container">
        <div class="spa-items row">
            <div class="col-12">
                <h2 class="cl-title text-center">
                    <span class="cl-main-title change-cl"><?php _e($term_name,'hotel-center-lite-child') ?></span>
                    <span class="cl-sub-title"><?php _e($term_des,'hotel-center-lite-child') ?></span>
                </h2>
            </div>
            <div class="sai col-xl-10 col-lg-12">
                <div class="single-attractions-item">
                    <div class="single-attractions-item-wrap row">
                        <div class="saiw-img col-lg-7 col-md-12">

                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                            <img src="<?php if (has_post_thumbnail( get_the_ID() ) ){echo $image[0];} ?>"
                                alt="<?php if (has_post_thumbnail( get_the_ID() ) ){custom_the_post_thumbnail_caption();}else{echo 'Not Image';} ?>">

                            <?php if(get_the_excerpt() != ''){ ?><div class="saiw-des"><?php echo get_the_excerpt(); ?>
                            </div><?php } ?>
                        </div>
                        <div class="saiw-body col-lg-5 col-md-12">
                            <h3 class="saiw-title"><?php echo get_the_title(); ?></h3>
                            <?php if(get_the_excerpt() != ''){ ?><div class="saiw-des text-center">
                                <?php echo get_the_excerpt(); ?></div><?php } ?>
                            <p class="saiw-content"><?php echo get_the_content(); ?></p>
                            <div class="saiw-footer">
                                <?php $ggmap = get_field('google_maps',get_the_ID()); ?>
                                <a href="<?php echo $ggmap; ?>" target="_blank"
                                    rel="noopener noreferrer"><?php _e('Googlemap','hotel-center-lite-child') ?></a><?php _e('でホテルからのルートを見る','hotel-center-lite-child') ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php 
            $attractions_cats = get_terms( array(
                'taxonomy' => 'attractions',
                'hide_empty' => false,
                'parent'   => 0
            ) );
            $url =  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $url_arr = explode('?', $url);
            $url = $url_arr[0];
            $locale = get_locale();

            $cat_id = $terms[0]->term_id;
            $page_name = 'paged'.$cat_id;
            ${"paged".$cat_id} = isset( $_GET[$page_name] ) ? (int) $_GET[$page_name] : 1;
            // echo ${"paged".$cat_id};
            $args = array(
                'post_type'         =>  'attraction',
                'orderby'           =>  'date',
                'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'posts_per_page'    =>  4,
                'paged'             => ${"paged".$cat_id},
                'post__not_in'      =>  array(get_the_ID()),
                'tax_query'         =>  array(
                    array(
                        'taxonomy'      =>  'attractions',
                        'field'         =>  'slug',
                        'terms'         =>  $terms[0]->slug,
                        'operator'      =>  'IN'
                    ),
                )
            );
            $query = new WP_Query($args);
            $my_posts = $query->get_posts();
            // var_dump($query);
            $i = 1;
            if($my_posts) : 
                foreach($my_posts as $kp=>$vp) :?>
            <div class="sai col-xl-10 col-lg-12 <?php if($i % 2 != 0) echo 'ml-auto'; ?>">
                <div class="single-attractions-item">
                    <div class="single-attractions-item-wrap row">
                        <div class="saiw-img col-lg-7 col-md-12">

                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $vp->ID ), 'single-post-thumbnail' ); ?>
                            <img src="<?php if (has_post_thumbnail( $vp->ID ) ){echo $image[0];} ?>"
                                alt="<?php if (has_post_thumbnail( $vp->ID ) ){custom_the_post_thumbnail_caption();}else{echo 'Not Image';} ?>">

                            <?php if($vp->post_excerpt != ''){ ?><div class="saiw-des"><?php echo $vp->post_excerpt; ?>
                            </div><?php } ?>
                        </div>
                        <div class="saiw-body col-lg-5 col-md-12">
                            <h3 class="saiw-title"><?php echo $vp->post_title; ?></h3>
                            <?php if($vp->post_excerpt != ''){ ?><div class="saiw-des text-center">
                                <?php echo $vp->post_excerpt; ?></div><?php } ?>
                            <p class="saiw-content"><?php echo $vp->post_content; ?></p>
                            <div class="saiw-footer">
                                <?php $ggmap = get_field('google_maps',$vp->ID); ?>
                                <a href="<?php echo $ggmap; ?>" target="_blank"
                                    rel="noopener noreferrer"><?php _e('Googlemap','hotel-center-lite-child') ?></a><?php _e('でホテルからのルートを見る','hotel-center-lite-child') ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php $i++; endforeach; wp_reset_postdata();?>
            <div class="col-12 justify-content-center att-navigation">
                <?php 
                wp_reset_query();
                ${"pag_args".$cat_id} = array(
                    'format'  => '?paged=%#%',
                    'current' => ${"paged".$cat_id},
                    'total'   => $query->max_num_pages,
                );
                $range = 1;
                $showitems = ($range * 2)+1;
                $pages = $query->max_num_pages;
                $add_str = $pages;

                if(!$pages)
                {
                    $pages = 1;
                }

                if(1 != $pages)
                {
                    echo "<nav aria-label='Page navigation'>  <ul class='pagination m-0 justify-content-center '>";
                        
                    if(${"paged".$cat_id} > 1 && $showitems < $query->max_num_pages){
                        echo "<li class='page-item'><a class='page-link' href='".$url."/?paged".$cat_id."=1"."&".$add_str."'><i class=\"fa fa-angle-double-left\" aria-hidden=\"true\"></i></a></li>";
                        echo "<li class='page-item'><a class='page-link' href='".$url."/?paged".$cat_id."=".(${"paged".$cat_id}-1)."&".$add_str."'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></a></li>";
                    }
                    for ($i=1; $i <= $pages; $i++)
                    {
                        if (1 != $pages &&( !($i >= ${"paged".$cat_id}+$range+1 || $i <= ${"paged".$cat_id}-$range-1) || $pages <= $showitems ))
                        {
                        echo (${"paged".$cat_id} == $i)? "<li class=\"page-item active\"><a class='page-link'>".$i."</a></li>":"<li class='page-item'> <a href='".$url."/?paged".$cat_id."=".$i."&".$add_str."' class=\"page-link\">".$i."</a></li>";
                        }
                    }
                    if (${"paged".$cat_id} < $pages && $showitems < $pages){
                        echo " <li class='page-item'><a class='page-link' href='".$url."/?paged".$cat_id."=".(${"paged".$cat_id}+1)."&".$add_str."'><i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i></a></li>";
                        echo " <li class='page-item'><a class='page-link' href='".$url."/?paged".$cat_id."=".$pages."&".$add_str."'><i class=\"fa fa-angle-double-right\" aria-hidden=\"true\"></i></a></li>";
                        echo "</ul></nav>\n";
                    } 
                }
                
                ?>
            </div>
            <?php endif; ?>
        </div>
        <section class="attractions">
            <div class="attractions-wrap">
                <h2 class="ap-title cl-title text-center">
                    <span
                        class="cl-main-title change-cl"><?php _e('Other attractions', 'hotel-center-lite-child') ?></span>
                    <span class="cl-sub-title"><?php _e('その他の魅力', 'hotel-center-lite-child') ?></span>
                </h2>
                <div class="attractions-carousel">
                    <div class="container-fluid">
                        <div id="multi-carousel-attractions" class="attractions-carousel">
                            <div class="owl-carousel owl-theme">
                                <?php 
                        $args = array(
                            'post_type'     =>      'attraction',
                            'orderby'       =>      'date',
                            'order'         =>      'DESC',
                            'post_status'   =>      'publish',
                            'posts_per_page'=>      12,
                            'post__not_in'  =>      array(get_the_ID()),
                            'tax_query'         =>  array(
                                array(
                                    'taxonomy'      =>  'attractions',
                                    'field'         =>  'slug',
                                    'terms'         =>  $terms[0]->slug,
                                    'operator'      =>  'IN'
                                ),
                            )
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
                                                <h3 class="att-title"><span
                                                        class="cat-line cat-attractions-line"></span><?php echo $v->post_title; ?>
                                                </h3>

                                                <div class="att-img">

                                                    <?php $image = get_field('set_image_for_other',$v->ID);

                                                    if($image != NULL){
                                                        echo '<img src="'.$image['url'].'" alt="'.$image['filename'].'">';
                                                    }else{
                                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                                    <img src="<?php if (has_post_thumbnail( $v->ID ) ){echo $image[0];} ?>"
                                                        alt="<?php if (has_post_thumbnail( $v->ID ) ){custom_the_post_thumbnail_caption();}else{echo 'Not Image';} ?>">
                                                    <?php } ?>

                                                    <?php if($v->post_excerpt != ''){ ?><div class="att-des">
                                                        <?php echo $v->post_excerpt; ?></div><?php } ?>
                                                </div>

                                                <div class="att-content post-content">
                                                    <p class="att-excerpt"><?php echo $v->post_content; ?></p>
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
    </div>

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
                    <div class="fri-content saiw-content text-center"><?php echo wpautop($my_posts[0]->post_content); ?>
                    </div>
                </div>
                <div class="fri-overlay"></div>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>