<?php 
session_start();
?>
  <div class="container my-3 p-2">
		<div class="row">
			<div class="col-md-4 offset-md-1">
        <div class="card p-2">
          <div class="card-header bg-success text-white text-center">OTTOMAN TORUNU GİRİŞİ</div>
          <div class="card-body">
            <form action="eylem.php" method="post">
              <div class="form-group">
                <label for="ottomanInputEmail1">E-Posta Adresi</label>
                <input type="email" class="form-control" id="ottomanInputEmail1" name="ePosta" value="<?php echo $_SESSION["adi"];  ?>" required autofocus>
                <small id="emailHelp" class="form-text text-muted">E-Postanızı başkası ile paylaşmayacağız.</small>
              </div>
              <div class="form-group">
                <label for="ottomanInputPassword1">Parola</label>
                <input type="password" class="form-control" id="ottomanInputPassword1" name="parola" required>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="ottomanCheck1" name="beniHatirla">
                <label class="form-check-label" for="ottomanCheck1">Beni hatırla.</label>
              </div>
              <button type="submit" name="giris" class="btn btn-success btn-sm btn-block">Giriş</button>
            </form>
          </div>
        </div>
			</div>
			<div class="col-md-6">
        <div class="card p-2">
          <div class="card-header bg-success text-white text-center">HENÜZ ÜYE DEĞİLMİSİN! ÜYE OL...</div>
          <div class="card-body">
            <form action="eylem.php" method="post">
              <div class="row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="E-Posta hesabınız..." name="ePosta" required>
                </div>
              </div>
              <small class="form-text text-muted">E-Posta hesabınız giriş için kullanılacaktır...</small><br />        
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Parolanız..." name="parola" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Parolayı tekrar giriniz..." name="parolaTekrar" required>
                </div>
              </div><br />
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Ad ve Soyadınız..." name="adi" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Kullanıcı Adınız..." name="kullaniciAdi" required>
                </div>
              </div><br />
              <div class="row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Kullandığınız programlama dilleri..." name="proDili">
                </div>
              </div>
              <small class="form-text text-muted">Sadece yorum yapabilmeniz için onay gerektirir. Gezmeye başlayabilirsiniz.</small>
              <button type="submit" name="uyeOl" class="btn btn-success btn-sm btn-block">Üye Ol</button>
              <?php

              ?>
            </form>
          </div>
        </div>
      </div>
		</div>
  </div>