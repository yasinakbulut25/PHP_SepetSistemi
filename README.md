## MySQL Veritabanı Kurulumu
**PhpMyAdmin** üzerinden **sepet_sistemi** adında bir veri tabanı oluşturunuz. Oluşturduğunuz veri tabanına dosyalar içerisinde bulunan **products.sql** dosyasını içe aktar seçeneği ile veri tabanına kolayca yükleyebilirsiniz.

## Database Bağlantısı (db.php)
Dosyalar içerisinde bulunan **db.php** dosyası ile veritabanı bağlantınızı yapabilirsiniz. 
	 
	 <?php
	  try {
         $host = 'localhost'; // sunucu
	     $dbname = 'sepet_sistemi'; // veritabanı adı
	     $user = 'root'; // veri tabanı kullanıcısı
	     $password = ''; // kullanıcı şifresi

	     $db = new PDO("mysql:host=$host;dbname=$dbname; charset=utf8mb4;", "$user", "$password");

	  }catch(PDOException $mesaj){
	    echo $mesaj -> getMessage();
	  }
	?>


## Diğer Dosyaların İçerikleri

- **basket.php :** Sepete ekleme, sepette ürün adeti artırma & azaltma ve sepetteki ürünü silme işlemlerini içerir.
- **shopping-basket.php :** Sepete eklenen ürünlerin listesini gösterme 
