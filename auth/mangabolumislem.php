<?php
include("../baglanti.php");

header('Content-Type: text/html; charset=UTF-8');

ob_start();
session_start();

$kulnick=$_SESSION["user"];
$rut = mysqli_query($con,"SELECT * FROM users where kullaniciadi='$kulnick'");
$rutrue=mysqli_fetch_array($rut);
$rutbe=$rutrue["rutbe"];

if($rutbe=="0")
{
	header("Location:/auth/index.html");
}

if(!isset($_SESSION["login"])){
    header("Location:/auth/index.html");
}
else{

 $mangaid = $_POST["mangaid"];
 $bolumid = $_POST["bolumid"];
 $bolumadi = $_POST["bolumadi"];
 $tarih = date("Y-m-d");
 
 $mngsira = mysqli_query($con,"SELECT * FROM Bmanga where essizid='$mangaid' ORDER BY bolumsirasi DESC");/*sıra ekle*/
 $mgsiracek=mysqli_fetch_array($mngsira);
 $sirano=$mgsiracek["bolumsirasi"];
 $sira=$sirano+1;
 
$ekle = "INSERT INTO Bmanga (essizid,bolumid,bolumsirasi,bolumadi,yuklemetarihi) value ('$mangaid','$bolumid','$sira','$bolumadi','$tarih')";

$islem=mysqli_query($con,$ekle);


	if($islem){
	echo '<script type="text/javascript">alert("Ekleme işleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=/auth/mangadetayekle.php">';
		
	}
	else{
    echo("Error: " . mysqli_error($con));
	echo '<meta http-equiv="refresh" content="3;URL=/auth/mangadetayekle.php">';
	 
}

 }
 
	
	?>