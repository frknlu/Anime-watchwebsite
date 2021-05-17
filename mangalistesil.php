 <?php
 include("baglanti.php");
 session_start();
 $mangaessizid=$_GET["id"];
 
     $kulbul=$_SESSION["user"];
	 $k=mysqli_query($con,"select * from users where email='$kulbul' or kullaniciadi='$kulbul'");
	 $kulbilgi=mysqli_fetch_array($k);
     $userid=$kulbilgi["id"];
	 
mysqli_query($con,"DELETE FROM usermangalist WHERE kullanici='$userid' and essizid='$mangaessizid'");
header("Refresh:0; url=hesabim.php#boomarks");
?>