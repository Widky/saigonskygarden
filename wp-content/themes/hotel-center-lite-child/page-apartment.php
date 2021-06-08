<?php 
/**
 * Template Name: アパートメント - Page Apartment
 */

get_header();

include dirname( __FILE__ ) . '/inc/lang/translate.php';

?>
<div class="apartment-detail">
    <div class="apartment-detail-wrap">
        <div class="apd-tax">
            <div class="cat-main-title">
                <div class="cat-line"></div>
                <h3 class="cat-title"><?php echo $strPageAboutFeature; ?></h3>
            </div>
            <div class="description-feature-about">
                <pre><?php echo $showAboutPage[$strPageAboutDesFeature] ?></pre>
            </div>
            <div class="apd-tax-share"></div>
        </div>
    </div>
</div>

<?php

get_footer();