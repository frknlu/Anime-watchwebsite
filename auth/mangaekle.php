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
	
	
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$randomck=generateRandomString();

$varmi = mysqli_query($con,"SELECT * FROM manga where essizid='$randomck'");
if(!$varmi){	
header("Refresh:0; url=mangaekle.php");
}
else{
	$rdnvarmi=$randomck;
}	

$randomvarmi=$rdnvarmi;
if($randomvarmi==""){
		header("Refresh:0; url=/auth/mangaekle.php");
	}
	else{
		$grubidol=$rdnvarmi;
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
	
	
	<style>
	.checkbox-menu li label {
    display: block;
    padding: 3px 10px;
    clear: both;
    font-weight: normal;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
    margin:0;
    transition: background-color .4s ease;
}
.checkbox-menu li input {
    margin: 0px 5px;
    top: 2px;
    position: relative;
}

.checkbox-menu li.active label {
    background-color: #cbcbff;
    font-weight:bold;
}

.checkbox-menu li label:hover,
.checkbox-menu li label:focus {
    background-color: #f5f5f5;
}

.checkbox-menu li.active label:hover,
.checkbox-menu li.active label:focus {
    background-color: #b8b8ff;
}
	</style>

</head>

<body>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
               
                        <div class="row">
                            <div class="col-lg-12">
							<div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="ad-detail-heading">
                                 <h4>Anime <div style="text-align: right;">İD: <?php echo $grubidol ?></div></h4>
                              </div>
                           </div>
						   
						   
						   
                                <form action="mangaekleislem.php" method="post" enctype="multipart/form-data">
								
						  <div id="displayDivId" style="display: none;">
						   <input type="text" class="form-control" name="mangaid" maxlength="50" placeholder="Anime Adı Giriniz" value="<?php echo $grubidol ?>" required>
						   </div>
						   
						   
								<div class="col-md-12 col-sm-12 col-xs-12 ">
                              
							   <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Anime Adı</label>
                                 <div class="col-sm-8">
                                    <input type="text" class="form-control" name="mangaadi" maxlength="50" placeholder="Anime Adı Giriniz" value="" required>
                                 </div>
                              </div>
							  <!--
							  <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Yazar</label>
                                 <div class="col-sm-8">
                                    <input type="text" class="form-control" name="yazaradi" maxlength="50" placeholder="Yazar" value="" required>
                                 </div>
                              </div>
							  -->
							  <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Durum</label>
                                 <div class="col-sm-8">
								  <select name="durumturu" class="select-general form-control" required>
                                       <option label="Durum Seçiniz"></option>
                                       <option value="1">Devam Ediyor</option>
                                       <option value="2">Bitti</option>
                                    </select>
                                 </div>
                              </div>
							  
							  <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Toplam Bölüm</label>
                                 <div class="col-sm-8">
								 <input type="number" name="tpbolum" min="1">
                                 </div>
                              </div>

	  <div class="form-group">
                                 <label  class="col-sm-4 col-form-label">Tür</label>
                                 <div class="col-sm-8">						  
	
	<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" 
          id="dropdownMenu1" data-toggle="dropdown" 
          aria-haspopup="true" aria-expanded="true">
    Tür Seçiniz
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dropdownMenu1">
  
    
	
	 <?php 
									   $turler=mysqli_query($con,"select * from turler");
									   while($turcek=mysqli_fetch_array($turler))
									   {
										   echo '
										   <li >
      <label>
        <input type="checkbox" name="check[]" value="'.$turcek["id"].'"> '.$turcek["adi"].'
      </label>
    </li>';
									   }
									   ?>

  </ul>
</div>
	
	</div></div>
	

							  <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Yayın Tarihi</label>
                                 <div class="col-sm-8">
                                    <input type="date" class="form-control" name="yayintarih" required>
                                 </div>
                              </div>
							  
							  <div class="form-group">
                                 <label class="col-sm-4 col-form-label">Tanıtım</label>
                                 <div class="col-sm-8">
								 <textarea class="form-control" name="tanitim" rows="5"></textarea>
                                 </div>
                              </div>
							  
   <div class="form-group">
    <label for="exampleFormControlFile1">Kapak Resmi</label>
    <input type="file" name="resim" class="form-control-file" id="exampleFormControlFile1">
  </div>
                         

                              <div class="form-group form-action">
							  <button class="btn btn-default pull-right" type="submit" >
							  <i class="fa fa-angle-double-right"></i> Kaydet</button>
                              </div>
                          
							  
                           </div>
								</form>
                            </div> 
                        </div>
                        
                        
                       
                    </div>
                </div>
            </div>

  
	<script>
$(".checkbox-menu").on("change", "input[type='checkbox']", function() {
   $(this).closest("li").toggleClass("active", this.checked);
});

$(document).on('click', '.allow-focus', function (e) {
  e.stopPropagation();
});
	</script>

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
