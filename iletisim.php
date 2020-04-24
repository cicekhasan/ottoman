  <div class="container my-3 p-2">
		<div class="row">
			<div class="col-md-7">
				<div class="card">
          <img class="img-fluid" src="uploads/02-1900x1080.jpg" alt="">    
        </div>
			</div>
      <div class="col-md-5">
        <div class="card p-2">
          <div class="card-header bg-success text-white text-center">MESAJ GÖNDER</div>
          <div class="card-body">
            <form action="giris.php" method="post">
              <div class="form-group">
                <label for="ottomanInputEmail1">E-Posta Adresi</label>
                <input type="email" class="form-control form-control-sm" id="ottomanInputEmail1" aria-describedby="emailHelp" required>
                <small class="form-text text-muted">E-Postanızı başkası ile paylaşmayacağız.</small>
              </div>
              <div class="form-group">
                <label for="ottomanInputSubject1">Mesaj Konusu</label>
                <input type="text" class="form-control form-control-sm" id="ottomanInputSubject1" required>
              </div>
              <div class="form-group">
                <label for="ottomanContent1">Mesaj İçeriği</label>
                <textarea class="form-control form-control-sm" name="icerik" id="ottomanContent1" required></textarea>
                <small class="form-text text-muted">Yapıcı eleştirilerinizi bekliyoruz. Mutlaka size cevap vereceğiz.</small>
              </div>
              <button type="submit" name="giris" class="btn btn-success btn-sm btn-block">GÖNDER</button>
            </form>
          </div>
        </div>
      </div>
		</div>
  </div>