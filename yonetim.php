  <div class="container my-3 p-2">
    <h3>Osmanlı Torunu Yönetimi</h3>
    <?php if ($_SESSION["yetki"]=="18") { ?>
    <div class="row">
      <div class="col-4 col-md-2 my-2">
        <div class="card bg-info text-white">
          <div class="card-body text-center">
            <span class="boyut-32">
              <?php 
              include("baglan.php");
              $sorgu = $vt->prepare("SELECT * FROM uyeler");
              $sorgu->execute(array());
              $sonuc = $sorgu->rowCount();
              echo $sonuc;
              $vt = null;
               ?>
            </span><br />
            <span class="boyut-12">Üye Sayısı</span>
          </div>
        </div>
      </div>
      <div class="col-4 col-md-2 my-2">
        <div class="card bg-success text-white">
          <div class="card-body text-center">
            <span class="boyut-32">
              <?php 
              include("baglan.php");
              $sorgu = $vt->prepare("SELECT * FROM icerikler");
              $sorgu->execute(array());
              $sonuc = $sorgu->rowCount();
              echo $sonuc;
              $vt = null;
               ?>
             </span><br />
            <span class="boyut-12">İçerik Sayısı</span>
          </div>
        </div>
      </div>
      <div class="col-4 col-md-2 my-2">
        <div class="card bg-warning text-white">
          <div class="card-body text-center">
            <span class="boyut-32">1</span><br />
            <span class="boyut-12">Mesaj Sayısı</span>
          </div>
        </div>
      </div>
      <div class="col-4 col-md-2 my-2">
        <div class="card bg-secondary text-white">
          <div class="card-body text-center">
            <span class="boyut-32">34</span><br />
            <span class="boyut-12">Yorum Sayısı</span>
          </div>
        </div>
      </div>
      <div class="col-4 col-md-2 my-2">
        <div class="card bg-danger text-white">
          <div class="card-body text-center">
            <span class="boyut-32">1818</span><br />
            <span class="boyut-12">Site Hit</span>
          </div>
        </div>
      </div>
      <div class="col-4 col-md-2 my-2">
        <div class="card bg-primary text-white">
          <div class="card-body text-center">
            <span class="boyut-32">256</span><br />
            <span class="boyut-12">İçerik Hit</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row my-2">
      <div class="col-md-8">
        <div class="col-md-12 mb-2">
          <div class="card">
            <div class="card-header bg-secondary text-white kalin">Son Eklenen Üyeler</div>
            <div class="card-body">
              <table class="table table-responsive table-hover boyut-12">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>E-Posta</th>
                    <th>Konum</th>
                    <th>IP</th>
                    <th>Eklenme Tarihi</th>
                  </tr>
                </thead>
                <tbody>
              <?php 
              include("baglan.php");
              $sorgu = $vt->prepare("SELECT * FROM uyeler ORDER BY ID DESC LIMIT 10");
              $sorgu->execute(array());
              $uyeler = $sorgu->fetchAll(PDO::FETCH_OBJ);
              foreach ($uyeler as $uye) {
              ?>
                  <tr>
                    <td><?php echo $uye->ID; ?></td>
                    <td><?php echo $uye->ePosta; ?></td>
                    <td>Ankara</td>
                    <td>175.156.88.45</td>
                    <td><?php echo $uye->eklenme; ?></td>
                  </tr>
              <?php
              }
              $vt = null;
               ?>                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-12 mb-2">
          <div class="card">
            <div class="card-header bg-secondary text-white kalin">Popüler İçerikler</div>
            <div class="card-body">
              <table class="table table-responsive table-hover boyut-12">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Başlık</th>
                    <th>Eklenme</th>
                    <th>Güncellenme</th>
                    <th>Okunma</th>
                    <th>Yorum</th>
                  </tr>
                </thead>
                <tbody>
              <?php 
              include("baglan.php");
              $sorgu = $vt->prepare("SELECT * FROM icerikler ORDER BY baslik ASC LIMIT 10");
              $sorgu->execute(array());
              $icerikler = $sorgu->fetchAll(PDO::FETCH_OBJ);
              foreach ($icerikler as $icerik) {
              ?>
                  <tr>
                    <td><?php echo $icerik->ID; ?></td>
                    <td><?php echo $icerik->baslik; ?></td>
                    <td><?php echo $icerik->eklenme; ?></td>
                    <td><?php echo $icerik->guncellenme; ?></td>
                    <td>256</td>
                    <td>8</td>
                  </tr>
              <?php
              }
              $vt = null;
               ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-12 mb-2">
          <div class="card h-100">
            <div class="card-header bg-success kalin text-white">
              GENEL BİLGİLER
            </div>
            <div class="card-body text-center">
              <table class="table table-responsive boyut-12">
                <thead>
                  <tr>
                    <th></th>
                    <th>Aktif</th>
                    <th>Pasif</th>
                    <th>Toplam</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="sol"><a href="uyeler.php">Üyeler</a></td>
                    <td>
                    <?php 
                    include("baglan.php");
                    $sorgu = $vt->prepare("SELECT * FROM uyeler WHERE durum=?");
                    $sorgu->execute(array("Aktif"));
                    $sonuc = $sorgu->rowCount();
                    echo $sonuc;
                    $vt = null;
                     ?>
                    </td>
                    <td>                      
                    <?php 
                    include("baglan.php");
                    $sorgu = $vt->prepare("SELECT * FROM uyeler WHERE durum=?");
                    $sorgu->execute(array("Pasif"));
                    $sonuc = $sorgu->rowCount();
                    echo $sonuc;
                    $vt = null;
                     ?>
                    </td>
                    <td>                      
                    <?php 
                    include("baglan.php");
                    $sorgu = $vt->prepare("SELECT * FROM uyeler");
                    $sorgu->execute(array());
                    $sonuc = $sorgu->rowCount();
                    echo $sonuc;
                    $vt = null;
                     ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="sol"><a href="kategoriler.php">Kategoriler</a></td>
                    <td>
                    <?php 
                    include("baglan.php");
                    $sorgu = $vt->prepare("SELECT * FROM kategoriler WHERE durum=?");
                    $sorgu->execute(array("Aktif"));
                    $sonuc = $sorgu->rowCount();
                    echo $sonuc;
                    $vt = null;
                     ?>
                    </td>
                    <td>                      
                    <?php 
                    include("baglan.php");
                    $sorgu = $vt->prepare("SELECT * FROM kategoriler WHERE durum=?");
                    $sorgu->execute(array("Pasif"));
                    $sonuc = $sorgu->rowCount();
                    echo $sonuc;
                    $vt = null;
                     ?>
                    </td>
                    <td>                      
                    <?php 
                    include("baglan.php");
                    $sorgu = $vt->prepare("SELECT * FROM kategoriler");
                    $sorgu->execute(array());
                    $sonuc = $sorgu->rowCount();
                    echo $sonuc;
                    $vt = null;
                     ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="sol"><a href="yorumlar.php">İçeriler</a></td>
                    <td>
                    <?php 
                    include("baglan.php");
                    $sorgu = $vt->prepare("SELECT * FROM icerikler WHERE durum=?");
                    $sorgu->execute(array("Aktif"));
                    $sonuc = $sorgu->rowCount();
                    echo $sonuc;
                    $vt = null;
                     ?>
                    </td>
                    <td>                      
                    <?php 
                    include("baglan.php");
                    $sorgu = $vt->prepare("SELECT * FROM icerikler WHERE durum=?");
                    $sorgu->execute(array("Pasif"));
                    $sonuc = $sorgu->rowCount();
                    echo $sonuc;
                    $vt = null;
                     ?>
                    </td>
                    <td>                      
                    <?php 
                    include("baglan.php");
                    $sorgu = $vt->prepare("SELECT * FROM icerikler");
                    $sorgu->execute(array());
                    $sonuc = $sorgu->rowCount();
                    echo $sonuc;
                    $vt = null;
                     ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-12 mb-2">
          <div class="card h-100">
            <div class="card-header bg-primary kalin text-white">
              YENİLER
            </div>
            <div class="card-body text-center">
              <table class="table table-responsive boyut-12">
                <thead>
                  <tr>
                    <th></th>
                    <th>Onaylı</th>
                    <th>Onay Bekleyen</th>
                    <th>Toplam</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="sol"><a href="uyeler.php">Üyeler</a></td>
                    <td>36</td>
                    <td>3</td>
                    <td>39</td>
                  </tr>
                  <tr>
                    <td class="sol"><a href="mesajlar.php">Mesajlar</a></td>
                    <td>36</td>
                    <td>3</td>
                    <td>39</td>
                  </tr>
                  <tr>
                    <td class="sol"><a href="yorumlar.php">Yorumlar</a></td>
                    <td>36</td>
                    <td>3</td>
                    <td>39</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
        }else{
      echo '<div class="alert alert-danger text-center kalin">Yönetici değilsiniz, Burada işiniz yok!</div>';
      header('refresh:100; url=index.php');
    }
    ?>
  </div>