<?php
require dirname( __FILE__ ) . '/inc/functions.php';

// Funtion: the_list_lang()
if(! function_exists('the_list_lang')){
    function the_list_lang(){
        // wpm_language_switcher();exit;
        $listLang = wpm_get_languages();
        $currentLang = get_bloginfo("language");
        $currentLang = str_replace('-','_',$currentLang);
        // print_r($listLang);exit;

        $homeURL = get_stylesheet_directory_uri();
        switch($currentLang){
            case 'en_US' : 
                $flagUrl = $homeURL.'/assets/images/flag-icon/icon-en.png';
                break;
            default: 
                $flagUrl = $homeURL.'/assets/images/flag-icon/icon-ja.png';
                break;
        }
        ?>
<ul id="lbb-lang-lists">
    <li class="lbb-lang-item parent-lang">
        <?php 
        foreach($listLang as $k=>$v){ 
            $vLocale = str_replace('-','_',$v['locale']);
            if($vLocale == $currentLang){ ?>
        <a>
            <img src="<?php echo $flagUrl ?>" alt="<?php echo strtoupper($vLocale) ?>">
            <span class="lang-name"><?php echo substr(strtoupper($vLocale), 0, 2) ?></span>
        </a>
        <?php } ?>
        <?php } ?>
        <ul class="lbb-lang-sublists">
            <?php 
            foreach($listLang as $subk=>$subv){
                $subvLocale = str_replace('-','_',$subv['locale']);
                if($subvLocale != $currentLang){ 
            ?>
            <li class="lbb-lang-subitem">
                <a href="<?php echo esc_url( wpm_translate_current_url( $subk ) ); ?>">
                    <img src="/wp-content/plugins/wp-multilang/flags/<?php echo $subv['flag']; ?>"
                        alt="<?php echo strtoupper($subvLocale) ?>">
                    <span class="lang-name"><?php echo substr(strtoupper($subvLocale), 0, 2) ?></span>
                </a>
            </li>
            <?php } ?>
            <?php } ?>
        </ul>
    </li>
</ul>
<?php
    }
}

