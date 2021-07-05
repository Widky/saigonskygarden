<?php
$pageAboutSub2Title = 'sub_title_2';

$strCatFeatures = 'feature';
$strCatFacilities = 'post-home';
$strCurrentConversionUnit = 'currency_conversion_unit';
$strLeaseTerm = 'lease_term';
$strPageAboutDesFeature = 'description_feature_about';
$strTheCat = 'studio-apartment';
$strLinkContact = 'contact';

$theAttractionsAbout = 'introduce';
$theAttractionsFesRes = 'festiva-restaurant';


$currentLang = get_bloginfo("language");
// var_dump($currentLang);
switch($currentLang)
{
    case 'en-US':
        $the_cat = 'studio-apartment';
        $the_cat_bed_one = 'one-bed-room';
        $the_cat_bed_two = 'two-bed-room';
        $the_cat_bed_three = 'three-bed-room';

        // page title
        $pageTitle = 'page_title_english';

        // about us
        $strPageAboutFeature = 'Features';

        // Apartment
        $strButtonShare = 'Share';
        
        
        $strTextContact = 'Contact Us';
        $strArea = 'Area:';
        $strCheckIn = 'Check-in:';
        $strCheckOut = 'Check-out:';
        $strPriceApartment = 'Price:';
        $strBedType = 'Bed Type:';
        $strMaximumNumberPeople = 'Maximum number of people in a room:';

        // single facilities
        $strCapacity = 'Capacity:';
        $strLocation = 'Location:';
        $strOpeningHours = 'Opening Hours:';

        // attractions
        $theAttractionsTourist = 'tourist-attractions';
        $theAttractionsRestaurant = 'restaurant';
        $theAttractionsBar = 'bar';
        $theAttractionsCoffee = 'coffee';
        

        // breadcrumb
        $bcFacilities = 'Facilities';
        break;
    default:
        $the_cat = 'スタジオ';
        $the_cat_bed_one = '1ベッドルーム';
        $the_cat_bed_two = '2ベッドルーム';
        $the_cat_bed_three = '3ベッドルーム';
        // page title
        $pageTitle = 'page_title';

        // about us
        $strPageAboutFeature = '特徴';

        // Apartment
        
        $strButtonShare = 'シェア';
        $strTextContact = 'お問い合わせ';
        $strArea = '面積:';
        $strCheckIn = 'チェックイン:';
        $strCheckOut = 'チェックアウト:';
        $strPriceApartment = '料金:';
        $strBedType = 'ベッドタイプ:';
        $strMaximumNumberPeople = '一部屋の最大人数:';

        // single facilities
        $strCapacity = '容量:';
        $strLocation = '場所:';
        $strOpeningHours = '営業時間:';

        // attractions
        $theAttractionsTourist = '観光名所';
        $theAttractionsRestaurant = 'レストラン';
        $theAttractionsBar = 'バール';
        $theAttractionsCoffee = 'コーヒー';

        // breadcrumb
        $bcFacilities = '施設';
        break;
}
?>