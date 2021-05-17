<?php
include("../baglanti.php");
header('Content-Type: text/html; charset=UTF-8');

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
else{

 $bolumid = $_POST["bolumid"];
 $bolumadi = $_POST["bolumadi"];
 $bolumnumara = $_POST["bolumnumara"];
 
 
 if($_POST["embed1"]=="")
 {
	 $embed1 = null;
 }
else{
	$embed1 = $_POST["embed1"];
}

 if($_POST["embed2"]=="")
 {
	 $embed2 = null;
 }
else{
	$embed2 = $_POST["embed2"];
}

 if($_POST["embed3"]=="")
 {
	 $embed3 = null;
 }
else{
	$embed3 = $_POST["embed3"];
}

 if($_POST["embed4"]=="")
 {
	 $embed4 = null;
 }
else{
	$embed4 = $_POST["embed4"];
}

 if($_POST["embed5"]=="")
 {
	 $embed5 = null;
 }
else{
	$embed5 = $_POST["embed5"];
}

 if($_POST["embed6"]=="")
 {
	 $embed6 = null;
 }
else{
	$embed6 = $_POST["embed6"];
}

 if($_POST["embed7"]=="")
 {
	 $embed7 = null;
 }
else{
	$embed7 = $_POST["embed7"];
}

 if($_POST["embed8"]=="")
 {
	 $embed8 = null;
 }
else{
	$embed8 = $_POST["embed8"];
} 
 

	
	$sql1 = "update Bmanga set bolumadi='$bolumadi',bolumsirasi='$bolumnumara' where bolumid='$bolumid'";
	
	$sql2 = "update vbolum set embed1='$embed1',embed2='$embed2',embed3='$embed3',embed4='$embed4',embed5='$embed5',embed6='$embed6',embed7='$embed7',embed8='$embed8' where bolumid='$bolumid'";
	
	mysqli_query($con,$sql1);
	
	mysqli_query($con,$sql2);	
	
	echo '<meta http-equiv="refresh" content="0;URL=/auth/mangadetayduzenle.php">';

}
	?>