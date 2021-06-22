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

        // Apartment
        $strCurrentConversionUnit = 'currency_conversion_unit_for_english';
        $strLeaseTerm = 'lease_term_for_english';
        $strButtonShare = 'Share';
        $strTheCat = 'studio-apartment';
        $strLinkContact = 'contact-us';
        $strTextContact = 'Contact Us';
        $strArea = 'Area:';
        $strCheckIn = 'Check-in:';
        $strCheckOut = 'Check-out:';
        $strPriceApartment = 'Price:';
        $strBedType = 'Bed Type:';
        $strMaximumNumberPeople = 'Maximum number of people in a room:';

        // feature
        $strCatFeatures = 'features';

        // facilities
        $strCatFacilities = 'post-home';
        // single facilities
        $strCapacity = 'Capacity:';
        $strLocation = 'Location:';
        $strOpeningHours = 'Opening Hours:';

        // attractions
        $theAttractionsAbout = 'gioi-thieu';
        $theAttractionsTourist = 'tourist-attractions';
        $theAttractionsRestaurant = 'restaurant';
        $theAttractionsBar = 'bar';
        $theAttractionsCoffee = 'coffee';
        $theAttractionsFesRes = 'festiva-restaurant';
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

        // Apartment
        $strCurrentConversionUnit = 'currency_conversion_unit';
        $strLeaseTerm = 'lease_term';
        $strButtonShare = 'シェア';
        $strTheCat = 'スタジオ';
        $strLinkContact = 'お問い合わせ';
        $strTextContact = 'お問い合わせ';
        $strArea = '面積:';
        $strCheckIn = 'チェックイン:';
        $strCheckOut = 'チェックアウト:';
        $strPriceApartment = '料金:';
        $strBedType = 'ベッドタイプ:';
        $strMaximumNumberPeople = '一部屋の最大人数:';

        // feature
        $strCatFeatures = '特色';

        // facilities
        $strCatFacilities = 'ポストホーム';
        // single facilities
        $strCapacity = '容量:';
        $strLocation = '場所:';
        $strOpeningHours = '営業時間:';

        // attractions
        $theAttractionsAbout = '導入する';
        $theAttractionsTourist = '観光名所';
        $theAttractionsRestaurant = 'レストラン';
        $theAttractionsBar = 'バール';
        $theAttractionsCoffee = 'コーヒー';
        $theAttractionsFesRes = 'お祝いレストラン';
        break;
}
?>