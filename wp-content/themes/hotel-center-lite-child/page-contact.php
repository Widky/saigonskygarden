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
                    $locale = get_locale();
                    if($locale == 'ja'){
                        echo "連絡する";
                    }else{
                        echo "Contact";
                    }
                ?>
                 
             </h1>
            <div class="contact_content">
                <?php the_content() ?>
            </div>
            <div class="contact-form mb-5">
                <?php                    
                    echo do_shortcode ( '[cf7form cf7key="contact"]' );
                ?>
                    
            </div>
        </div>
        <div class="col-12 col-md-6 ">
            <?php
                    $contact_map_url = get_post_meta( get_the_ID(), 'contact_map_url',true );
                    $contact_address = get_post_meta( get_the_ID(), 'contact_address',true );
                    $contact_tel = get_post_meta(get_the_ID(),'contact_tel',true);
                    $contact_fax = get_post_meta(get_the_ID(),'contact_fax',true);
                    $contact_url = get_post_meta(get_the_ID(),'contact_site_url',true);
                    $contact_email = get_post_meta(get_the_ID(),'contact_email',true);
                    $contact_url2 = get_post_meta(get_the_ID(),'contact_url2',true);
                ?>
            <?php if(!empty($contact_address)) {?>
            <div class="map_iframe">
                <?php echo $contact_map_url ?>
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
                <div class="col-12 col-xl-6 ">
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



        </div>
    </div>
</div>

<?php

get_footer();