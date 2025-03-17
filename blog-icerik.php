<?php $page = 'blog'; include "includes/header.php"; ?>
<?php
$refsor2=$db->prepare("SELECT * FROM news where id=:id");
$refsor2->execute(array('id' => $_GET['id']));
$refcek2=$refsor2->fetch(PDO::FETCH_ASSOC);
?>

<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3><?php echo $refcek2['title']; ?> </h3>
                    <ul>
                        <li>
                            <a href="index.html">Anasayfa</a>
                        </li>
                        <li><?php echo $refcek2['title']; ?> </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner3.png" alt="Inner Banner" />
                </div>
            </div>
        </div>
    </div>
</div>


<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content">
                    <div class="blog-preview-img">
                        <img style="width: 100%" src="<?php echo $site; ?>/panel/uploads/news_v/730x411/<?php echo $refcek2['img_url']; ?>" alt="<?php echo $refcek2['title']; ?>">
                    </div>
                    <h2 class="title"><?php echo $refcek2['title']; ?></h2>
                    <ul class="tag-list">
                        <li><i class='flaticon-clock'></i> <?php echo date('d.m.Y H:i', strtotime($refcek2['createdAt']));?> </li>
                    </ul>
                    <?php echo $refcek2['description']; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="side-bar-area pl-20">
                    <div class="side-bar-widget">
                        <h3 class="title">Popüler Yazılar</h3>
                        <div class="widget-popular-post">
                            <?php
                            $sayfada = 5; // sayfada gösterilecek içerik miktarını belirtiyoruz.
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
                            <article class="item">
                                <a href="blog-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>" class="thumb">
                                    <span class="full-image cover bg3" role="img" style="background-image: url(<?php echo $site; ?>/panel/uploads/news_v/730x411/<?php echo $refcek['img_url']; ?>)"></span>
                                </a>
                                <div class="info">
                                    <p><?php echo date('d.m.Y H:i', strtotime($refcek['createdAt']));?></p>
                                    <h4 class="title-text">
                                        <a href="blog-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>">
                                            <?php echo $refcek['title'];?>
                                        </a>
                                    </h4>
                                </div>
                            </article>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="side-bar-widget">
                        <h3 class="title">Hizmetlerimiz</h3>
                        <div class="side-bar-categories">
                            <ul>
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
                                        <li><a href="<?=$site?>/hizmet-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>"><i class="ri-arrow-right-s-line"></i> <?php echo $refcek['title']; ?></a></li>
                                    <?php }} ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "includes/footer.php"; ?>
