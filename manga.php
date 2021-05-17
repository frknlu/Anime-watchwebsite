<?php include("baglanti.php");
$mangaidget= $_GET["mg"];
if($mangaidget=="")
{
	header("Refresh:0; url=index.php");
}
			
			$manga=mysqli_query($con,"select * from manga where id='$mangaidget'");
			$mngp=mysqli_fetch_array($manga);
			$hit=$mngp["hit"]+1;
			mysqli_query($con,"UPDATE manga SET hit='$hit' where id='$mangaidget'");
			
			$siteresult=mysqli_query($con,"SELECT * FROM setting");
$setting = mysqli_fetch_array($siteresult,MYSQLI_ASSOC);
			?>   
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    


	<title><?php echo $mngp["ad"]; ?> - <?php echo $setting["title"];?></title>
	

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

<script id="dsq-count-scr" src="//sukebeist.disqus.com/count.js" async></script>

<body class="wp-manga-template-default single single-wp-manga postid-449 wp-manga-page manga-page page header-style-1 sticky-enabled sticky-style-2 is-sidebar text-ui-dark wpb-js-composer js-comp-ver-5.4.2 vc_responsive" style="margin-bottom: 0px;">



<div class="wrap">
     <div class="body-wrap" style="background-color: #f3f3f3;">
        <header class="site-header">
           
<?php include("view/header.php"); ?>

    <div class="clone-header" style="height: 0px;"></div>
</header>

		
			             
			
<div class="site-content">


<div class="profile-manga" style="background-image: url(img/bg-manga.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
				
        <div class="c-breadcrumb-wrapper">

			
                        <div class="c-breadcrumb">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/">
										Anasayfa                                    
										</a>
                                </li>
                                <li>
                                    <a href="anime">
										Anime                                
										</a>
                                </li>

								
								          <li>
                                           <a href="list?orderby=tur&id=<?php echo $mngp["tur"]; ?>">
										   <?php 
										   $turadial=$mngp["tur"];
										   $turbul=mysqli_query($con,"select * from turler where id='$turadial'");
										   $turadi=mysqli_fetch_array($turbul);
										    echo $turadi["adi"]; 
											?>
											</a>
                                            </li>
										
								      <li>
                                        <a href="">
											<?php echo $mngp["ad"]; ?>
										</a>
                                    </li>
								
								
                            </ol>
                        </div>

																		        </div>

	                <div class="post-title">
                    <h3><?php echo $mngp["ad"]; ?></h3>
                </div>
                <div class="tab-summary ">
				
				

					                        <div class="summary_image">
											
                            <a href="#">
								<img width="193" height="278" data-sizes="(max-width: 193px) 100vw, 193px" class="img-responsive effect-fade lazyloaded" src="<?php echo "uploads/".$mngp["kapak_resim"]; ?>" style="padding-top:278px; " alt="wallhaven-550618" sizes="(max-width: 193px) 100vw, 193px">

								</a>
                        </div>
					                    <div class="summary_content_wrap">
                        <div class="summary_content">
                            <div class="post-content">
								<div class="loader-inner ball-pulse">
    <div></div>
    <div></div>
    <div></div>
</div>                     


           <div class="post-rating">
									<div class="post-total-rating">
									
									
									<?php 
/*rating işlemi dokunmayın*/

$rating5=mysqli_query($con,"select * from rating where mgid='$mangaidget' and oy='5'");
$rating4=mysqli_query($con,"select * from rating where mgid='$mangaidget' and oy='4'");
$rating3=mysqli_query($con,"select * from rating where mgid='$mangaidget' and oy='3'");
$rating2=mysqli_query($con,"select * from rating where mgid='$mangaidget' and oy='2'");
$rating1=mysqli_query($con,"select * from rating where mgid='$mangaidget' and oy='1'");

$rating5snc=mysqli_num_rows($rating5);
$rating4snc=mysqli_num_rows($rating4);
$rating3snc=mysqli_num_rows($rating3);
$rating2snc=mysqli_num_rows($rating2);
$rating1snc=mysqli_num_rows($rating1);


$toplamoy=($rating5snc+$rating4snc+$rating3snc+$rating2snc+$rating1snc);

