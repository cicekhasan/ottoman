<?php 
include("baglan.php");

$adi = $_GET['adi'];

$sorgu = $vt->prepare("SELECT * FROM sayfalar WHERE baslik=?");
$sorgu->execute(array($adi));
$sayfa = $sorgu->fetch(PDO::FETCH_OBJ);
?>
  <div class="container my-3 p-2">
		<div class="alert alert-success kalin"><?php echo $sayfa->baslik; ?></div>
		<div class="row">
				<?php echo $sayfa->icerik; ?>
		</div>
  </div>
<?php
$vt = null;
 ?>