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
						if ($_SESSION["yetki"]=="18") {
		    			$sorgu = $vt->prepare("SELECT * FROM uyeler");
		    			$sorgu->execute(array());
		    			$uyeler = $sorgu->fetchAll(PDO::FETCH_OBJ);
		    			foreach ($uyeler as $uye) {
	    			?>
	    			<tr class="<?php echo ($uye->yetki==18) ? "camGobegi-1":null; ?>">
	    				<td><?php echo $uye->ID; ?></td>
	    				<td><?php echo htmlspecialchars_decode($uye->adi); ?></td>
	    				<td><?php echo htmlspecialchars_decode($uye->ePosta); ?></td>
	    				<td><?php echo ($uye->yetki==18) ? "Yazar":"Üye"; ?></td>
	    				<td><?php echo $uye->konum; ?></td>
	    				<td><?php echo $uye->ipAdresi; ?></td>
	    				<td><?php echo $uye->eklenme; ?></td>
	    				<td><?php echo ($uye->aktif==1) ? "Aktif":"Pasif"; ?></td>
	    				<td>
	    					<a href="?sayfa=duzenle&id=<?php echo $uye->ID ?>" class="text-danger"><i class="fa fa-edit"></i></a>
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