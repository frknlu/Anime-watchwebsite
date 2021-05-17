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
else
{
	$essizid=$_GET["id"];
	
	if(empty($essizid))
	{
		header('Location: /hesabim.php#animebolumadd');
	}
else{
}	
	
	/*bolum id*/
    function generateRandomString2($length2 = 8) {
    $characters2 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength2 = strlen($characters2);
    $randomString2 = '';
    for ($i = 0; $i < $length2; $i++) {
        $randomString2 .= $characters2[rand(0, $charactersLength2 - 1)];
    }
    return $randomString2;
}

$bidal=generateRandomString2();

$varmi = mysqli_query($con,"SELECT * FROM Bmanga where bolumid='$bidal'");
if(!$varmi){	
header("Refresh:0; url=/auth/mangabolumekle.php");
}
else{
	$bolumid=$bidal;
}	

?>
<!DOCTYPE html>
<html lang="en">

<head>
    

    <!-- Fontfaces CSS-->
    <link href="/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">


    <!-- Vendor CSS-->
    <link href="/admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/admin/vendor/slick/slick.css" rel="stylesheet" media="all">

    <link href="/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
	
	 <link rel="stylesheet" href="/admin/dropzone/bootstrap.min.css">
      <link rel="stylesheet" href="/admin/dropzone/dropzone.css">

    <!-- Main CSS-->
    <link href="/admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body>
   
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					<?php 
					$bolumadi=mysqli_query($con,"select * from manga where essizid='$essizid'");
                    $row=mysqli_fetch_array($bolumadi);
					
 $mngsira = mysqli_query($con,"SELECT * FROM Bmanga where essizid='$essizid' ORDER BY bolumsirasi DESC");/*sıra ekle*/
 $mgsiracek=mysqli_fetch_array($mngsira);
 $sirano=$mgsiracek["bolumsirasi"];
 $sira=$sirano+1;
					?>

					
							
							<div class="col-xs-12">
                              <div class="ad-detail-heading">
                                 <h4><div style="float: left;">Anime: <?php echo $row["ad"]; ?> </div><div style="text-align: right;">İD: <font color="#756ee7"><?php echo $essizid ?></font> Bölüm İD: <font color="green"><?php echo $bolumid ?> </font></div></h4>
                              </div>
                           </div>
						   <br>
						   
						   
                           <form action="/auth/mangabolumvislem.php" method="post" >
						
							
						
						  <div id="displayDivId" style="display: none;">  
						   <input type="text" class="form-control" name="mangaid" value="<?php echo $essizid ?>" required>
						   <input type="text" class="form-control" name="bolumid" value="<?php echo $bolumid ?>" required>
						   <input type="text" class="form-control" name="video" value="video" required>
						   </div> 
						  <br>
						
							  <div class="row">
							  <div class="form-group">
							  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="bolumadi" placeholder="Bölüm Adı Giriniz" value="" required>
                                 </div>
								</div>
							</div>
							<div class="row">
							  <div class="form-group">
							  
							  <div class="col-sm-8">
							  <label>Bölüm Numarası</label>
                                    <input type="number" class="form-control" name="bolumnumara" value="<?php echo $sira; ?>" required>
                                 </div>
								</div>
							</div>
							<br>
							
							<div class="row">
							  <div class="form-group">
							  <div class="col-sm-8">
							    <label>EMBED ADRESİ</label>
<input type="text" class="form-control" name="embed1" placeholder="tune.pk" value="" >
<input type="text" class="form-control" name="embed2" placeholder="streamango" value="" >
<input type="text" class="form-control" name="embed3" placeholder="openload" value="" >
<input type="text" class="form-control" name="embed4" placeholder="sibnet" value="" >
<input type="text" class="form-control" name="embed5" placeholder="ok.ru" value="" >
<input type="text" class="form-control" name="embed6" placeholder="sendvid" value="" >
<input type="text" class="form-control" name="embed7" placeholder="yourupload" value="" >
<input type="text" class="form-control" name="embed8" placeholder="mega.nz" value="" >
                                 </div>
								</div>
							</div>
							
					

                        
                              <div class="form-group form-action">
							  <button class="btn btn-default pull-right" type="submit" ><i class="fa fa-angle-double-right"></i> Kaydet</button>
                              </div>
                           
							  
                           
								</form>
								
								
                           
                        </div>
						
			 <!-- JAVASCRIPT JS  --> 
      <script type="text/javascript" src="/admin/dropzone/jquery-3.1.1.min.js"></script> 

         <!-- BOOTSTRAP CORE JS -->
         <script type="text/javascript" src="/admin/dropzone/bootstrap.min.js"></script>			
		
						
                      
                    </div>
                </div>

	

 
    <!-- Bootstrap JS-->
    <script src="/admin/vendor/bootstrap-4.1/popper.min.js"></script>
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
    </script>

    <!-- Main JS-->
    <script src="/admin/js/main.js"></script>

</body>

</html>
<!-- end document-->
<?php } ?>