<?php 
$upload_file = get_user_meta(1, 'upload_id');
// var_dump($upload_file);exit;
if($upload_file){
    $file = $upload_file[0]['file'];
    $strDay = date('Y').'/'.date('m').'/';
    $nameFile = str_replace($strDay, '',$file);
    ?>
<div class="row">
    <div class="col-12 p-0">
        <div class="home-banner">
            <?php echo '<img src="/wp-content/uploads/'.$file.'" alt="'.$nameFile.'" />'; ?>
            <div class="overlay"></div>
            <div class="banner-text">
                <?php 
                    $currentLang = get_bloginfo("language");
                    if($currentLang == 'ja'){
                        echo wpautop(get_option('text_ja'));
                    }else{
                        echo wpautop(get_option('text_en'));
                    }
                ?>
                <div class="hb-btn-direct btn-direct">
                    <a href="<?php echo get_option('booking'); ?>" rel="noopener noreferrer"
                        <?php if(1 == get_option( 'checknewtab' )) echo 'target="_blank"'; ?>
                        rel="noopener noreferrer"><?php echo __('Booking.com','hotel-center-lite-child') ?></a>
                </div>
            </div>

            <style>
            .home-banner {
                position: relative;
                margin-bottom: 100px;
            }

            .home-banner img {
                min-height: 300px;
                width: 100%;
            }

            .home-banner .overlay {
                background: #1A2021;
                width: 100%;
                height: 100%;
                display: block;
                position: absolute;
                top: 0;
                opacity: 50%;
                z-index: 10;
            }

            .home-banner .banner-text {
                position: absolute;
                height: 100%;
                width: 100%;
                top: 0;
                z-index: 11;
                text-align: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }

            .home-banner .banner-text a {
                padding: 0 15px;
            }

            .home-banner .banner-text p {
                font-size: 1.3em;
                font-weight: bold;
                line-height: 45px;
                color: #FFFFFF;
                letter-spacing: 0.5px;
                padding: 65px 0 45px;
            }
            @media screen and (max-width: 767.98px){
                .home-banner .banner-text p {
                    padding: 30px 0 30px;
                }
                .home-banner .banner-text p br{
                    display: none;
                }
            }
            </style>
        </div>
    </div>
</div>
<?php } ?>