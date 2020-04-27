  <?php
  if ($_GET['sayfa']=="detay") {
    $id = $_GET['id'];
    include("baglan.php");
    $sorgu = $vt->prepare("SELECT * FROM icerikler WHERE ID=?");
    $sorgu->execute(["{$id}"]);

    while ($icerik = $sorgu->fetch()) {
      echo '
  <div class="container my-3 p-2">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">'.$icerik->baslik.'</div>
        <div class="card-body text-justify boyut-14">
          <img src="'.$icerik->icerikResmi.'" alt="" class="img-fluid img-thumbnail float-left m-2" width="400">
          '.htmlspecialchars_decode($icerik->icerik).'
        </div>
        <div class="card-footer">
          <small>Kategorisi: <a href="?sayfa=kategori&kategori='.$icerik->kategori.'" title="">'.$icerik->kategori.'</a> | Yayın Tarihi: '.$icerik->eklenme.' | Yazar: Hasan Çiçek | Okunma: 18 | Yorum: 5</small>
        </div>
      </div>
    </div>
  </div>
      ';
    }
  }

  ?>
