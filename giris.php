<?php 
session_start();
include("baglan.php");
if (isset($_SESSION["oturum"]) && $_SESSION["oturum"] == "1453") {
  header("Location:index.php");
}else if (isset($_COOKIE["cerez"])) {
  $sorgu = $vt->prepare("SELECT ePosta FROM uyeler");
  $sorgu->execute();

  while ($sonuc = $sorgu->fetch()) {
    if ($_COOKIE["cerez"] == $sonuc['ePosta']) {
      $_SESSION["oturum"]       = "1453";
      $_SESSION["ePosta"]       = $sonuc['ePosta'];
      $_SESSION["adi"]          = $sonuc['adi'];
      $_SESSION["kullaniciAdi"] = $sonuc['kullaniciAdi'];
      $_SESSION["yetki"]        = $sonuc['yetki'];
      header("location:index.php");
    }
  }
}

if (isset($_POST['giris'])) {
  $ePosta = htmlspecialchars($_POST['ePosta']);
  $parola = md5("istanbul".htmlspecialchars($_POST['parola'])."1453");
}
$vt = null;
?>
  <div class="container my-3 p-2">
		<div class="row">
			<div class="col-md-4 offset-md-1">
        <div class="card p-2">
          <div class="card-header bg-success text-white text-center">OTTOMAN TORUNU GİRİŞİ</div>
          <?php echo $_SESSION["adi"];  ?>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="ottomanInputEmail1">E-Posta Adresi</label>
                <input type="email" class="form-control" id="ottomanInputEmail1" name="ePosta" value="<?php echo @$ePosta ?>" required autofocus>
                <small id="emailHelp" class="form-text text-muted">E-Postanızı başkası ile paylaşmayacağız.</small>
              </div>
              <div class="form-group">
                <label for="ottomanInputPassword1">Parola</label>
                <input type="password" class="form-control" id="ottomanInputPassword1" name="parola" required>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="ottomanCheck1" name="beniHatirla">
                <label class="form-check-label" for="ottomanCheck1">Beni hatırla.</label>
              </div>
              <?php
              if (isset($_POST['giris'])) {
                include("baglan.php");
                $sorgu = $vt->prepare("SELECT parola FROM uyeler WHERE ePosta=?");
                $sorgu->execute(["{$ePosta}"]);
                $sonuc = $sorgu->fetch();

                if ($parola==$sonuc->parola) {
                  $_SESSION["oturum"]       = "1453";
                  $_SESSION["ePosta"]       = $sonuc['ePosta'];
                  $_SESSION["adi"]          = $sonuc['adi'];
                  $_SESSION["kullaniciAdi"] = $sonuc['kullaniciAdi'];
                  $_SESSION["yetki"]        = $sonuc['yetki'];

                  if (isset($_POST["beniHatirla"])) {
                    setcookie("cerez", $ePosta, time() + (60 * 60 * 24 * 7));
                    header("location:index.php");
                  }else{echo "E-Posta veya Parola yanlış!";}
                }
              }
              $vt = null;
              ?>
              <button type="submit" name="giris" class="btn btn-success btn-sm btn-block">Giriş</button>
            </form>
          </div>
        </div>
			</div>
			<div class="col-md-6">
        <div class="card p-2">
          <div class="card-header bg-success text-white text-center">HENÜZ ÜYE DEĞİLMİSİN! ÜYE OL...</div>
          <div class="card-body">
            <form action="" method="post">
              <div class="row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="E-Posta hesabınız..." name="ePosta" required>
                </div>
              </div>
              <small class="form-text text-muted">E-Posta hesabınız giriş için kullanılacaktır...</small><br />        
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Parolanız..." name="parola" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Parolayı tekrar giriniz..." name="parolaTekrar" required>
                </div>
              </div><br />
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Ad ve Soyadınız..." name="adi" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Kullanıcı Adınız..." name="kullaniciAdi" required>
                </div>
              </div><br />
              <div class="row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Kullandığınız programlama dilleri..." name="proDili">
                </div>
              </div>
              <small class="form-text text-muted">Sadece yorum yapabilmeniz için onay gerektirir. Gezmeye başlayabilirsiniz.</small>
              <button type="submit" name="uyeOl" class="btn btn-success btn-sm btn-block">Üye Ol</button>
              <?php
              if (isset($_POST['uyeOl'])) {
                include("baglan.php");
                $ePosta       = htmlspecialchars($_POST['ePosta']);
                $parola       = md5("istanbul".htmlspecialchars($_POST['parola'])."1453");
                $parolaTekrar = md5("istanbul".htmlspecialchars($_POST['parolaTekrar'])."1453");
                $adi          = htmlspecialchars($_POST['adi']);
                $kullaniciAdi = htmlspecialchars($_POST['kullaniciAdi']);
                $proDili      = htmlspecialchars($_POST['proDili']);
                $konum        = "Ankara";
                $ipAdresi     = "127.0.0.1";
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
                $vt = null;
              }
              ?>
            </form>
          </div>
        </div>
      </div>
		</div>
  </div>