  <div class="container my-3 p-2">
    <h3>KATEGORİLER...</h3>
    <div class="row">
      <div class="col-md-12">
        <small><a href="ekle.php">Kategori Ekle</a></small>
        <table class="table table-sm table-responsive-sm table-hover boyut-12">
          <thead class="camurcun-6 camurcun-1t">
            <tr>
              <th>ID</th>
              <th>Kategori Adı</th>
              <th>İçerik Sayısı</th>
              <th>Yorum Sayısı</th>
              <th>Durumu</th>
              <th>İşlem</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("baglan.php");
            $sorgu = $vt->prepare("SELECT * FROM kategoriler");
            $sorgu->execute(array());
            $kategoriler = $sorgu->fetchAll(PDO::FETCH_OBJ);
            foreach ($kategoriler as $kategori) {
            ?>
            <tr>
              <td><?php echo $kategori->ID ?></td>
              <td><?php echo $kategori->adi ?></td>
              <td><?php echo $kategori->ID ?></td>
              <td><?php echo $kategori->ID ?></td>
              <td><?php echo $kategori->durum ?></td>
              <td>
                <a href="#" class="text-success"><i class="fa fa-eye"></i></a>
                <a href="#" class="text-danger"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>