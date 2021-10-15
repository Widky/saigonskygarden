<?php 
/**
 * Template Name: お問い合わせ - Page Contact
 */

get_header();
//include dirname( __FILE__ ) . '/inc/lang/translate.php';
?>

<div class="contact-container container">
    <div class="row contact-wrapper my-5">
        <div class="col-12 col-md-6 ">
            <h1>
                <?php                    
                    the_title();
                ?>
                 
             </h1>
            <div class="contact_content">
                <?php the_content() ?>
            </div>
            <div class="contact-form mb-5">
                <?php 
                    $locale = get_locale();
                    if($locale == 'ja'){
                        echo do_shortcode ( '[cf7form cf7key="contact"]' );
                    }else{
                        echo do_shortcode ( '[cf7form cf7key="contact_en"]' );
                    }                     
                ?>
                    
            </div>
        </div>
        <div class="col-12 col-md-6 ">
            <?php
                $page_id = get_queried_object_id();
                $contact_map_url = get_field('contact_map_url_newfield', $page_id, true );
                $contact_address = get_field('contact_address_newfield',$page_id, true );
                $contact_tel = get_field('contact_tel_newfield', $page_id, true);
                $contact_fax = get_field('contact_fax_newfield', $page_id, true);
                $contact_url = get_field('contact_site_url', $page_id, true);
                $contact_email = get_field('contact_email_newfield', $page_id, true);
                $contact_url2 = get_field('contact_url2_newfield', $page_id, true);
            ?>
            <?php if(!empty($contact_address)) {?>
            <div class="map_iframe">
                <?php echo $contact_map_url; ?>
            </div>
            <?php } ?>

            <h4><?php echo __('Contact Details','hotel-center-lite-child'); ?></h4>

            <div class="row contact-details">
                <div class="col-12 col-xl-6 ">
                    <?php if(!empty($contact_address)) {?>
                        <div class="mb-3 d-block  indent address">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/contact/place-icon.png">
                            <span><?php echo $contact_address ?></span>
                        </div>
                    <?php } ?>
                    <?php if(!empty($contact_tel)) {?>
                        <div class="mb-2 d-block ">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/contact/tel-icon.png">
                            <span class="tel"><?php echo __('Tel','hotel-center-lite-child'); ?>: <?php echo $contact_tel ?></span>
                        </div>
                    <?php } ?>
                    <?php if(!empty($contact_fax)) {?>
                        <div class="mb-3 d-block">
                            <div class="fax"><?php echo __('Fax','hotel-center-lite-child'); ?>: <?php echo $contact_fax ?></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-12 col-xl-6 p-xl-0 ">
                    <?php if(!empty($contact_url)) {?>
                        <div class="mb-3 d-block  url">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/contact/url_icon.png">
                            <a href="<?php echo $contact_url['url'] ?>" target="<?php echo $contact_url['target']; ?>" class="contact_url"><?php echo !empty($contact_url['title']) ? $contact_url['title'] : $contact_url['url'] ; ?></a>
                        </div>
                    <?php } ?>
                    <?php if(!empty($contact_email)) {?>
                        <div class="mb-2 d-block ">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/contact/mail_icon.png">
                            <?php echo $contact_email ?>
                        </div>
                    <?php } ?>
                    <?php if(!empty($contact_url2)) {?>
                        <div class="mb-2 d-block">
                            <div class="email2"><?php echo $contact_url2 ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row contact-button ">
                <div class="col-12 text-left text-xl-right">
                    <!-- <a class="contact_btn btn_cls d-inline-block" href="#">
                    <?php //echo __('長期ご契約 お問合せ','hotel-center-lite-child'); ?>
                    </a> -->
                    <a class="booking_btn btn_cls d-inline-block" target="_blank" href="https://www.booking.com/hotel/vn/saigon-sky-garden.html?label=gen173nr-1FCAEoggI46AdIM1gEaPQBiAEBmAExuAEXyAEP2AEB6AEB-AECiAIBqAID;sid=b4ce4dc38b9dd8d15ac2a14878dcbe23;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=tot">
                        <?php echo __('短期宿泊','hotel-center-lite-child'); ?>
                    </a>
                </div>
                
            </div>



        </div>
    </div>
</div>

<?php

get_footer();