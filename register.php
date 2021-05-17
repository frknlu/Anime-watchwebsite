<?php 
include ("baglanti.php"); 

header('Content-Type: text/html; charset=utf-8');

$kullanici=$_POST["kullaniciadi"]; 
$email=$_POST["email"]; 
$parola=$_POST["parola"]; 
$msifre=md5($parola);
$tarih=date("y/m/d");

$sorgu=mysqli_query($con,"SELECT * from users where email='$email' or kullaniciadi='$kullanici'");
if (mysqli_num_rows($sorgu)>0) {
echo "<script language='javascript'>
alert('! Email veya kullanıcı adı kayıtlı.'+ window.location.assign('index.php'))
</script> ";
} 
else {
$sql = "insert into users (kullaniciadi,email,parola,tarih)value('$kullanici','$email','$msifre','$tarih')"; 
$ekle=mysqli_query($con,$sql);
if($ekle){ 
echo "<script language='javascript'>alert('Hosgeldiniz $kullanici Başarıyla Kayıt Oldunuz! Giriş Yaparak Devam Edin ' + window.location.assign('/index.php'))</script> "
;
}else{ 
echo "<script language='javascript'>
alert('Hata! Kayıt Olamadınız Tekrar Deneyin'+ window.location.assign('index.php'))
</script> 
";
exit(); 
} 

}


?>