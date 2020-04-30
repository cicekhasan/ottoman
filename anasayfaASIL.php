  <div class="container my-3 p-2">
    <div class="row">
      <?php
      include("baglan.php");
      $sorgu = $vt->prepare('SELECT * FROM icerikler WHERE durum=? LIMIT 9');
      $sorgu->execute(array("Aktif"));
      $icerikler = $sorgu->fetchAll(PDO::FETCH_OBJ);
      
      foreach ($icerikler as $icerik) {
        ?>
      <div class="col-md-4 mb-3">
        <div class="card h-100 mb-0 shadow-sm">
          <img src="<?php echo $icerik->icerikResmi; ?>" alt="" height="200">
          <div class="card-body">
            <span class="kalin"><?php echo $icerik->baslik; ?></span>
            <p class="card-text boyut-12 ikitaraf"><?php echo htmlspecialchars_decode($icerik->ozet); ?></p>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a type="button" class="btn btn-sm btn-outline-success" href="?sayfa=detay&id=<?php echo $icerik->ID; ?>" title="Göster"><i class="fa fa-eye"></i></a>
                <?php
                if ($_SESSION["yetki"]==18) { 
                echo '<a type="button" class="btn btn-sm btn-outline-danger" href="?sayfa=guncelle&id='.$icerik->ID.'" title="Güncelle"><i class="fa fa-edit"></i></a>';
                }
                ?>
              </div>
              <small class="text-muted">Kategori: <a href="?sayfa=kategori&kategori=<?php echo $icerik->kategori; ?>" title=""><?php echo htmlspecialchars_decode($icerik->kategori); ?></a></small>

            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>