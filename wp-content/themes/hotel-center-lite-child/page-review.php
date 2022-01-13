<?php
/**
 * Template Name: レビュー - Page Review
 */

get_header();
$reviews = get_terms( array(
    'taxonomy' => 'reviews-category',
    'hide_empty' => false,
     //'parent'   => 0
) );
//var_dump($reviews);
$url =  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_arr = explode('?', $url);
$url = $url_arr[0];
$locale = get_locale();

include dirname( __FILE__ ) . '/inc/lang/translate.php';
//$sub_title = get_post_meta(get_the_ID(),'sub_title3',true);

?>
    <div class="container">
        <div id="page_content_area">
            <section class="site_content">
                <div class="sr-title">
                    <div class="sr-title-wrap container">
                        <h2 class="cl-title text-center">
                            <span class="cl-main-title change-cl"><?php echo _e('Review','hotel-center-lite-child') ?></span>
                            <span class="cl-sub-title"><?php echo _e('お客様の声','hotel-center-lite-child') ?></span>
                        </h2>
                    </div>
                </div>

                <!-- <div class="page_title text-center my-5"> -->
                    <!-- EVENT -->
                    <?php //the_title(); ?>
                    <p><?php //echo $sub_title; ?></p>
                <!-- </div> -->

                <div class="entry-content">
                    <div class="wrap_container">
                        <?php if(!empty($reviews)){ ?>
                            <?php foreach ($reviews as $review) {                              
                               // var_dump($review);
                                $review_id = $review->term_id;
                                $photo =  get_field('reviewer_photo',$review->taxonomy.'_'.$review_id) ;
                                $review_number =  get_field('review_number',$review->taxonomy.'_'.$review_id) ;
                                $stars =  get_field('stars',$review->taxonomy.'_'.$review_id) ;
                                $noStar = 5 - $stars;
                                $review_date =  get_field('review_date',$review->taxonomy.'_'.$review_id) ;
                                $review_content =  get_field('review_content',$review->taxonomy.'_'.$review_id) ;
                                $like_nuber =  get_field('like_nuber',$review->taxonomy.'_'.$review_id) ;
                                $review_len = mb_strlen($review_content,'UTF-8');
                                if($locale == 'ja'){
                                    $len = 100;
                                    $substring = ($review_len > $len) ? mb_substr($review_content,0,$len,'UTF-8') : $review_content;
                                }else{
                                    $len = 200;
                                    $substring = ($review_len > $len) ? mb_substr($review_content,0,$len,'UTF-8') : $review_content;
                                }


                                $args = array(
                                'post_type' => 'review',
                                'posts_per_page' =>-1,
                                'tax_query' => array(
                                    array(
                                    'taxonomy' => 'reviews-category',
                                    'field' => 'term_id',
                                    'terms' => $review_id                                        
                                     )
                                  )
                                );
                                $responses = new WP_Query( $args ); 

                                ?>
                                <div class="row pt-5 pb-3 wrap_review">
                                    <div class="col-12">
                                        <div class="review_item d-block d-md-flex">
                                            <div class="review_img ">
                                                <?php if(!empty($photo)) {?>
                                                    <img src="<?php echo $photo ; ?>">
                                                <?php }else{ ?>
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/review/default.png">
                                                <?php } ?>    
                                                
                                            </div>
                                            <div class="review_info ">
                                                <h2><?php echo $review->name; ?></h2>
                                                <p><?php echo $review_number ?> <?php echo  ($review_number > 1) ? __('reviews','hotel-center-lite-child') : __('review','hotel-center-lite-child') ?></p>
                                                <div class="review_star">
                                                    <div class="star_icon d-inline-block align-middle">
                                                        <?php for($i=0; $i< $stars;$i++){?>
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/review/star.png">
                                                        <?php } ?>
                                                        <?php if($noStar > 0) { ?>
                                                            <?php for($j=0; $j< $noStar;$j++){?>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/review/no_star.png">
                                                            <?php } ?>
                                                        <?php } ?>    
                                                        <span class="align-middle"><?php echo number_format($stars,1) ?></span>
                                                    </div>
                                                    <div class="review_date d-inline-block align-bottom">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/review/border_date.png">
                                                        <?php echo $review_date; ?>
                                                    </div>
                                                </div>
                                                <div class="wrap_content">
                                                    <div class="reivew_content my-3  d_block "><?php echo $substring ; ?> <?php if($review_len > $len) { ?><span class="load_more">...<?php echo __('More','hotel-center-lite-child') ?></span><?php } ?></div>
                                                    <div class="reivew_content my-3  d_none">
                                                        <?php echo $review_content ; ?><span class="hide_content">...<?php echo __('Hide','hotel-center-lite-child') ?></span>
                                                            
                                                        </div>
                                                </div>
                                                
                                                <div class="reivew_advance">
                                                    <div class="review_like d-inline-block pr-3">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/review/like_icon.png"><span><?php echo $like_nuber; ?></span>
                                                    </div>
                                                    <div class="comment_icon d-inline-block ">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/review/comment_icon.png"><span><?php echo $responses->found_posts; ?>
                                                    </div>
                                                </div>
                                                <div class="review_response <?php echo  ($responses->found_posts > 0) ? 'mt-4' : '' ; ?> ">
                                                    <?php if(!empty($responses)){
                                                        while( $responses->have_posts() ) :  $responses->the_post();
                                                        $res_content = get_field('response_content',get_the_ID()) ;
                                                        $response_len = mb_strlen($res_content,'UTF-8');
                                                        if($locale == 'ja'){
                                                            $len_r = 100;
                                                            $substring_r = ($response_len > $len_r) ? mb_substr($res_content,0,$len_r,'UTF-8') : $res_content;
                                                        }else{
                                                            $len_r = 200;
                                                            $substring_r = ($response_len > $len_r) ? mb_substr($res_content,0,$len_r,'UTF-8') : $res_content;
                                                        }
                                                        ?>
                                                        <div class="responses_item py-3 pl-4 d-flex">
                                                            <div class="responser d-inline-block align-top mr-3">
                                                                <div class="res_img">
                                                                    <?php if(has_post_thumbnail()){ ?>
                                                                        <?php the_post_thumbnail('thumnail'); ?>    
                                                                    <?php }else{ ?>
                                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/review/default.png">
                                                                    <?php } ?>    
                                                                    
                                                                </div>  
                                                            </div>
                                                            <div class="response_content d-inline-block align-top mr-3 ">
                                                                <div class="res_name"><?php the_title(); ?></div>
                                                                <div class="wrap_content">
                                                                    <div class="reivew_content my-3  d_block "><?php echo $substring_r ; ?><?php if($response_len > $len_r){ ?> <span class="load_more">...<?php echo __('More','hotel-center-lite-child') ?></span><?php } ?></div>
                                                                    <div class="reivew_content my-3  d_none">
                                                                        <?php echo $res_content ; ?><span class="hide_content">...<?php echo __('Hide','hotel-center-lite-child') ?></span>                
                                                                    </div>
                                                                </div>
                                                             </div>
                                                        </div>

                                                    <?php
                                                        endwhile;wp_reset_postdata();
                                                     } 
                                                      ?>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                             <?php } ?>    
                        <?php } ?>    
                    </div>                    
                </div>
            </section><!-- section-->
            <?php //get_sidebar();?>
            <div class="clear"></div>
        </div><!-- .pagelayout_area -->
    </div><!-- .container -->  
    <script type="text/javascript">
        //jQuery(document).ready(function() {
            jQuery(".load_more").click(function(){
                jQuery(this).parents(".wrap_content").find(".d_block").hide();
                jQuery(this).parents(".wrap_content").find(".d_none").show();
            })
            jQuery(".hide_content").click(function(){
                jQuery(this).parents(".wrap_content").find(".d_block").show();
                jQuery(this).parents(".wrap_content").find(".d_none").hide();
            })

            jQuery(".comment_icon").click(function(){
                jQuery(".review_response").toggle();
            })

       // })
    </script>
<?php
get_footer();