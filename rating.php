<?php include("baglanti.php");
session_start();
     $kulbul=$_SESSION["user"];
	 $k=mysqli_query($con,"select * from users where email='$kulbul' or kullaniciadi='$kulbul'");
	 $kulbilgi=mysqli_fetch_array($k);
	$kulid=$kulbilgi["id"]; 
	$mangaidget=$_GET["mg"];
	$oydeger=$_GET["islem"];
	$deger=mysqli_query($con,"select * from rating where mgid='$mangaidget' and userid='$kulid'");
	$varmi=mysqli_fetch_array($deger);
	if(isset($varmi))
	{
		$idcek=$varmi["id"];
		mysqli_query($con,"UPDATE rating SET oy='$oydeger' where id='$idcek'");
		header("Refresh:0; url=manga.php?mg=$mangaidget");
	}
	else{
		mysqli_query($con,"INSERT INTO rating (oy,mgid,userid) values ('$oydeger','$mangaidget','$kulid')");
		header("Refresh:0; url=manga.php?mg=$mangaidget");
	}
			?>  