if($rating5snc>$rating4snc or $rating5snc>$rating3snc or $rating5snc>$rating2snc or $rating5snc>$rating1snc)
{
	/*5 yıldız*/
	echo '<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars rating_current ion-ios-star"></i>
									<span class="score font-meta total_votes">['.$toplamoy.']</span>';
}
else if($rating4snc>$rating5snc or $rating4snc>$rating3snc or $rating4snc>$rating2snc or $rating4snc>$rating1snc)
{
	/*4 yıldız*/
	echo '<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<span class="score font-meta total_votes">['.$toplamoy.']</span>';
}
else if($rating3snc>$rating5snc or $rating3snc>$rating4snc or $rating3snc>$rating2snc or $rating3snc>$rating1snc)
{
	/*3 yıldız*/
	echo '<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<span class="score font-meta total_votes">['.$toplamoy.']</span>';
}
else if($rating2snc>$rating5snc or $rating2snc>$rating4snc or $rating2snc>$rating3snc or $rating2snc>$rating1snc)
{
	/*2 yıldız*/
	echo '<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<span class="score font-meta total_votes">['.$toplamoy.']</span>';
}
else if($rating1snc>$rating5snc or $rating1snc>$rating4snc or $rating1snc>$rating3snc or $rating1snc>$rating2snc)
{
	/*1 yıldız*/
	echo '<i class="ratings_stars rating_current ion-ios-star"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<span class="score font-meta total_votes">['.$toplamoy.']</span>';
}
else{
	echo '<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<span class="score font-meta total_votes">['.$toplamoy.']</span>';
}

?>
									
									
									</div>
									
									<?php 
									if(!isset($_SESSION['login']))
											{
												echo '
												<div class="user-rating">
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<i class="ratings_stars ion-ios-star-outline"></i>
									<span class="score font-meta total_votes"><a href="javascript:void(0)" data-toggle="modal" data-target="#form-login" class="btn-active-modal">Sende Oyla</a></span>
									</div>';
											}
											else{
												echo '<div class="user-rating">
									<a href="rating.php?islem=1&mg='.$mangaidget.'"><i class="ratings_stars ion-ios-star-outline"></i></a>
									<a href="rating.php?islem=2&mg='.$mangaidget.'"><i class="ratings_stars ion-ios-star-outline"></i></a>
									<a href="rating.php?islem=3&mg='.$mangaidget.'"><i class="ratings_stars ion-ios-star-outline"></i></a>
									<a href="rating.php?islem=4&mg='.$mangaidget.'"><i class="ratings_stars ion-ios-star-outline"></i></a>
									<a href="rating.php?islem=5&mg='.$mangaidget.'"><i class="ratings_stars ion-ios-star-outline"></i></a>
									<span class="score font-meta total_votes">Sende Oyla</span>
									</div>';
												
											}
									
									?>
									
									
									
									</div>
                                
								
                                <div class="post-content_item">
                                    <div class="summary-heading">
                                        <h5>
											Görüntülenme                                      
											</h5>
                                    </div>
                                    <div class="summary-content">
										 <?php echo $mngp["hit"]; ?>                                  
										 </div>
                                </div>
                              <!--
                                <div class="post-content_item">
                                    <div class="summary-heading">
                                        <h5>
											Yazar                                      
											</h5>
                                    </div>
                                    <div class="summary-content">
                                        <div class="author-content">
											<a href="" rel="tag"><?php echo $mngp["yazar"]; ?></a>                                        
											</div>
                                    </div>
                                </div>
								-->
								
								<?php
								$animess=$mngp["essizid"];
								$tpanime=mysqli_query($con,"select * from Bmanga where essizid='$animess'");

                                $tpanimes=mysqli_num_rows($tpanime);
								
								?>
								<div class="post-content_item">
                                    <div class="summary-heading">
                                        <h5>
											Bölüm                                     
											</h5>
                                    </div>
                                    <div class="summary-content">
                                        <div class="author-content">
											<?php echo $tpanimes; ?>/<?php echo $mngp["tpbolum"]; ?>                                        
											</div>
                                    </div>
                                </div>
