<?php
session_start();

$site = "https://guzellik.ayoft.net";

try {
    $db = new PDO("mysql:host=localhost;dbname=ayoft_guzellik;charset=utf8", 'ayoft_guzellik', 'GuzellikSifre');
} catch (PDOExceptition $e) {
    echo $e->getMessage();
}


$ayarlar = $db->query('SELECT * FROM settings')->fetch();

$sirketismi = $ayarlar['company_name'];
$slogan = $ayarlar['slogan'];
$description = $ayarlar['description'];
$keywords = $ayarlar['keywords'];
$adres = $ayarlar['address'];
$hakkimizda = $ayarlar['about_us'];
$sloganhak = $ayarlar['sloganhak'];
$baslikhak = $ayarlar['baslikhak'];
$linkedin = $ayarlar['linkedin'];
$vizyon = $ayarlar['vision'];
$beyazlogo = $ayarlar['beyazlogo'];
$misyon = $ayarlar['mission'];
$logo = $ayarlar['logo'];
$favicon = $ayarlar['favicon'];
$mobillogo = $ayarlar['mobile_logo'];
$tel1 = $ayarlar['phone_1'];
$tel2 = $ayarlar['phone_2'];
$fax1 = $ayarlar['fax_1'];
$fax2 = $ayarlar['fax_2'];
$email = $ayarlar['email'];
$facebook = $ayarlar['facebook'];
$twitter = $ayarlar['twitter'];
$instagram = $ayarlar['instagram'];
$youtube = $ayarlar['youtube'];
$google = $ayarlar['google'];
$haritakodu = $ayarlar['haritakodu'];
$haritaurl = $ayarlar['haritaurl'];
$loaderyazi = $ayarlar['loaderyazi'];
$tanitimvideo = $ayarlar['tanitimvideo'];

$renk1 = $ayarlar['renk1'];
$renk2 = $ayarlar['renk2'];
$headerkod = $ayarlar['headerkod'];
$footerkod = $ayarlar['footerkod'];
$copy = $ayarlar['copy'];

$kurumsalfoto = $ayarlar['kurumsalfoto'];
$merakfoto = $ayarlar['merakfoto'];
$musteriyorumfoto = $ayarlar['musteriyorumfoto'];

$headerhakkimizda = $ayarlar['headerhakkimizda'];
$headermusteri = $ayarlar['headermusteri'];
$headerbolumler = $ayarlar['headerbolumler'];
$headerbolumici = $ayarlar['headerbolumici'];
$headerfoto = $ayarlar['headerfoto'];
$headervideo = $ayarlar['headervideo'];
$headerdoktor = $ayarlar['headerdoktor'];
$headerdoktorici = $ayarlar['headerdoktorici'];
$headerblog = $ayarlar['headerblog'];
$headerblogici = $ayarlar['headerblogici'];
$headeriletisim = $ayarlar['headeriletisim'];





function seo($s) {
    $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',','?','_');
    $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','','-');
    $s = str_replace($tr,$eng,$s);
    $s = strtolower($s);
    $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
    $s = preg_replace('/\s+/', '-', $s);
    $s = preg_replace('|-+|', '-', $s);
    $s = preg_replace('/#/', '', $s);
    $s = str_replace('.', '', $s);
    $s = trim($s, '-');
    return $s;
}


?>