// breadcrumb
if(! function_exists('breadcrumb_header')){
    function breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb){
        ?>
<section class="section-breadcrumb" style="background: url('<?php echo $imageUrlBreadcrumb ?>') no-repeat top left">
    <div class="container">
        <div class="overlay-image-breadcrumb"></div>
        <div class="sb-title-wrap">
            <div class="sbtw-title">
                <h1><?php echo ($pageTitle != '') ? $pageTitle : $pageSubTitle; ?></h1>
            </div>
            <div class="sbtw-sub-title"><?php echo $pageSubTitle; ?></div>
        </div>
    </div>
</section>
<div class="hierarchical-breadcrumb">
    <div class="container">
        <?php hierarchical_breadcrumb(); ?>
    </div>
</div>
<?php
    }
}
// Ph??n c???p breadcrumb
if(! function_exists('hierarchical_breadcrumb')){
    function hierarchical_breadcrumb(){
        // if ( function_exists('yoast_breadcrumb') ) :
            
        //     yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );

        // else: 
            if(!is_front_page()) : 

                echo '<p id="breadcrumbs">';
                    global $post;
                    $delimiter = ' ?? ';
                    $spanBefore = '<span>';
                    $spanAfter = '</span>';
                    echo $spanBefore . $spanBefore;
                    echo '<a href="' . home_url() . '">' . __('Home', 'hotel-center-lite-child') . '</a>' . $delimiter;
                        echo $spanBefore;
                        if(is_page()){
                            echo '<span class="breadcrumb_last">';
                                echo $post->post_title;
                            echo $spanAfter;
                        }elseif(is_tax()){
                            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                            $currentLang = get_bloginfo("language");
                            if( $currentLang == 'ja' && strtolower($term->taxonomy) == 'attractions'){
                                $termName = '??????';
                            }else{
                                $termName = $term->taxonomy;
                            }
                            // var_dump($term);exit;
                            echo '<a href="' . home_url($term->taxonomy . '.html') . '">' . __($termName, 'hotel-center-lite-child') . '</a>' . $delimiter;
                            echo '<span class="breadcrumb_last">';
                                echo $term->name;
                            echo $spanAfter;
                        }elseif (is_category()){
                            global $wp_query;
                            $cat_obj = $wp_query->get_queried_object();
                            $thisCat = $cat_obj->term_id;
                            $thisCat = get_category($thisCat);
                            $parentCat = get_category($thisCat->parent);
                            if($thisCat->parent != 0){
                                echo get_category_parents($parentCat, TRUE, $delimiter);
                            }
                            echo '<span class="breadcrumb_last">';
                                single_cat_title();
                            echo $spanAfter;
            
                        }elseif(is_single()){
                            $postType = get_post_type();
                            if($postType == 'post'){
                                $cat = get_the_category(); $cat = $cat[0];
                                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                            }else{
                                if($postType == 'event'){                                    
                                    $page_b = get_page_by_path("events");
                                    $page_b_id =  $page_b->ID; 

                                    echo '<a href="'.get_permalink($page_b_id ).'">' . get_the_title($page_b_id) . '</a>' . $delimiter;
                                    echo '<span class="breadcrumb_last">';
                                }elseif($postType == 'apartment'){
                                    $page_b = get_page_by_path("apartment");
                                    $page_b_id =  $page_b->ID; 

                                    echo '<a href="'.get_permalink($page_b_id ).'">' . get_the_title($page_b_id) . '</a>' . $delimiter;
                                    echo '<span class="breadcrumb_last">';
                                }elseif($postType == 'attraction'){  
                                    $page_b = get_page_by_path("attractions");
                                    $page_b_id =  $page_b->ID; 

                                    echo '<a href="'.get_permalink($page_b_id ).'">' . get_the_title($page_b_id) . '</a>' . $delimiter;
                                    // echo '<span class="breadcrumb_last">';
                                    // $terms = get_the_terms($post->ID,'attractions');
                                    // $term_name = $terms[0]->name;
                                    // $term_url = $terms[0]->taxonomy .'/' . $terms[0]->slug . '.html';
                                    // echo '<a href="' . home_url($term_url) . '">' . $term_name . '</a>' . $delimiter;
                                    echo '<span class="breadcrumb_last">';
     
                                }else{
                                    $loc = get_locale();
                                    $namePostType = $postType;
                                    if ($postType == 'services'){
                                        $namePostType = $loc == 'ja' ? '????????????' : 'SERVICES';
                                    }elseif ($postType == 'facilities'){
                                        $namePostType = $loc == 'ja' ? '??????' : 'Facilities';
                                    }
                                    echo '<a href="' . home_url($postType . '.html') . '">' . $namePostType . '</a>' . $delimiter;
                                    echo '<span class="breadcrumb_last">';
                                }
                               
                                echo $post->post_title;
                                echo $spanAfter;
                            }
                        }elseif (is_search()){
                            echo '<span class="breadcrumb_last">' . __('Search Results for:', 'hotel-center-lite-child'). ' &quot;' . get_search_query() . '&quot;' . $spanAfter;
                        } elseif (is_tag()){
                            echo '<span class="breadcrumb_last">' . __('Post Tagged with:', 'hotel-center-lite-child'). ' &quot;';
                            single_tag_title();
                            echo '&quot;' . $spanAfter;
                        } elseif (is_author()) {
                            global $author;
                            $userdata = get_userdata($author);
                            echo '<span class="breadcrumb_last">' . __('Author Archive', 'hotel-center-lite-child') . $spanAfter;
                        } elseif (is_404()){
                            echo '<span class="breadcrumb_last">' . __('Page Not Found', 'hotel-center-lite-child') . $spanAfter;
                        }
                        echo $spanAfter;
                    echo $spanAfter . $spanAfter;
                echo '</p>'; 

            endif;
            
        // endif;
    }
}

class Walker_Dynamic_Submenu extends Walker_Nav_Menu {
    function end_el(&$output, $item, $depth=0, $args=array()) { // function for first level posts
        if( 49 == $item->ID ){ // replace with your menu item ID
            global $post;
            $chapters = get_posts(array('post_type'=>'services','posts_per_page'=>-1, 'post_parent' => 0));
            if(!empty($chapters)) {
                $output .= '<ul class="sub-menu">';
                foreach($chapters as $post): setup_postdata($post);
                    $output .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a>';
                    $output .= '</li>';
                endforeach; wp_reset_postdata();
                $output .= '</ul>';
            }           
        }elseif( 51 == $item->ID ){ // replace with your menu item ID
            global $post;
            $chapters = get_posts(array('post_type'=>'facilities','posts_per_page'=>-1, 'post_parent' => 0));
            if(!empty($chapters)) {
                $output .= '<ul class="sub-menu">';
                foreach($chapters as $post): setup_postdata($post);
                    $output .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a>';                
                    $output .= '</li>';
                endforeach; wp_reset_postdata();
                $output .= '</ul>';
            }           
        }elseif( 1816 == $item->ID ){ // replace with your menu item ID
            global $post;
            $chapters = get_posts(array('post_type'=>'apartment','posts_per_page'=>-1, 'post_parent' => 0));
            if(!empty($chapters)) {
                $output .= '<ul class="sub-menu">';
                foreach($chapters as $post): setup_postdata($post);
                        $output .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a>';                
                        $output .= '</li>';
                endforeach; wp_reset_postdata();
                $output .= '</ul>';
            }           
        }
        $output .= "</li>\n";
    }
}

