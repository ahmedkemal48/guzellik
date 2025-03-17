<footer class="footer-area footer-bg">
    <div class="container pt-100 pb-70">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget pe-5">
                    <div class="footer-logo">
                        <a href="index.html">
                            <img src="<?php echo $site; ?>/panel/uploads/settings_v/1280x720/<?php echo $logo; ?>" class="footer-logo1" alt="Images">
                        </a>
                        <a href="index.html">
                            <img src="<?php echo $site; ?>/panel/uploads/settings_v/1280x720/<?php echo $beyazlogo; ?>" class="footer-logo2" alt="Images">
                        </a>
                    </div>
                    <p>
                        <?=$misyon?>
                    </p>
                    <ul class="social-link">
                        <?php if (!empty($facebook)){?>
                            <li><a href="<?=$facebook?>"><i class="fab fa-facebook-f"></i></a></li>
                        <?php } ?>
                        <?php if (!empty($instagram)){?>
                            <li><a href="<?=$instagram?>"><i class="fab fa-instagram"></i></a></li>
                        <?php } ?>
                        <?php if (!empty($youtube)){?>
                            <li><a href="<?=$youtube?>"><i class="fab fa-youtube"></i></a></li>
                        <?php } ?>
                        <?php if (!empty($twitter)){?>
                            <li><a href="<?=$twitter?>"><i class="fab fa-twitter"></i></a></li>
                        <?php } ?>
                        <?php if (!empty($google)){?>
                            <li><a href="<?=$google?>"><i class="fab fa-google"></i></a></li>
                        <?php } ?>
                        <?php if (!empty($linkedin)){?>
                            <li><a href="<?=$linkedin?>"><i class="fab fa-linkedin"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="footer-widget pe-2">
                    <h3>Hızlı Menü</h3>
                    <ul class="list-unstyled">
                        <li><a class="renk" href="index"><p style="margin-bottom: -3px">Anasayfa</p></a></li>
                        <li><a class="renk" href="hakkimizda"><p style="margin-bottom: -3px">Hakkımızda</p></a></li>
                        <li><a class="renk" href="ekibimiz"><p style="margin-bottom: -3px">Ekibimiz</p></a></li>
                        <li><a class="renk" href="sikca-sorulanlar"><p style="margin-bottom: -3px">Sıkça Sorulanlar</p></a></li>
                        <li><a class="renk" href="fiyatlar"><p style="margin-bottom: -3px">Fiyat Listesi</p></a></li>
                        <li><a class="renk" href="hizmetlerimiz"><p style="margin-bottom: -3px">Hizmetler</p></a></li>
                        <li><a class="renk" href="blog"><p style="margin-bottom: -3px">Blog</p></a></li>
                        <li><a class="renk" href="foto-galeri"><p style="margin-bottom: -3px">Foto Galeri</p></a></li>
                        <li><a class="renk" href="video-galeri"><p style="margin-bottom: -3px">Video Galeri</p></a></li>
                        <li><a class="renk" href="iletisim"><p style="margin-bottom: -3px">İletişim</p></a></li>
                    </ul>
                    <style>
                        .renk {
                            color:#1d1d1d;
                            margin-bottom: 12px;
                        }
                    </style>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="footer-widget ps-4">
                    <h3>Hizmetlerimiz</h3>
                    <ul class="list-unstyled">
                        <?php
                        $sayfada = 10; // sayfada gösterilecek içerik miktarını belirtiyoruz.
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
                                <li><a class="renk" href="<?=$site?>/hizmet-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>"><p style="margin-bottom: -3px"><?php echo $refcek['title']; ?></p></a></li>
                            <?php }} ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget ps-3">
                    <h3>İletişim Bilgileri</h3>
                    <ul class="footer-contact">
                        <li>
                            <i class="flaticon-telephone"></i>
                            <div class="content">
                                <h4>Telefon</h4>
                                <span><a href="tel:<?=$tel1?>" target="_blank"><?=$tel1?></a></span>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-email"></i>
                            <div class="content">
                                <h4>E-Posta:</h4>
                                <span><a href="mailto:<?=$email?>" target="blank"><span class="cf_email_"><?=$email?></span></a></span>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-pin"></i>
                            <div class="content">
                                <h4>Adres</h4>
                                <span><?=strip_tags($adres)?></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright-area">
    <div class="container">
        <div class="copy-right-text text-center">
            <p>
                <?=$copy?>
            </p>
        </div>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>

<script src="assets/js/plugins.js"></script>

<script src="assets/js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.js"></script>

<script src="js/lightbox.js"></script>


<?php include "includes/post.php"; ?>
<?=$footerkod?>

</body>
</html>