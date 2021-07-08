<?php
/*
 * Template Name: Event Template
 * Template Post Type: post
 */

get_header();
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

   <?php require_once(get_stylesheet_directory() . '/template-parts/block/block-event-facilities.php'); ?>

    <?php //get_sidebar();?>
    
    <div class="clear"></div>
</div><!-- container -->

<?php get_footer(); ?>