<?php 
$upload_file = get_user_meta(1, 'upload_id');
if($upload_file){
    $file = $upload_file[0]['file'];
    $strDay = date('Y').'/'.date('m').'/';
    $nameFile = str_replace($strDay, '',$file);
    ?>
<div class="row">
    <div class="col-12 p-0">
        <div class="home-banner">
            <a href="http://" ></a>
            <a href="<?php echo get_option('booking'); ?>" <?php if(1 == get_option( 'checknewtab' )) echo 'target="_blank"'; ?> rel="noopener noreferrer">
                <?php echo '<img src="/wp-content/uploads/'.$file.'" alt="'.$nameFile.'" />'; ?>
                <div class="banner-text">
                    <?php 
                    $currentLang = get_bloginfo("language");
                    if($currentLang == 'ja'){
                        echo wpautop(get_option('text_ja'));
                    }else{
                        echo wpautop(get_option('text_en'));
                    }
                ?>
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

                .home-banner .banner-text {
                    position: absolute;
                    height: 100%;
                    width: 100%;
                    top: 0;
                    text-align: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    display: -ms-grid;
                    display: grid;
                }

                .home-banner .banner-text a {
                    padding: 0 15px;
                }

                .home-banner .banner-text p {
                    font-size: 1.3em;
                    line-height: 45px;
                    color: #FFFFFF;
                }
                </style>
            </a>
        </div>
    </div>
</div>
<?php } ?>
