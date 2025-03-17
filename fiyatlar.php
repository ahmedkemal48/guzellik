<?php $page = 'fiyatlar'; include "includes/header.php"; ?>

<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>Fiyat Listesi</h3>
                    <ul>
                        <li>
                            <a href="index.html">Anasayfa</a>
                        </li>
                        <li>Fiyat Listesi</li>
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


<div class="pricing-area  pt-100 pb-70">
    <div class="container">
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

<?php include "includes/footer.php"; ?>
