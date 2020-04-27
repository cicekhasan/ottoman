  <div class="container my-3 p-2">
    <div class="row">
      <?php
      include("baglan.php");
      $sorgu = $vt->prepare("SELECT * FROM icerikler WHERE aktif=? LIMIT 9");
      $sorgu->execute(["Aktif"]);

      while ($icerik = $sorgu->fetch()) {
        echo '
      <div class="col-md-4 mb-3">
        <div class="card h-100 mb-0 shadow-sm">
          <img src="'.$icerik->icerikResmi.'" alt="" height="250">
          <div class="card-body">
            <span class="kalin">'.$icerik->baslik.'</span>
            <p class="card-text boyut-12 ikitaraf">'.htmlspecialchars_decode($icerik->ozet).'</p>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a type="button" class="btn btn-sm btn-outline-success" href="detay.php" title="Göster"><i class="fa fa-eye"></i></a>';
                if ($_SESSION["yetki"]==18) { 
                echo '<a type="button" class="btn btn-sm btn-outline-danger" href="guncelle.php" title="Güncelle"><i class="fa fa-edit"></i></a>';
                }
                echo '
              </div>
              <small class="text-muted">Kategori: '.$icerik->kategori.'</small>
            </div>
          </div>
        </div>
      </div>
        ';
      }
      ?>
    </div>
  </div>