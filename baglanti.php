<?php
$servername = "localhost"; /*localhost*/
$username = "root"; /*Kullanıcı adı*/
$password = ""; /*db şifresi*/
$db = "sukebeist"; /*veritabanı tablo adı*/

// Bağlantı
$con=mysqli_connect($servername, $username, $password, $db);
mysqli_set_charset($con,"utf8");
// Kontrol
if (mysqli_connect_errno())
  {
  echo "Veritabanı bağlantı hatası: " . mysqli_connect_error();
  }

?>
