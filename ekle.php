  <div class="container-fluid my-3 p-2">
  	<div class="row">
  		<div class="col-md-12">  			
	  		<div class="card">
	  			<div class="card-header bg-success py-1 text-white">
	  				YENİ İÇERİK EKLEME SAYFASI
	  			</div>
	  			<div class="card-body">
						<form>
							<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="exampleFormControlInput1">İçeriğin Başlığı</label>
								    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="İçerik Başlığı">
								  </div>	
								</div>
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Durumu</label>
								    <select class="form-control" id="exampleFormControlSelect1">
								      <option>Yayında</option>
								      <option selected>Pasif</option>
								    </select>
								  </div>
								</div>							
							</div>
							<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Kategori</label>
								    <select class="form-control" id="exampleFormControlSelect1">
								      <option>Kategori Seç!</option>
								      <?php
								      include("baglan.php");
								      $sorgu = $vt->prepare("SELECT * FROM kategoriler ORDER BY adi ASC");
								      $sorgu->execute();
								      while ($kategori = $sorgu->fetch()) {
								      	echo '
								      	<option>'.$kategori->adi.'</option>
								      	';
								      }
								      ?>
								    </select>
								  </div>
								</div>	
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="exampleFormControlInput1">Yeni Kategori</label>
								    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="İçerik Başlığı">
								  </div>	
								</div>						
							</div>
						  <div class="form-group">
						    <label for="icerik">İçerik</label>
                <textarea cols="80" id="icerik" name="icerik"></textarea>
						  </div>
						  <div class="row">
						  	<div class="col-md-7"></div>
						  	<div class="col-md-5">
								  <div class="form-group">
								    <img src="uploads/tenis-700x450.jpg" alt="" class="img-fluid img-thumbnail mb-2">
								    <input type="file" class="form-control-file" id="exampleFormControlFile1">
								  </div>
						  	</div>
						  </div>
						</form>
	  			</div>
	  		</div>
  		</div>
  	</div>
  </div>