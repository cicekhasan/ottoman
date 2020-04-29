			<div class="col-md-6 offset-md-3">
        <div class="card p-2">
          <div class="card-header bg-success text-white text-center">KULLANICI GÜNCELLEME EKRANI</div>
          <div class="card-body">
            <?php 
            if ($_SESSION["yetki"]=="18") {
              include("baglan.php");
              $id = $_GET['id'];
              $sorgu = $vt->prepare("SELECT * FROM uyeler WHERE id=?");
              $sorgu->execute(array($id));
              $uye = $sorgu->fetch(PDO::FETCH_OBJ);

              if (isset($_POST['uyeGuncelle'])) {

                $ePosta       = $_POST['ePosta'];
                $parola       = $_POST['parola'];
                $parolaTekrar = $_POST['parolaTekrar'];
                $adi          = $_POST['adi'];
                $kullaniciAdi = $_POST['kullaniciAdi'];
                $proDili      = $_POST['proDili'];
                $yetki        = $_POST['yetki'];
                $durum        = $_POST['durum'];
                $konum        = $_POST['konum'];
                $ipAdresi     = $_POST['ipAdresi'];
                $guncellenme  = date("d/m/Y G:i:s");

                if ($uye->ePosta!=$ePosta || $uye->adi!=$adi || $uye->kullaniciAdi!=$kullaniciAdi || $uye->proDili!=$proDili || $uye->yetki!=$yetki || $uye->durum!=$durum || $uye->konum!=$konum || $uye->ipAdresi!=$ipAdresi) {
                  if ($uye->ePosta!=$ePosta) {
                    $sorgu = $vt->prepare("UPDATE uyeler SET ePosta=? WHERE ID=?");
                    $sorgu->execute(array($ePosta, $id));
                    echo '<div class="alert alert-success">E-Posta güncellendi.</div>';
                  }

                  if ($uye->adi!=$adi) {
                    $sorgu = $vt->prepare("UPDATE uyeler SET adi=? WHERE ID=?");
                    $sorgu->execute(array($adi, $id));
                    echo '<div class="alert alert-success">Adı ve Soyadı güncellendi.</div>';
                  }

                  if ($uye->kullaniciAdi!=$kullaniciAdi) {
                    $sorgu = $vt->prepare("UPDATE uyeler SET kullaniciAdi=? WHERE ID=?");
                    $sorgu->execute(array($kullaniciAdi, $id));
                    echo '<div class="alert alert-success">Kullanıcı Adı güncellendi.</div>';
                  }

                  if ($uye->proDili!=$proDili) {
                    $sorgu = $vt->prepare("UPDATE uyeler SET proDili=? WHERE ID=?");
                    $sorgu->execute(array($proDili, $id));
                    echo '<div class="alert alert-success">Programlama Dilleri güncellendi.</div>';
                  }

                  if ($uye->yetki!=$yetki) {
                    $sorgu = $vt->prepare("UPDATE uyeler SET yetki=? WHERE ID=?");
                    $sorgu->execute(array($yetki, $id));
                    echo '<div class="alert alert-success">Yetkisi güncellendi.</div>';
                  }

                  if ($uye->durum!=$durum) {
                    $sorgu = $vt->prepare("UPDATE uyeler SET durum=? WHERE ID=?");
                    $sorgu->execute(array($durum, $id));
                    echo '<div class="alert alert-success">Durumu güncellendi.</div>';
                  }

                  if ($uye->konum!=$konum) {
                    $sorgu = $vt->prepare("UPDATE uyeler SET konum=? WHERE ID=?");
                    $sorgu->execute(array($konum, $id));
                    echo '<div class="alert alert-success">Konumu güncellendi.</div>';
                  }

                  if ($uye->ipAdresi!=$ipAdresi) {
                    $sorgu = $vt->prepare("UPDATE uyeler SET ipAdresi=? WHERE ID=?");
                    $sorgu->execute(array($ipAdresi, $id));
                    echo '<div class="alert alert-success">İp Adresi güncellendi.</div>';
                  }
                  header("refresh:100; url=index.php");
                }else{
                  echo '<div class="alert alert-success">GÜNCELLEME YAPILACAK BİR ŞEY YOK Kİ.</div>';
                }
              }
             ?>             
            <form action="" method="post">
              <div class="row">
                <div class="col-md-12">
                  <input type="text" class="form-control" value="<?php echo $uye->ePosta; ?>" name="ePosta" required>
                </div>
              </div><br />    
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Parolayı gir..." name="parola">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Parolayı tekrar gir..." name="parolaTekrar">
                </div>
              </div><br />
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" value="<?php echo $uye->adi; ?>" name="adi" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" value="<?php echo $uye->kullaniciAdi; ?>" name="kullaniciAdi" required>
                </div>
              </div><br />
              <div class="row">
                <div class="col-md-12">
                  <input type="text" class="form-control" value="<?php echo $uye->proDili; ?>" name="proDili">
                </div>
              </div><br />   
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" id="yetki" name="yetki">
                    <option value="1" <?php echo ($uye->yetki=="1") ? "selected" : null; ?>>Üye</option>
                    <option value="18" <?php echo ($uye->yetki=="18") ? "selected" : null; ?>>Yazar</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <select class="form-control" id="durum" name="durum">
                    <option value="Aktif">Aktif</option>
                    <option value="Pasif">Pasif</option>
                  </select>
                </div>
              </div><br />   
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" value="<?php echo $uye->konum; ?>" name="konum">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" value="<?php echo $uye->ipAdresi; ?>" name="ipAdresi">
                </div>
              </div><br />
              <button type="submit" name="uyeGuncelle" class="btn btn-success btn-sm btn-block">GÜNCELLE</button>
            </form>
            <?php
                }else{
              echo '<div class="alert alert-danger text-center kalin">Yönetici değilsiniz, Burada işiniz yok!</div>';
              header('refresh:100; url=index.php');
            }
            ?>
          </div>
        </div>
      </div>