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
	<link rel="stylesheet" href="/admin/css/dropzone.css">

    <!-- Main CSS-->
    <link href="/admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

					<?php
					$essizid=$_GET["id"];
					$sql = "SELECT * FROM manga where essizid='$essizid'"; 
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

					?>
<div class="row">
                            <div class="col-lg-12">
							<div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="ad-detail-heading">
                                 <h4>Düzenleniyor <div style="text-align: right;">İD:<?php echo $essizid; ?></div></h4>
                              </div>
                           </div>
						   
                                <form action="/auth/mangaduzenledvislem.php" method="post" enctype="multipart/form-data">
						   
								<div class="col-md-12 col-sm-12 col-xs-12 ">
								
								  <div id="displayDivId" style="display: none;">
						   <input type="text" name="mangaid" value="<?php echo $essizid; ?>" required>
						   </div>
                              
							   <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Anime Adı</label>
                                 <div class="col-sm-8">
                                    <input type="text" class="form-control" name="mangaadi" maxlength="50" placeholder="Anime Adı Giriniz" value="<?php echo $row["ad"] ?>" required>
                                 </div>
                              </div>
							  <!--
							  <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Yazar</label>
                                 <div class="col-sm-8">
                                    <input type="text" class="form-control" name="yazaradi" maxlength="50" placeholder="Yazar" value="<?php echo $row["yazar"] ?>" required>
                                 </div>
                              </div>
							  -->
							  <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Durum</label>
                                 <div class="col-sm-8">
								  <select name="durumturu" class="select-general form-control" required>
                                       <option value="<?php echo $row["durum"] ?>" label="<?php echo $row["durum"] ?>" selected></option>
                                       <option value="1">Devam Ediyor</option>
                                       <option value="2">Bitti</option>
                                    </select>
                                 </div>
                              </div>
							  
							   <div class="form-group">
                                 <label  class="col-sm-4 col-form-label">Tür</label>
                                 <div class="col-sm-8">
                                    <select name="mangaturu" class="select-general form-control" required>
                                       <option value="<?php echo $row["tur"] ?>" label="<?php echo $row["tur"] ?>" selected></option>
                                       <?php 
									   $turler=mysqli_query($con,"select * from turler");
									   while($turcek=mysqli_fetch_array($turler))
									   {
										   echo '<option value="'.$turcek["id"].'">'.$turcek["adi"].'</option>';
									   }
									   ?>
									  
                                    </select>
                                 </div>
                              </div>
							  
							  <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Yayın Tarihi</label>
                                 <div class="col-sm-8">
                                    <input type="date" class="form-control" name="yayintarih" value="<?php echo $row["yayintarih"] ?>" required>
                                 </div>
                              </div>
							  
							  <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Tanıtım</label>
                                 <div class="col-sm-8">
								 <textarea class="form-control" name="tanitim" rows="5"><?php echo $row["ozet"] ?></textarea>
                                 </div>
                              </div>
							  
							  
   <div class="form-group">
    <label for="exampleFormControlFile1">Kapak Resmi</label>
	<img style="    max-height: 120px;" src="../uploads/<?php echo $row["kapak_resim"] ?>" />
    <input type="file" name="resim" class="form-control-file" id="exampleFormControlFile1">
  </div>
                         

                              <div class="form-group form-action">
							  <button class="btn btn-default pull-right" type="submit" >
							  <i class="fa fa-angle-double-right"></i> Düzenle</button>
                              </div>
                          
							  
                           </div>
								</form>
                            </div> 
                        </div>
							
				
                        
                        
                      
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
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
