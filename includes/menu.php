<ul class="navbar-nav m-auto">
    <li class="nav-item">
        <a href="index.html" class="nav-link <?php if($page=='anasayfa'){echo 'active';}?>">
            Anasayfa
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link <?php if($page=='kurumsal'){echo 'active';}?> dropdown-toggle">
            Kurumsal
        </a>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="hakkimizda" class="nav-link">
                    Hakkımızda
                </a>
            </li>
            <li class="nav-item">
                <a href="ekibimiz" class="nav-link">
                    Ekibimiz
                </a>
            </li>
            <li class="nav-item">
                <a href="sikca-sorulanlar" class="nav-link">
                    Sıkça Sorulanlar
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="hizmetlerimiz" class="nav-link <?php if($page=='hizmet'){echo 'active';}?> dropdown-toggle">
            Hizmetlerimiz
        </a>
        <ul class="dropdown-menu">
            <?php
            $sayfada = 50; // sayfada gösterilecek içerik miktarını belirtiyoruz.
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
                    <li class="nav-item">
                        <a href="hizmet-icerik/<?=seo($refcek['title'])."-".$refcek['id']?>" class="nav-link">
                            <?php echo $refcek['title']; ?>
                        </a>
                    </li>
                <?php }} ?>

        </ul>
    </li>
    <li class="nav-item">
        <a href="fiyatlar" class="nav-link <?php if($page=='fiyatlar'){echo 'active';}?>">
            Fiyat Listesi
        </a>
    </li>
    <li class="nav-item">
        <a href="blog" class="nav-link <?php if($page=='blog'){echo 'active';}?>">
            Bizden Haberler
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link <?php if($page=='galeri'){echo 'active';}?> dropdown-toggle">
            Multimedya
        </a>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="foto-galeri" class="nav-link">
                    Foto Galeri
                </a>
            </li>
            <li class="nav-item">
                <a href="video-galeri" class="nav-link">
                    Video Galeri
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="iletisim" class="nav-link <?php if($page=='iletisim'){echo 'active';}?>">
            İletişim
        </a>
    </li>
</ul>