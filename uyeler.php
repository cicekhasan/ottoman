	<div class="container my-3 p-2">
    <h3>Osmanlı Torunları...</h3>
    <div class="row">
	    <div class="col-md-12">
	    	<table class="table table-sm table-responsive-sm table-hover boyut-12">
	    		<thead class="camurcun-6 camurcun-1t">
	    			<tr>
	    				<th>ID</th>
	    				<th>Adı ve Soyadı</th>
	    				<th>Kullanıcı Adı/E-Posta</th>
	    				<th>Yetki</th>
	    				<th>Konum</th>
	    				<th>IP</th>
	    				<th>Eklenme Tarihi</th>
	    				<th>Durumu</th>
	    				<th>Düzenle</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php
						include("baglan.php");
	    			$sorgu = $vt->prepare("SELECT * FROM uyeler");
	    			$sorgu->execute();
	    			while ($sonuc = $sorgu->fetch()) {
	    			?>
	    			<tr class="<?php echo ($sonuc->yetki==18) ? "camGobegi-1":null; ?>">
	    				<td><?php echo $sonuc->ID ?></td>
	    				<td><?php echo $sonuc->adi ?></td>
	    				<td><?php echo $sonuc->ePosta ?></td>
	    				<td><?php echo ($sonuc->yetki==18) ? "Yazar":"Üye"; ?></td>
	    				<td><?php echo $sonuc->konum ?></td>
	    				<td><?php echo $sonuc->ipAdresi ?></td>
	    				<td><?php echo $sonuc->eklenme ?></td>
	    				<td><?php echo ($sonuc->aktif==1) ? "Aktif":"Pasif"; ?></td>
	    				<td>
	    					<a href="?sayfa=duzenle&id=<?php echo $sonuc->ID ?>" class="text-danger"><i class="fa fa-edit"></i></a>
	    				</td>
	    			</tr>
	    			<?php
	    			} // while bitişi.
	    			?>
	    		</tbody>
	    	</table>
	    </div>
	    <div class="col-md-4"></div>
    </div>
	</div>