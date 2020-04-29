<?php ob_start(); ?>
<!doctype html>
<html lang="tr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/renk.css">
  <!--<script src="./ckeditor/ckeditor.js"></script>--> 
  <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
  <title>Aysubey</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="aysubey.com">
      <img src="img/logo.png" width="40" height="40" alt="">
    </a>
    <a class="navbar-brand" href="index.php">OTTOMAN GRANDSON</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="?sayfa=anasayfa">Anasayfa</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategoriler
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="?sayfa=kategori">Php</a>
            <a class="dropdown-item" href="?sayfa=kategori">Linux</a>
            <a class="dropdown-item" href="?sayfa=kategori">Markdown</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?sayfa=kategori">Genel</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?sayfa=hakkimizda">Hakkımızda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?sayfa=iletisim">İletişim</a>
        </li>
        <?php 
        if ($_SESSION["yetki"]==18) {
          echo '
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Yönetim
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="?sayfa=yonetim">Yönetim</a>
            <a class="dropdown-item" href="?sayfa=uyeler">Üyeler</a>
            <a class="dropdown-item" href="?sayfa=kategoriler">Kategoriler</a>
            <a class="dropdown-item" href="?sayfa=icerikler">İçerikler</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?sayfa=ekle">İçerik Ekle</a>
          </div>
        </li>
        ';
        }
        if (isset($_SESSION["adi"])) {
          echo '
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            '.$_SESSION["adi"].'
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="?sayfa=profil">Profil</a>
            <a class="dropdown-item" href="?sayfa=site-ayarlari">Ayarlar</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?sayfa=cikis">Çıkış</a>
          </div>
        </li>
        ';
        }else{
          echo '        
        <li class="nav-item">
          <a class="nav-link" href="?sayfa=giris">Giriş</a>
        </li>';
        }
        ?>
      </ul>
      <form class="form-inline ml-5 my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Site içi arama..." aria-label="Search">
        <button class="btn btn-outline-warning bg-info my-2 my-sm-0" type="submit">Ara</button>
      </form>
    </div>
  </nav>
  <!-- Sayfa içeriği başlangıç... -->