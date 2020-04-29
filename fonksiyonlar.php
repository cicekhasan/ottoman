<?php
// Print_r kullanımı
function daire($deger){
	echo '<pre>';
	print_r($deger);
	echo '</pre>';
}
// vardump kullanımı
function varya($deger){
	echo '<pre>';
	var_dump($deger);
	echo '</pre>';
}
// Yönlendirme
function git($url,$time=0){
  if ($time) header("Refresh: {$time}; url={$url}");
  else header("Location:{$url}");
}
// Çıkışta session ları boşaltma
function cikis(){
	unset($_SESSION["oturum"]);
	unset($_SESSION["id"]);
	unset($_SESSION["kullaniciAdi"]);
	unset($_SESSION["adsoyad"]);
}

function GetIP(){
	if(getenv("HTTP_CLIENT_IP")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	if (strstr($ip, ',')) {
		$tmp = explode (',', $ip);
		$ip = trim($tmp[0]);
	}
	} else {
		$ip = getenv("REMOTE_ADDR");
	}
	return $ip;
}