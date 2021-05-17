 <?php
 include("baglanti.php");
 session_start();
 $mangaessizid=$_POST["mangaessizid"];
 $mangaid=$_POST["mangaid"];
     $kulbul=$_SESSION["user"];
	 $k=mysqli_query($con,"select * from users where email='$kulbul' or kullaniciadi='$kulbul'");
	 $kulbilgi=mysqli_fetch_array($k);
     $userid=$kulbilgi["id"];
mysqli_query($con,"insert into usermangalist (essizid,kullanici) values ('$mangaessizid','$userid')");
header("Refresh:0; url=manga.php?mg=$mangaid");
?>