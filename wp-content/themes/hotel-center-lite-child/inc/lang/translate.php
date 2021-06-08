<?php
$currentLang = get_locale();
switch($currentLang)
{
    case 'en_US':
        $the_cat = 'studio-apartment';
        $the_cat_bed_one = 'one-bed-room';
        $the_cat_bed_two = 'two-bed-room';
        $the_cat_bed_three = 'three-bed-room';
        // page title
        $pageTitle = 'page_title_english';
        // about us
        $pageAboutSub2Title = 'sub_title_2_english';
        $strPageAboutFeature = 'Features';
        $strPageAboutDesFeature = 'description_feature_about_english';
        break;
    default:
        $the_cat = 'スタジオ';
        $the_cat_bed_one = '1ベッドルーム';
        $the_cat_bed_two = '2ベッドルーム';
        $the_cat_bed_three = '3ベッドルーム';
        // page title
        $pageTitle = 'page_title';
        // about us
        $pageAboutSub2Title = 'sub_title_2';
        $strPageAboutFeature = '特徴';
        $strPageAboutDesFeature = 'description_feature_about';
        break;
}
?>