<!--
                                <div class="post-content_item">
                                    <div class="summary-heading">
                                        <h5>
											yazar
										</h5>
                                    </div>
                                    <div class="summary-content">
                                        <div class="artist-content">
											<a href="" rel="tag"><?php echo $mngp["editor"]; ?></a>                                       
											</div>
                                    </div>
                                </div>-->

                                <div class="post-content_item">
                                    <div class="summary-heading">
                                        <h5>
											Kategori
											</h5>
                                    </div>
                                    <div class="summary-content">
                                        <div class="genres-content">
										
										<?php 
										$kates=$mngp["essizid"];

								$kat=mysqli_query($con,"select * from kat where essizid='$kates'");

                                while($katbul=mysqli_fetch_array($kat))
								{			
							        $turid=$katbul["katid"];
									$kat2=mysqli_query($con,"select * from turler where id='$turid'");
									$katbul2=mysqli_fetch_array($kat2);
									
									echo '
									  <a rel="tag" href="list?orderby=tur&id='.$katbul["katid"].'">'.$katbul2["adi"].'</a>
									';
								}
										
										?>
											
											
											</div>
                                    </div>
                                </div>
								
								<div class="post-content_item">
                                    <div class="summary-heading">
                                        <h5>
											Yayın Tarihi
											</h5>
                                    </div>
                                    <div class="summary-content">
										<?php 
										$newDate = date("d-m-Y", strtotime($mngp["yayintarih"]));
										echo $newDate; ?>                                 
										</div>
                                </div>

								                               
                            </div>
                            <div class="post-status">
                                
								
								 <div class="post-content_item">
                                    <div class="summary-heading">
                                        <h5>
											Güncelleme Tarihi
											</h5>
                                    </div>
                                    <div class="summary-content">
										<?php
$newDate2 = date("d-m-Y", strtotime($mngp["guncellemetarihi"]));
										echo $newDate2; ?>                               
										</div>
                                </div>

                                <div class="post-content_item">
                                    <div class="summary-heading">
                                        <h5>
											Durum 
										</h5>
                                    </div>
                                    <div class="summary-content">
										<?php 
										$mgdrm=$mngp["durum"];
										if($mgdrm=="1")
										{
											echo "<font color='green'>Devam Ediyor</font>";
										}
										else{
											echo "<b>Bitti</b>";
										}
										 
										?>                                    
										</div>
                                </div>

                                <div class="manga-action">
                                    <div class="count-comment">
                                        <div class="action_icon">
                                            <a href="#manga-discission"><i class=" ios-ion-chatbubbles"></i></a>
                                        </div>
                                        <div class="action_detail">
										<span>Toplam Yorum 
