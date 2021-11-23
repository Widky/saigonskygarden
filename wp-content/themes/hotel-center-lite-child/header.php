<!DOCTYPE html>
<html <?php language_attributes(); ?> class="m-0">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="strict-origin" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php include dirname( __FILE__ ) . '/inc/lang/translate.php'; ?>
    <header>
        <div class="header">
            <div class="header-wrap">
                <!-- mobile -->
                <div class="navbar-main-collapse-btn">
                    <button type="button" id="navSidebarCollapse" class="btn btn-collapse">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div id="navbar-main-mobi">
                    <div id="dismiss">
                        <i class="fas fa-arrow-left"></i>
                    </div>
                    <div class="wrap-menu-mobi">
                        <?php
                            $args = array('after'    => '<span class="arrow"></span>',
                                'walker' => new Walker_Dynamic_Submenu(),);
                            wp_nav_menu($args);
                        ?>
                    </div>
                </div>
                <!-- <div id="navbar-main" class="navbar-main-collapse1">
                    <div class="navbar-main-collapse-wrap1">
                        <div id="dismiss">
                            <i class="fas fa-arrow-left"></i>
                        </div>
                        <?php
                        // $args = array(
                        //     'menu_id'           =>  'navbar-nav-header-collapse1',
                        //     'menu_class'        =>  'navbar-nav-collapse1',
                        //     //'container'         =>  false,
                        //     //'theme_location'    =>  'mobile_menu',
                        //     // 'depth'             =>  1
                        // );
                        // wp_nav_menu($args);
                        ?>
                    </div>
                </div> -->

                <div class="logo">
                    <div class="logo-wrap">
                        <a href="<?php echo get_home_url() ?>">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png"
                                alt="<?php echo get_bloginfo('name'); ?>">
                        </a>
                    </div>
                </div>
                <div class="navbar-main desktop">
                    <div class="navbar-main-wrap">
                        <?php
                        $loc = get_locale();
                        if($loc == 'ja'){
                            $args = array(
                                'menu_id'           =>  'navbar-nav-header',
                                'menu_class'        =>  'navbar-nav',
                                'container'         =>  false,
                                'theme_location'    =>  'primary',
                                'fallback_cb'       => 'Walker_Dynamic_Submenu::fallback',
                                'walker' => new Walker_Dynamic_Submenu(),
                            );
                        }else{
                            $args = array(
                                'menu_id'           =>  'navbar-nav-header',
                                'menu_class'        =>  'navbar-nav nav-en',
                                'container'         =>  false,
                                'theme_location'    =>  'primary',
                                'fallback_cb'       => 'Walker_Dynamic_Submenu::fallback',
                                'walker' => new Walker_Dynamic_Submenu(),
                            );
                        }
                        
                        wp_nav_menu($args);
                       
                        ?>
                    </div>
                </div>
                <div class="lang-btn-book">
                    <div class="lbb-wrap">
                        <div class="lbb-lang">
                            <?php the_list_lang(); ?>
                        </div>
                        <div class="lbb-call">
                            <a href="tel:+<?php echo get_option('phone') ?>"><i class="fas fa-phone"></i></a>
                        </div>
                        <div class="lbb-book">
                            <a target="_blank" href="<?php echo get_option('booking'); ?>">
                                <div class="lbbb-btn bg-color-2398A9"><span><?php echo $strBooking; ?></span></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-overlay"></div>
            </div>
        </div>
    </header>
    <div class="page-wrap">
        <h1 class="seo_tag">
            <?php if(is_front_page()){
                $name = get_bloginfo('name');
                if($name != ''){
                    echo $name;
                }else{
                    the_title();
                }
            }elseif(is_tax()){
                echo get_queried_object()->name;
            }else{the_title();} ?>
        </h1>
        <?php 
    if(!is_front_page() && is_page()){
        $page_id = get_queried_object_id();

        $pageTitle = get_field($pageTitle, $page_id);

        $pageSubTitle = get_the_title();

        $imageUrlBreadcrumb = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), $pageTitle );
        if($imageUrlBreadcrumb){
            $imageUrlBreadcrumb = $imageUrlBreadcrumb[0];
        }else{
            $imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-not-found/img-not-found-breadcrumb.png';
        }
        // Call function breadcrumb
        breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
    }
        