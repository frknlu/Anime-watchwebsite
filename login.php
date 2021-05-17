<?php 
include("baglanti.php");
ob_start();
session_start();
 
$kuladmail=$_POST["log"];
$sifre=$_POST["pwd"];

$msifre=md5($sifre); 
 
$sql_check=mysqli_query($con,"select * from users where kullaniciadi='$kuladmail' and parola='$msifre' or email='$kuladmail' and parola='$msifre'");

if(mysqli_num_rows($sql_check))  {
$kullanicidurumucek=mysqli_fetch_array($sql_check); 
$durum=$kullanicidurumucek['ban'];
if($durum=="0"){ 
    $_SESSION["login"] = "true";
    $_SESSION["user"] = $kuladmail;
    $_SESSION["pass"] = $sifre;
	header( "refresh:0;url=index.php" );
}
else{
	echo "
<html><head>

<script language='JavaScript'>
<!--
var left='[';
var right=']';
var msg=' BANNED - Sukebeist.com ';
var speed=200;
 
function scroll_title() {
        document.title=left+msg+right;
        msg=msg.substring(1,msg.length)+msg.charAt(0);
        setTimeout('scroll_title()',speed);
}
scroll_title();
 
// End -->
</script>

</head>
<body bgcolor='#464646'>
<center style='margin-top:100px'>
<img src='img/banned.png' height='120px'>
    <br>
    <font color='white' size='21'>Siteye Giriþiniz Yasaklanmýþtýr </font><font color='red' size='30'><b>!</b></font>
<center>
</center></center></body></html>
"; 

exit(); 
}
}
else {
    if($kuladmail=="" or $sifre=="") {
        echo "
		<script language='javascript'>
alert('Lutfen kullanici adi ya da sifreyi bos birakmayiniz..!'+ window.location.assign('index.php'))
</script> 
		";
    }
    else {
        echo "
		<script language='javascript'>
alert('Kullanici Adi/Sifre Yanlis.'+ window.location.assign('index.php'))
</script> 
		
		
		";
    }
}
 
ob_end_flush();
?>