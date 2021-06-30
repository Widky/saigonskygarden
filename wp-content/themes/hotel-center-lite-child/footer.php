<div class="footer">
    <div class="footer-wrap container">
        <div class="footer-main row">
            <div class="footer-main-column footer-main-column1 col-xl-3 col-lg-3 col-md-5 col-12">
                <div class="fmc1-wrap">
                    <h3 class="fmc1-title">SAIGON SKY GARDEN</h3>
                    <p>自然と調和した現代的なデザインで、サイゴンスカイガーデンは1区の中心的な建物の一つとなっています。</p>
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
            <div class="footer-main-column footer-main-column2 col-xl-1 col-lg-1 col-md-3 col-6">
                <div class="fmc2-wrap">
                    <h4 class="fm-title">情報</h4>
                    <ul class="fm-items">
                        <li class="fm-item"><a href="#">会社概要</a></li>
                        <li class="fm-item"><a href="#">特色</a></li>
                        <li class="fm-item"><a href="#">アパート</a></li>
                        <li class="fm-item"><a href="#">サービス</a></li>
                        <li class="fm-item"><a href="#">イベント</a></li>
                        <li class="fm-item"><a href="#">お問い合わせ</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-main-column footer-main-column3 col-xl-2 col-lg-2 col-md-4 col-6">
                <div class="fmc3-wrap">
                    <h4 class="fm-title">施設</h4>
                    <ul class="fm-items">
                        <li class="fm-item"><a href="#">スイミングプール</a></li>
                        <li class="fm-item"><a href="#">スチームサウナ＆ジャグジー</a></li>
                        <li class="fm-item"><a href="#">スポーツエリア</a></li>
                        <li class="fm-item"><a href="#">プレイルーム</a></li>
                        <li class="fm-item"><a href="#">ジム</a></li>
                        <li class="fm-item"><a href="#">クラスルーム</a></li>
                        <li class="fm-item"><a href="#">マルチファンクションルーム</a></li>
                        <li class="fm-item"><a href="#">ピアノルーム＆麻雀ルーム</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-main-column footer-main-column4 col-xl-3 col-lg-3 col-md-5 col-12">
                <div class="fmc4-wrap">
                    <h4 class="fm-title">お問い合わせ</h4>
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
                                <pre>電話番号:    <a href="tel:+<?php echo $linkPhone; ?>"><?php echo $linkPhone; ?></a></pre>
                            </div>
                            <div class="fmc4-line2">
                                <pre>ファックス: <?php echo $linkFax; ?></pre>
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
            <div class="footer-main-column footer-main-column5 col-xl-3 col-lg-3 col-md-7 col-12">
                <div class="fmc5-wrap">
                    <h4 class="fm-title">サイゴンスカイガーデンニュースレター</h4>
                    <p>自然と調和した現代的なデザインで、サイゴンスカイガーデンは1 一つとなっています。</p>
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