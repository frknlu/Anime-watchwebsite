<?php
include("../baglanti.php");
header('X-XSS-Protection: 0');

ob_start();
session_start();

$kulnick=$_SESSION["user"];
$rut = mysqli_query($con,"SELECT * FROM users where kullaniciadi='$kulnick'");
$rutrue=mysqli_fetch_array($rut);
$rutbe=$rutrue["rutbe"];

if($rutbe!="3")
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
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
               
                        <div class="row">
                            <div class="col-lg-12">
						   
						   
	<?php

$adim = $_GET["adim"];
switch($adim){
case "": 
?>

  
   <form action="/auth/animetur.php?adim=onay" method="post" >

							
							  <div class="form-group">
							  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="turadi" maxlength="20" placeholder="Tür Adı: Örnek:Aksiyon" value="" required>
                                 </div>
								</div>
						

                              <div class="form-group form-action">
							  <button class="btn btn-default " type="submit" > Kaydet</button>
                              </div>
                           
							  
                           
							</form>


		
		
		
<?php
break;
case "onay": 

$tur=$_POST["turadi"];

if (mysqli_query($con, "insert into turler (adi) values ('$tur')")) {
   echo '<script type="text/javascript">alert("İşleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=/auth/animetur.php">';
} else {
    echo "Error updating record: " . mysqli_error($conn);
}



break;
}
?>	
			
									   
                               
                            </div> 
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
