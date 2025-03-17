<?php $page = 'anasayfa'; include "includes/header.php"; ?>



<?php $refsor2=$db->prepare("select * from aktif WHERE id=62");
$refsor2->execute();
while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
    <div class="banner-area">
        <div class="banner-slider owl-carousel owl-theme">
        <?php
        $sayfada = 100; // sayfada gösterilecek içerik miktarını belirtiyoruz.
        $sorgu=$db->prepare("select * from slides");
        $sorgu->execute();
        $toplam_icerik=$sorgu->rowCount();
        $toplam_sayfa = ceil($toplam_icerik / $sayfada);
        // eğer sayfa girilmemişse 1 varsayalım.
        $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
        // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
        if($sayfa < 1) $sayfa = 1;
        // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
        if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
        $limit = ($sayfa - 1) * $sayfada;
        $refsor=$db->prepare("select * from slides order by rank ASC limit $limit,$sayfada");
        $refsor->execute();
        while ($refcek=$refsor->fetch(PDO::FETCH_ASSOC)) {
            if ($refcek['isActive']==1){
                ?>
            <div class="banner-item banner-item-bg2" >
                <div class="container-fluid">
                    <div class="banner-content banner-content-ml">
                        <span><?php echo $refcek['altbaslik']; ?></span>
                        <h1><?php echo $refcek['title']; ?></h1>
                        <p><?php echo strip_tags($refcek['description']); ?></p>
                         <?php if ($refcek['allowButton']==1){ ?>
                        <a href="<?php echo $refcek['button_url']; ?>" class="learn-btn"><?php echo $refcek['button_caption']; ?> <i class="flaticon-arrow-pointing-to-right"></i></a>
                         <?php } ?>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
    </div>
<?php }} ?>

<?php $refsor2=$db->prepare("select * from aktif WHERE id=63");
$refsor2->execute();
while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
    <div class="about-area section-bg pt-100 pb-70">
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
<?php }} ?>

<?php $refsor2=$db->prepare("select * from aktif WHERE id=64");
$refsor2->execute();
while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
    <div class="services-area ptb-100">
        <div class="container">
            <?php $refsor2=$db->prepare("select * from baslik WHERE id=11");
            $refsor2->execute();
            while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
                <div class="section-title mb-45 text-center">
                    <span><?php echo $refcek2['altbaslik']; ?></span>
                    <h2><?php echo $refcek2['isim']; ?></h2>
                    <div class="section-vector">
                        <img src="assets/images/shape/section-vector.png" alt="vector" />
                    </div>
                </div>
            <?php }} ?>
            <div class="row">
                <?php
                $sayfada = 100; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                $sorgu=$db->prepare("select * from services");
                $sorgu->execute();
                $toplam_icerik=$sorgu->rowCount();
                $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                // eğer sayfa girilmemişse 1 varsayalım.
                $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($sayfa < 1) $sayfa = 1;
                // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
                $limit = ($sayfa - 1) * $sayfada;
                $refsor=$db->prepare("select * from services order by rank ASC limit $limit,$sayfada");
                $refsor->execute();
                while ($refcek=$refsor->fetch(PDO::FETCH_ASSOC)) {
                    if ($refcek['isActive']==1){
                        ?>
                        <div class="col-lg-4 col-6">
                            <div class="services-card">
                                <a href="hizmet-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>">
                                    <img style="width: 100%;height: 310px;object-fit: cover;" src="<?php echo $site; ?>/panel/uploads/services_v/770x435/<?php echo $refcek['img_url']; ?>"  alt="<?php echo $refcek['title']; ?>">
                                </a>
                                <div class="content">
                                    <h3><a href="hizmet-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>"><?php echo $refcek['title']; ?></a></h3>
                                    <a href="hizmet-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>" class="more-btn">
                                        <i class="flaticon-arrow-pointing-to-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>


            </div>
            <div class="services-vector">
                <img src="assets/images/services/services-vector.png" alt="vector" />
            </div>
        </div>
    </div>
<?php }} ?>

<?php $refsor2=$db->prepare("select * from aktif WHERE id=65");
$refsor2->execute();
while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
    <div class="intro-video-area pb-100">
        <div class="container">
            <div class="video-content" style="background-image: url(<?php echo $site; ?>/panel/uploads/settings_v/946x938/<?=$merakfoto?>)">
                <a href="<?php echo $tanitimvideo;?>" class="play-btn">
                    <i class="ri-play-fill"></i>
                </a>
            </div>
            <?php $refsor2=$db->prepare("select * from baslik WHERE id=12");
            $refsor2->execute();
            while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
                <div class="section-title text-center pt-100">
                    <span class="color1"><?php echo $refcek2['altbaslik']; ?></span>
                    <h2 class="color1"><?php echo $refcek2['isim']; ?></h2>
                </div>
            <?php }} ?>

        </div>
    </div>
<?php }} ?>

