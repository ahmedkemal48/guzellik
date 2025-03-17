<?php $page = 'kurumsal'; include "includes/header.php"; ?>

<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>Ekibimiz</h3>
                    <ul>
                        <li>
                            <a href="index.html">Anasayfa</a>
                        </li>
                        <li>Ekibimiz</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner13.png" alt="Inner Banner" />
                </div>
            </div>
        </div>
    </div>
</div>


<div class="team-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <?php
            $sayfada = 9; // sayfada gösterilecek içerik miktarını belirtiyoruz.
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

            <div class="col-lg-12 col-md-12 text-center">
                <div class="pagination-area">
                    <?php
                    $s=0;
                    while ($s < $toplam_sayfa) {
                        $s++; ?>
                        <?php
                        if ($s==$sayfa) {?>
                            <span class="page-numbers current" aria-current="page"><?php echo $s; ?></span>
                        <?php } else {?>
                            <a href="ekibimiz?k=<?php echo $katid; ?>&sayfa=<?php echo $s ?>" class="page-numbers"><?php echo $s; ?></a>
                        <?php   } }  ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
