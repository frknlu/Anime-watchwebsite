<?php
include("../baglanti.php");
require_once ("class.upload.php");

ob_start();
session_start();

$kulnick=$_SESSION["user"];
$rut = mysqli_query($con,"SELECT * FROM users where kullaniciadi='$kulnick'");
$rutrue=mysqli_fetch_array($rut);
$rutbe=$rutrue["rutbe"];

if($rutbe!="1" && $rutbe!="3")
{
	header("Location:/auth/index.html");
}

if(!isset($_SESSION["login"])){
    header("Location:/auth/index.html");
}
else
{


 $mangaid = $_POST["mangaid"];
 $mangaadi = $_POST["mangaadi"];
 $yazaradi = $_POST["yazaradi"];
/* $mangaturu = $_POST["mangaturu"];*/
 $tpbolum = $_POST["tpbolum"];
 $checkbox1 = $_POST['check'];
 $tanitim = str_replace("'", "\'", $_POST["tanitim"]);
 $durum = $_POST["durumturu"];
 $yayintarih = $_POST["yayintarih"];
 $guncellemetarih = date("Y-m-d");
 $resim = $_FILES["resim"];
 
 


 $imageresim = $mangaid."-manga";

$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
$klasor = '../uploads'; //Resmin Yükleneceği Klasör
	if ($yukle->uploaded) {  // Upload İşlemi Başarılı olursa aşağıdaki işlemleri yapacak
		$yukle->file_new_name_body = $imageresim;

		$yukle->process($klasor);
			if ($yukle->processed) { // İşlemler Başarılı olursa
	
				$rs2 = $yukle->file_dst_name;
				
$sqlres = "INSERT INTO manga (essizid,ad,yazar,ozet,kapak_resim,durum,yayintarih,guncellemetarihi,tpbolum) value ('$mangaid','$mangaadi','$yazaradi','$tanitim','$rs2','$durum','$yayintarih','$guncellemetarih','$tpbolum')";



  for ($i = 0; $i <count($checkbox1);$i++){
        if(!empty($checkbox1)){
        $query = "INSERT INTO kat (katid,essizid) VALUES ('".$checkbox1[$i]."','$mangaid')";
        mysqli_query($con,$query);
        }
    }



                mysqli_query($con,$sqlres);	
				
				header("Refresh:0; url=/auth/mangaekle.php");
				$yukle->clean();
			} else { // Başarılı olmadığı durumda 
				echo 'Hata resim yüklenemedi. : ' . $yukle->error;
			}
	}
	
}
	
	?>