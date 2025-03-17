<?php $page = 'kurumsal'; include "includes/header.php"; ?>


<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>Hakkımızda</h3>
                    <ul>
                        <li>
                            <a href="index.html">Anasayfa</a>
                        </li>
                        <li>Hakkımızda</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner1.png" alt="Inner Banner" />
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-item">
                    <div class="about-slider owl-carousel owl-theme">
                        <div class="about-img">
                            <div class="top-border"></div>
                            <img src="<?php echo $site; ?>/panel/uploads/settings_v/748x804/<?=$kurumsalfoto?>" alt="About" />
                            <div class="bottom-border bottom-border-color"></div>
                        </div>
                    </div>
                    <div class="about-vector">
                        <img src="assets/images/about/about-vector.png" alt="About" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content pl-20">
                    <div class="section-title">
                        <span><?=$sloganhak?></span>
                        <h2><?=$baslikhak?></h2><br>
                        <?=$hakkimizda?>
                    </div>
                    <a href="iletisim" class="default-btn border-radius-5">İletişime Geç <i class="flaticon-arrow-pointing-to-right"></i> </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
