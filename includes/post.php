<?
if ( isset($_POST['iletisim']) ) {
    $isim = $_POST["isim"];
    $mail = $_POST["mail"];
    $konu = $_POST["konu"];
    $mesaj = $_POST["mesaj"];
    $ip = $_POST["ip"];
    $tarih = $_POST["tarih"];
    $durum = $_POST["durum"];
    $gonder = $db->prepare("INSERT INTO iletisim SET isim='$isim', mail='$mail', konu='$konu', mesaj='$mesaj', ip='$ip', tarih='$tarih', durum='$durum'");
    $gonder->execute();
    if($gonder){
        echo "<script type='text/javascript'>$(document).ready(function(){Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Mesajınız başarıyla bize ulaşmıştır. Sizlere geri dönüş sağlanacaktır.',
              showConfirmButton: false,
              timer: 3500
                })});</script>";
    }else{
        ?>
        <div style="color: red;font-size: 1.6em">Mesajınız Gönderilemedi</div>
        <?php
    }
}

if ( isset($_POST['teklifformu']) ) {
    $isim = $_POST["isim"];
    $mail = $_POST["mail"];
    $hizmet = $_POST["hizmet"];
    $konu = $_POST["konu"];
    $mesaj = $_POST["mesaj"];
    $ip = $_POST["ip"];
    $tarih = $_POST["tarih"];
    $durum = $_POST["durum"];
    $gonder = $db->prepare("INSERT INTO teklif SET isim='$isim', mail='$mail', hizmet='$hizmet', konu='$konu', mesaj='$mesaj', ip='$ip', tarih='$tarih', durum='$durum'");
    $gonder->execute();
    if($gonder){
        echo "<script type='text/javascript'>$(document).ready(function(){Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Mesajınız başarıyla bize ulaşmıştır. Sizlere geri dönüş sağlanacaktır.',
              showConfirmButton: false,
              timer: 3500
                })});</script>";
    }else{
        ?>
        <div style="color: red;font-size: 1.6em">Mesajınız Gönderilemedi</div>
        <?php
    }
}
?>

<?php
$sayfada = 1; // sayfada gösterilecek içerik miktarını belirtiyoruz.
$sorgu=$db->prepare("select * from email_settings");
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
$refsor=$db->prepare("select * from email_settings order by id DESC limit $limit,$sayfada");
$refsor->execute();
while ($refcek=$refsor->fetch(PDO::FETCH_ASSOC)) {
    if ($refcek['isActive']==1){
        ?>


        <?php
        if ( isset($_POST['iletisim']) ) {
            $message=
                '<b>İsim:</b>	'.$_POST['isim'].'<br />
         <b>Elektronik Posta Adresi:</b>	'.$_POST['mail'].'<br />
         <b>Mesaj Konusu:</b>	'.$_POST['konu'].'<br />
          <b>Mesaj:</b>	'.$_POST['mesaj'].'<br />
       
';
            require "PHPMailer-master/class.phpmailer.php";		// phpmailder dosyamızı çağırıyoruz

            // Sınıf
            $mail = new PHPMailer();

            // SMTP Ayarları
            $mail->CharSet = 'UTF-8';		// Türkçe karakter sorunu olmaması için karakter seti belirtiyoruz.
            $mail->IsSMTP();                // SMTP bağlantısı kuruyoruz
            $mail->SMTPAuth = true;         // SMTP bağlantı yetkilendirmeyi aktif ediyoruz
            $mail->SMTPSecure = $refcek['protocol'];    // Bağlantı türünü belirliyoruz. Alternatif => tls
            $mail->Host = $refcek['host'];	// Gmail SMTP sunucu adresi
            $mail->Port = $refcek['port'];				// Gmail SMTP port
            $mail->Encoding = '7bit';

            // Doğrulama
            $mail->Username   = $refcek['user'];	// Gmail adresiniz
            $mail->Password   = $refcek['password'];					// Gmail şifreniz

            // Oluştur
            $mail->SetFrom($_POST['eposta'], $_POST['isim']);
            $mail->AddReplyTo($_POST['eposta'], $_POST['isim']);
            $mail->Subject = $refcek['user_name'];					// Konu (gerekli değil)
            $mail->MsgHTML($message);

            // Gönder
            $mail->AddAddress($refcek['from'], $refcek['user_name']); // Mailleri hangi adrese gönderelim? - İsim ne olsun
            $result = $mail->Send();		// Gönder!
            $message = $result ? '<div class="alert alert-success" role="alert"><strong>Mesajınız iletilmiştir. </strong> En Kısa Sürede Sizinle İletişime Geçeceğiz.</div>' : '<div class="alert alert-danger" role="alert"><strong>Hata! </strong>Mesaj gönderilirken bir sorun oluştu.</div>';

            unset($mail);
        }

        if ( isset($_POST['teklifformu']) ) {
            $message=
                '<b>İsim:</b>	'.$_POST['isim'].'<br />
         <b>Elektronik Posta Adresi:</b>	'.$_POST['mail'].'<br />
         <b>Mesaj Konusu:</b>	'.$_POST['konu'].'<br />
         <b>Hizmet:</b>	'.$_POST['hizmet'].'<br />
          <b>Mesaj:</b>	'.$_POST['mesaj'].'<br />
       
';
            require "PHPMailer-master/class.phpmailer.php";		// phpmailder dosyamızı çağırıyoruz

            // Sınıf
            $mail = new PHPMailer();

            // SMTP Ayarları
            $mail->CharSet = 'UTF-8';		// Türkçe karakter sorunu olmaması için karakter seti belirtiyoruz.
            $mail->IsSMTP();                // SMTP bağlantısı kuruyoruz
            $mail->SMTPAuth = true;         // SMTP bağlantı yetkilendirmeyi aktif ediyoruz
            $mail->SMTPSecure = $refcek['protocol'];    // Bağlantı türünü belirliyoruz. Alternatif => tls
            $mail->Host = $refcek['host'];	// Gmail SMTP sunucu adresi
            $mail->Port = $refcek['port'];				// Gmail SMTP port
            $mail->Encoding = '7bit';

            // Doğrulama
            $mail->Username   = $refcek['user'];	// Gmail adresiniz
            $mail->Password   = $refcek['password'];					// Gmail şifreniz

            // Oluştur
            $mail->SetFrom($_POST['eposta'], $_POST['isim']);
            $mail->AddReplyTo($_POST['eposta'], $_POST['isim']);
            $mail->Subject = $refcek['user_name'];					// Konu (gerekli değil)
            $mail->MsgHTML($message);

            // Gönder
            $mail->AddAddress($refcek['from'], $refcek['user_name']); // Mailleri hangi adrese gönderelim? - İsim ne olsun
            $result = $mail->Send();		// Gönder!
            $message = $result ? '<div class="alert alert-success" role="alert"><strong>Mesajınız iletilmiştir. </strong> En Kısa Sürede Sizinle İletişime Geçeceğiz.</div>' : '<div class="alert alert-danger" role="alert"><strong>Hata! </strong>Mesaj gönderilirken bir sorun oluştu.</div>';

            unset($mail);
        }
        ?>
    <?php }} ?>