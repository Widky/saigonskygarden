<?php
add_action( 'wp_footer', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'hotel-center-lite-style' for the hotel-center-lite-child theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/css/index.css', 
        array(
          'cf7-grid-layout',
          'contact-form-7',
          'smart-grid',
        ),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    
     $parenthandle_script = "parent-script";

     wp_enqueue_script( $parenthandle_script, get_template_directory_uri() . '/js/index.js', 
     array(
       'wpcf7-recaptcha',
       'contact-form-7',
       'google-recaptcha',
     ),  // if the parent theme code has a dependency, copy it to here
     $theme->parent()->get('Version')
 );
    
}

// add css for theme
function add_theme_styles(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('font-home', get_stylesheet_directory_uri() . '/inc/fonts/font.css',false);
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/inc/libs/bootstrap/css/bootstrap.min.css',false);
    wp_enqueue_style('fontawesome', get_stylesheet_directory_uri() . '/inc/libs/fontawesome/css/all.min.css',false);
    wp_enqueue_style('carousel-c', get_stylesheet_directory_uri() . '/inc/libs/owlcarousel/css/owl.carousel.min.css',false);
    wp_enqueue_style('carousel-td', get_stylesheet_directory_uri() . '/inc/libs/owlcarousel/css/owl.theme.default.min.css',false);
    wp_enqueue_style('page-home', get_stylesheet_directory_uri() . '/assets/css/page-home.css',false);
    
    // nav
    wp_enqueue_style('custom-nav', get_stylesheet_directory_uri() . '/inc/libs/navcollapse/css/jquery.mCustomScrollbar.min.css',false);
    wp_enqueue_style('nav-style', get_stylesheet_directory_uri() . '/inc/libs/navcollapse/css/styleVerticalMenuCollapse.css',false);
    if(is_page_template('page-event.php') || is_page_template("page-contact.php") || is_page_template("page-review.php") || (is_single() && 'event'== get_post_type())){
      wp_enqueue_style('font-converted', get_stylesheet_directory_uri() . '/inc/fonts/font-converted.css',false);

    }
    if(is_page_template('page-event.php')){
      wp_enqueue_style('event-style', get_stylesheet_directory_uri() . '/assets/css/page-event.css',false);
    }
    if(is_page_template('page-review.php')){
      wp_enqueue_style('review-style', get_stylesheet_directory_uri() . '/assets/css/page-review.css',false);
    }
    if(is_page_template('page-contact.php')){
      wp_enqueue_style('contact-style', get_stylesheet_directory_uri() . '/assets/css/page-contact.css',false);
    }else{
      wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/assets/css/custom.css',false);
    }
    if(is_single() && 'event'== get_post_type()){
      wp_enqueue_style('event-detail-style', get_stylesheet_directory_uri() . '/assets/css/single-event.css',false);
      wp_enqueue_style('slick-style', get_stylesheet_directory_uri() . '/inc/libs/slick/slick.css',false);
      wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/inc/libs/slick/slick-theme.css',false);
    }
    wp_enqueue_style('mobi-menu', get_stylesheet_directory_uri() . '/assets/css/menu-mobi.css',false);
    if(is_page_template('page-home.php')){
      wp_enqueue_style('phbase', get_stylesheet_directory_uri() . '/assets/css/autoptimize_3c2c72f766a4c73dac074284d22b1123.css', false);
      wp_enqueue_style('phauto', get_stylesheet_directory_uri() . '/assets/css/styles__ltr.css', false);
      wp_enqueue_style('phrecaptcha', get_stylesheet_directory_uri() . '/assets/css/www-player.css', false);
    }

}
add_action('wp_enqueue_scripts','add_theme_styles');

