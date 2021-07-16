<?php
/*
 * Template Name: Event Template
 * Template Post Type: post
 */

get_header();
// get banner
 $page_e = get_page_by_path("events");
 $page_e_id =  $page_e->ID;   

$pageTitle = 'Event';

$pageSubTitle = 'イベント';

$imageUrlBreadcrumb = get_the_post_thumbnail_url($page_e_id);
// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
// end get banner
$locale = get_locale();
    
$sub_title = get_post_meta(get_the_ID(),'sub_title3',true);
if($locale == 'ja'){
   $list_url = "/events.html";
}else{
    $list_url = "/en/events.html";
}
    

$day_of_event = get_post_meta( get_the_ID(), 'day_of_the_event',true );

$event_cats = get_terms( array(
    'taxonomy' => 'event-category',
    'hide_empty' => false,
     'parent'   => 0
) );

//var_dump($event_cats);

?>
<style type="text/css">
.carousel-facilities-about .owl-carousel .fiw-img img{
    height: 534px;
}

.carousel-facilities-about .owl-carousel .owl-item{
    opacity: 0.5;
}

.carousel-facilities-about .owl-carousel .active{
    opacity: 1 !important;
}

.container-facilities-about{
    padding-left: 0px;
    padding-right: 0px
}

.container-facilities-about .wrap-facilities-about{
   width: 100%;
   position: relative;
}

.container-facilities-about .wrap-facilities-about .mask-facilities-about{
    width: 100%;
    height: 930px;
    position: absolute;
    z-index: -1;
    padding: 0px 60px;
}

.container-facilities-about .wrap-facilities-about .mask-facilities-about .content-facilities-about{
    background: #F6F5F1;
    position: relative;
    height: 100%;
}


.owl-carousel .owl-nav button.owl-prev{
    position: absolute;
    top: 45%;
    left: 195px;
    background: #2c2d2d;
    height: 60px;
    width: 60px;
    opacity: 0.5;
}

.owl-carousel .owl-nav button.owl-next{
    position: absolute;
    top: 45%;
    right: 195px;
    background: #2c2d2d !important;
    height: 60px;
    width: 60px;
    opacity: 0.5;
}

.owl-carousel .owl-nav button.owl-prev:focus, .owl-carousel .owl-nav button.owl-next:focus{
    outline: none;
}

.owl-carousel .owl-nav button.owl-prev:hover, .owl-carousel .owl-nav button.owl-next:hover{
   background: #869791 !important;
}



.owl-carousel .owl-nav button.owl-next span, .owl-carousel .owl-nav button.owl-prev span {
    background: none;
    border: solid #FFFFFF;
    border-width: 0 2px 2px 0;
    height: 20px;
    width: 20px;
    display: block;
}

.owl-carousel .owl-nav button.owl-next span {
    -webkit-transform: rotate( -45deg);
    -ms-transform: rotate( -45deg);
    transform: rotate( -45deg);
    margin-left: 15px;
}

.owl-carousel .owl-nav button.owl-prev span {
    -webkit-transform: rotate(135deg);
    -ms-transform: rotate( 135deg);
    transform: rotate(135deg);
    margin-left: 25px;
}

/* size SM - < 767.98px */

@media screen and (max-width: 767.98px) {

    .carousel-facilities-about .owl-carousel .fiw-img img{
      height: 174px;
    }

    .container-facilities-about .wrap-facilities-about .mask-facilities-about{
        width: 100%;
        height: 450px;
        position: absolute;
        z-index: -1;
        padding: 0px 20px;
    }
   
}


/* size E SM - < 599px */

@media screen and (max-width: 599px) {
    .owl-carousel .owl-nav button.owl-next{
        right: 55px;
        top: 35%;
        height: 35px;
        width: 35px;
    }
    .owl-carousel .owl-nav button.owl-prev span{
        margin-left: 13px;
    }
    .owl-carousel .owl-nav button.owl-prev{
        left: 55px;
        top: 35%;
        height: 35px;
        width: 35px;
    }
    .owl-carousel .owl-nav button.owl-next span{
        margin-left: 4px;
    }

    .carousel-facilities-about .owl-carousel .fiw-img img{
      height: 133px;
    }
}
</style>

