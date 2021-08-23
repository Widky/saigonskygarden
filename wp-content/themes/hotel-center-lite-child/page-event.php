<?php
/**
 * Template Name: イベント - Page Event
 */

get_header();
$event_cats = get_terms( array(
    'taxonomy' => 'event-category',
    'hide_empty' => false,
     'parent'   => 0
) );
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
                            <span class="cl-main-title change-cl"><?php echo _e('Event','hotel-center-lite-child') ?></span>
                            <span class="cl-sub-title"><?php echo _e('イベント','hotel-center-lite-child') ?></span>
                        </h2>
                        <div class="cl-tax-share">
                            <a href="#">
                                <i class="fas fa-share-alt"></i>
                                <span><?php echo $strButtonShare; ?></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="page_title text-center my-5"> -->
                    <!-- EVENT -->
                    <?php //the_title(); ?>
                    <p><?php //echo $sub_title; ?></p>
                <!-- </div> -->
                <div class="entry-content">
                    <?php if(!empty($event_cats)){ 
                        foreach($event_cats as $cat) {                            
                            $cat_id = $cat->term_id;
                            $cat_color = get_field('category_background_color',$cat->taxonomy.'_'.$cat_id) ;
                            $cat_color = !empty($cat_color) ? $cat_color : '#2398a9';
                            $page_name = 'paged'.$cat_id;
                            ${"paged".$cat_id} = isset( $_GET[$page_name] ) ? (int) $_GET[$page_name] : 1;
                            // echo ${"paged".$cat_id};
                         ?>
                            <div class="event_cat">
                                <h2 class="cat_title">
                                    <span class="cat_text" style="background: <?php echo $cat_color; ?>"><?php echo $cat->name; ?></span>
                                </h2>
                                <?php
                                    $args = array(
                                    'post_type' => 'event',
                                    'posts_per_page' =>6,
                                    'paged'     => ${"paged".$cat_id},
                                    'tax_query' => array(
                                        array(
                                        'taxonomy' => 'event-category',
                                        'field' => 'term_id',
                                        'terms' => $cat_id                                        
                                         )
                                      )
                                    );
                                $events = new WP_Query( $args ); 
                                //var_dump($events);
                                  if(!empty($events)){ ?>
                                 <div class="event_items">
                                    <div class="row">
                                        <?php while( $events->have_posts() ) :  $events->the_post();
                                            $sub_arr = array(
                                                'child_of'=> $cat_id,
                                                //'fields' => array('names')
                                            );  
                                            
                                            $sub_cat = wp_get_post_terms(get_the_ID(),'event-category',$sub_arr)  ;
                                         ?>   
                                            <div class="col-12 col-md-6 col-lg-4 mb-4 item_wrap">
                                                <div class="event_item ">
                                                    <?php if(!empty( $sub_cat)) {
                                                        $sub_cat_color = get_field('category_background_color',$sub_cat[0]->taxonomy.'_'.$sub_cat[0]->term_id) ;
                                                        $sub_cat_color = !empty($sub_cat_color) ? $sub_cat_color : '#166772';
                                                     ?>
                                                        <div class="sub_cat" style="background: <?php echo $sub_cat_color; ?>"><?php  echo $sub_cat[0]->name ;?></div>
                                                    <?php } ?>
                                                    <div class="event_img">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail('post-thumbnail')  ?>
                                                        </a>
                                                    </div>
                                                    <div class="event_info p-3">
                                                        <div class="event_date"><?php echo get_the_date('Y-m-d'); ?></div>
                                                        <h3 class="mb-2">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?>                    
                                                            </a>
                                                        </h3>
                                                        <div class="event_excerpt">
                                                            <?php
                                                                $event_len = mb_strlen(get_the_excerpt(),'UTF-8');
                                                                if($locale == 'ja'){
                                                                    echo mb_substr(get_the_excerpt(), 0, 25,'UTF-8');
                                                                        if($event_len > 25 ){
                                                                            echo '...';
                                                                        }
                                                                }else{
                                                                    echo mb_substr(get_the_excerpt(), 0, 50,'UTF-8');
                                                                        if($event_len > 50 ){
                                                                            echo '...';
                                                                        }    
                                                                } 
                                                            ?>
                                                        </div>
                                                        <p class="event_more mt-2">
                                                            <a href="<?php the_permalink(); ?>">
                                                            <span><?php echo __('View More','hotel-center-lite-child') ?></span>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; wp_reset_postdata();?>
                                        
                                        
                                    </div>  
                                    <div class="row justify-content-center">
                                            <?php 

                                         wp_reset_query();
                                             ${"add_args".$cat_id} = array();
                                             $add_str = "";
                                          //  echo $cat_id;
                                            foreach ($event_cats as $cat_p) {
                                                $cat_idp = $cat_p->term_id;
                                                $paged_name = "paged".$cat_idp;
                                                ${"paged".$cat_idp} = isset( $_GET[$paged_name] ) ? (int) $_GET[$paged_name] : 1;
                                                if($cat_p->term_id != $cat_id){

                                                    ${"add_args".$cat_id}['paged'.$cat_p->term_id] =  ${"paged".$cat_idp};
                                                    $add_str .= "paged".$cat_p->term_id."=".${"paged".$cat_idp};
                                                }      
                                                                      
                                            }
                                            ${"pag_args".$cat_id} = array(
                                                'format'  => '?paged'.$cat_id.'=%#%',
                                                'current' => ${"paged".$cat_id},
                                                'total'   => $events->max_num_pages,
                                                'add_args' => ${"add_args".$cat_id}
                                            );
                                            $range = 1;
                                            $showitems = ($range * 2)+1;
                                            $pages = $events->max_num_pages;
                                                if(!$pages)
                                                {
                                                  $pages = 1;
                                                }

                                          if(1 != $pages)
                                          {
                                            echo "<nav aria-label='Page navigation'>  <ul class='pagination m-0 justify-content-center '>";
                                              
                                            if(${"paged".$cat_id} > 1 && $showitems < $events->max_num_pages){
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
                                 </div>  
                                             
                                                                      
                              <?php } ?>                            
                            <?php }?>
                        </div>
                    <?php } ?>    

                    <?php //the_content(); ?>
                </div>
            </section><!-- section-->
            <?php //get_sidebar();?>
            <div class="clear"></div>
        </div><!-- .pagelayout_area -->
    </div><!-- .container -->
<?php

get_footer();