function add_theme_scripts(){
  wp_enqueue_script('bootstrap',  get_stylesheet_directory_uri() . '/inc/libs/bootstrap/js/bootstrap.min.js',array('jquery'),'4.0.0', false);
  wp_enqueue_script('font-awe',  get_stylesheet_directory_uri() . '/inc/libs/fontawesome/js/all.js',array(),false, false);
  wp_enqueue_script('carousel-cj',  get_stylesheet_directory_uri() . '/inc/libs/owlcarousel/js/owl.carousel.min.js',array('jquery'),false, false);
  wp_enqueue_script('carousel-sj',  get_stylesheet_directory_uri() . '/inc/libs/owlcarousel/js/scripts.js',array(),false, false);
  wp_enqueue_script('custom',  get_stylesheet_directory_uri() . '/assets/js/custom.js',array(),false, false);
  // nav
  wp_enqueue_script('popper',  get_stylesheet_directory_uri() . '/inc/libs/navcollapse/js/popper.min.js',array(),false, false);
  wp_enqueue_script('custom-mcsroll',  get_stylesheet_directory_uri() . '/inc/libs/navcollapse/js/jquery.mCustomScrollbar.concat.min.js',array(),false, false);
  wp_enqueue_script('custom-cl',  get_stylesheet_directory_uri() . '/inc/libs/navcollapse/js/customCollapse.js',array(),false, false);
  if(is_single() && 'event'== get_post_type()){
      wp_enqueue_script('event-script',  get_stylesheet_directory_uri() . '/assets/js/script.js',array(),false, false);
      wp_enqueue_script('slick',  get_stylesheet_directory_uri() . '/inc/libs/slick/slick.js',array(),false, false);
    }
    wp_enqueue_script('cookie',  get_stylesheet_directory_uri() . '/assets/js/jquery.cookie.js',array(),false, false);

    if(is_page_template('page-home.php')){
      wp_enqueue_style('phbase', get_stylesheet_directory_uri() . '/assets/js/base.js',array(),false, false);
      wp_enqueue_style('phauto', get_stylesheet_directory_uri() . '/assets/js/autoptimize_2eacf29a7696e8dde4ba4a2119f1e0f1.js',array(),false, false);
      wp_enqueue_style('phrecaptcha', get_stylesheet_directory_uri() . '/assets/js/recaptcha__en.js',array(),false, false);
      wp_enqueue_style('phembedy', get_stylesheet_directory_uri() . '/assets/js/www-embed-player.js',array(),false, false);
    }
}
add_action('wp_footer','add_theme_scripts');

// load language
// load_theme_textdomain('hotel-center-lite-child', get_stylesheet_directory_uri(). '/inc/lang');
// get caption image
function custom_the_post_thumbnail_caption() {
    global $post;
  
    $thumbnail_id    = get_post_thumbnail_id($post->ID);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
  
    if ($thumbnail_image && isset($thumbnail_image[0])) {
      echo $thumbnail_image[0]->post_excerpt;
    }
}