<div class="container-fluid">
    <div class="row single-event">
        <div class="container">
            <section class="single-event-sec">
                <div class="page_title text-center my-5">
                    <h1><?php the_title(); ?></h1>
                    <p><?php echo $sub_title; ?></p>
                </div>
                <div class="day-of-event mb-2">
                    <?php if(!empty($day_of_event)) {
                        if($locale == 'ja'){
                            echo '開催時期: ';
                        }else{
                            echo 'Day of the event: ';
                        } 
                        echo $day_of_event; 
                    } ?>
                </div>

                <?php the_content(); ?>

                <div class="btn-direct mt-5">

                    <a href="<?php echo $list_url; ?>"><?php echo __('戻る','hotel-center-lite-child'); ?></a>
                </div>
            </section>
        </div>
    </div>

    <div class="row other-events">
        <div class="container">
            <section class="other-event-sec" id="multi-carousel-event">
                <h2 class="ap-title cl-title text-center">
                    <span class="cl-main-title change-cl">OTHER EVENTS</span>
                    <span class="cl-sub-title change-cl">イベント</span>
                </h2>

                <div class="owl-carousel owl-theme owl-loaded owl-drag">

                    <?php 
                    
                    // get the custom post type's taxonomy terms
                    $custom_taxterms = wp_get_object_terms( $post->ID, 'event-category', array('fields' => 'ids') );
                    // arguments
                    $args = array(
                    'post_type' => 'event',
                    'post_status' => 'publish',
                    //'posts_per_page' => 3,
                    //'orderby' => 'rand',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'event-category',
                            'field' => 'id',
                            'terms' => $custom_taxterms
                        )
                    ),
                    'post__not_in' => array ($post->ID),
                    );

                    $related_items = new WP_Query( $args );
                    // loop over query
                    if ($related_items->have_posts()) :
                        ?>   
                    <?php while ( $related_items->have_posts() ) : $related_items->the_post();

                        $sub_arr = array(
                            'childless'=> true,
                            //'fields' => array('names')
                        );  
                        $sub_cat = wp_get_post_terms(get_the_ID(),'event-category',$sub_arr) ;
                        ?> 
                            <div class="event_item">
                                    <?php if(!empty( $sub_cat)) {
                                        $sub_cat_color = get_field('category_background_color',$sub_cat[0]->taxonomy.'_'.$sub_cat[0]->term_id) ;
                                        $sub_cat_color = !empty($sub_cat_color) ? $sub_cat_color : '#166772';
                                        ?>
                                        <div class="sub_cat" style="background: <?php echo $sub_cat_color; ?>"><?php echo $sub_cat[0]->name ;?></div>
                                    <?php } ?>

                                <div class="event_img">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium') ?></a>
                                </div>

                                <div class="event_info p-3">
                                    <h3 class="mb-2 text-center">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="event_excerpt">
                                        <p>
                                            <?php
                                                $event_len = mb_strlen(get_the_excerpt(),'UTF-8');
                                                if($locale == 'ja'){
                                                    echo mb_substr(get_the_excerpt(), 0, 50,'UTF-8');
                                                        if($event_len > 50 ){
                                                            echo '[...]'; 
                                                        }
                                                }else{
                                                    echo mb_substr(get_the_excerpt(), 0, 100,'UTF-8');
                                                        if($event_len > 100 ){
                                                            echo '[...]';
                                                        }    
                                                } 
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            endwhile;
                            // echo '</ul>';
                            endif;
                            // Reset Post Data
                            wp_reset_postdata();
                            ?>
                    </div>
               
            </section>
        </div>
    </div>

    <div class="block-carousel-facilities-about">
        <div class="container-fluid container-facilities-about">
            <div class="wrap-facilities-about">
                <div class="mask-facilities-about">
                    <div class="content-facilities-about"></div>
                </div>    
                <h2 class="cl-title text-center">
                    <span class="cl-main-title"><?php echo _e('FACILITIES','hotel-center-lite-child') ?></span>
                    <span class="cl-sub-title"><?php echo _e('施設','hotel-center-lite-child') ?></span>
                </h2>
                
                <div class="carousel-facilities-about">
                    <div class="carousel-facilities-about-wrap">
                        <div class="owl-carousel owl-theme">
                                <?php 
                            $args = array(
                                'post_type'     =>      'facilities',
                                'orderby'       =>      'date',
                                'order'         =>      'DESC',
                                'post_status'   =>      'publish',
                            );
                            $query = new WP_Query($args);
                            $myPosts = $query->get_posts();
                            $i = 0;
                            // echo "<pre>";print_r($myPosts);
                            foreach($myPosts as $k=>$v) :
                                if (has_post_thumbnail( $v->ID ) ): ?>
                                <div class="item <?php if($i == 0) echo 'active'; ?>">
                                    <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html')?>">
                                        <div class="fiw-img">
                                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                            <img src="<?php echo $image[0]; ?>"
                                                alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                        </div>
                                    </a>
                                </div>
                                <?php $i++; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php //get_sidebar();?>
    
    <div class="clear"></div>
</div><!-- container -->

<?php get_footer(); ?>