<?php
require dirname( __FILE__ ) . '/inc/functions.php';

// Funtion: the_list_lang()
if(! function_exists('the_list_lang')){
    function the_list_lang(){
        wpm_language_switcher('dropdown','flag');
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
<?php
    }
}