<?php $refsor2=$db->prepare("select * from aktif WHERE id=66");
$refsor2->execute();
while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
    <div class="pricing-area section-bg pt-100 pb-70">
        <div class="container">
            <?php $refsor2=$db->prepare("select * from baslik WHERE id=13");
            $refsor2->execute();
            while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
                <div class="section-title mb-45 text-center">
                    <span><?php echo $refcek2['altbaslik']; ?></span>
                    <h2><?php echo $refcek2['isim']; ?></h2>
                </div>
            <?php }} ?>

            <div class="row">
                <?php
                $sayfada = 100; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                $sorgu=$db->prepare("select * from fiyatlar");
                $sorgu->execute();
                $toplam_icerik=$sorgu->rowCount();
                $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                // eğer sayfa girilmemişse 1 varsayalım.
                $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($sayfa < 1) $sayfa = 1;
                // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
                $limit = ($sayfa - 1) * $sayfada;
                $refsor=$db->prepare("select * from fiyatlar order by id ASC limit $limit,$sayfada");
                $refsor->execute();
                while ($refcek=$refsor->fetch(PDO::FETCH_ASSOC)) {
                    if ($refcek['isActive']==1){
                        ?>
                        <div class="col-lg-6">
                            <div class="pricing-card box-shadow">
                                <ul>
                                    <li>
                                        <div class="content">
                                            <h3><?php echo $refcek['baslik']; ?> <span>₺<?php echo $refcek['fiyat']; ?></span></h3>
                                            <p><?php echo $refcek['aciklama']; ?> </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php }} ?>
            </div>
        </div>
    </div>
<?php }} ?>

<?php $refsor2=$db->prepare("select * from aktif WHERE id=67");
$refsor2->execute();
while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <?php $refsor2=$db->prepare("select * from baslik WHERE id=14");
            $refsor2->execute();
            while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
                <div class="section-title mb-45 text-center">
                    <span><?php echo $refcek2['altbaslik']; ?></span>
                    <h2><?php echo $refcek2['isim']; ?></h2>
                    <div class="section-vector">
                        <img src="assets/images/shape/section-vector.png" alt="vector" />
                    </div>
                </div>
            <?php }} ?>
            <div class="row justify-content-center">
                <?php
                $sayfada = 100; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                $sorgu=$db->prepare("select * from teams");
                $sorgu->execute();
                $toplam_icerik=$sorgu->rowCount();
                $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                // eğer sayfa girilmemişse 1 varsayalım.
                $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($sayfa < 1) $sayfa = 1;
                // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
                $limit = ($sayfa - 1) * $sayfada;
                $refsor=$db->prepare("select * from teams order by rank ASC limit $limit,$sayfada");
                $refsor->execute();
                while ($refcek=$refsor->fetch(PDO::FETCH_ASSOC)) {

                    if ($refcek['isActive']==1){
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card">
                                <div class="team-img">
                                    <a>
                                        <img style="width: 100%" src="<?php echo $site; ?>/panel/uploads/teams_v/349x388/<?php echo $refcek['img_url']; ?>" alt="<?php echo strip_tags($refcek['ad_soyad']); ?>" />
                                    </a>
                                    <ul class="social-links-btn">
                                        <li class="share-btn"><i class="flaticon-arrow-pointing-to-right"></i></li>
                                        <?php if (!empty($refcek['facebook'])){ ?>
                                            <li><a href="<?php echo $refcek['facebook']; ?>" ><i class="fab fa-facebook"></i></a></li>
                                        <?php } ?>

                                        <?php if (!empty($refcek['instagram'])){ ?>
                                            <li><a href="<?php echo $refcek['instagram']; ?>" ><i class="fab fa-instagram"></i></a></li>
                                        <?php } ?>

                                        <?php if (!empty($refcek['twitter'])){ ?>
                                            <li><a href="<?php echo $refcek['twitter']; ?>" ><i class="fab fa-twitter"></i></a></li>
                                        <?php } ?>

                                        <?php if (!empty($refcek['youtube'])){ ?>
                                            <li><a href="<?php echo $refcek['youtube']; ?>" ><i class="fab fa-youtube"></i></a></li>
                                        <?php } ?>

                                        <?php if (!empty($refcek['linkedin'])){ ?>
                                            <li><a href="<?php echo $refcek['linkedin']; ?>" ><i class="fab fa-linkedin"></i></a></li>
                                        <?php } ?>

                                        <?php if (!empty($refcek['pinterest'])){ ?>
                                            <li><a href="<?php echo $refcek['pinterest']; ?>" ><i class="fab fa-pinterest"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="content">
                                    <h3>
                                        <a>
                                            <?php echo strip_tags($refcek['ad_soyad']); ?>
                                        </a>
                                    </h3>
                                    <span><?php echo strip_tags($refcek['pozisyon']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
            </div>
        </div>
    </div>
<?php }} ?>

<?php $refsor2=$db->prepare("select * from aktif WHERE id=68");
$refsor2->execute();
while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
    <div class="testimonial-area section-bg pt-100 pb-70">
        <div class="container">
            <?php $refsor2=$db->prepare("select * from baslik WHERE id=15");
            $refsor2->execute();
            while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
                <div class="section-title mb-45 text-center">
                    <span><?php echo $refcek2['altbaslik']; ?></span>
                    <h2><?php echo $refcek2['isim']; ?></h2>
                </div>
            <?php }} ?>

            <div class="testimonial-slider owl-carousel owl-theme">
            <?php
            $sayfada = 100; // sayfada gösterilecek içerik miktarını belirtiyoruz.
            $sorgu=$db->prepare("select * from yorum");
            $sorgu->execute();
            $toplam_icerik=$sorgu->rowCount();
            $toplam_sayfa = ceil($toplam_icerik / $sayfada);
            // eğer sayfa girilmemişse 1 varsayalım.
            $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
            // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
            if($sayfa < 1) $sayfa = 1;
            // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
            if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
            $limit = ($sayfa - 1) * $sayfada;
            $refsor=$db->prepare("select * from yorum order by rank ASC limit $limit,$sayfada");
            $refsor->execute();
            while ($refcek=$refsor->fetch(PDO::FETCH_ASSOC)) {
                if ($refcek['isActive']==1){
                    ?>
                <div class="testimonial-item">
                    <img style="height: 150px" src="<?php echo $site; ?>/panel/uploads/yorum_v/555x343/<?php echo $refcek['img_url']; ?>" alt="<?php echo $refcek['title']; ?>" />
                    <h3 style="margin-bottom: -3px"><?php echo $refcek['title']; ?> </h3>
                    <span><?php echo $refcek['statu']; ?></span>
                    <p><?php echo strip_tags($refcek['description']); ?></p>
                    <div class="rating">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>
<?php }} ?>

