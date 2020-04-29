<?php
session_start();
include 'fonksiyonlar.php';

$sayfa = $_GET['sayfa'];

if ($sayfa=='cikis') {
  //cikis();
  session_start();
	session_destroy();
	setcookie("cerez", $ePosta, time() - 1);
  header('Location:index.php');
}

$arrSayfalar = array();
$arrSayfalar[] = 'anasayfa';
$arrSayfalar[] = 'hakkimizda';
$arrSayfalar[] = 'iletisim';
$arrSayfalar[] = 'giris';
$arrSayfalar[] = 'cikis';
$arrSayfalar[] = 'kategori';
$arrSayfalar[] = 'uyeler';
$arrSayfalar[] = 'kategoriler';
$arrSayfalar[] = 'icerikler';
$arrSayfalar[] = 'detay';
$arrSayfalar[] = 'yonetim';
$arrSayfalar[] = 'profil';
$arrSayfalar[] = 'site-ayarlari';
$arrSayfalar[] = 'duzenle';
$arrSayfalar[] = 'ekle';
$arrSayfalar[] = 'guncelle';
$arrSayfalar[] = 'sayfa';

in_array($sayfa, $arrSayfalar) ? $goster = $sayfa : $goster = 'anasayfa' ;
//($sayfa=='cikis') ? $goster = 'anasayfa' : null ;

include '_ustBolum.php';
include $goster.'.php';
include '_altBolum.php';
?>