// Register post type
function add_register_post_type(){
  //feautured
  $labelsFeature = array(
    'name'                  => _x( 'Features', 'Features', 'hotel-center-lite-child' ),
    'singular_name'         => _x( 'Feature', 'Feature', 'hotel-center-lite-child' ),
    'menu_name'             => _x( 'Features', 'Features', 'hotel-center-lite-child' ),
    'name_admin_bar'        => _x( 'Features', 'Features', 'hotel-center-lite-child' ),
    'add_new'               => __( 'Add New', 'hotel-center-lite-child' ),
    'add_new_item'          => __( 'Add New Feature', 'hotel-center-lite-child' ),
    'new_item'              => __( 'New Feature', 'hotel-center-lite-child' ),
    'edit_item'             => __( 'Edit Feature', 'hotel-center-lite-child' ),
    'view_item'             => __( 'View Feature', 'hotel-center-lite-child' ),
    'all_items'             => __( 'All Feature', 'hotel-center-lite-child' ),
    'search_items'          => __( 'Search Feature', 'hotel-center-lite-child' ),
    'parent_item_colon'     => __( 'Parent Feature:', 'hotel-center-lite-child' ),
    'not_found'             => __( 'No Feature found.', 'hotel-center-lite-child' ),
    'not_found_in_trash'    => __( 'No Feature found in Trash.', 'hotel-center-lite-child' )
  );

  $argsFeature = array(
    'labels'             => $labelsFeature,
    'public'             => true,
    'publicly_queryable' => false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'feature' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'menu_icon'          => 'dashicons-images-alt2',
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt','custom-fields' ),
  );
  register_post_type( 'feature', $argsFeature );
  //apartment
  $labelsApartment = array(
    'name'                  => _x( 'Apartments', 'Apartments', 'hotel-center-lite-child' ),
    'singular_name'         => _x( 'Apartment', 'Apartment', 'hotel-center-lite-child' ),
    'menu_name'             => _x( 'Apartments', 'Apartments', 'hotel-center-lite-child' ),
    'name_admin_bar'        => _x( 'Apartments', 'Apartments', 'hotel-center-lite-child' ),
    'add_new'               => __( 'Add New', 'hotel-center-lite-child' ),
    'add_new_item'          => __( 'Add New Apartment', 'hotel-center-lite-child' ),
    'new_item'              => __( 'New Apartment', 'hotel-center-lite-child' ),
    'edit_item'             => __( 'Edit Apartment', 'hotel-center-lite-child' ),
    'view_item'             => __( 'View Apartment', 'hotel-center-lite-child' ),
    'all_items'             => __( 'All Apartment', 'hotel-center-lite-child' ),
    'search_items'          => __( 'Search Apartment', 'hotel-center-lite-child' ),
    'parent_item_colon'     => __( 'Parent Apartment:', 'hotel-center-lite-child' ),
    'not_found'             => __( 'No Apartment found.', 'hotel-center-lite-child' ),
    'not_found_in_trash'    => __( 'No Apartment found in Trash.', 'hotel-center-lite-child' )
  );

  $argsApartment = array(
    'labels'             => $labelsApartment,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'apartment' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'menu_icon'          => 'dashicons-admin-multisite',
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt','custom-fields' ),
  );
  register_post_type( 'apartment', $argsApartment );

  // Facilities
  $labelFacilities = array(
    'name'                  => _x( 'Facilities', 'Facilities', 'hotel-center-lite-child' ),
    'singular_name'         => _x( 'Facility', 'Facility', 'hotel-center-lite-child' ),
    'menu_name'             => _x( 'Facilities', 'Facilities', 'hotel-center-lite-child' ),
    'name_admin_bar'        => _x( 'Facilities', 'Facilities', 'hotel-center-lite-child' ),
    'add_new'               => __( 'Add New', 'hotel-center-lite-child' ),
    'add_new_item'          => __( 'Add New Facility', 'hotel-center-lite-child' ),
    'new_item'              => __( 'New Facility', 'hotel-center-lite-child' ),
    'edit_item'             => __( 'Edit Facility', 'hotel-center-lite-child' ),
    'view_item'             => __( 'View Facility', 'hotel-center-lite-child' ),
    'all_items'             => __( 'All Facilities', 'hotel-center-lite-child' ),
    'search_items'          => __( 'Search Facilities', 'hotel-center-lite-child' ),
    'parent_item_colon'     => __( 'Parent Facility:', 'hotel-center-lite-child' ),
    'not_found'             => __( 'No Facility found.', 'hotel-center-lite-child' ),
    'not_found_in_trash'    => __( 'No Facility found in Trash.', 'hotel-center-lite-child' )
  );

  $argsFacilities = array(
    'labels'             => $labelFacilities,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'facilities' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 21,
    'menu_icon'          => 'dashicons-rss',
    'supports'           => array( 'title', 'editor','thumbnail', 'excerpt'),
  );
  register_post_type( 'facilities', $argsFacilities );

  // Service
  $labelsService = array(
    'name'                  => _x( 'Services', 'Services', 'hotel-center-lite-child' ),
    'singular_name'         => _x( 'Service', 'Service', 'hotel-center-lite-child' ),
    'menu_name'             => _x( 'Services', 'Services', 'hotel-center-lite-child' ),
    'name_admin_bar'        => _x( 'Services', 'Services', 'hotel-center-lite-child' ),
    'add_new'               => __( 'Add New', 'hotel-center-lite-child' ),
    'add_new_item'          => __( 'Add New Service', 'hotel-center-lite-child' ),
    'new_item'              => __( 'New Service', 'hotel-center-lite-child' ),
    'edit_item'             => __( 'Edit Service', 'hotel-center-lite-child' ),
    'view_item'             => __( 'View Service', 'hotel-center-lite-child' ),
    'all_items'             => __( 'All Services', 'hotel-center-lite-child' ),
    'search_items'          => __( 'Search Services', 'hotel-center-lite-child' ),
    'parent_item_colon'     => __( 'Parent Service:', 'hotel-center-lite-child' ),
    'not_found'             => __( 'No Service found.', 'hotel-center-lite-child' ),
    'not_found_in_trash'    => __( 'No Service found in Trash.', 'hotel-center-lite-child' )
  );

  $argsService = array(
    'labels'             => $labelsService,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'services' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 22,
    'menu_icon'          => 'dashicons-email-alt2',
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ),
  );
  register_post_type( 'services', $argsService );

   // Event
   $labelEvent = array(
    'name'                  => _x( 'Event', 'Event', 'hotel-center-lite-child' ),
    'singular_name'         => _x( 'Event', 'Event', 'hotel-center-lite-child' ),
    'menu_name'             => _x( 'Event', 'Event', 'hotel-center-lite-child' ),
    'name_admin_bar'        => _x( 'Event', 'Event', 'hotel-center-lite-child' ),
    'add_new'               => __( 'Add New', 'hotel-center-lite-child' ),
    'add_new_item'          => __( 'Add New Event', 'hotel-center-lite-child' ),
    'new_item'              => __( 'New Event', 'hotel-center-lite-child' ),
    'edit_item'             => __( 'Edit Event', 'hotel-center-lite-child' ),
    'view_item'             => __( 'View Event', 'hotel-center-lite-child' ),
    'all_items'             => __( 'All Event', 'hotel-center-lite-child' ),
    'search_items'          => __( 'Search Event', 'hotel-center-lite-child' ),
    'parent_item_colon'     => __( 'Parent Event:', 'hotel-center-lite-child' ),
    'not_found'             => __( 'No Event found.', 'hotel-center-lite-child' ),
    'not_found_in_trash'    => __( 'No Event found in Trash.', 'hotel-center-lite-child' )
  );

  $argsEvent = array(
    'labels'             => $labelEvent,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'event' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 21,
    'menu_icon'          => 'dashicons-money',
    'supports'           => array( 'title', 'editor','thumbnail', 'excerpt'),
    'taxonomies'         => array(  'event-category' )
  );
  register_post_type( 'event', $argsEvent );

  // attractions
  $labelAttractions = array(
    'name'                  => _x( 'Attractions', 'Attractions', 'hotel-center-lite-child' ),
    'singular_name'         => _x( 'Attractions', 'Attractions', 'hotel-center-lite-child' ),
    'menu_name'             => _x( 'Attractions', 'Attractions', 'hotel-center-lite-child' ),
    'name_admin_bar'        => _x( 'Attractions', 'Attractions', 'hotel-center-lite-child' ),
    'add_new'               => __( 'Add New', 'hotel-center-lite-child' ),
    'add_new_item'          => __( 'Add New Attractions', 'hotel-center-lite-child' ),
    'new_item'              => __( 'New Attractions', 'hotel-center-lite-child' ),
    'edit_item'             => __( 'Edit Attractions', 'hotel-center-lite-child' ),
    'view_item'             => __( 'View Attractions', 'hotel-center-lite-child' ),
    'all_items'             => __( 'All Attractions', 'hotel-center-lite-child' ),
    'search_items'          => __( 'Search Attractions', 'hotel-center-lite-child' ),
    'parent_item_colon'     => __( 'Parent Attractions:', 'hotel-center-lite-child' ),
    'not_found'             => __( 'No Attractions found.', 'hotel-center-lite-child' ),
    'not_found_in_trash'    => __( 'No Attractions found in Trash.', 'hotel-center-lite-child' )
  );

  $argsAttractions = array(
    'labels'             => $labelAttractions,
    'public'             => true,
    'publicly_queryable' => false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'attraction' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'menu_icon'          => 'dashicons-palmtree',
    'supports'           => array( 'title', 'editor','thumbnail', 'excerpt'),
    'taxonomies'         => array(  'attractions' )
  );
  register_post_type( 'attraction', $argsAttractions );

}
add_action('init', 'add_register_post_type');