class Walker_Dynamic_Submenu2 extends Walker_Nav_Menu {
    function end_el(&$output, $item, $depth=0, $args=array()) { // function for first level posts
        if( 49 == $item->ID ){ // replace with your menu item ID
            global $post;
            $chapters = get_posts(array('post_type'=>'services','posts_per_page'=>-1, 'post_parent' => 0));
            if(!empty($chapters)) {
                $output .= '<ul class="sub-menu">';
                foreach($chapters as $post): setup_postdata($post);
                    $output .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a>';
                    $output .= '</li>';
                endforeach; wp_reset_postdata();
                $output .= '</ul>';
            }           
        }elseif( 51 == $item->ID ){ // replace with your menu item ID
            global $post;
            $chapters = get_posts(array('post_type'=>'facilities','posts_per_page'=>-1, 'post_parent' => 0));
            if(!empty($chapters)) {
                $output .= '<ul class="sub-menu">';
                foreach($chapters as $post): setup_postdata($post);
                    $output .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a>';                
                    $output .= '</li>';
                endforeach; wp_reset_postdata();
                $output .= '</ul>';
            }           
        }elseif( 1816 == $item->ID ){ // replace with your menu item ID
            global $post;
            $chapters = get_posts(array('post_type'=>'apartment','posts_per_page'=>-1, 'post_parent' => 0));
            if(!empty($chapters)) {
                $output .= '<ul class="sub-menu">';
                foreach($chapters as $post): setup_postdata($post);
                        $output .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a>';                
                        $output .= '</li>';
                endforeach; wp_reset_postdata();
                $output .= '</ul>';
            }           
        }        
        $output .= "</li>\n";
    }
}

/**
 * Add description Featured Image
 */
function wk_description_featured_image( $content, $post_id, $thumbnail_id ) {
	$arrPosttype = array('page', 'feature', 'attraction', 'event', 'facilities');
    if ( ! in_array(get_post_type( $post_id ), $arrPosttype) ) {
        return $content;
    }
    if(get_post_type( $post_id ) == 'page'){
        $caption = '<p>' . esc_html__( 'Recommended image size: 1920px (width) x 351px (height) or Proportionally larger', 'i18n-tag' ) . '</p>';

    }elseif(get_post_type( $post_id ) == 'feature'){
        $caption = '<p>' . esc_html__( 'Recommended image size: 1142px (width) x 596px (height) or Proportionally larger', 'i18n-tag' ) . '</p>';

    }elseif(get_post_type( $post_id ) == 'event'){
        $caption = '<p>' . esc_html__( 'Recommended image size: 457px (width) x 240px (height) or Proportionally larger', 'i18n-tag' ) . '</p>';

    }elseif(get_post_type( $post_id ) == 'facilities'){
        $caption = '<p>' . esc_html__( 'Recommended image size: 457px (width) x 240px (height) or Proportionally larger', 'i18n-tag' ) . '</p>';

    }else{
        $caption = '<p>' . esc_html__( 'Recommended image size: 684px (width) x 684px (height) or Proportionally larger (449x449/1079x1079)', 'i18n-tag' ) . '</p>';
    }
    return $content . $caption;
}
add_filter( 'admin_post_thumbnail_html', 'wk_description_featured_image', 10, 3 ); 

add_action( 'after_setup_theme', 'wk_image_theme_setup' );
function wk_image_theme_setup() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'custom-apartment', 1437, 596, true);
    add_image_size( 'custom-apartment-single', 419, 185, true);
    add_image_size( 'custom-feature-home', 345, 449, true);
    add_image_size( 'custom-feature', 1142, 596, true);
    add_image_size( 'custom-attraction', 449, 449, true);
    add_image_size( 'custom-attraction-2', 664, 664, true);
    add_image_size( 'custom-attraction-3', 438, 292, true);
    add_image_size( 'custom-facilities', 457, 240, true);
    add_image_size( 'custom-service', 808, 538, true);
    add_image_size( 'custom-service-other', 428, 285, true);
}