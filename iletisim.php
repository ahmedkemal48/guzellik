<?php $page = 'iletisim'; include "includes/header.php"; ?>

<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>İletişim</h3>
                    <ul>
                        <li>
                            <a href="index.html">Anasayfa</a>
                        </li>
                        <li>İletişim</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner2.png" alt="Inner Banner" />
                </div>
            </div>
        </div>
    </div>
</div>


<div class="contact-information-area pt-100 pb-70">
    <div class="container">
        <div class="contact-information-max">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-6">
                    <div class="contact-info-card">
                        <i class="flaticon-email"></i>
                        <h3>E-Posta</h3>
                        <p><a href="mailto:<?=$email?>"><span class="__cf_email__"><?=$email?></span></a></p><br>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="contact-info-card">
                        <i class="flaticon-telephone"></i>
                        <h3>Telefon</h3>
                        <p><a href="tel:<?=$tel1?>"><?=$tel1?></a></p>
                        <p><a href="tel:<?=$tel2?>"><?=$tel2?></a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="contact-info-card">
                        <i class="flaticon-pin"></i>
                        <h3>Adres</h3>
                        <p><a><?=strip_tags($adres)?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="contact-widget-area pb-70">
    <div class="container">
        <div class="contact-widget-max">
            <div class="contact-form">
                <div class="section-title text-center">
                    <h2>Bize Mesaj Gönder</h2>
                </div>
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

<!-- tp-map-area-start -->
<div class="tp-map-area pb-110">
    <div class="tp-contact-map">
        <?=$haritakodu?>
    </div>
</div>
<!-- tp-map-area-end -->

<?php include "includes/footer.php"; ?>
