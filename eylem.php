<?php 
session_start();
if (isset($_POST['giris'])) {
  require 'baglan.php';
  $ePosta = $_POST['ePosta'];
  $parola = $_POST['parola'];
  try{
    $girisKontrol = $vt->prepare('SELECT * FROM uyeler WHERE ePosta=? && parola=?');
    $girisKontrol->execute(["{$ePosta}","{$parola}"]);

    if (isset($girisKontrol)) {
      $_SESSION["oturum"]       = TRUE;
      $_SESSION["ePosta"]       = $uye->ePosta;
      $_SESSION["adi"]          = $uye->adi;
      $_SESSION["yetki"]        = $uye->yetki;
      $_SESSION["kullaniciAdi"] = $uye->kullaniciAdi;
    }
    header('Location:index.php');
  }catch(PDOException $e){
    echo 'HATA: '. $e->getMessage();
  }
}
?> 