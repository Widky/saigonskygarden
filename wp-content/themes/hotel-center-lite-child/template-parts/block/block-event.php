<section class="events">
    <div class="events-wrap">
        <h2 class="ap-title cl-title text-center">
            <span class="cl-main-title change-cl"><?php echo _e('EVENT', 'hotel-center-lite-child') ?></span>
            <span class="cl-sub-title change-cl"><?php echo _e('イベント', 'hotel-center-lite-child') ?></span>
        </h2>
        <div class="events-carousel">
            <div class="container-fluid">
                <div id="multi-carousel">
                    <div class="owl-carousel owl-theme">
                        <?php 
                        $args = array(
                            'post_type'     =>      'event',
                            'orderby'       =>      'date',
                            'order'         =>      'DESC',
                            'post_status'   =>      'publish',
                            'posts_per_page'=>      12
                        );
                        $query = new WP_Query($args);
                        $myPosts = $query->get_posts();
                        // echo "<pre>";print_r($myPosts);exit;
                        foreach($myPosts as $k=>$v) :
                            ?>
                        <div class="item">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <a href="<?php echo home_url($v->post_type . '/' .$v->post_name .'.html'); ?>"
                                        class="thumb">

                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'single-post-thumbnail' ); ?>
                                        <img src="<?php if (has_post_thumbnail( $v->ID ) ){echo $image[0];} ?>"
                                            alt="<?php if (has_post_thumbnail( $v->ID ) ){custom_the_post_thumbnail_caption();}else{echo 'Not Image';} ?>">

                                        <?php $getCat = get_the_terms($v->ID,'event-category');
                                            if($getCat != false){ ?>
                                        <div class="evc-cat"
                                            style="<?php if(get_field('change_color',$v->ID) != '') echo 'background-color:'.get_field('change_color',$v->ID)  ?>">
                                            <?php 
                                            foreach($getCat as $kCat=>$vCat){
                                                echo $vCat->name;
                                                break;
                                            }
                                            ?>
                                        </div>
                                        <?php } ?>

                                        <div class="evc-content">
                                            <h3 class="evc-title"><?php echo $v->post_title; ?></h3>
                                            <?php if($v->post_excerpt != '') echo '<pre class="evc-excerpt">'.$v->post_excerpt.'</pre>'; ?>
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
        <?php require_once(get_stylesheet_directory() . '/template-parts/block/block-home-contact.php'); ?>
    </div>
</section>