# OTTOMAN BLOG/MAKALE ÇALIŞMASI (PDO)

- Alıştırma yapabilir, hatta bu şekilde kullanabilirsiniz.

- Temiz SQL şablonuda kullanıma hazır.

#### YAPILACAKLAR

1. ornek-baglan.php dosyasının adını baglan.php olarak düzelt ve içerisinde yer alan veritabanı bağlantı ayarlarını kendine göre düzenle!
2. Sayfalama işlemleri için aşağıdaki komutları terminalden nakşet... 

```bash
sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/ottoman.conf
sudo gedit /etc/apache2/sites-available/ottoman.conf 
# İÇERİSİNDEKİLERİ SİL VE AŞAĞIDAKNİ YAPIŞTIR!
<VirtualHost *:80>
	ServerAdmin hasan.cicek@yandex.com.tr
	DocumentRoot /var/www/html/

	<Directory /var/www/html/ottoman>
		ServerName ottoman
		ServerAlias ottoman
		DocumentRoot /var/www/html
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

#### NOTLAR

1. Sistemde hangi sürücüler yüklü, nasıl öğrenirim?

```php
<?php print_r(PDO::getAvailableDrivers()); ?> 
```

2. Diğer veritabanlarına nasıl bağlanırım?

```php
<?php
# MySql Server
$db = new PDO("mysql:host=localhost;dbname=testdb, user, pass");
# MsSql Server
$db = new PDO("mssql:host=localhost;dbname=testdb, user, pass");
# Sybase
$db = new PDO("sybase:host=localhost;dbname=testdb, user, pass");
# SQLite Database
$db = new PDO("sqlite:my/database/path/database.db");
?>
```