<?php
$dsn       ='mysql:host=localhost;dbname=ankebut;charset:utf8';
$kullanici ='VERİTABANI KULLANICI ADI';
$parola    ='VERİTABANI PAROLASI';
$ayarlar   = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
    PDO::ATTR_EMULATE_PREPARES => false,
    // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    // PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
];

try{
	$vt=new PDO($dsn, $kullanici, $parola, $ayarlar);
	$vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo 'HATA: '.$e->getMessage();
}
?>