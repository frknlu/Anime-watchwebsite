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
else{

?>
<!DOCTYPE html>
<html lang="en">

<head>

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
					$bolumid=$_GET["id"];
					
$result=mysqli_query($con,"SELECT * FROM vbolum where bolumid='$bolumid'");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$result2=mysqli_query($con,"SELECT * FROM Bmanga where bolumid='$bolumid'");
$brow = mysqli_fetch_array($result2,MYSQLI_ASSOC);

					?>

						<div class="col-xs-12">
                              <div class="ad-detail-heading">
                                 <h4><div style="float: left;">Bölüm Adı: <?php echo $brow["bolumadi"]; ?> </div><div style="text-align: right;">Anime İD: <font color="#756ee7"><?php echo $brow["essizid"]; ?></font> Bölüm İD: <font color="green"><?php echo $bolumid; ?> </font></div></h4>
                              </div>
                      </div>
                                <form action="mangabolumduzenleislem.php" method="post" enctype="multipart/form-data">
						   
								
							 <div id="displayDivId" style="display: none;">
						   <input type="text" name="bolumid" value="<?php echo $bolumid; ?>" required>
						   </div>
                          <br>
							 
							  <div class="row">
							  <div class="form-group">
							  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="bolumadi"  maxlength="50" placeholder="<?php echo $brow["bolumadi"]; ?>" value="<?php echo $brow["bolumadi"]; ?>" required>
                                 </div>
								</div>
							</div>
							<br>
							<div class="row">
							  <div class="form-group">
							  <div class="col-sm-8">
                                    <input type="number" class="form-control" name="bolumnumara" value="<?php echo $brow["bolumsirasi"]; ?>" required>
                                 </div>
								</div>
							</div>
							<br>
							
							<div class="row">
							  <div class="form-group">
							  <div class="col-sm-8">
Tune.pk 1- <textarea class="form-control" name="embed1" placeholder="tune.pk" value=""><?php echo $row["embed1"];?></textarea>
streamango  2- <textarea class="form-control" name="embed2" placeholder="streamango" value=""><?php echo $row["embed2"];?></textarea>
openload 3 - <textarea class="form-control" name="embed3" placeholder="openload" value=""><?php echo $row["embed3"]; ?></textarea>
sibnet 4 - <textarea class="form-control" name="embed4" placeholder="sibnet" value=""><?php echo $row["embed4"]; ?></textarea>
ok.ru 5 - <textarea class="form-control" name="embed5" placeholder="ok.ru" value="" ><?php echo $row["embed5"]; ?></textarea>
sendvid 6 - <textarea class="form-control" name="embed6" placeholder="sendvid" value="" ><?php echo $row["embed6"]; ?></textarea>
yourupload 7 - <textarea class="form-control" name="embed7" placeholder="yourupload" value="" ><?php echo $row["embed7"]; ?></textarea>
mega.nz 8 - <textarea class="form-control" name="embed8" placeholder="mega.nz" value=""><?php echo $row["embed8"]; ?></textarea>
                                 </div>
								</div>
							</div>
        

                              <div class="form-group form-action">
							  <button class="btn btn-default pull-right" type="submit" >
							  <i class="fa fa-angle-double-right"></i> Düzenle</button>
                              </div>
                          
							 
                    
								</form>
												
</div>
   <script type="text/javascript" src="dropzone/jquery-3.1.1.min.js"></script> 

         <!-- BOOTSTRAP CORE JS -->
         <script type="text/javascript" src="dropzone/bootstrap.min.js"></script>			
		
						
                       
                    </div>
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