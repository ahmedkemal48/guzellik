<?php $page = 'blog'; include "includes/header.php"; ?>

<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>Bizden Haberler</h3>
                    <ul>
                        <li>
                            <a href="index.html">Anasayfa</a>
                        </li>
                        <li>Bizden Haberler</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner6.png" alt="Inner Banner" />
                </div>
            </div>
        </div>
    </div>
</div>


<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="row">
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
            <?php } ?>

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
                            <a href="blog?k=<?php echo $katid; ?>&sayfa=<?php echo $s ?>" class="page-numbers"><?php echo $s; ?></a>
                        <?php   } }  ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
