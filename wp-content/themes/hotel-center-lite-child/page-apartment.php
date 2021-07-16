<?php 
/**
 * Template Name: アパートメント - Page Apartment
 */

get_header();

include dirname( __FILE__ ) . '/inc/lang/translate.php';

?>
<style type="text/css">
	body{overflow-x: hidden;}
	.aprt_wrap{
		padding-bottom: 100px;
	}
</style>
<div class="container-fluid aprt_wrap">
	<div class="row" id="pFeatures">
	    <div class="col-12 sr-title">
	        <div class="sr-title-wrap container">
	            <h2 class="cl-title text-center">
	                <span class="cl-main-title change-cl"><?php echo _e('APARTMENT','hotel-center-lite-child') ?></span>
	                <span class="cl-sub-title"><?php echo _e('お部屋案内','hotel-center-lite-child') ?></span>
	            </h2>
	            <div class="cl-tax-share">
	                <a href="#">
	                    <i class="fas fa-share-alt"></i>
	                    <span><?php echo $strButtonShare; ?></span>
	                </a>
	            </div>
	        </div>
	    </div>
	</div>

<div class="row position-relative apartment_frame">
    <div class="apratment_bg"></div>
    <div class="col-12 apartment_block p-xl-0">
        
        <div class="aparment-posts">
            <div class="row justify-content-center">
                <div class="container m-md-0 p-md-0">
                    <div class="col-12 col-xl-10 p-0 cat-studio">
                    	<?php 
                        $args = array(
                            'post_type'         =>  'apartment',
                            'orderby'           =>  'date',
                            //'order'             =>  'DESC',
                            'post_status'       =>  'publish',
                            'posts_per_page'        =>  1,
                            // 'tax_query'         =>  array(
                            //     array(
                            //         'taxonomy'      =>  'apartment',
                            //         'field'         =>  'slug',
                            //         'terms'         =>  $the_cat,
                            //         'operator'      =>  'IN'
                            //     ),
                            // )
                        );
                        $query = new WP_Query($args);
                        $my_posts = $query->get_posts();
                        // echo "<pre>";print_r($my_post);exit;
                        if( $my_posts ) :
                        	$first_id =  $my_posts[0]->ID;
                        ?>
                        <div class="cat-main-title cat-studio-main-title">
                            <div class="cat-line cat-studio-line"></div>
                            <h3 class="cat-title cat-studio-title">
                            	<?php //echo $my_posts[0]->post_title; ?>
                            	<?php echo get_field('apartment_subtitle_field1', $my_posts[0]->ID); ?>
                            		
                            </h3>
                        </div>
                        
                        <div class="cat-studio-items mt-4 position-relative">
                            <div class="csti-item">
                                <div class="csti-img">
                                    <?php
                                    $sliderCat = get_field('slide_thumbnail', $my_posts[0]->ID);
                                    // echo "<pre>";var_dump($sliderCat);exit;
                                    // $sizeArray = count($sliderCat);
                                    if($sliderCat && $sliderCat['img_1'] != false){
                                        ?>
                                    <div class="post-img-slide-wrap">
                                        <div id="carouselImgSlide" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php if (has_post_thumbnail( $my_posts[0]->ID ) ): ?>
                                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
                                                <div class="carousel-item active">
                                                    <img src="<?php echo $image[0]; ?>"
                                                        alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                                </div>
                                                <?php endif; ?>
                                                <?php foreach($sliderCat as $k=>$v) : ?>
                                                <?php if($sliderCat[$k] != false) : ?>
                                                <div
                                                    class="carousel-item <?php if($k == 'img_1' && ! has_post_thumbnail( $my_posts[0]->ID )) echo 'active'; ?>">
                                                    <img src="<?php echo $v['url']; ?>" alt="<?php echo $v['title']; ?>">
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
                                    <?php
                                    }else{
                                    ?>
                                    <?php if (has_post_thumbnail( $my_posts[0]->ID ) ): ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_posts[0]->ID ), 'single-post-thumbnail' ); ?>
                                    <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                    <?php endif; ?>
                                    <?php } ?>
                                </div>
                                <div class="csti-content post-content">
                                    <div class="csti-content-wrap">
                                        <a
                                            href="<?php echo home_url($my_posts[0]->post_type . '/' .$my_posts[0]->post_name .'.html'); ?>">
                                            <h3 class="post-title">
                                            	<?php //echo $my_posts[0]->post_title; ?>
                                            	<?php echo get_field('sub_title_for_decription_field', $my_posts[0]->ID); ?>
                                            	</h3>
                                            <pre class="post-excerpt"><?php echo $my_posts[0]->post_excerpt; ?></pre>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php 
            $args_bed_one = array(
                'post_type'         =>  'apartment',
                'orderby'           =>  'date',
                //'order'             =>  'DESC',
                'post_status'       =>  'publish',
                'post__not_in' => array($first_id)
               // 'posts_per_page'    =>  1,
                // 'tax_query'         =>  array(
                //     array(
                //         'taxonomy'      =>  'apartment',
                //         'field'         =>  'slug',
                //         'terms'         =>  $the_cat_bed_one,
                //         'operator'      =>  'IN'
                //     ),
                // )
            );
            $query_bed = new WP_Query($args_bed_one);
            $my_posts_bed = $query_bed->get_posts();
            // echo "<pre>";print_r($my_posts_bed);exit;
            
            $i = 1;
            foreach($my_posts_bed as $k=>$v) :
            	if($i%2 == 0){
            	
            ?>
            <div class="cat-odd position-relative cat_item ">
                <div class="container1">
                    <div class="cat-bed-items">
                        
                        <div class="cat-bed-items-wrap">
                            <div class="cat-main-title cat-bed-title">
                                <h3 class="cat-title">
                                    <?php echo "<span class='cat-title-number'>".get_field('apartment_subtitle_number_field1', $v->ID)."</span>"; echo get_field('apartment_subtitle_field1', $v->ID);?>
                                </h3>
                                <div class="cat-line <?php echo 'mgl'; ?>"></div>
                            </div>
                            <div class="cb-item">
                                <div class="cb-img">
                                    <?php
                                    $sliderCat = get_field('slide_thumbnail', $v->ID);
                                    // echo "<pre>";var_dump($sliderCat);exit;
                                    // $sizeArray = count($sliderCat);
                                    if($sliderCat && $sliderCat['img_1'] != false){
                                        ?>
                                    <div class="post-img-slide-wrap">
                                        <div id="carouselImgSlide1" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php if (has_post_thumbnail( $v->ID ) ): ?>
                                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                                <div class="carousel-item active">
                                                    <img src="<?php echo $image[0]; ?>"
                                                        alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                                </div>
                                                <?php endif; ?>
                                                <?php foreach($sliderCat as $ks=>$vs) : ?>
                                                <?php if($sliderCat[$ks] != false) : ?>
                                                <div
                                                    class="carousel-item <?php if($ks == 'img_1' && ! has_post_thumbnail( $v->ID )) echo 'active'; ?>">
                                                    <img src="<?php echo $vs['url']; ?>" alt="<?php echo $vs['title']; ?>">
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                            <a class="carousel-control carousel-control-prev" href="#carouselImgSlide1"
                                                role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control carousel-control-next" href="#carouselImgSlide1"
                                                role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                        <div class="quote-orverlay"></div>
                                    </div>
                                    <?php
                                    }else{
                                    ?>
                                    <?php if (has_post_thumbnail( $v->ID ) ): ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                    <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                    <?php endif; ?>
                                    <?php } ?>
                                </div>
                                <div class="cb-content post-content">
                                    <div class="cb-content-wrap">
                                        <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>">
                                            <h4 class="post-title">
                                            	<?php //echo $v->post_title; ?>
                                            	<?php echo get_field('sub_title_for_decription_field', $v->ID);?>
                                            </h4>
                                            <pre class="post-excerpt"><?php echo $v->post_excerpt; ?></pre>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <?php }else{
            $number = get_field('apartment_subtitle_number_field1', $v->ID)
                ?>
            	<div class="cat-even position-relative cat_item">
	                <div class="cat-bed-items">
	                   
	                    <div class="cat-bed-items-wrap lor">
	                        <div class="cat-main-title cat-bed-title">
	                            <div class="cat-line mgr"></div>
	                            <h3 class="cat-title">
                                    <?php
                                    if(!empty($number)){?>
                                        <span class='cat-title-number'>
                                            <?php echo $number;?>
                                        </span>    
                                    <?php } 
                                    ?>
                                     <?php  echo get_field('apartment_subtitle_field1', $v->ID); ?>
                                </h3>
	                        </div>
	                        <div class="cb-item island">
	                            <div class="cb-img">
	                                <?php
	                                $sliderCat = get_field('slide_thumbnail', $v->ID);
	                                // echo "<pre>";var_dump($sliderCat);exit;
	                                // $sizeArray = count($sliderCat);
	                                if($sliderCat && $sliderCat['img_1'] != false){
	                                    ?>
	                                <div class="post-img-slide-wrap">
	                                    <div id="carouselImgSlide2" class="carousel slide" data-ride="carousel">
	                                        <div class="carousel-inner">
	                                            <?php if (has_post_thumbnail( $v->ID ) ): ?>
	                                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
	                                            <div class="carousel-item active">
	                                                <img src="<?php echo $image[0]; ?>"
	                                                    alt="<?php custom_the_post_thumbnail_caption(); ?>">
	                                            </div>
	                                            <?php endif; ?>
	                                            <?php foreach($sliderCat as $ks=>$vs) : ?>
	                                            <?php if($sliderCat[$ks] != false) : ?>
	                                            <div
	                                                class="carousel-item <?php if($ks == 'img_1' && ! has_post_thumbnail( $v->ID )) echo 'active'; ?>">
	                                                <img src="<?php echo $vs['url']; ?>" alt="<?php echo $vs['title']; ?>">
	                                            </div>
	                                            <?php endif; ?>
	                                            <?php endforeach; ?>
	                                        </div>
	                                        <a class="carousel-control carousel-control-prev" href="#carouselImgSlide2"
	                                            role="button" data-slide="prev">
	                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="carousel-control carousel-control-next" href="#carouselImgSlide2"
	                                            role="button" data-slide="next">
	                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="quote-orverlay"></div>
	                                </div>
	                                <?php
	                                }else{
	                                ?>
	                                <?php if (has_post_thumbnail( $v->ID ) ): ?>
	                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
	                                <img src="<?php echo $image[0]; ?>" alt="<?php custom_the_post_thumbnail_caption(); ?>">
	                                <?php endif; ?>
	                                <?php } ?>
	                            </div>
	                            <div class="cb-content post-content">
	                                <div class="cb-content-wrap">
	                                    <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>">
	                                        <h4 class="post-title">
	                                        	<?php //echo $v->post_title; ?>
	                                        	<?php echo get_field('sub_title_for_decription_field', $v->ID);?>
	                                        	</h4>
	                                        <pre class="post-excerpt"><?php echo $v->post_excerpt; ?></pre>
	                                    </a>
	                                </div>
	                            </div>
	                            <div class="clearfix"></div>
	                        </div>
	                    </div>
	                   
	                </div>
	            </div>
           	<?php } ?> 	
            <?php
            $i = $i + 1;
            endforeach;
            ?>
            
            
        </div>
    </div>
</div>
	
</div>
<?php get_footer(); ?>