// register taxonomies
function add_register_taxonomies(){
  // apartment
    $labels = array(
      'name'              => _x( 'Apartment Category', 'taxonomy general name', 'hotel-center-lite-child' ),
      'singular_name'     => _x( 'Apartment Category', 'taxonomy singular name', 'hotel-center-lite-child' ),
      'search_items'      => __( 'Search Genres', 'hotel-center-lite-child' ),
      'all_items'         => __( 'All Apartment Category', 'hotel-center-lite-child' ),
      'parent_item'       => __( 'Parent Apartment Category', 'hotel-center-lite-child' ),
      'parent_item_colon' => __( 'Parent Apartment Category:', 'hotel-center-lite-child' ),
      'edit_item'         => __( 'Edit Apartment Category', 'hotel-center-lite-child' ),
      'update_item'       => __( 'Update Apartment Category', 'hotel-center-lite-child' ),
      'add_new_item'      => __( 'Add New Apartment Category', 'hotel-center-lite-child' ),
      'new_item_name'     => __( 'New Apartment Category Name', 'hotel-center-lite-child' ),
      'menu_name'         => __( 'Apartment Category', 'hotel-center-lite-child' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'apartment' ),
    );

    register_taxonomy( 'apartment', array( 'apartments' ), $args );

    unset($labels);
    unset($args); 

    $labels = array(
      'name'              => _x( 'Utilities Category', 'taxonomy general name', 'hotel-center-lite-child' ),
      'singular_name'     => _x( 'Utilities Category', 'taxonomy singular name', 'hotel-center-lite-child' ),
      'search_items'      => __( 'Search Genres', 'hotel-center-lite-child' ),
      'all_items'         => __( 'All Utilities Category', 'hotel-center-lite-child' ),
      'parent_item'       => __( 'Parent Utilities Category', 'hotel-center-lite-child' ),
      'parent_item_colon' => __( 'Parent Utilities Category:', 'hotel-center-lite-child' ),
      'edit_item'         => __( 'Edit Utilities Category', 'hotel-center-lite-child' ),
      'update_item'       => __( 'Update Utilities Category', 'hotel-center-lite-child' ),
      'add_new_item'      => __( 'Add New Utilities Category', 'hotel-center-lite-child' ),
      'new_item_name'     => __( 'New Utilities Category Name', 'hotel-center-lite-child' ),
      'menu_name'         => __( 'Utilities Category', 'hotel-center-lite-child' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'utilities-category' ),
    );

    register_taxonomy( 'utilities-category', array( 'apartment' ), $args );

    unset($labels);
    unset($args);

    // Event
    $labels = array(
      'name'              => _x( 'Event Category', 'taxonomy general name', 'hotel-center-lite-child' ),
      'singular_name'     => _x( 'Event Category', 'taxonomy singular name', 'hotel-center-lite-child' ),
      'search_items'      => __( 'Search Genres', 'hotel-center-lite-child' ),
      'all_items'         => __( 'All Event Category', 'hotel-center-lite-child' ),
      'parent_item'       => __( 'Parent Event Category', 'hotel-center-lite-child' ),
      'parent_item_colon' => __( 'Parent Event Category:', 'hotel-center-lite-child' ),
      'edit_item'         => __( 'Edit Event Category', 'hotel-center-lite-child' ),
      'update_item'       => __( 'Update Event Category', 'hotel-center-lite-child' ),
      'add_new_item'      => __( 'Add New Event Category', 'hotel-center-lite-child' ),
      'new_item_name'     => __( 'New Event Category Name', 'hotel-center-lite-child' ),
      'menu_name'         => __( 'Event Category', 'hotel-center-lite-child' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'event-category' ),
        'sort'              => true
    );

    register_taxonomy( 'event-category', array( 'event' ), $args );

    // Attractions
    unset($labels);
    unset($args);

    $labels = array(
      'name'              => _x( 'Attractions Category', 'taxonomy general name', 'hotel-center-lite-child' ),
      'singular_name'     => _x( 'Attractions Category', 'taxonomy singular name', 'hotel-center-lite-child' ),
      'search_items'      => __( 'Search Genres', 'hotel-center-lite-child' ),
      'all_items'         => __( 'All Attractions Category', 'hotel-center-lite-child' ),
      'parent_item'       => __( 'Parent Attractions Category', 'hotel-center-lite-child' ),
      'parent_item_colon' => __( 'Parent Attractions Category:', 'hotel-center-lite-child' ),
      'edit_item'         => __( 'Edit Attractions Category', 'hotel-center-lite-child' ),
      'update_item'       => __( 'Update Attractions Category', 'hotel-center-lite-child' ),
      'add_new_item'      => __( 'Add New Attractions Category', 'hotel-center-lite-child' ),
      'new_item_name'     => __( 'New Attractions Category Name', 'hotel-center-lite-child' ),
      'menu_name'         => __( 'Attractions Category', 'hotel-center-lite-child' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'attractions' ),
        'sort'              => true
    );

    register_taxonomy( 'attractions', array( 'attraction' ), $args );

}
add_action('init', 'add_register_taxonomies');

