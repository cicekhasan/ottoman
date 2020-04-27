<?php 
session_start();
if (isset($_POST['icerikEkle'])) {

	daire($_POST);
	echo "<br />";
	daire($_FILES);

  $baslik      = $_POST['baslik'];
  $durum       = $_POST['durum'];
  $kategori    = $_POST['kategori'];
  $yeniKategori= $_POST['yeniKategori'];
  $icerik      = $_POST['icerik'];
  $icerikResmi = $_POST['icerikResmi'];

	include("baglan.php");
	if (isset($yeniKategori)) {
		if ($kategori=="Kategori Seç!" && $yeniKategori!="") {
			$sorgu = $vt->prepare("INSERT INTO kategoriler SET adi=?");
			$sorgu->execute(["{$yeniKategori}"]);
		}else if ($kategori!="Kategori Seç!" && $yeniKategori!="") {
			$altKategori = $vt->prepare("INSERT INTO altKategoriler SET adi=?,kategoriID=?");
			$altKategori->execute(["{$yeniKategori}","{$kategori}"]);
		}
	}

	if ($_FILES["resim"]["size"]<1024*1024){
	 	if ($_FILES['resim']['name']){
	    $dosyaYolu = "uploads/site/";
	    $dosyaAdi  = $_FILES['resim']['name'];
	    $adiBol    = explode('.', $dosyaAdi );
	    $sonuncu   = count($adiBol)-1;
	    $format    = strtoupper($adiBol["$sonuncu"]);  
	    $strUret   = array("ay","su","bey","tr","tc");
	    $sayi_tut  = rand(1,101453);
	    $yeniAd    = $strUret[rand(0,6)].$sayi_tut; 
	    $result    = move_uploaded_file($_FILES['resim']['tmp_name'], $dosyaYolu.$yeniAd.".".$format);
	    if($result)
	      echo $resim_adi = $yeniAd.".".$format;
	    else
	      echo "Resim Yüklenemedi.";
	 	} else
	    echo "Resim bulunamadı.";
	}
 
} 
 ?>
  <div class="container my-3 p-2">
  	<div class="row">
  		<div class="col-md-12">  			
	  		<div class="card">
	  			<div class="card-header bg-success py-1 text-white">
	  				YENİ İÇERİK EKLEME SAYFASI
	  			</div>
	  			<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">  
							<div class="row">
								<div class="col-md-8">
									<div class="form-group row">
								    <label for="baslik" class="col-sm-2 col-form-label">Başlık</label>
								    <div class="col-sm-10">
										  <input type="text" class="form-control" id="baslik" name="baslik" placeholder="İçerik Başlığı">
								    </div>
								  </div>
									<div class="form-group row">
								    <label for="durum" class="col-sm-2 col-form-label">Durumu</label>
								    <div class="col-sm-4">
									    <select class="form-control" id="durum" name="durum">
									      <option>Yayında</option>
									      <option selected>Pasif</option>
									    </select>
								    </div>
								  </div>
									<div class="form-group row">
								    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
								    <div class="col-sm-4">
									    <select class="form-control" id="kategori" name="kategori">
									      <option>Kategori Seç!</option>
									      <?php
									      include("baglan.php");
									      $sorgu = $vt->prepare("SELECT * FROM kategoriler ORDER BY adi ASC");
									      $sorgu->execute();
									      while ($kategori = $sorgu->fetch()) {
									      	echo '
									      	<option value="'.$kategori->ID.'">'.$kategori->adi.'</option>
									      	';
									      }
									      ?>
									    </select>
								    </div>
								    <label for="yeniKategori" class="col-sm-2 col-form-label">Yeni Kategori</label>
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
								  <img src="uploads/tenis-700x450.jpg" alt="" class="img-fluid img-thumbnail mb-2">
								</div>
							</div>
						  <div class="form-group">
						    <label for="icerik">İçerik</label>
                <textarea cols="80" id="icerik" name="icerik"></textarea>
						  </div>	
							<div class="form-group row">
						    <div class="col-sm-4 offset-4">					                
              		<button type="submit" name="icerikEkle" class="btn btn-success btn-sm btn-block">İÇERİĞİ EKLE</button>
						    </div>
						  </div>
						</form>
	  			</div>
	  		</div>
  		</div>
  	</div>
  </div>