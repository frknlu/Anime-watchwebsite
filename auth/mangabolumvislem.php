<?php
include("../baglanti.php");
header('X-XSS-Protection: 0');

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
else
{

 $mangaid = $_POST["mangaid"];
 $bolumid = $_POST["bolumid"];
 $bolumadi = $_POST["bolumadi"];
 $bolumnumara = $_POST["bolumnumara"];
 $tarih = date("Y-m-d");
 
 $video = $_POST["video"];
 $embed1 = $_POST["embed1"];
 $embed2 = $_POST["embed2"];
 $embed3 = $_POST["embed3"];
 $embed4 = $_POST["embed4"];
 $embed5 = $_POST["embed5"];
 $embed6 = $_POST["embed6"];
 $embed7 = $_POST["embed7"];
 $embed8 = $_POST["embed8"];
 
 $mngsira = mysqli_query($con,"SELECT * FROM Bmanga where essizid='$mangaid' ORDER BY bolumsirasi DESC");/*sıra ekle*/
 $mgsiracek=mysqli_fetch_array($mngsira);
 $sirano=$mgsiracek["bolumsirasi"];
 $sira=$sirano+1;
 
$ekle = "INSERT INTO Bmanga (essizid,bolumid,bolumsirasi,bolumadi,yuklemetarihi,video) value ('$mangaid','$bolumid','$bolumnumara','$bolumadi','$tarih','$video')";

$ekle2 = "INSERT INTO vbolum (essizid,bolumid,embed1,embed2,embed3,embed4,embed5,embed6,embed7,embed8) VALUES ('$mangaid','$bolumid','$embed1','$embed2','$embed3','$embed4','$embed5','$embed6','$embed7','$embed8')";


$islem=mysqli_query($con,$ekle);
$islem2=mysqli_query($con,$ekle2);


	if($islem and $islem2){
	echo '<script type="text/javascript">alert("Ekleme işleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=/auth/mangabolumvekle.php?id='.$mangaid.'">';
		
	}
	else{
    echo("Error: " . mysqli_error($con));
	echo '<meta http-equiv="refresh" content="3;URL=/auth/mangabolumvekle.php?id='.$mangaid.'">';
	 
}

}
 
	
	?>