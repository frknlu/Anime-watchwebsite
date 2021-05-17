<?php
include("baglanti.php");
require_once ("class.upload.php");
header('Content-Type: text/html; charset=UTF-8');

 session_start();
     $kulbul=$_SESSION["user"];
	 $k=mysqli_query($con,"select * from users where email='$kulbul' or kullaniciadi='$kulbul'");
	 $kulbilgi=mysqli_fetch_array($k);
     $uyeid=$kulbilgi["id"];


$adim = $_GET["adim"];
switch($adim){
case "resim": 
	 
 $resim = $_FILES["user-avatar"];
 if($kulbilgi["uyeresim"]=="userimg/user_image_yok.png")
	{
		$resimisim = "";
	}
	else{
		$resimisim = $kulbilgi["uyeresim"];
	}
$imageresim = $uyeid."-avatar";
$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
$klasor = './userimg'; //Resmin Yükleneceği Klasör
	if ($yukle->uploaded) {  // Upload İşlemi Başarılı olursa aşağıdaki işlemleri yapacak
		$yukle->file_new_name_body = $imageresim;
		$yukle->process($klasor);
			if ($yukle->processed) { // İşlemler Başarılı olursa

            unlink ("$resimisim"); /*eski resimi sil*/
				$rs2 = "userimg/".$yukle->file_dst_name;
				$sqlres = "UPDATE users SET uyeresim='$rs2' WHERE id='$uyeid'";
                mysqli_query($con,$sqlres);	
				header("Refresh:0; url=hesabim.php#account");
				$yukle->clean();
			} else { // Başarılı olmadığı durumda 
				echo 'Hata resim yüklenemedi. : ' . $yukle->error;
			}
	}
 
    break;
	case "eposta":
	$demail=$_POST["user-new-email"];
	
	$varmimail=mysqli_query($con,"select * from users where email='$demail'");
	
	$mailvarmi=mysqli_num_rows($varmimail);
	if($mailvarmi > 0)
	{
					echo "<script>
alert('Bu Eposta kullanılıyor!');
window.location.href='hesabim.php#account';
</script>";
	}
	else{
	mysqli_query($con,"update users set email='$demail' where id='$uyeid'");
	header("Refresh:0; url=hesabim.php#account");
	}
	

	break;
	case "sifre":
	
	$msifre=$_POST["user-current-password"];
	$ysifre=$_POST["user-new-password"];
	$ysifretekrar=$_POST["user-new-password-confirm"];
	
	$cozulusifre=md5($msifre);
	
	$sqkaydetsifre=md5($ysifre);
	
	
	$kullaniciparolasi=$kulbilgi["parola"];
	
	if($kullaniciparolasi=="$cozulusifre")
	{
		if($ysifre=="$ysifretekrar")
		{
			
$sqlsifre = "update users set parola='$sqkaydetsifre' where id='$uyeid'";
mysqli_query($con,$sqlsifre);
			
			
			
			echo "<script>
alert('Şifreniz Başarıyla Değiştirildi!');
window.location.href='hesabim.php#account';
</script>";
			
		}else{
			echo "<script>
alert('Girilen Şifre Uyumsuz!');
window.location.href='hesabim.php#account';
</script>";
		}
		
	}else{
echo "<script>
alert('Mevcut Şifre Yanlış!');
window.location.href='hesabim.php#account';
</script>";
	}
	
	
	break;
}

?>