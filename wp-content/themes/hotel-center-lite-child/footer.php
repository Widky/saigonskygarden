<div class="footer">
    <div class="footer-wrap container">
        <div class="footer-main row">
            <div class="footer-main-column footer-main-column1 col-xl-3 col-lg-3 col-md-5 col-12">
                <div class="fmc1-wrap">
                    <h3 class="fmc1-title">SAIGON SKY GARDEN</h3>
                    <p><?php _e('自然と調和した現代的なデザインで、サイゴンスカイガーデンは1区の中心的な建物の一つとなっています。', 'hotel-center-lite-child'); ?></p>
                    <div class="fmc1-social">
                        <?php 
                        $linkFB = get_option('f_facebook');
                        $linkTW = get_option('f_twitter');
                        $linkGP = get_option('f_google_plus');
                        $linkYT = get_option('f_youtube');
                        ?>
                        <a href="<?php echo $linkFB; ?>" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo $linkTW ?>" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-twitter"></i></i></a>
                        <a href="<?php echo $linkGP ?>" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-google-plus-g"></i></a>
                        <a href="<?php echo $linkYT ?>" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-main-column footer-main-column2 col-xl-3 col-lg3 col-md-3 col-6">
                <div class="row">
                <div class="footer-main-column footer-main-column2 col-xl-5 col-lg-5 col-md-5 col-12">
                    <div class="fmc2-wrap">
                        <?php dynamic_sidebar( 'footer_menu_1' ); ?>
                        <!--fm-items -->
                    </div>
                </div>
                <div class="footer-main-column footer-main-column3 col-xl-7 col-lg-7 col-md-7 col-12 pd-0">
                    <div class="fmc3-wrap">
                        <?php dynamic_sidebar( 'footer_menu_2' ); ?>
                        <!--fm-items -->
                    </div>
                </div>
                </div>
            </div>
            
            <div class="footer-main-column footer-main-column4 col-xl-3 col-lg-3 col-md-5 col-12">
                <div class="fmc4-wrap">
                    <h4 class="fm-title"><?php _e('お問い合わせ', 'hotel-center-lite-child') ?></h4>
                    <?php 
                        $linkAddress = get_option('address');
                        $linkPhone = get_option('phone');
                        $linkFax = get_option('fax');
                        $linkEmail = get_option('email');
                        ?>
                    <div class="fmc4-icon">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="fmc4-content set-width">
                            <p><?php echo $linkAddress; ?></p>
                        </div>
                    </div>
                    <div class="fmc4-icon fmc4-icon-rotate">
                        <i class="fas fa-phone"></i>
                        <div class="fmc4-content">
                            <div class="fmc4-line1">
                                <pre><?php _e('電話番号: ', 'hotel-center-lite-child') ?><a href="tel:+<?php echo $linkPhone; ?>"><?php echo $linkPhone; ?></a></pre>
                            </div>
                            <div class="fmc4-line2">
                                <pre><?php _e('ファックス: ', 'hotel-center-lite-child') ?><?php echo $linkFax; ?></pre>
                            </div>
                        </div>
                    </div>
                    <div class="fmc4-icon">
                        <i class="fas fa-envelope"></i>
                        <div class="fmc4-content">
                            <div class="fmc4-line1"><a
                                    href="mailto:<?php echo $linkEmail; ?>"><?php echo $linkEmail; ?></a></div>
                            <div class="fmc4-line2">saigonskygarden.com.vn</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-main-column footer-main-column5 col-xl-3 col-lg-2 col-md-7 col-12">
                <div class="fmc5-wrap">
                    <?php echo do_shortcode('[contact-form-7 id="61" title="ニュースを購読する - Subscribe to news"]'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-absolute">
        <div class="footer-absolute-wrap">
            <div class="footer-absolute-content text-center">
                Copyright(c) <?php echo date('Y'); ?> by <a href="/">Saigon Sky Garden</a>. All rights reserved.
            </div>
        </div>
    </div>
</div>

</div>
<!-- end page-wrap -->
</body>

</html>