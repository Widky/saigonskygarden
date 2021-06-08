<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="strict-origin" />
    <title><?php echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="header">
            <div class="header-wrap">
                <!-- mobile -->
                <div class="navbar-main-collapse-btn">
                    <button type="button" id="navSidebarCollapse" class="btn btn-collapse">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div id="navbar-main" class="navbar-main-collapse">
                    <div class="navbar-main-collapse-wrap">
                        <div id="dismiss">
                            <i class="fas fa-arrow-left"></i>
                        </div>
                        <?php
                        $args = array(
                            'menu_id'           =>  'navbar-nav-header-collapse',
                            'menu_class'        =>  'navbar-nav-collapse',
                            'container'         =>  false,
                            'theme_location'    =>  'primary',
                            // 'depth'             =>  1
                        );
                        wp_nav_menu($args);
                        ?>
                    </div>
                </div>

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
                        $args = array(
                            'menu_id'           =>  'navbar-nav-header',
                            'menu_class'        =>  'navbar-nav',
                            'container'         =>  false,
                            'theme_location'    =>  'primary',
                            // 'depth'             =>  1
                        );
                        wp_nav_menu($args);
                        ?>
                    </div>
                </div>
                <div class="lang-btn-book">
                    <div class="lbb-wrap">
                        <div class="lbb-lang">
                            <?php the_list_lang(); ?>
                        </div>
                        <div class="lbb-book">
                            <button class="lbbb-btn bg-color-2398A9"><?php _e('Book Now') ?></button>
                        </div>
                    </div>
                </div>
                <div class="header-overlay"></div>
            </div>
        </div>
    </header>
    <div class="page-wrap">
        <?php 
    if(!is_home() && !is_front_page()){
        include dirname( __FILE__ ) . '/inc/lang/translate.php';

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
        