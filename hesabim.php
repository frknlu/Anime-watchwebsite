<?php include("baglanti.php");
session_start();
 if(isset($_SESSION['login'])){
	 
$siteresult=mysqli_query($con,"SELECT * FROM setting");
$setting = mysqli_fetch_array($siteresult,MYSQLI_ASSOC);	
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
   


<title>Hesabım - <?php echo $setting["title"];?></title>
<meta name="description" content="<?php echo $setting["description"];?>">
<meta name="keywords" content="<?php echo $setting["keywords"];?>">

<script type="text/javascript" src="css/jquery.js"></script>
<script type="text/javascript" src="css/jquery-migrate.min.js"></script>	

<link rel="stylesheet" id="madara-css-css" href="css/style.css" type="text/css" media="all">

<link rel="stylesheet" id="bootstrap-css" href="css/bootstrap.min.css" type="text/css" media="all">
<script type="text/javascript" src="css/bootstrap.min.js"></script>

<link rel="stylesheet" id="apss-font-opensans-css" href="//fonts.googleapis.com/css?family=Open+Sans&amp;ver=4.9.6" type="text/css" media="all">

<link rel="stylesheet" id="apss-frontend-css-css" href="css/frontend.css" type="text/css" media="all">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet">


</head>

<body class="home page-template page-template-page-templates page-template-front-page page-template-page-templatesfront-page-php page page-id-12 header-style-1 sticky-enabled sticky-style-2 is-sidebar text-ui-dark wpb-js-composer js-comp-ver-5.4.2 vc_responsive" style="margin-bottom: 0px;">



<div class="wrap">
    <div class="body-wrap">
        <header class="site-header">
           
<?php include("view/header.php"); ?>

<!-- Button trigger modal -->


<div class="clone-header" style="height: 0px;"></div>
</header>

<div class="site-content">

    <div class="c-page-content style-2">
        <div class="content-area">
            <div class="container">

                <div class="row ">

                    <div class="col-md-12 col-sm-12">

                        <div class="main-col-inner">

								

<div id="post-5" class="c-blog-post post-5 page type-page status-publish hentry">

    <div class="entry-header">
        <div class="entry-header_wrap">
            <div class="entry-title">
                <h2 class="item-title">Hesap Ayarları</h2>
            </div>
			        </div>
    </div>

	
	
    <div class="entry-content">
        <div class="entry-content_wrap">
			<script type="text/javascript">
	jQuery(function($){
		var hash = window.location.hash;
		hash && $('.settings-page ul.nav a[href="' + hash + '"]').tab('show');

		$('.settings-page .nav-tabs a').click(function (e) {
			$(this).tab('show');
			var scrollmem = $('body').scrollTop() || $('html').scrollTop();
			window.location.hash = this.hash;
			$('html,body').scrollTop(scrollmem);
		});
	});
</script>
<div class="row settings-page">
    <div class="col-md-3 col-sm-3">
        <div class="nav-tabs-wrap">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#boomarks" data-toggle="tab" aria-expanded="true"><i class="ion-android-bookmark"></i>Kitaplık                    </a>
				</li>
                <li class="">
                    <a href="#account" data-toggle="tab" aria-expanded="false"><i class="ion-android-person"></i>Hesap Ayarlarım                    </a>
				</li>
				   <!--<li class="">
                    <a href="#history" data-toggle="tab" aria-expanded="false"><i class="ion-android-alarm-clock"></i>Geçmiş                    </a>
				</li>
                <li class="">
                    <a href="#reader" data-toggle="tab" aria-expanded="false"><i class="ion-gear-b"></i>Reader Settings                    </a>
				</li>-->
				<?php 
				if($kulbilgi["rutbe"]=="1" or $kulbilgi["rutbe"]=="3")
				{
					echo '
					<li class="">
                    <a href="#animeadd" data-toggle="tab" aria-expanded="false"><i class="ion-android-alarm-clock"></i>Anime Ekle                   </a>
				</li>
                <li class="">
                    <a href="#animeedit" data-toggle="tab" aria-expanded="false"><i class="ion-gear-b"></i>Anime Düzenle                   </a>
				</li>
				
				 <li class="">
                    <a href="#animebolumadd" data-toggle="tab" aria-expanded="false"><i class="ion-gear-b"></i>Anime Bölüm Ekle                   </a>
				</li>
				
				 <li class="">
                    <a href="#animebolumedit" data-toggle="tab" aria-expanded="false"><i class="ion-gear-b"></i>Anime Bölüm Düzenle                   </a>
				</li>
				
				 <li class="">
                    <a href="#uye" data-toggle="tab" aria-expanded="false"><i class="ion-gear-b"></i>Üye İşlemleri                   </a>
				</li>
					
					';
					if($kulbilgi["rutbe"]=="3")
				{
					echo '
				<li class="">
                    <a href="#animetur" data-toggle="tab" aria-expanded="false"><i class="ion-android-alarm-clock"></i>Anime Tür            </a>
				</li>
                <li class="">
                    <a href="#reklam" data-toggle="tab" aria-expanded="false"><i class="ion-gear-b"></i>Reklam                  </a>
				</li>
				<li class="">
                    <a href="#settings" data-toggle="tab" aria-expanded="false"><i class="ion-android-alarm-clock"></i>Site Ayarları             </a>
				</li>
					
					';
				}
				}
				else if($kulbilgi["rutbe"]=="2")
				{
					echo '
					<li class="">
                    <a href="#animebolumadd" data-toggle="tab" aria-expanded="false"><i class="ion-android-alarm-clock"></i>Anime Bölüm Ekle                   </a>
				</li>
                <li class="">
                    <a href="#animebolumedit" data-toggle="tab" aria-expanded="false"><i class="ion-gear-b"></i>Anime Bölüm Düzenle                   </a>
				</li>
					
					';
				}
			   else{}
				
				?>
				            </ul>
        </div>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="tabs-content-wrap">
            <div class="tab-content">
                <div class="tab-pane active" id="boomarks">
					
<table class="table table-hover list-bookmark">
    <thead>
    <tr>
        <th>Anime Adı</th>
		<th>Son Bölüm</th>
        <th>Tarih</th>
        <th>Düzenle</th>
    </tr>
    </thead>
    <tbody>

	<?
	$kulid=$kulbilgi["id"];
	$mglist=mysqli_query($con,"select * from usermangalist where kullanici='$kulid'");
	$deger=mysqli_num_rows($mglist);
	
	
	if($deger > 0){
		while($row=mysqli_fetch_array($mglist)){
			$essizid=$row["essizid"];
			$mangalist=mysqli_query($con,"select * from manga where essizid='$essizid'");
			$mgcek=mysqli_fetch_array($mangalist);
			$mangalistBm=mysqli_query($con,"select * from Bmanga where essizid='$essizid' Order By bolumsirasi DESC LIMIT 1");
			$Bmangalist=mysqli_fetch_array($mangalistBm);
		echo'
		<tr>
		<td><a href="manga.php?mg='.$mgcek["id"].'">'.$mgcek["ad"].'</a></td>
	    <td><a href="vbolum.php?id='.$Bmangalist["bolumid"].'"> '.$Bmangalist["bolumadi"].' </a></td>
		<td>'.$mgcek["guncellemetarihi"].'</td>
		<td> <a href="mangalistesil.php?id='.$essizid.'">Listemden Çıkar<a> </td>
		</tr>
		
		';
	}
	}
	else{
		echo '<tr>
            <td colspan="3"> Ekli anime listeniz yok. </td>
        </tr>';
	}
	
	?>
		        
	    </tbody>
</table>
                </div>

                <div class="tab-pane" id="account">

	<form method="post" action="profilduzenle.php?adim=resim" enctype="multipart/form-data">
    <div class="tab-group-item">
        <div class="tab-item">
            <div class="choose-avatar">
				<div class="c-user-avatar">
			<img alt="" src="<?php echo $kulbilgi["uyeresim"]; ?>" srcset="<?php echo $kulbilgi["uyeresim"]; ?>" class="avatar avatar-195 photo" height="195" width="195">				</div>
            </div>
            <div class="form form-choose-avatar">
                <div class="select-flie">
                    <!--Update Avatar -->
						Sadece .jpg .png or .gif
						<label class="select-avata">
						<input type="file" name="user-avatar"></label>
                        <input type="submit" value="Yükle" name="wp-manga-upload-avatar" id="wp-manga-upload-avatar">

                </div>
            </div>
        </div>
    </div>
	</form>

	<form method="post" action="profilduzenle.php?adim=eposta">
	<div class="tab-item">
            <div class="settings-title">
                <h3>E-Posta Değiştir</h3>
            </div>
            <div class="form-group row">
                <label for="email-input" class="col-md-3">E-posta</label>
                <div class="col-md-9">
				<span class="show"><?php echo $kulbilgi["email"]; ?></span>
				 </div>
            </div>
            <div class="form-group row">
                <label for="email-input" class="col-md-3">Yeni E-posta Adresi</label>
                <div class="col-md-9">
                    <input class="form-control" type="email" value="" id="email-input" name="user-new-email">
                </div>
            </div>
            <div class="form-group row">
                <label for="email-input-submit" class="col-md-3">Değiştir</label>
                <div class="col-md-9">
                    <input class="form-control" type="submit" value="Kaydet" id="email-input-submit">
                </div>
            </div>
        </div>
		</form>
		
		
		
		<form method="post" action="profilduzenle.php?adim=sifre">
		 <div class="tab-item">
            <div class="settings-title">
                <h3>
					Şifremi Değiştir               </h3>
            </div>

            <div class="form-group row">
                <label for="currrent-password-input" class="col-md-3">Mevcut Şifre</label>
                <div class="col-md-9">
                    <input class="form-control" type="password" value="" id="currrent-password-input" name="user-current-password">
                </div>
            </div>
            <div class="form-group row">
                <label for="new-password-input" class="col-md-3">Yeni Şifre</label>
                <div class="col-md-9">
                    <input class="form-control" type="password" value="" id="new-password-input" name="user-new-password">
                </div>
            </div>
            <div class="form-group row">
                <label for="comfirm-password-input" class="col-md-3">Tekrar Şifre</label>
                <div class="col-md-9">
                    <input class="form-control" type="password" value="" id="comfirm-password-input" name="user-new-password-confirm">
                </div>
            </div>
            <div class="form-group row">
                <label for="password-input-submit" class="col-md-3">Değiştir</label>
                <div class="col-md-9">
                    <input class="form-control" type="submit" value="Kaydet" id="password-input-submit">
                </div>
            </div>
        </div>
		</form>
   </div>
   <?php
   if($kulbilgi["rutbe"]=="1" or $kulbilgi["rutbe"]=="3")
				{
					echo '
	<div class="tab-pane" id="animeadd">
	 <iframe src="/auth/mangaekle.php" style="width: 100%;height: 600px;"></iframe>
	 </div>
	 
	 <div class="tab-pane" id="animeedit">
	 <iframe src="/auth/mangaduzenle.php" style="width: 100%;height: 600px;"></iframe>
	 </div>
   
     <div class="tab-pane" id="animebolumadd">
	 <iframe src="/auth/mangadetayekle.php" style="width: 100%;height: 600px;"></iframe>
	 </div>
	 
	 <div class="tab-pane" id="animebolumedit">
	<iframe src="/auth/mangadetayduzenle.php" style="width: 100%;height: 600px;"></iframe>
	 </div>
	 
	  <div class="tab-pane" id="uye">
	 <iframe src="/auth/uye.php" style="width: 100%;height: 600px;"></iframe>
	 </div>
					';
					if($kulbilgi["rutbe"]=="3")
					{
						echo '
	 <div class="tab-pane" id="animetur">
	 <iframe src="/auth/animetur.php" style="width: 100%;height: 600px;"></iframe>
	 </div>
	  <div class="tab-pane" id="reklam">
	 <iframe src="/auth/reklam.php" style="width: 100%;height: 600px;"></iframe>
	 </div>
	 <div class="tab-pane" id="settings">
	<iframe src="/auth/ayar.php" style="width: 100%;height: 600px;"></iframe>
	 </div>
	 ';
				}	
				}
				else if($kulbilgi["rutbe"]=="2")
				{
					echo '
  <div class="tab-pane" id="animebolumadd">
	 <iframe src="/auth/mangadetayekle.php" style="width: 100%;height: 600px;"></iframe>
	 </div>
	 
	 <div class="tab-pane" id="animebolumedit">
	<iframe src="/auth/mangadetayduzenle.php" style="width: 100%;height: 600px;"></iframe>
	 </div>
					
					';
				}
				else{
					
				}
					
					
					?>

   
 </div>
        </div>
    </div>

</div>
        </div>
    </div>

</div>
								
                        </div>

						<div class="ad c-ads custom-code body-bottom-ads"><img src="img/ads-1.jpg" alt="ads" style=""></div>

                    </div>

					

                </div>
            </div>
        </div>
    </div>


        </div>

		
 </div> 
</div>		
	 
	 
	 
	 <?php include("view/modal.php"); ?>
	 

			
        <footer class="site-footer">
<?php include("view/footer.php"); ?>
        </footer>

</body>
</html>
<?php
 }
else{
	header("Refresh:0; url=index.php");
}
?>