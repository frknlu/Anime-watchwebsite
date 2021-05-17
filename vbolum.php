<?php include("baglanti.php");
$bolumid=$_GET["id"];
$bolumoku=mysqli_query($con,"select * from Bmanga where bolumid='$bolumid'");
$boku=mysqli_fetch_array($bolumoku);
$ess=$boku["essizid"];
$mncrum=mysqli_query($con,"select * from manga where essizid='$ess'");
$mgcru=mysqli_fetch_array($mncrum);
$hit=$boku["hit"]+1;
mysqli_query($con,"UPDATE Bmanga SET hit='$hit' where bolumid='$bolumid'");
$vbolumoku=mysqli_query($con,"select * from vbolum where bolumid='$bolumid'");
$vboku=mysqli_fetch_assoc($vbolumoku);
$siteresult=mysqli_query($con,"SELECT * FROM setting");
$setting = mysqli_fetch_array($siteresult,MYSQLI_ASSOC);
?>   
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">

<title><?php echo $boku["bolumadi"] ?> - <?php echo $setting["title"];?></title>

<script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>


<link rel="stylesheet" id="madara-css-css" href="css/style.css" type="text/css" media="all">

<link rel="stylesheet" id="bootstrap-css" href="css/bootstrap.min.css" type="text/css" media="all">
<script type="text/javascript" src="css/bootstrap.min.js"></script>

<link rel="stylesheet" id="apss-font-opensans-css" href="//fonts.googleapis.com/css?family=Open+Sans&amp;ver=4.9.6" type="text/css" media="all">

<link rel="stylesheet" id="apss-frontend-css-css" href="css/frontend.css" type="text/css" media="all">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet">
<style>
.c-breadcrumb-wrapper {
    padding-top: 0px;
	margin-top: -40px;
	margin-bottom: 15px;
}
</style>
</head>

<body class="wp-manga-template-default single single-wp-manga postid-449 wp-manga-page manga-page page header-style-1 sticky-enabled sticky-style-2 is-sidebar text-ui-dark wpb-js-composer js-comp-ver-5.4.2 vc_responsive" style="margin-bottom: 0px;">

<div class="wrap">
     <div class="body-wrap" style="background-color: #f3f3f3;">
        <header class="site-header">
           
<?php include("view/header.php"); ?>

    <div class="clone-header" style="height: 0px;"></div>
	
</header>
<div class="c-page-content style-1">		
		<div class="content-area">
        <div class="container">

				 <div class="c-breadcrumb-wrapper">
			    <div class="c-breadcrumb">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/">
										Anasayfa                                    
										</a>
                                </li>
                                <li>
                                    <a href="#">
										Anime                                
										</a>
                                </li>

								
								          <li>
                                           <a href="anime?mg=<?php echo $mgcru["id"]; ?>">
										  <?php echo $mgcru["ad"];?>
											</a>
                                            </li>
										
								      <li>
                                        <a href="">
											<?php echo $boku["bolumadi"]; ?>
										</a>
                                    </li>
								
								
                            </ol>
                        </div></div>
						
            <div class="row ">

                <div class="main-col col-md-8 col-sm-8">
                    <div class="main-col-inner">
                        
<div class="c-page">
                                <div class="entry-header">
                                    <div class="entry-header_wrap">
                                        <div class="entry-title">
                                            <h3 class="item-title"><?php echo "[".$boku["bolumsirasi"]."] ".$boku["bolumadi"] ?></h2>
                                        </div>
                                    </div>
                                </div>
								
                            <div class="c-page__content">
                                <div class="tab-wrap">
                                    <div class="c-blog__heading style-2 font-heading" style="background-color:#efefef;">
									<div style="min-height: 430px;">	
		<?php
