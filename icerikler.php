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
            if ($_SESSION["yetki"]=="18") {
              $sorgu = $vt->prepare("SELECT * FROM icerikler");
              $sorgu->execute(array());
              $icerikler = $sorgu->fetchAll(PDO::FETCH_OBJ);

              foreach ($icerikler as $icerik) {
            ?>
            <tr>
              <td style="width: 2%;"><?php echo $icerik->ID; ?></td>
              <td style="width: 5%;"><small><?php echo htmlspecialchars_decode($icerik->kategori); ?></small></td>
              <td style="width: 14%;"><small><?php echo htmlspecialchars_decode($icerik->baslik); ?></small></td>
              <td style="width: 35%; font-size: 10px !important;"><?php echo htmlspecialchars_decode($icerik->ozet); ?></td>
              <td style="width: 10%;"><small>Hasan Çiçek</small></td>
              <td style="width: 12%;"><?php echo $icerik->eklenme; ?></td>
              <td style="width: 12%;"><?php echo $icerik->guncellenme; ?></td>
              <td style="width: 5%; text-align: center;"><?php echo $icerik->durum; ?></td>
              <td style="width: 5%; text-align: center;">
                <a href="#" title="Göster" class="text-success"><i class="fa fa-eye"></i></a><br />
                <a href="?sayfa=guncelle" title="Güncelle" class="text-danger"><i class="fa fa-edit"></i></a><br />
              </td>
            </tr>
            <?php 
              } 
            }else{
              echo '<div class="alert alert-danger text-center kalin">Yönetici değilsiniz, Burada işiniz yok!</div>';
              header('refresh:100; url=index.php');
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>