<?php 
echo '<a href="anime?mg='.$mangaidget.'#disqus_thread">Second article</a>';
/*Sadece sherlockmedya.com/c/ tanımlı adresi değiştirin veya çalımayan durumda manga önüne site link ekleyin

http://sherlockmedya.com/c/manga.php? gibi

*/
?>
</span>
                                        </div>
                                    </div>
                                    <div class="add-bookmark">
										<div class="action_icon">
										<script type="text/javascript"> var requireLogin2BookMark = true; </script>
										<a href="#" class="wp-manga-action-button" data-action="bookmark" data-post="449" data-chapter="" data-page="" title="Bookmark"><i class="ion-android-bookmark"></i></a></div>
										
										<div class="action_detail">
										<span>
										
										<?php 
										$kulidlist=$kulbilgi["id"];
										$mangalisteessizid=$mngp["essizid"];
										$mglistsor=mysqli_query($con,"select * from usermangalist where essizid='$mangalisteessizid' and kullanici='$kulidlist'");
										$mglistsorsnc=mysqli_fetch_array($mglistsor);
										
										if(isset($mglistsorsnc))
										{
											echo '<a href="hesabim.php#boomarks">Listede Ekli</a>';
										}
										else{
											if(!isset($_SESSION['login']))
											{
												echo '<label><a href="javascript:void(0)" data-toggle="modal" data-target="#form-login" class="btn-active-modal">Listeme Ekle</a></label>
												<br><p><small>Üye Girişi Yapınız</small></p>';
											}
											else{
												echo '
							<form  name="mangaliste" method="post" action="mangalisteekle.php">
										<div id="displayDivId" style="display: none;">
							<input class="form-control" type="text" name="mangaessizid" value="'.$mngp["essizid"].'" />
							<input class="form-control" type="text" name="mangaid" value="'.$mngp["id"].'" />
										</div>
  <input class="form-control" type="submit" value="Listeme Ekle" width="45" height="35"/>
</form>
											
											';
											}
										}
										
										?>
										
										</span>

										</div>                                    
										</div>
									</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="c-page-content style-1">
    <div class="content-area">
        <div class="container">
		<div class="col-lg-10">
            <div class="row ">
                <div class="main-col  col-md-8 col-sm-8">
                    <!-- container & no-sidebar-->
                    <div class="main-col-inner" style="width:1000px">
                        <div class="c-page">
                            <!-- <div class="c-page__inner"> -->
                            <div class="c-page__content">

								
                                    <div class="c-blog__heading style-2 font-heading">

                                        <h4>
                                            <i class="ion-ios-star"></i>
											Tanıtım 
											</h4>
                                    </div>

                                    <div class="description-summary">
                         
											<p><?php echo $mngp["ozet"]; ?></p>

 </div>

								
                                <div class="c-blog__heading style-2 font-heading">

                                    <h4>
                                        <i class="ion-ios-star"></i>
										BÖLÜMLER                                    </h4>
                                </div>
                                <div class="page-content-listing single-page">
                                    <div class="listing-chapters_wrap">
																				
											
                                            <ul class="main version-chap">
												    
					<?php 
					$essizid=$mngp["essizid"];
												
					$mngbolum=mysqli_query($con,"select * from Bmanga where essizid='$essizid' ORDER BY bolumsirasi ASC");
												
					while($mangablm=mysqli_fetch_array($mngbolum))
					{
	$bolumlink = trim(str_replace(" ","_", $mangablm["bolumadi"]));
	
	if($mangablm["video"]=="video")
	{
		$linkadres="vbolum.php";
	}
	else{
		$linkadres="bolum.php";
	}
	
	$newDate3 = date("d-m-Y", strtotime($mangablm["yuklemetarihi"]));
						
					echo '
					
					
						<li class="wp-manga-chapter">
                        <a href="'.$linkadres.'?id='.$mangablm["bolumid"].'&'.$bolumlink.'"> BÖLÜM '.$mangablm["bolumsirasi"].' - '.$mangablm["bolumadi"].'</a>
						<span class="chapter-release-date"><i>'.$newDate3.'</i>
						</span>
                         </li>
													
													';
												}
					?>
													
													                                                        
													
												                                            </ul>

										                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                        <!-- comments-area -->
								<div id="manga-discission" class="c-blog__heading style-2 font-heading">
			<i class="ion-ios-star"></i>
			<h4> Yorumlar </h4>
		</div>
		
<div class="hr mv40"></div>

<div id="comments" class="comments-area">

<div id="respond" class="comment-respond">

<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://sukebeist.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		
		
</div>

</div><!-- #comments -->
                        <!-- END comments-area -->

						
            
<!--
			            <div class="wp-manga-tags-wrapper">
                <div class="wp-manga-tags">
                    <h5>Tag: </h5>
                    <div class="wp-manga-tags-list">
			<a href="" class="">Cartoon</a>,
			<a href="" class="">Kitasou Girl</a>,
			<a href="" class="">Kyoto</a>
			</div>
                </div>
            </div>
			-->
                    </div>
                </div>

				       <div class="sidebar-col col-md-4 col-sm-4">
							        
		                </div>
					
            </div>
        </div>
		<div class="col-lg-2"><div><?php echo $setting["reklam3"]; ?></div></div>
    </div>
</div>
</div>
        </div>                
			

			                
	 </div> 
	 </div>		
	 
	 <?php include("view/modal.php"); ?>
			
        <footer class="site-footer" style="background-color: #F3F3F3;">
<?php include("view/footer.php"); ?>
        </footer>
		
</body>
</html>