<?php $refsor2=$db->prepare("select * from aktif WHERE id=69");
$refsor2->execute();
while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
    <div class="booking-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="book-img">
                        <img src="<?php echo $site; ?>/panel/uploads/settings_v/1920x488/<?=$headermusteri?>" alt="Book" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="booking-form pl-20">
                        <?php $refsor2=$db->prepare("select * from baslik WHERE id=16");
                        $refsor2->execute();
                        while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
                            <div class="section-title mb-45">
                                <span><?php echo $refcek2['altbaslik']; ?></span>
                                <h2><?php echo $refcek2['isim']; ?></h2>
                            </div>
                        <?php }} ?>

                        <form  action="" method="post" role="form">
                            <input name="ip" type="hidden" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                            <input name="durum" type="hidden" class="form-control" value="1">
                            <input type="hidden" name="tarih" value="<?php echo date('d.m.Y H:i:s'); ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="isim" placeholder="İsminiz Soyisminiz" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="mail" placeholder="Elektronik Posta Adresiniz" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="konu" placeholder="İletmek İstediğiniz Mesajın Konusu" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="mesaj" class="form-control" id="message" cols="30" rows="7" required placeholder="İletmek İstediğiniz Mesajınız"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button name="iletisim" class="default-btn">
                                        Mesaj Gönder
                                    </button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }} ?>

<?php $refsor2=$db->prepare("select * from aktif WHERE id=70");
$refsor2->execute();
while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
    <div class="blog-area pt-100 pb-70 section-bg">
        <div class="container">
            <?php $refsor2=$db->prepare("select * from baslik WHERE id=17");
            $refsor2->execute();
            while ($refcek2=$refsor2->fetch(PDO::FETCH_ASSOC)) { if ($refcek2['isActive']==1){ ?>
                <div class="section-title mb-45 text-center">
                    <span><?php echo $refcek2['altbaslik']; ?></span>
                    <h2><?php echo $refcek2['isim']; ?></h2>
                </div>
            <?php }} ?>
            <div class="row justify-content-center">
                <?php
                $sayfada = 9; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                $sorgu=$db->prepare("select * from news");
                $sorgu->execute();
                $toplam_icerik=$sorgu->rowCount();
                $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                // eğer sayfa girilmemişse 1 varsayalım.
                $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($sayfa < 1) $sayfa = 1;
                // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
                $limit = ($sayfa - 1) * $sayfada;
                $refsor=$db->prepare("select * from news order by id DESC limit $limit,$sayfada");
                $refsor->execute();
                while ($refcek=$refsor->fetch(PDO::FETCH_ASSOC)) {
                    if ($refcek['isActive']==1){
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card box-shadow">
                            <a href="blog-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>" class="img">
                                <img style="width: 100%;height: 280px;object-fit: cover;" src="<?php echo $site; ?>/panel/uploads/news_v/730x411/<?php echo $refcek['img_url']; ?>" alt="<?php echo $refcek['title'];?>" />
                            </a>
                            <div class="content">
                                <ul>
                                    <li>
                                        <i class="flaticon-clock"></i>
                                        <?php echo date('d.m.Y H:i', strtotime($refcek['createdAt']));?>
                                    </li>
                                </ul>
                                <h3><a href="blog-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>"><?php echo $refcek['title'];?></a></h3>
                                <p><?php echo substr(strip_tags($refcek['description']),0,150); ?>...</p>
                                <a href="blog-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>" class="default-btn two border-radius-5">Devamını Oku <i class="flaticon-arrow-pointing-to-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } } ?>
            </div>
        </div>
    </div>
<?php }} ?>

<?php include "includes/footer.php"; ?>