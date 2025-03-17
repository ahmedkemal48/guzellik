<?php $page = 'galeri'; include "includes/header.php"; ?>

<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>Foto Galeri </h3>
                    <ul>
                        <li>
                            <a href="index.html">Anasayfa</a>
                        </li>
                        <li>Foto Galeri </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner9.png" alt="Inner Banner" />
                </div>
            </div>
        </div>
    </div>
</div>


<div class="services-area ptb-100">
    <div class="container">
        <div class="row">
            <?php
            $sayfada = 9; // sayfada gösterilecek içerik miktarını belirtiyoruz.
            $sorgu=$db->prepare("select * from images");
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
            $refsor=$db->prepare("select * from images order by rank ASC limit $limit,$sayfada");
            $refsor->execute();
            while ($refcek=$refsor->fetch(PDO::FETCH_ASSOC)) {
            if ($refcek['gallery_id']==9){

            if ($refcek['isActive']==1){

            ?>
            <div class="col-lg-4 col-6">
                <div class="services-card">
                    <a href="<?php echo $site; ?>/panel/uploads/galleries_v/images/resim-galerisi/851x606/<?php echo $refcek['url']; ?>" data-lightbox="roadtrip">
                        <img style="width: 100%;height: 320px;object-fit: cover;" src="<?php echo $site; ?>/panel/uploads/galleries_v/images/resim-galerisi/851x606/<?php echo $refcek['url']; ?>" alt="Services" />
                    </a>
                </div>
            </div>
            <?php }}} ?>

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
                            <a href="foto-galeri?k=<?php echo $katid; ?>&sayfa=<?php echo $s ?>" class="page-numbers"><?php echo $s; ?></a>
                        <?php   } }  ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