// register widget
function wk_widget_init() {
  register_sidebar( array(
     'name'          => 'Footer Menu 1',
     'id'            => 'footer_menu_1',
     'class'         => 'fm-items',
     'before_widget' => '',
     'after_widget'  => '',
     'before_title'  => '<h4 class="fm-title">',
     'after_title'   => '</h4>',
     'before_sidebar' => '<div class="fm-items">',
     'after_sidebar'  => '</div>'
  ) );
  register_sidebar( array(
    'name'          => 'Footer Menu 2',
    'id'            => 'footer_menu_2',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h4 class="fm-title">',
    'after_title'   => '</h4>'
 ) );
}
add_action('widgets_init', 'wk_widget_init');

// add menu
if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {
 
  function mytheme_register_nav_menu(){
      register_nav_menus( array(
          'mobile_menu'  => __( 'Mobile Menu', 'hotel-center-lite-child' ),
      ) );
  }
  add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}
// Add theme options
add_action('admin_init','custom_theme_options_register_settings');
function custom_theme_options_register_settings(){
  register_setting('options_group', 'booking');
  register_setting('options_group', 'address');
  register_setting('options_group', 'phone');
  register_setting('options_group', 'fax');
  register_setting('options_group', 'email');
  register_setting('options_group', 'webname');
  register_setting('options_group', 'weburl');
  register_setting('options_group', 'f_facebook');
  register_setting('options_group', 'f_twitter');
  register_setting('options_group', 'f_google_plus');
  register_setting('options_group', 'f_youtube');

  register_setting('options_group', 'checknewtab');
  register_setting('options_group', 'profilepicture','upload_image');
  register_setting('options_group', 'text_ja');
  register_setting('options_group', 'text_en');
}
add_action('admin_menu','custom_theme_options_menu');
if(!function_exists('custom_theme_options')){
  function custom_theme_options_menu(){
    // add menu page
    $menuPage = add_submenu_page('themes.php','Theme Options','Theme Options','manage_options','theme-options.php','custom_theme_options_callback',5);
    // call register
    add_action('admin_init','custom_theme_options_register_settings');
  }
}

