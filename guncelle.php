<?php 
session_start();

if (isset($_POST['icerikGuncelle'])) {
  $baslik       = $_POST['baslik'];
  $durum        = $_POST['durum'];
  $kategori     = htmlspecialchars($_POST['kategori']);
  $yeniKategori = htmlspecialchars($_POST['yeniKategori']);
  $icerik       = htmlspecialchars($_POST['icerik']);
  $ozet         = htmlspecialchars($_POST['ozet']);
  $eskiResim	  = $_POST['eskiResim'];
  $eklenme      = date("d/m/Y G:i:s");

  // Kategori işlemleri
	include("baglan.php");
	if (isset($yeniKategori)) {
		if ($kategori=="Kategori Seç!" && $yeniKategori!="") {
			$sorgu = $vt->prepare("INSERT INTO kategoriler SET adi=?");
			$sorgu->execute(array($yeniKategori));
		}
	}

	// Resim işlemleri
 	if ($_FILES['resim']['name']){
    $dosyaYolu = "uploads/site/";
    $dosyaAdi  = $_FILES['resim']['name'];
    $adiBol    = explode('.', $dosyaAdi );
    $sonuncu   = count($adiBol)-1;
    $format    = strtoupper($adiBol["$sonuncu"]);  
    $strUret   = array("ay","su","be","tr","tc");
    $sayi_tut  = rand(1,101453);
    $yeniAd    = $strUret[rand(0,6)].$sayi_tut; 
    $yukle     = move_uploaded_file($_FILES['resim']['tmp_name'], $dosyaYolu.$yeniAd.".".$format);
    $resimYolu = $dosyaYolu.$yeniAd.".".$format;
    echo (!isset($yukle)) ? '<div class="alert alert-danger text-center col-md-6 offset-md-3 mt-3">Resim yüklenemedi!</div>':null;
 	}else{echo '<div class="alert alert-danger text-center col-md-6 offset-md-3 mt-3">Resim bulunamadı!</div>';}

}

if (isset($_GET['id'])) {
$id = $_GET['id'];

include("baglan.php");
$sorgu  = $vt->prepare("SELECT * FROM icerikler WHERE ID=?");
$sorgu->execute(array($id));
$icerik = $sorgu->fetch(PDO::FETCH_OBJ);
?>
  <div class="container my-3 p-2">
  	<div class="row">
  		<div class="col-md-12">
	  		<div class="card">
	  			<div class="card-header bg-success py-1 text-white">
	  				İÇERİK GÜNCELLEME SAYFASI
	  			</div>
	  			<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group row">
								    <label for="baslik" class="col-sm-2 col-form-label">Başlık</label>
								    <div class="col-sm-10">
										  <input type="text" class="form-control" id="baslik" name="baslik" value="<?php echo $icerik->baslik; ?>">
								    </div>
								  </div>
									<div class="form-group row">
								    <label for="durum" class="col-sm-2 col-form-label">Durumu</label>
								    <div class="col-sm-4">
									    <select class="form-control" id="durum" name="durum">
									      <option value="Pasif" <?php echo ($icerik->durum=="Pasif") ? "selected": null; ?> >Pasif</option>
									      <option value="Aktif" <?php echo ($icerik->durum=="Aktif") ? "selected": null; ?> >Yayında</option>
									    </select>
								    </div>
								  </div>
									<div class="form-group row">
								    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
								    <div class="col-sm-3">
									    <select class="form-control" id="kategori" name="kategori">
									      <option>Kategori Seç!</option>';
									      <?php
									      include("baglan.php");
									      $sorgu = $vt->prepare("SELECT * FROM kategoriler ORDER BY adi ASC");
									      $sorgu->execute();
									      while ($kategori = $sorgu->fetch(PDO::FETCH_OBJ)) {
									      	echo '
									      	<option value="'.$kategori->adi.'" '; echo ($icerik->kategori==$kategori->adi) ? "selected": null; echo '>'.$kategori->adi.'</option>
									      	';
									      }
									      ?>
									    </select>
								    </div>
								    <label for="yeniKategori" class="col-sm-3 col-form-label">Yeni Kategori</label>
								    <div class="col-sm-4">
								    	<input type="text" class="form-control" id="yeniKategori" name="yeniKategori" placeholder="Yeni kategori adı...">
								    </div>
								  </div>
									<div class="form-group row">
								    <label for="resim" class="col-sm-2 col-form-label">İçerik Resmi</label>
								    <div class="col-sm-10">
										  <input type="file" class="form-control-file" id="resim" name="resim">
								    </div>
								  </div>
								</div>
								<div class="col-md-4">
								  <img src="<?php echo $icerik->icerikResmi; ?>" alt="" class="img-fluid img-thumbnail mb-2">
									<input type="text" class="form-control" id="eskiResim" name="eskiResim" value="<?php echo $icerik->icerikResmi; ?>">
								</div>
							</div>
						  <div class="form-group">
						    <label for="icerik">İçerik</label>
                <textarea cols="80" id="icerik" name="icerik"><?php echo htmlspecialchars_decode($icerik->icerik); ?></textarea>
						  </div>
						  <div class="form-group">
						    <label for="ozet">Özet</label>
                <textarea cols="80" id="ozet" name="ozet"><?php echo htmlspecialchars_decode($icerik->ozet); ?></textarea>
						  </div>
							<div class="form-group row">
						    <div class="col-sm-4 offset-4">
              		<button type="submit" name="icerikGüncelle" class="btn btn-success btn-sm btn-block">İÇERİĞİ GÜNCELLE</button>
						    </div>
						  </div>
						</form>
	  			</div>
	  		</div>
  		</div>
  	</div>
  </div>
<?php 
} 
?>