$adim = $_GET['view'];
switch($adim){
case "": 

if ($vboku["embed1"]!=null)
	echo '<div class="videosec" id="embed1" class="video"> '.$vboku["embed1"].' </div>';
else if($vboku["embed2"]!=null)
	echo '<div class="videosec" id="embed2" class="video"> '.$vboku["embed2"].' </div>';
	else if($vboku["embed3"]!=null)
		echo '<div class="videosec" id="embed3" class="video"> '.$vboku["embed3"].' </div>';
		else if($vboku["embed4"]!=null)
			echo '<div class="videosec" id="embed4" class="video"> '.$vboku["embed4"].' </div>';
			else if($vboku["embed5"]!=null)
				echo '<div class="videosec" id="embed5" class="video"> '.$vboku["embed5"].' </div>';
				else if($vboku["embed6"]!=null)
					echo '<div class="videosec" id="embed6" class="video"> '.$vboku["embed6"].' </div>';
					else if($vboku["embed7"]!=null)
						echo '<div class="videosec" id="embed7" class="video"> '.$vboku["embed7"].' </div>';
						else if($vboku["embed8"]!=null)
							echo '<div class="videosec" id="embed8" class="video"> '.$vboku["embed8"].' </div>';
?>												  
<div id="embed1" class="video" style="display:none;"> <?php echo $vboku["embed1"]; ?> </div>
<div id="embed2" class="video" style="display:none;"> <?php echo $vboku["embed2"]; ?> </div>		
<div id="embed3" class="video" style="display:none;"> <?php echo $vboku["embed3"]; ?> </div>	
<div id="embed4" class="video" style="display:none;"> <?php echo $vboku["embed4"]; ?> </div>	
<div id="embed5" class="video" style="display:none;"> <?php echo $vboku["embed5"]; ?> </div>	
<div id="embed6" class="video" style="display:none;"> <?php echo $vboku["embed6"]; ?> </div>	
<div id="embed7" class="video" style="display:none;"> <?php echo $vboku["embed7"]; ?> </div>	
<div id="embed8" class="video" style="display:none;"> <?php echo $vboku["embed8"]; ?> </div>						  
<?php
break;
case "tune.pk":
echo'<div id="embed2" class="video">'.$vboku["embed1"].'</div>';
break;

case "streamango":
echo'<div id="embed2" class="video">'.$vboku["embed2"].'</div>';
break;

case "OpenLoad":
echo'<div id="embed2" class="video">'.$vboku["embed3"].'</div>';
break;

case "Sibnet":
echo'<div id="embed2" class="video">'.$vboku["embed4"].'</div>';
break;

case "ok.ru":
echo'<div id="embed2" class="video">'.$vboku["embed5"].'</div>';
break;

case "sendvid":
echo'<div id="embed2" class="video">'.$vboku["embed6"].'</div>';
break;

case "yourupload":
echo'<div id="embed2" class="video">'.$vboku["embed7"].'</div>';
break;

case "mega.nz":
echo'<div id="embed2" class="video">'.$vboku["embed8"].'</div>';
break;
?>
<?php }?>
</div>
            
		</div>	
</div>			
	</div>	
<div class="row">	
  <div class="col-xs-6 col-sm-6 col-lg-6">		
 
<button type="button" class="btn btn-sm btn-danger" style="<?php if($vboku["embed1"]==null) { echo "display:none;"; } else {} ?>margin:2px;"><a style="color:white;" href="vbolum.php?id=<?php echo $bolumid;?>&view=tune.pk">tune.pk</a></button>
<button type="button" class="btn btn-sm btn-danger" style="<?php if($vboku["embed2"]==null) { echo "display:none;"; } else {} ?>margin:2px;"><a style="color:white;" href="vbolum.php?id=<?php echo $bolumid;?>&view=streamango">streamango</a></button>
<button type="button" class="btn btn-sm btn-danger" style="<?php if($vboku["embed3"]==null) { echo "display:none;"; } else {} ?>margin:2px;"><a style="color:white;" href="vbolum.php?id=<?php echo $bolumid;?>&view=OpenLoad">OpenLoad</a></button>
<button type="button" class="btn btn-sm btn-danger" style="<?php if($vboku["embed4"]==null) { echo "display:none;"; } else {} ?>margin:2px;"><a style="color:white;" href="vbolum.php?id=<?php echo $bolumid;?>&view=Sibnet">Sibnet</a></button>
<button type="button" class="btn btn-sm btn-danger" style="<?php if($vboku["embed5"]==null) { echo "display:none;"; } else {} ?>margin:2px;"><a style="color:white;" href="vbolum.php?id=<?php echo $bolumid;?>&view=ok.ru">ok.ru</a></button>
<button type="button" class="btn btn-sm btn-danger" style="<?php if($vboku["embed6"]==null) { echo "display:none;"; } else {} ?>margin:2px;"><a style="color:white;" href="vbolum.php?id=<?php echo $bolumid;?>&view=sendvid">sendvid</a></button>
<button type="button" class="btn btn-sm btn-danger" style="<?php if($vboku["embed7"]==null) { echo "display:none;"; } else {} ?>margin:2px;"><a style="color:white;" href="vbolum.php?id=<?php echo $bolumid;?>&view=yourupload">yourupload</a></button>
<button type="button" class="btn btn-sm btn-danger" style="<?php if($vboku["embed8"]==null) { echo "display:none;"; } else {} ?>margin:2px;"><a style="color:white;" href="vbolum.php?id=<?php echo $bolumid;?>&view=mega.nz">mega.nz</a></button>

</div>


	<div style="float:right;">
	GÖRÜNTÜLENME:<?php echo $boku["hit"];?>
	</div>
</div>
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
                    </div>
				<div class="ad c-ads custom-code body-bottom-ads"><?php echo $setting["reklam4"]; ?></div>
                </div>
				                

								<div class="sidebar-col col-md-4 col-sm-4">
							        <div id="main-sidebar" class="main-sidebar" role="complementary">
			
			
				<div class="row">
			<div id="manga-recent-4" class="widget col-xs-12 col-md-12   bordered  no-icon heading-style-1 c-popular manga-widget widget-manga-recent">
			<div class="widget__inner c-popular manga-widget widget-manga-recent__inner c-widget-wrap">
            <div class="c-widget-content style-1 with-button">
				<div class="widget-heading font-nav"><h5 class="heading">BÖLÜMLER</h5></div>
				
				<div class="widget-content">  



