<div class="home-contact container">
    <div class="home-contact-wrap row">
        <div class="col-xl-6 col-lg-12">
            <div class="hcw-col hcw-left row">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home-contact/icon-message.png"
                    alt="icon-message.png">
                <div class="hcw-left-content col-9">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home-contact/top-message.png"
                        alt="top-message.png">
                    <h3 class="hcw-left-title"><?php _e('部屋を予約お問い合わせ', 'hotel-center-lite-child'); ?></h3>
                    <pre class="hcw-left-des"><?php _e('予約お問い合わせページに移動します。', 'hotel-center-lite-child'); ?></pre>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12">
            <div class="hcw-col hcw-right">
                <div class="hcw-right-content">
                    <h2 class="hcw-right-main-title"><?php _e('Call center', 'hotel-center-lite-child'); ?></h2>
                    <h3 class="hcw-right-title"><?php _e('いつも親切な相談をお約束いたします', 'hotel-center-lite-child'); ?></h3>
                    <div class="hcw-right-phone">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home-contact/icon-phone.png"
                            alt="icon-phone.png">
                        <a href="tel:+<?php echo get_option('phone') ?>"><?php echo get_option('phone') ?></a>
                    </div>
                    <pre class="hcw-right-des"><i class="far fa-clock"></i> <?php _e('口リアルタイム：PM09時 退室時間: AM06時', 'hotel-center-lite-child'); ?></pre>
                </div>
            </div>
        </div>
    </div>
</div>