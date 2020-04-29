<?php 
session_start();
// Daha önce oturum varsa
if (isset($_SESSION["oturum"]) && $_SESSION["oturum"] == "1453") {
  header("Location:index.php");
}else if (isset($_COOKIE["cerez"])) {
  include("baglan.php");
  $sorgu = $vt->prepare("SELECT ePosta FROM uyeler");
  $sorgu->execute(array());

  while ($sonuc = $sorgu->fetch(PDO::FETCH_OBJ)) {
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
  $sonuc  = $sorgu->fetch(PDO::FETCH_OBJ);

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
?>