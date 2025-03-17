<?php $page = 'kurumsal'; include "includes/header.php"; ?>

<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>Sıkça Sorulanlar</h3>
                    <ul>
                        <li>
                            <a href="index.html">Anasayfa</a>
                        </li>
                        <li>Sıkça Sorulanlar</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner4.png" alt="Inner Banner" />
                </div>
            </div>
        </div>
    </div>
</div>


<div class="faq-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="faq-accordion">
                    <ul class="accordion">
                        <?php
                        $sayfada = 1; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                        $sorgu=$db->prepare("select * from sikcasorulan");
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
                        $refsor=$db->prepare("select * from sikcasorulan order by id ASC limit 0,1");
                        $refsor->execute();
                        while ($refcek=$refsor->fetch(PDO::FETCH_ASSOC)) {
                        if ($refcek['isActive']==1){
                        ?>
                        <li class="accordion-item">
                            <a class="accordion-title active" href="javascript:void(0)">
                                <i class="ri-add-fill"></i>
                                <?php echo $refcek['baslik']; ?>
                            </a>
                            <div class="accordion-content show">
                                <p>
                                    <?php echo strip_tags($refcek['aciklama']); ?>
                                </p>
                            </div>
                        </li>
                        <?php }} ?>
                        <?php
                        $sayfada = 100; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                        $sorgu=$db->prepare("select * from sikcasorulan");
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
                        $refsor=$db->prepare("select * from sikcasorulan order by id ASC limit 1,100");
                        $refsor->execute();
                        $sayi = 2;
                        while ($refcek=$refsor->fetch(PDO::FETCH_ASSOC)) {
                        if ($refcek['isActive']==1){
                        ?>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="ri-add-fill"></i>
                                <?php echo $refcek['baslik']; ?>
                            </a>
                            <div class="accordion-content">
                                <p>
                                    <?php echo strip_tags($refcek['aciklama']); ?>
                                </p>
                            </div>
                        </li>
                        <?php }} ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