<ul class="main version-chap">
					<div style="height: 300px; overflow: scroll;overflow-x: hidden;font-size: 13px;">							    
					<?php 
					$essizidb=mysqli_query($con,"select * from Bmanga where bolumid='$bolumid'");
					$essizidbv=mysqli_fetch_array($essizidb);
					$essizidbx=$essizidbv["essizid"];
					$mngbolum=mysqli_query($con,"select * from Bmanga where essizid='$essizidbx' ORDER BY bolumsirasi ASC");
												
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
						
					echo '
					
					
						<li class="wp-manga-chapter">
                        <a href="'.$linkadres.'?id='.$mangablm["bolumid"].'&'.$bolumlink.'">'.$mangablm["bolumsirasi"].' - '.$mangablm["bolumadi"].'</a>
						</span>
                         </li>
													
													';
												}
					?>
													
													                                                        
													</div>
												                                            </ul>				
				
				

            </div>
			</div>
			</div>
			</div>
			</div>
			
			
			
			
			
			<div class="row">
			<div id="manga-recent-4" class="widget col-xs-12 col-md-12   bordered  no-icon heading-style-1 c-popular manga-widget widget-manga-recent">
			<div class="widget__inner c-popular manga-widget widget-manga-recent__inner c-widget-wrap">
            <div class="c-widget-content style-1 with-button">
				<div class="widget-heading font-nav"><h5 class="heading">POPÜLER ANİME</h5></div>
				
				<div class="widget-content">                        
				 <?php
	$trendbul=mysqli_query($con,"SELECT mgid, count( * ) AS tekrar FROM rating GROUP BY mgid HAVING tekrar > 1 ORDER BY mgid ASC LIMIT 3");

while($trensnc=mysqli_fetch_array($trendbul))
{
$trndmg=$trensnc["mgid"];
$mangapop=mysqli_query($con,"select * from manga WHERE id='$trndmg'");
}			 
				 
  /*$mangapop=mysqli_query($con,"select * from manga ORDER BY hit DESC LIMIT 3");*/

  while($mangacekpop=mysqli_fetch_assoc($mangapop))
  {
	  $essizidpop=$mangacekpop["essizid"];
	  
	  $mngbolumpop=mysqli_query($con,"select * from Bmanga where essizid='$essizidpop' ORDER BY bolumsirasi DESC LIMIT 2");
	  
	  echo '
	  
	  <div class="popular-item-wrap">

							
    <div class="popular-img widget-thumbnail c-image-hover">
        <a title="Manga Video Chapters" href="manga.php?mg='.$mangacekpop["id"].'">
			<img width="75" height="106" data-src="uploads/'.$mangacekpop["kapak_resim"].'" class="img-responsive effect-fade lazyloaded" src="uploads/'.$mangacekpop["kapak_resim"].'" style="padding-top:106px; " >
			</a>
    </div>

<div class="popular-content">
    <h5 class="widget-title">
        <a title="manga adi" href="manga.php?mg='.$mangacekpop["id"].'">'.$mangacekpop["ad"].'</a>
    </h5>
';


	  while($mngbolumcekpop=mysqli_fetch_array($mngbolumpop))
	  {
	  
	  	if($mngbolumcekpop["video"]=="video")
	{
		$linkadres="vbolum.php";
	}
	else{
		$linkadres="bolum.php";
	}
	  
	  $bolumlink2 = trim(str_replace(" ","_", $mngbolumcekpop["bolumadi"]));
	  $sonucpop = substr($mngbolumcekpop["bolumadi"], 0, 19);
	  echo '	
		<div class="list-chapter">
		  <div class="chapter-item">
				 <span class="chapter font-meta">
		<a href="'.$linkadres.'?id='.$mngbolumcekpop["bolumid"].'&'.$bolumlink2.'"">'.$sonucpop.'</a>
				</span>
				<span class="post-on font-meta">'.$mngbolumcekpop["yuklemetarihi"].'</span>
				</div>       
				</div>
					';
	  }

echo '
</div>
 </div>
	  
	  
	  ';
  }
	  
	  ?>
				
					<span class="c-wg-button-wrap">
				        <a class="widget-view-more" href="mangalistesi.php?orderby=trending">Tüm Popüler Animeler</a>
                    </span>
				
            </div>
			</div>
			</div>
			</div>
			</div>
			
			<div class="widget_text row">
			<div id="custom_html-12" class="widget_text widget col-xs-12 col-md-12   default no-icon  widget_custom_html">
			<div class="widget_text widget__inner widget_custom_html__inner c-widget-wrap">
			<div class="widget_text widget-content">
			<div class="textwidget custom-html-widget">
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
           
	 </div> 
	 </div>		
<script>
    $(function() {
        $('#viewvideo').change(function(){
            $('.video').hide();
			$('.videosec').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>
	 
<?php include("view/modal.php"); ?>
			
       <footer class="site-footer" style="background-color: #F3F3F3;">
<?php include("view/footer.php"); ?>
        </footer>	
</body>
</html>