<div class="row position-relative">
    <div class="bg-facilities bg-facilities-top"></div>
    <div class="col-12 p-0">
        <h2 class="cl-title text-center facilites-title">
            <span class="cl-main-title change-cl"><?php echo _e('FACILITIES','hotel-center-lite-child') ?></span>
            <span class="cl-sub-title"><?php echo _e('施設','hotel-center-lite-child') ?></span>
        </h2>
    </div>    
</div>
<div class="row position-relative facilities_block ">
    <div class="container p-md-0">
        
        <div class="facilities-items row">
            <?php 
            $args = array(
                'post_type'     =>      'facility',
                'orderby'       =>      'date',
                'order'         =>      'DESC',
                'post_status'   =>      'publish',
                'posts_per_page'=>      7,
                'tax_query'         =>  array(
                    array(
                        'taxonomy'      =>  'facilities',
                        'field'         =>  'slug',
                        'terms'         =>  $strCatFacilities,
                        'operator'      =>  'IN'
                    ),
                )
            );
            $query = new WP_Query($args);
            $myPosts = $query->get_posts();
            // echo "<pre>";print_r($myPosts);
            $i = 0;
             
            // $_SESSION['myVar'] ;  
            $w = ( isset($_COOKIE["screen_width"]) && $_COOKIE['screen_width'] != "" )   ? $_COOKIE['screen_width'] : '';
            foreach($myPosts as $k=>$v) :
            ?>
            <?php if($i == 0) { ?>
                <div class="facilities-item col-xl-3 col-sm-6 col-12">
                    <div class="facilities-item-wrap">
                        <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>">
                            
                                <?php 
                                $showHome = get_field('show_home', $v->ID);
                                // echo "<pre>";var_dump($showHome);
                                if($showHome && $showHome != NULL){ ?>
                                <div class="fiw-img" style="background: url(<?php echo $showHome['image']['url']; ?>) center center;background-size: cover;background-repeat: no-repeat;">
                                <?php 
                                $imgOrverlay = $showHome['background_overlay_for_images'];
                                if($imgOrverlay) echo "<div class='fiw-img-orverlay' style='background:url(".esc_url($imgOrverlay['url']).")'></div>"; ?>
                                </div>
                                <div class="mask-img"></div>
                                <?php } ?>
                            
                            <div class="fiw-content">
                                <?php
                                $iconPost = $showHome['icon_title'];
                                // echo "<pre>";var_dump($iconPost);
                                if($iconPost != NULL){
                                    echo '<img src="'.esc_url($iconPost['url']).'" alt="'.esc_attr($iconPost['alt']).'"/>';
                                }
                                ?>
                                <h3 class="fiw-title"><?php echo $v->post_title; ?></h3>
                                <?php if($v->post_excerpt != '') echo '<pre class="fiw-excerpt">'.$v->post_excerpt.'</pre>'; ?>
                            </div>
                        </a>
                    </div>
                </div>
            <?php }else{ 
                ?>
                <?php if($i == 1 && $w >= 1200) { ?>
                    <div class="col-12 col-xl-9 col-12">
                        <div class="row">
                <?php } ?> 
                    <div class="facilities-item col-xl-4 col-sm-6 col-12">
                        <div class="facilities-item-wrap">
                            <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>">
                                <div class="fiw-img">
                                    <?php 
                                    $showHome = get_field('show_home', $v->ID);
                                    // echo "<pre>";var_dump($showHome);
                                    if($showHome && $showHome != NULL){ ?>
                                    <img src="<?php echo $showHome['image']['url']; ?>"
                                        alt="<?php custom_the_post_thumbnail_caption(); ?>">
                                    <?php 
                                    $imgOrverlay = $showHome['background_overlay_for_images'];
                                    if($imgOrverlay) echo "<div class='fiw-img-orverlay' style='background:url(".esc_url($imgOrverlay['url']).")'></div>"; ?>
                                    <?php } ?>
                                </div>
                                <div class="fiw-content">
                                    <?php
                                    $iconPost = $showHome['icon_title'];
                                    // echo "<pre>";var_dump($iconPost);
                                    if($iconPost != NULL){
                                        echo '<img src="'.esc_url($iconPost['url']).'" alt="'.esc_attr($iconPost['alt']).'"/>';
                                    }
                                    ?>
                                    <h3 class="fiw-title"><?php echo $v->post_title; ?></h3>
                                    <?php if($v->post_excerpt != '') echo '<pre class="fiw-excerpt">'.$v->post_excerpt.'</pre>'; ?>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php if(($i== count($myPosts) - 1) && ( $w >=1200 ) ){ ?>
                    </div>
                </div>    
                <?php } ?>   
            <?php } ?>    
            
            <?php
            $i = $i + 1;
            endforeach;
        ?>
        </div>
        
        <div class="bg-facilities bg-facilities-bottom"></div>
    </div>
</div>
<script type="text/javascript">
    jQuery(function() {
        var scr_width = jQuery(window).width();
        jQuery.cookie("screen_width", scr_width);
    });
</script>