if(!function_exists('custom_theme_options_callback')){
  function custom_theme_options_callback() {
    ?>
<div class="wrap">
    <h2><?php _e('Theme Options','hotel-center-lite-child') ?></h2>
    <form method="post" action="options.php" novalidate="novalidate" enctype="multipart/form-data">
        <?php settings_fields( 'options_group' ); ?>
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row"><label for="booking"><?php _e('URL Booking','hotel-center-lite-child') ?></label>
                    </th>
                    <td><input type="text" name="booking" value="<?php echo get_option('booking')?>"
                            class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="address"><?php _e('Address','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="address" value="<?php echo get_option('address')?>"
                            class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="phone"><?php _e('????????????','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="phone" value="<?php echo get_option('phone')?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="fax"><?php _e('???????????????','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="fax" value="<?php echo get_option('fax')?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="email"><?php _e('Email','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="email" value="<?php echo get_option('email')?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="webname"><?php _e('Web','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="webname" value="<?php echo get_option('webname')?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="weburl"><?php _e('Web URL','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="weburl" value="<?php echo get_option('weburl')?>" class="regular-text" />
                    </td>
                </tr>
            </tbody>
        </table>
        <h2><b><?php _e('Socials','hotel-center-lite-child') ?></b></h2>
        <p><?php _e('Replace the # sign with your social link','hotel-center-lite-child') ?></p>
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row"><label for="f_facebook"><?php _e('Facebook','hotel-center-lite-child') ?></label>
                    </th>
                    <td><input type="text" name="f_facebook" value="<?php echo get_option('f_facebook')?>"
                            class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="f_twitter"><?php _e('Twitter','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="f_twitter" value="<?php echo get_option('f_twitter')?>"
                            class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label
                            for="f_google_plus"><?php _e('Google Plus','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="f_google_plus" value="<?php echo get_option('f_google_plus')?>"
                            class="regular-text" />
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="f_youtube"><?php _e('YouTube','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="f_youtube" value="<?php echo get_option('f_youtube')?>"
                            class="regular-text" />
                    </td>
                </tr>
            </tbody>
        </table>
        <h2><b><?php _e('Banner Home','hotel-center-lite-child') ?></b></h2>
        <p><?php _e('For short stays, we accept reservations on Booking.com. Please make a reservation from here.','hotel-center-lite-child') ?>
        </p>
        <p><?php _e('Size 1920 by 350 pixels','hotel-center-lite-child') ?></p>

        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row"><?php _e('New tab','hotel-center-lite-child') ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text">
                                <span><?php _e('New tab','hotel-center-lite-child') ?></span>
                            </legend>
                            <label for="users_can_register">
                                <input type="checkbox" name="checknewtab" class="regular-text" value="1"
                                    <?php checked( 1, get_option( 'checknewtab' ), true ); ?> />
                                <?php _e('Check to open new tab when click','hotel-center-lite-child') ?>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="image"><?php _e('Image','hotel-center-lite-child') ?></label>
                    </th>
                    <td><input type="file" name="profilepicture" size="25" class="regular-text"
                            value="<?php echo get_option('profilepicture')?>" /></td>
                </tr>
                <?php 
                $upload_file = get_user_meta(1, 'upload_id');
                // var_dump($upload_id);exit;
                if($upload_file){
                  $file = $upload_file[0]['file'];
                  $strDay = date('Y').'/'.date('m').'/';
                  $nameFile = str_replace($strDay, '',$file);
                  // var_dump($file);exit;

                  echo '<tr><th scope="row"></th><td><img src="/wp-content/uploads/'.$file.'" alt="'.$nameFile.'" /></td></tr>';}
                ?>
                <tr>
                    <th scope="row"><label
                            for="text_ja"><?php _e('Content for Japanese','hotel-center-lite-child') ?></label></th>
                    <td><textarea name="text_ja" class="regular-text"
                            rows="3"><?php echo get_option('text_ja')?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label
                            for="text_en"><?php _e('Content for English','hotel-center-lite-child') ?></label></th>
                    <td><textarea name="text_en" class="regular-text"
                            rows="3"><?php echo get_option('text_en')?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;"><input type="submit" name="submit" id="submit"
                        class="button button-primary" value="Save changes"></font>
            </font>
        </p>
    </form>
</div>
<?php
  }
}

function upload_image(){
  // WordPress environment
  require( dirname(__FILE__) . '/../../../../wp-load.php' );

  $wordpress_upload_dir = wp_upload_dir();
  $i = 1; // number of tries when the file with the same name is already exists
  $profilepicture = $_FILES["profilepicture"];
  // var_dump($profilepicture);exit;
  if( empty( $profilepicture ) || $profilepicture['error'] || $profilepicture['size'] > wp_max_upload_size() || !in_array( $new_file_mime, get_allowed_mime_types() )){
      wp_redirect('/wp-admin/themes.php?page=theme-options.php');
  }

  if($profilepicture['size'] > 0){
      $new_file_path = $wordpress_upload_dir['path'] . '/' . $profilepicture['name'];
      $new_file_mime = mime_content_type( $profilepicture['tmp_name'] );
      while( file_exists( $new_file_path ) ) {
          $i++;
          $new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $profilepicture['name'];
      }
      // looks like everything is OK
      if( move_uploaded_file( $profilepicture['tmp_name'], $new_file_path ) ) {
          

          $upload_id = wp_insert_attachment( array(
              'guid'           => $new_file_path, 
              'post_mime_type' => $new_file_mime,
              'post_title'     => preg_replace( '/\.[^.]+$/', '', $profilepicture['name'] ),
              'post_content'   => '',
              'post_status'    => 'inherit'
          ), $new_file_path );

          // wp_generate_attachment_metadata() won't work if you do not include this file
          require_once( ABSPATH . 'wp-admin/includes/image.php' );

          // Generate and save the attachment metas into the database
          wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
          update_user_meta( 1 ,'upload_id', wp_generate_attachment_metadata( $upload_id, $new_file_path ) );

          // Show the uploaded file in browser
          wp_redirect('/wp-admin/themes.php?page=theme-options.php');
    }
  }
}
// Add .html for post Page
add_action('init', 'wk_change_page_permalink', -1);
function wk_change_page_permalink() {
    global $wp_rewrite;
    if ( strstr($wp_rewrite->get_page_permastruct(), '.html') != '.html' )
    $wp_rewrite->page_structure = $wp_rewrite->page_structure . '.html';
}

// Add .html extension for Single Post Type
add_action( 'rewrite_rules_array', 'rewrite_rules' );
function rewrite_rules( $rules ) {
    $new_rules = array();
    foreach ( get_post_types() as $t )
        $new_rules[ $t . '/([^/]+)\.html$' ] = 'index.php?post_type=' . $t . '&name=$matches[1]';
    return $new_rules + $rules;
}
// format cpt post_type_link (rather than post_link)
add_filter( 'post_type_link', 'custom_post_permalink' ); 
function custom_post_permalink ( $post_link ) {
    global $post;
    // var_dump($post);
    if($post){
      $type = get_post_type( $post->ID );
      return home_url( $type . '/' . $post->post_name . '.html' );
    }
    
}

// add .html for taxonomy
add_action( 'registered_taxonomy', 'taxonomy_html', 10, 3 );
function taxonomy_html( $taxonomy, $object_type, $args ) {
  $array_tax = array('category','apartment','attractions','event-category');
  foreach($array_tax as $at){
    if($taxonomy === $at)
      add_permastruct( $taxonomy, "{$args['rewrite']['slug']}/%$taxonomy%.html", $args['rewrite'] );
  }
}

function hotel_center_lite_child_setup() {
    $path = get_stylesheet_directory().'/languages';
    load_child_theme_textdomain( 'hotel-center-lite-child', $path );
}
add_action( 'after_setup_theme', 'hotel_center_lite_child_setup' );

/**
 * Hide the term description in  edit form
 */
add_action( "reviews-category_edit_form", function( $tag, $taxonomy )
{ 
    ?>
<style>
.term-description-wrap,
.term-parent-wrap {
    display: none;
}
</style><?php
}, 10, 2 );

/**
 * Hide the term description in the add form
 */
add_action( 'reviews-category_add_form', function( $taxonomy )
{
    ?><style>
.term-description-wrap,
.term-parent-wrap {
    display: none;
}
</style><?php
}, 10, 2 );


add_filter( 'wpm_post_acf-field-group_config', '__return_null' );
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

add_filter('site_transient_update_plugins', 'remove_update_notification');
function remove_update_notification($value) {
     unset($value->response['advanced-custom-fields/acf.php']);
     unset($value->response['cf7-grid-layout/cf7-grid-layout.php']);
     unset($value->response['contact-form-7/wp-contact-form-7.php']);
     unset($value->response['ns-featured-posts/ns-featured-posts.php']);
     unset($value->response['polylang/polylang.php']);
     unset($value->response['smart-slider-3/smart-slider-3.php']);
     unset($value->response['taxonomy-terms-order/taxonomy-terms-order.php']);
     unset($value->response['wp-multilang/wp-multilang.php']);
     return $value;
} 

add_action( 'wp_loaded', 'disable_wp_theme_update_loaded' );
function disable_wp_theme_update_loaded() {
    remove_action( 'load-update-core.php', 'wp_update_themes' );
    add_filter( 'pre_site_transient_update_themes', '__return_null' );
}