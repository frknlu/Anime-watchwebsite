<?php
include("../baglanti.php");
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
	
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Fontfaces CSS-->
    <link href="/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="/admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body>



                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					<form  name="formara" method="post" action="/auth/uye.php?adim=ara">
  <input class="form-control" type="text" name="aranan" Placeholder="Nickname" />
  <input class="form-control" type="submit" value="Bul" width="45" height="35"/>
  </form>
		<br>			
               
			     <div class="col-md-12">
		  	<div class="row">
		
		<?php
$adim = $_GET['adim'];
switch($adim){
case "": 
?>
<table class="table" width="100%" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; color:#333; font-size:12px; font-family:Arial; margin-bottom:25px;">
  <tr>
<td width="18" bgcolor="#F2F2F2"><b>#</b></td>
<td width="18" bgcolor="#F2F2F2"><b>ID</b></td>
<td width="100" bgcolor="#F2F2F2"><b>nickname</b></td>
<td width="100" bgcolor="#F2F2F2"><b>email</b></td>
<td width="100" bgcolor="#F2F2F2"><b>Yetki</b></td>
<td style="text-align:center;" width="80" bgcolor="#F2F2F2"><b>Üye Durumu</b></td>
<td style="text-align:center;" width="150" bgcolor="#F2F2F2"><b>İşlemler</b></td>
  </tr>

<?php
$sayfada = 20; // sayfada gösterilecek içerik miktarını belirtiyoruz.
 
$sorgu = mysqli_query($con,'SELECT COUNT(*) AS toplam FROM users');
$sonuc = mysqli_fetch_assoc($sorgu);
$toplam_icerik = $sonuc['toplam'];
 
$toplam_sayfa = ceil($toplam_icerik / $sayfada);
 
$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
 
if($sayfa < 1) $sayfa = 1; 
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
 
$limit = ($sayfa - 1) * $sayfada;
$sorgu = mysqli_query($con,'SELECT * FROM users LIMIT ' . $limit . ', ' . $sayfada);
 
while($kategori_cek_yeni = mysqli_fetch_assoc($sorgu)) {
   $id = $kategori_cek_yeni["id"];
$sira++;

$bandurum=$kategori_cek_yeni["ban"];

$yetki=$kategori_cek_yeni["rutbe"];

$bir=1;
$sifir=0;

if($bandurum==0)
{
	$bandurum2="Üye Aktif";
	$banduruml='<a style="color:red;" href="/auth/uye.php?adim=banla&id='.$id.'&ban='.$bir.'">Banla</a>';
}
else {
	$bandurum2="Üye Yasakli";
	$banduruml='<a style="color:green;" href="/auth/uye.php?adim=banla&id='.$id.'&ban='.$sifir.'">Ban Kaldır</a>';
}


if($kategori_cek_yeni['rutbe']==1)
{
	$rutbes="Moderatör";
}
else if($kategori_cek_yeni['rutbe']==2){
	$rutbes="Editör";
}
else if($kategori_cek_yeni['rutbe']==3){
	$rutbes="Site Yöneticisi";
}
else{
	$rutbes="Üye";
}


if($rutbe=="3")
{
	$yetkiview='-
	 <form action="/auth/uye.php?adim=yetki" method="POST">
	 <input type="hidden" name="id" value="'.$id.'>"/>
	<select name="snc">
                                       <option value="'.$yetki.'" label="'.$rutbes.'" selected></option>
                                       <option value="0">Üye</option>
									   <option value="2">Editör</option>
									   <option value="1">Moderatör</option>
                                    </select>
									 <button type="submit">Kaydet</button>
									</form>
	
';
}
else {
}

echo '
  <tr>
    <td style="text-align:center;">'.$sira.'</td>
    <td>'.$kategori_cek_yeni['id'].'</td>
	<td>'.$kategori_cek_yeni['kullaniciadi'].'</td>
	<td>'.$kategori_cek_yeni['email'].'</td>
	<td>'.$rutbes.'</td>
	<td>'.$bandurum2.'</td>	
    <td style="text-align:center;">'.$banduruml.' '.$yetkiview.'</td>
   </tr>';
}
?>
</table>
<?php
for($s = 1; $s <= $toplam_sayfa; $s++) {
   if($sayfa == $s) { // eğer bulunduğumuz sayfa ise link yapma.
      echo $s . ' '; 
   } else {
      echo '<a href="/auth/uye.php?sayfa=' . $s . '"> ' . $s . '</a> ';
   }
}
?>

<?php
break;

case "banla": 
$id = $_GET["id"];
$yasak = $_GET["ban"];

$uyeban = mysqli_query($con,"UPDATE users SET ban='$yasak' WHERE id='$id'");

if($uyeban)
{
	echo '<script type="text/javascript">alert("Üye işleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=/auth/uye.php">';
}
else {
    echo '<script type="text/javascript">alert("Üye düzenlenirken bir hata oluştu!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=/auth/uye.php">';
}
break;

case "yetki":

$id = $_POST["id"];
$snc = $_POST["snc"];

if($rutbe=="3")
{
	$rtsnc=mysqli_query($con,"UPDATE users SET rutbe='$snc' WHERE id='$id'");
}
else{
	echo '<script type="text/javascript">alert("Yetkiniz Yok");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=/auth/uye.php">';
}

if($rtsnc)
{
	echo '<script type="text/javascript">alert("işleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=/auth/uye.php">';
}
else {
    echo '<script type="text/javascript">alert("düzenlenirken bir hata oluştu!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=/auth/uye.php">';
}

break;

case "ara":
$ara = $_POST["aranan"];

$sqlara = "SELECT * FROM users WHERE kullaniciadi LIKE '%$ara%'";

$deger=mysqli_query($con,$sqlara);

    $bul=mysqli_num_rows($deger);

  if($bul > 0) {
	  
	  echo '
	  <table class="table" width="800" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; color:#333; font-size:12px; font-family:Arial; margin-bottom:25px;">
  <tr>
<td width="18" bgcolor="#F2F2F2"><b>#</b></td>
<td width="18" bgcolor="#F2F2F2"><b>ID</b></td>
<td width="100" bgcolor="#F2F2F2"><b>nickname</b></td>
<td width="100" bgcolor="#F2F2F2"><b>email</b></td>
<td width="100" bgcolor="#F2F2F2"><b>Yetki</b></td>
<td style="text-align:center;" width="80" bgcolor="#F2F2F2"><b>Üye Durumu</b></td>
<td style="text-align:center;" width="150" bgcolor="#F2F2F2"><b>İşlemler</b></td>
  </tr>
	  ';
	  
    while($kategori_cek_yeni=mysqli_fetch_array($deger)) {
  $id = $kategori_cek_yeni["id"];
$sira++;

$bandurum=$kategori_cek_yeni["ban"];

$yetki=$kategori_cek_yeni["rutbe"];

$bir=1;
$sifir=0;

if($bandurum==0)
{
	$bandurum2="Üye Aktif";
	$banduruml='<a style="color:red;" href="/auth/uye.php?adim=banla&id='.$id.'&ban='.$bir.'">Banla</a>';
}
else {
	$bandurum2="Üye Yasakli";
	$banduruml='<a style="color:green;" href="/auth/uye.php?adim=banla&id='.$id.'&ban='.$sifir.'">Ban Kaldır</a>';
}


if($kategori_cek_yeni['rutbe']==1)
{
	$rutbes="Moderatör";
}
else if($kategori_cek_yeni['rutbe']==2){
	$rutbes="Editör";
}
else if($kategori_cek_yeni['rutbe']==3){
	$rutbes="Site Yöneticisi";
}
else{
	$rutbes="Üye";
}


if($rutbe=="3")
{
	$yetkiview='-
	 <form action="/auth/uye.php?adim=yetki" method="POST">
	 <input type="hidden" name="id" value="'.$id.'>"/>
	<select name="snc">
                                       <option value="'.$yetki.'" label="'.$rutbes.'" selected></option>
                                       <option value="0">Üye</option>
									   <option value="2">Editör</option>
									   <option value="1">Moderatör</option>
                                    </select>
									 <button type="submit">Kaydet</button>
									</form>
	
';
}
else {
}

echo '
  <tr>
    <td style="text-align:center;">'.$sira.'</td>
    <td>'.$kategori_cek_yeni['id'].'</td>
	<td>'.$kategori_cek_yeni['kullaniciadi'].'</td>
	<td>'.$kategori_cek_yeni['email'].'</td>
	<td>'.$rutbes.'</td>
	<td>'.$bandurum2.'</td>	
    <td style="text-align:center;">'.$banduruml.' '.$yetkiview.'</td>
   </tr>';	  
    }
	echo '<table>';
	
  } else {
    echo "<br>";
    echo "<font color='gray' size='4'>'".$ara."' aradığınız üye ile ilgili bir  sonuç bulunamadı.</font>";
  } 
break;


}
?>

				
				
		
		  </div>
		</div>

			   
			   
                    </div>
                </div>
     
  
	

    <!-- Jquery JS-->
    <script src="/admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/admin/vendor/slick/slick.min.js">
    </script>
    <script src="/admin/vendor/wow/wow.min.js"></script>
    <script src="/admin/vendor/animsition/animsition.min.js"></script>
    <script src="/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/admin/js/main.js"></script>

</body>

</html>
<!-- end document-->
<?php }?>