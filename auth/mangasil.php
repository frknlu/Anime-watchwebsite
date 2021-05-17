<?php
include("../baglanti.php");
require_once ("class.upload.php");
header('X-XSS-Protection: 0');

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

$essizid = $_GET["id"];

 $mngid = mysqli_query($con,"SELECT * FROM manga where essizid='$essizid'");/*id rating .d{implow] */
 $mnid=mysqli_fetch_array($mngid);
 $mid=$mnid["id"];
 $kapakresim='../upload/'.$mnid["kapak_resim"];
 
mysqli_query($con,"DELETE FROM manga where essizid='$essizid'");
mysqli_query($con,"DELETE FROM Bmanga where essizid='$essizid'");
mysqli_query($con,"DELETE FROM bolum where essizid='$essizid'");
mysqli_query($con,"DELETE FROM vbolum where essizid='$essizid'");
mysqli_query($con,"DELETE FROM kat where essizid='$essizid'");
mysqli_query($con,"DELETE FROM rating where mgid='$mid'");

unlink ("$kapakresim"); /*image remove*/

header("Refresh:0; url=/auth/mangaduzenle.php");
} 
 ?>
