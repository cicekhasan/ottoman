  <div class="container my-3 p-2">
    <h3>İÇERİKLER...</h3>
    <div class="row">
      <div class="col-md-12">
        <small><a href="?sayfa=ekle">İçerik Ekle</a></small>
        <table class="table table-responsive-sm teble-sm table-hover boyut-12">
          <thead class="camurcun-6 camurcun-1t">
            <tr>
              <th>ID</th>
              <th>Kategori</th>
              <th>Başlık</th>
              <th>Özet</th>
              <th>Yazar</th>
              <th>Eklenme</th>
              <th>Güncellenme</th>
              <th>Durum</th>
              <th>İşlem</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("baglan.php");
            $sorgu = $vt->prepare("SELECT * FROM icerikler");
            $sorgu->execute();

            while ($icerik = $sorgu->fetch()) {

              echo '
            <tr>
              <td>'.$icerik->ID.'</td>
              <td>'.htmlspecialchars_decode($icerik->kategori).'</td>
              <td>'.htmlspecialchars_decode($icerik->baslik).'</td>
              <td>'.htmlspecialchars_decode($icerik->ozet).'</td>
              <td>Hasan Çiçek</td>
              <td>'.$icerik->eklenme.'</td>
              <td>'.$icerik->guncellenme.'</td>
              <td>'.$icerik->aktif.'</td>
              <td>
                <a href="#" title="Göster" class="text-success"><i class="fa fa-eye"></i></a><br />
                <a href="?sayfa=guncelle" title="Güncelle" class="text-danger"><i class="fa fa-edit"></i></a><br />
              </td>
            </tr>
              ';
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>