<?php
require dirname( __FILE__ ) . '/inc/functions.php';

// Funtion: the_list_lang()
if(! function_exists('the_list_lang')){
    function the_list_lang(){
        $listLang = pll_the_languages(array('raw'=>1));
        // print_r($listLang);
        $currentLang = get_locale();
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
        <a href="<?php echo $v['url'] ?>">
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
                <a href="<?php echo $subv['url'] ?>">
                    <img src="<?php echo $subv['flag'] ?>" alt="<?php echo strtoupper($subvLocale) ?>">
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
<?php
    }
}