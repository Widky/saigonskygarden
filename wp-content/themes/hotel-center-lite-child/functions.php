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
// Phân cấp breadcrumb
if(! function_exists('hierarchical_breadcrumb')){
    function hierarchical_breadcrumb(){
        if ( function_exists('yoast_breadcrumb') ) :
            
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );

        else: 
            if(!is_front_page() && is_single()) : 

                echo '<p id="breadcrumbs">';
                    global $post;
                    $delimiter = ' » ';
                    $spanBefore = '<span>';
                    $spanAfter = '</span>';
                    echo $spanBefore . $spanBefore;
                    echo '<a href="' . home_url() . '">' . __('Home', 'hotel-center-lite-child') . '</a>' . $delimiter;
                        echo $spanBefore;
                        $postType = get_post_type();
                        if($postType == 'post'){
                            $cat = get_the_category(); $cat = $cat[0];
                            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                        } else{
                            switch($postType){
                                case 'apartments':
                                    $terms = get_the_terms($post->ID,'apartment');
                                    break;
                                case 'facility':
                                    $terms = get_the_terms($post->ID,'facilities');
                                    break;
                                case 'service':
                                    $terms = get_the_terms($post->ID,'services');
                                    break;
                                default:
                                    $terms = get_the_terms($post->ID,'attractions');
                                    break;
                            }
                            // var_dump($terms);
                            $term_name = $terms[0]->name;
                            $term_url = $terms[0]->taxonomy .'/' . $terms[0]->slug . '.html';
                            echo '<a href="' . home_url($term_url) . '">' . $term_name . '</a>' . $delimiter;
                        }
                        echo '<span class="breadcrumb_last">';
                            echo $post->post_title;
                        echo $spanAfter;
                    echo $spanAfter . $spanAfter;
                echo '</p>'; 

            endif;
            
        endif;
    }
}