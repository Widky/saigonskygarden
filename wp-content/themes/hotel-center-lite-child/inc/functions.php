<?php
// css default for child theme
// add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
// function my_theme_enqueue_styles() {
//     $parenthandle = 'parent-style';
//     $theme = wp_get_theme();
//     wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
//         array(),
//         $theme->parent()->get('Version')
//     );
//     wp_enqueue_style( 'child-style', get_stylesheet_uri(),
//         array( $parenthandle ),
//         $theme->get('Version')
//     );
// }
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
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

}
add_action('wp_enqueue_scripts','add_theme_scripts');

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
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields' ),
    'taxonomies'         => array(  'apartment-category' )
  );
  register_post_type( 'apartment', $argsApartment );

  // Facilities
  $labelFacilities = array(
    'name'                  => _x( 'Facilities', 'Facilities', 'hotel-center-lite-child' ),
    'singular_name'         => _x( 'Apartment', 'Apartment', 'hotel-center-lite-child' ),
    'menu_name'             => _x( 'Facilities', 'Facilities', 'hotel-center-lite-child' ),
    'name_admin_bar'        => _x( 'Facilities', 'Facilities', 'hotel-center-lite-child' ),
    'add_new'               => __( 'Add New', 'hotel-center-lite-child' ),
    'add_new_item'          => __( 'Add New Facilities', 'hotel-center-lite-child' ),
    'new_item'              => __( 'New Facilities', 'hotel-center-lite-child' ),
    'edit_item'             => __( 'Edit Facilities', 'hotel-center-lite-child' ),
    'view_item'             => __( 'View Facilities', 'hotel-center-lite-child' ),
    'all_items'             => __( 'All Facilities', 'hotel-center-lite-child' ),
    'search_items'          => __( 'Search Facilities', 'hotel-center-lite-child' ),
    'parent_item_colon'     => __( 'Parent Facilities:', 'hotel-center-lite-child' ),
    'not_found'             => __( 'No Facilities found.', 'hotel-center-lite-child' ),
    'not_found_in_trash'    => __( 'No Facilities found in Trash.', 'hotel-center-lite-child' )
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
    'all_items'             => __( 'All Service', 'hotel-center-lite-child' ),
    'search_items'          => __( 'Search Service', 'hotel-center-lite-child' ),
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
    'rewrite'            => array( 'slug' => 'service' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 22,
    'menu_icon'          => 'dashicons-email-alt2',
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields' ),
    'taxonomies'         => array(  'service-category' )
  );
  register_post_type( 'service', $argsService );

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
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'attractions' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'menu_icon'          => 'dashicons-palmtree',
    'supports'           => array( 'title', 'editor','thumbnail', 'excerpt'),
    'taxonomies'         => array(  'attractions-category' )
  );
  register_post_type( 'attractions', $argsAttractions );

    // add review post type
  $labelReviews = array(
    'name'                  => _x( 'Review Response', 'Review Response', 'hotel-center-lite-child' ),
    'singular_name'         => _x( 'Review', 'Reviews Response', 'hotel-center-lite-child' ),
    'menu_name'             => _x( 'Review Response', 'Review Response', 'hotel-center-lite-child' ),
    'name_admin_bar'        => _x( 'Review Response', 'Review Response', 'hotel-center-lite-child' ),
    'add_new'               => __( 'Add New Review Response', 'hotel-center-lite-child' ),
    'add_new_item'          => __( 'Add New Review Response ', 'hotel-center-lite-child' ),
    'new_item'              => __( 'New Review', 'hotel-center-lite-child' ),
    'edit_item'             => __( 'Edit Review', 'hotel-center-lite-child' ),
    'view_item'             => __( 'View Review', 'hotel-center-lite-child' ),
    'all_items'             => __( 'Reviews Response', 'hotel-center-lite-child' ),
    'search_items'          => __( 'Search Review Response', 'hotel-center-lite-child' ),
    'parent_item_colon'     => __( 'Parent Review:', 'hotel-center-lite-child' ),
    'not_found'             => __( 'No Review Response found.', 'hotel-center-lite-child' ),
    'not_found_in_trash'    => __( 'No Review Response found in Trash.', 'hotel-center-lite-child' )
  );

  $argsReviews = array(
    'labels'             => $labelReviews,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => false,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'review' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'menu_icon'          => 'dashicons-palmtree',
    'supports'           => array( 'title','thumbnail'),
    'taxonomies'         => array(  'reviews-category' )
  );
  register_post_type( 'review', $argsReviews );
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
        'rewrite'           => array( 'slug' => 'apartment-category' ),
    );

    register_taxonomy( 'apartment-category', array( 'apartment' ), $args );

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

    // service
    $labels = array(
      'name'              => _x( 'Service Category', 'taxonomy general name', 'hotel-center-lite-child' ),
      'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'hotel-center-lite-child' ),
      'search_items'      => __( 'Search Genres', 'hotel-center-lite-child' ),
      'all_items'         => __( 'All Service Category', 'hotel-center-lite-child' ),
      'parent_item'       => __( 'Parent Service Category', 'hotel-center-lite-child' ),
      'parent_item_colon' => __( 'Parent Service Category:', 'hotel-center-lite-child' ),
      'edit_item'         => __( 'Edit Service Category', 'hotel-center-lite-child' ),
      'update_item'       => __( 'Update Service Category', 'hotel-center-lite-child' ),
      'add_new_item'      => __( 'Add New Service Category', 'hotel-center-lite-child' ),
      'new_item_name'     => __( 'New Service Category Name', 'hotel-center-lite-child' ),
      'menu_name'         => __( 'Service Category', 'hotel-center-lite-child' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'service-category' ),
        'sort'              => true
    );

    register_taxonomy( 'service-category', array( 'service' ), $args );

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

    // Facilities
    unset($labels);
    unset($args);

    $labels = array(
      'name'              => _x( 'Facilities Category', 'taxonomy general name', 'hotel-center-lite-child' ),
      'singular_name'     => _x( 'Facilities Category', 'taxonomy singular name', 'hotel-center-lite-child' ),
      'search_items'      => __( 'Search Genres', 'hotel-center-lite-child' ),
      'all_items'         => __( 'All Facilities Category', 'hotel-center-lite-child' ),
      'parent_item'       => __( 'Parent Facilities Category', 'hotel-center-lite-child' ),
      'parent_item_colon' => __( 'Parent Facilities Category:', 'hotel-center-lite-child' ),
      'edit_item'         => __( 'Edit Facilities Category', 'hotel-center-lite-child' ),
      'update_item'       => __( 'Update Facilities Category', 'hotel-center-lite-child' ),
      'add_new_item'      => __( 'Add New Facilities Category', 'hotel-center-lite-child' ),
      'new_item_name'     => __( 'New Facilities Category Name', 'hotel-center-lite-child' ),
      'menu_name'         => __( 'Facilities Category', 'hotel-center-lite-child' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'facilities-category' ),
        'sort'              => true
    );

    register_taxonomy( 'facilities-category', array( 'facilities' ), $args );

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
        'rewrite'           => array( 'slug' => 'attractions-category' ),
        'sort'              => true
    );

    register_taxonomy( 'attractions-category', array( 'attractions' ), $args );

     // Review category
    unset($labels);
    unset($args);

    $labels = array(
      'name'              => _x( 'Reviews', 'taxonomy general name', 'hotel-center-lite-child' ),
      'singular_name'     => _x( 'Reviews', 'taxonomy singular name', 'hotel-center-lite-child' ),
      'search_items'      => __( 'Search Genres', 'hotel-center-lite-child' ),
      'all_items'         => __( 'All reviews', 'hotel-center-lite-child' ),
      'parent_item'       => __( 'Parent reviews', 'hotel-center-lite-child' ),
      'parent_item_colon' => __( 'Parent reviews:', 'hotel-center-lite-child' ),
      'edit_item'         => __( 'Edit reviews', 'hotel-center-lite-child' ),
      'update_item'       => __( 'Update reviews', 'hotel-center-lite-child' ),
      'add_new_item'      => __( 'Add New reviews', 'hotel-center-lite-child' ),
      'new_item_name'     => __( 'New reviews Name', 'hotel-center-lite-child' ),
      'menu_name'         => __( 'Reviews', 'hotel-center-lite-child' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'reviews-category' ),
        'sort'              => true
    );

    register_taxonomy( 'reviews-category', array( 'review' ), $args );


}
add_action('init', 'add_register_taxonomies');


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
  register_setting('options_group', 'address');
  register_setting('options_group', 'phone');
  register_setting('options_group', 'fax');
  register_setting('options_group', 'email');
  register_setting('options_group', 'f_facebook');
  register_setting('options_group', 'f_twitter');
  register_setting('options_group', 'f_google_plus');
  register_setting('options_group', 'f_youtube');
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
    <form method="post" action="options.php" novalidate="novalidate">
        <?php settings_fields( 'options_group' ); ?>
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row"><label for="address"><?php _e('Address','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="address" value="<?php echo get_option('address')?>"
                            class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="phone"><?php _e('電話番号','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="phone" value="<?php echo get_option('phone')?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="fax"><?php _e('ファックス','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="fax" value="<?php echo get_option('fax')?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="email"><?php _e('Email','hotel-center-lite-child') ?></label></th>
                    <td><input type="text" name="email" value="<?php echo get_option('email')?>" class="regular-text" />
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

// for cpt post_type_link (rather than post_link)
add_filter( 'post_type_link', 'custom_post_permalink' ); 
function custom_post_permalink ( $post_link ) {
    global $post;
    // var_dump($post);
    $type = get_post_type( $post->ID );
    return home_url( $type . '/' . $post->post_name . '.html' );
    
}

function hotel_center_lite_child_setup() {
    $path = get_stylesheet_directory().'/languages';
    load_child_theme_textdomain( 'hotel-center-lite-child', $path );
}
add_action( 'after_setup_theme', 'hotel_center_lite_child_setup' );


add_action('admin_menu', 'review_menu');
function review_menu(){
  $slug_1 = 'edit-tags.php?taxonomy=reviews-category&post_type=review';
  $slug_2 = 'edit.php?post_type=review';
  $title_1 = _x( 'Reviews', 'taxonomy general name', 'hotel-center-lite-child' );
  $title_2 = _x( 'Review Response', 'Review Response', 'hotel-center-lite-child' );
  $main_icon_url = get_template_directory_uri().'/images/privacy-policy-20.png';
    add_menu_page(_x( 'Reviews', 'taxonomy general name', 'hotel-center-lite-child' ), _x( 'Reviews', 'taxonomy general name', 'hotel-center-lite-child' ), 'edit_pages', $slug_1, '','dashicons-palmtree',25 );
    add_submenu_page($slug_1, $title_1, $title_1, 'manage_options', $slug_1 );
    add_submenu_page($slug_1, $title_1, $title_2, 'manage_options', $slug_2 );
}

/**
 * Hide the term description in  edit form
 */
add_action( "reviews-category_edit_form", function( $tag, $taxonomy )
{ 
    ?>
    <style>.term-description-wrap,.term-parent-wrap{display:none;} </style><?php
}, 10, 2 );

/**
 * Hide the term description in the add form
 */
add_action( 'reviews-category_add_form', function( $taxonomy )
{
    ?><style>.term-description-wrap,.term-parent-wrap{display:none;}</style><?php
}, 10, 2 );