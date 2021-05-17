<?php
include("../baglanti.php");
require_once ("class.upload.php");
header('Content-Type: text/html; charset=UTF-8');

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

 $mangaidessiz = $_POST["mangaid"];
 $mangaadi = $_POST["mangaadi"];
 $yazaradi = $_POST["yazaradi"];
 $mangaturu = $_POST["mangaturu"];
 $tanitim = str_replace("'", "\'", $_POST["tanitim"]);
 $durum = $_POST["durumturu"];
 $yayintarih = $_POST["yayintarih"];
 $guncellemetarih = date("Y-m-d");
 $resim = $_FILES["resim"];
 
     $rsbul=mysqli_query($con,"select * from manga where essizid='$mangaidessiz'");
	 $rsmsnc=mysqli_fetch_array($rsbul);
     $kapakresim='../uploads/'.$rsmsnc["kapak_resim"];
	  
$imageresim = $mangaidessiz."-manga";
$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
$klasor = '../uploads'; //Resmin Yükleneceği Klasör
	if ($yukle->uploaded) {  // Upload İşlemi Başarılı olursa aşağıdaki işlemleri yapacak
		$yukle->file_new_name_body = $imageresim;

		$yukle->process($klasor);
			if ($yukle->processed) { // İşlemler Başarılı olursa
	
	            unlink ("$kapakresim"); /*eski resimi sil*/
	
				$rs2 = $yukle->file_dst_name;
		
$sqlres = "update manga set kapak_resim='$rs2' where essizid='$mangaidessiz'";

                mysqli_query($con,$sqlres);	
				
				/*header("Refresh:0; url=mangaduzenledv.php");*/
				$yukle->clean();
			} else { // Başarılı olmadığı durumda 
				echo 'Hata resim yüklenemedi. : ' . $yukle->error;
			}
	}	 
	
	$sqlres2 = "update manga set ad='$mangaadi',yazar='$yazaradi',ozet='$tanitim',tur='$mangaturu',durum='$durum',yayintarih='$yayintarih',guncellemetarihi='$guncellemetarih' where essizid='$mangaidessiz'";
	
	mysqli_query($con,$sqlres2);	
	
	header("Refresh:0; url=/auth/mangaduzenle.php");

}	
	?>