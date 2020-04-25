<?php 
session_start();
// Daha önce oturum varsa
if (isset($_SESSION["oturum"]) && $_SESSION["oturum"] == "1453") {
  header("Location:index.php");
}else if (isset($_COOKIE["cerez"])) {
  include("baglan.php");
  $sorgu = $vt->prepare("SELECT ePosta FROM uyeler");
  $sorgu->execute();

  while ($sonuc = $sorgu->fetch()) {
    if ($_COOKIE["cerez"] == $sonuc['ePosta']) {
      $_SESSION["oturum"]       = "1453";
      $_SESSION["ePosta"]       = $sonuc->ePosta;
      $_SESSION["adi"]          = $sonuc->adi;
      $_SESSION["kullaniciAdi"] = $sonuc->kullaniciAdi;
      $_SESSION["yetki"]        = $sonuc->yetki;
      header("location:index.php");
    }
  }
}
// Giriş formu gönderilmişse
if (isset($_POST['giris'])) {
  include("baglan.php");
  $ePosta = htmlspecialchars($_POST['ePosta']);
  $parola = md5($_POST['parola']);
  $sorgu  = $vt->prepare("SELECT * FROM uyeler WHERE ePosta=?");
  $sorgu->execute(["{$ePosta}"]);
  $sonuc  = $sorgu->fetch();

  if ($parola==$sonuc->parola) {
    $_SESSION["oturum"]       = "1453";
    $_SESSION["ePosta"]       = htmlspecialchars_decode($sonuc->ePosta);
    $_SESSION["adi"]          = htmlspecialchars_decode($sonuc->adi);
    $_SESSION["kullaniciAdi"] = htmlspecialchars_decode($sonuc->kullaniciAdi);
    $_SESSION["yetki"]        = htmlspecialchars_decode($sonuc->yetki);

    if (isset($_POST["beniHatirla"])) {
      setcookie("cerez", htmlspecialchars_decode($sonuc->ePosta), time() + (60 * 60 * 24 * 7));
    }
    header("location:index.php");
  }else{echo "E-Posta veya Parola yanlış!";}
  $vt = null;
}
// Üyeol formu gönderilmişse
if (isset($_POST['uyeOl'])) {
  include("baglan.php");
  $ePosta       = htmlspecialchars($_POST['ePosta']);
  $parola       = md5($_POST['parola']);
  $parolaTekrar = md5($_POST['parolaTekrar']);
  $adi          = htmlspecialchars($_POST['adi']);
  $kullaniciAdi = htmlspecialchars($_POST['kullaniciAdi']);
  $proDili      = htmlspecialchars($_POST['proDili']);
  $konum        = htmlspecialchars("Ankara");
  $ipAdresi     = htmlspecialchars("127.0.0.1");
  $eklenme      = date("d/m/Y G:i:s");

  if ($ePosta<>"" && $parola<>"" && $parolaTekrar<>"" && $adi<>"" && $kullaniciAdi<>"") {
    if ($parola == $parolaTekrar) {
      if ($proDili=='') {
        $proDili = "Yok.";
      }
      $sorgu = $vt->prepare("INSERT INTO uyeler SET ePosta=?,parola=?,adi=?,kullaniciAdi=?,proDili=?,konum=?,ipAdresi=?,eklenme=?,yetki=?,aktif=?");
      $sorgu->execute(["{$ePosta}","{$parola}","{$adi}","{$kullaniciAdi}","{$proDili}","{$konum}","{$ipAdresi}","{$eklenme}","1","1"]);
    }else{echo "Parola tekrar ile uyuşmuyor!";}
  }else{echo "Boş alan bırakamazsınız!";}  
  header("location:index.php");              
  $vt = null;
}
?>