<?php include("baglanti.php");
$siteresult=mysqli_query($con,"SELECT * FROM setting");
$setting = mysqli_fetch_array($siteresult,MYSQLI_ASSOC);
?>   
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
	<title>Anime Arama Robotu - <?php echo $setting["title"];?></title>
<script type="text/javascript" src="css/jquery.js"></script>
<script type="text/javascript" src="css/jquery-migrate.min.js"></script>	

<link rel="stylesheet" id="madara-css-css" href="css/style.css" type="text/css" media="all">

<link rel="stylesheet" id="bootstrap-css" href="css/bootstrap.min.css" type="text/css" media="all">
<script type="text/javascript" src="css/bootstrap.min.js"></script>

<link rel="stylesheet" id="apss-font-opensans-css" href="//fonts.googleapis.com/css?family=Open+Sans&amp;ver=4.9.6" type="text/css" media="all">

<link rel="stylesheet" id="apss-frontend-css-css" href="css/frontend.css" type="text/css" media="all">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet">
<style>
/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #f04c45;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
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
            <div class="row ">
                <div class="main-col col-md-8 col-sm-8">
                    <div class="main-col-inner">
                        
<?php
$turalindi=$_GET["kat"];
$tarihalindi=$_GET["date"];
$puanalindi=$_GET["puan"];

if($turalindi=="") /*1*/
{
	$turislem=mysqli_query($con,"select * from manga where YEAR(yayintarih)='$tarihalindi' ");

	$turdegers=mysqli_query($con,"select * from turler where id='$turalindi'");

$turadial=mysqli_fetch_array($turdegers);
$turgoruntule=mysqli_num_rows($turislem);

	if($turgoruntule=="" && $turgoruntule=="0")
{
	$bulanamadi='<font color="red"><center>Herhangi bir sonuç bulunamadı...</center></font>';
}
else{
	$bulanamadi='';
}

	
echo '
<div class="c-page">
                                <div class="entry-header">
                                    <div class="entry-header_wrap">
                                        <div class="entry-title">
                                            <h2 class="item-title">'.$tarihalindi.'</h2>
                                        </div>
                                    </div>
                                </div>
								
                            <div class="c-page__content">
                                <div class="tab-wrap">
                                    <div class="c-blog__heading style-2 font-heading">
                                        <h4>
                              <i class="ion-ios-star"></i>['.$turgoruntule.'] Görüntülenen</h4>
										
<div class="c-nav-tabs">
    <span> Liste: </span>
    <ul class="c-tabs-content">
		 <li>
            <a href="list">
				Hepsi            </a>
        </li>
		 <li>
            <a href="?orderby=new-manga">
				Yeni            </a>
        </li>
        <li>
            <a href="?orderby=trending">
				Popüler            </a>
        </li>
        <li>
            <a href="?orderby=views">
				En Çok Görüntülenen  </a>
        </li>
    </ul>
</div>
                                    </div>
                                </div>
								
                                <div class="tab-content-wrap">
                                    <div role="tabpanel" class="c-tabs-item">
                                        <div class="page-content-listing">
											<div class="page-listing-item">
    <div class="row">
            ';
	echo $bulanamadi;		
	
		while($turgoster=mysqli_fetch_array($turislem))
{
	 $essizid=$turgoster["essizid"];
	 $mngbolum=mysqli_query($con,"select * from Bmanga where essizid='$essizid' ORDER BY bolumsirasi DESC LIMIT 2");
	echo'	
<div class="col-xs-12 col-md-6" style="margin-bottom:8px;">
<div class="page-item-detail">
<div id="manga-item-449" class="item-thumb hover-details c-image-hover" data-post-id="449">
<a href="manga.php?mg='.$turgoster["id"].'" title="">
<img data-src="uploads/'.$turgoster["kapak_resim"].'" class="img-responsive effect-fade lazyloaded" src="uploads/'.$turgoster["kapak_resim"].'" style="padding-top:150px;width:110px;height:150px" alt="'.$turgoster["ad"].' - izle.sukebeist.com">
</a>
</div>
<div class="item-summary">
<div class="post-title font-title">
<h5>
<span class="manga-title-badges new">YENİ</span>
<a href="manga.php?mg='.$turgoster["id"].'">'.$turgoster["ad"].'</a>
</h5>
</div>
<div class="meta-item rating">
<div class="post-total-rating">';

						/*rating işlemi dokunmayın*/
$mangaidget=$tumgoster["id"];
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
echo'
</div>
</div>
<div class="list-chapter">
';
	  while($mngbolumcek=mysqli_fetch_array($mngbolum))
	  {
	  $bolumlink = trim(str_replace(" ","_", $mngbolumcek["bolumadi"]));
	  	if($mngbolumcek["video"]=="video")
	{
		$linkadres="vbolum.php";
	}
	else{
		$linkadres="bolum.php";
	}
	  echo '<div class="chapter-item">
						<span class="chapter font-meta">
					<a href="'.$linkadres.'?id='.$mngbolumcek["bolumid"].'&'.$bolumlink.'""> '.$mngbolumcek["bolumadi"].' </a>
						</span>
							<span class="post-on font-meta">'.$mngbolumcek["yuklemetarihi"].'</span>
				    </div>';
	  
	  }
echo '
</div>
</div>
</div>
</div>
	';
}	
echo '
	 </div>
</div>
</div>
           
			</div>
         </div>
                            </div>
                        </div>
';
	
	
}
else if($tarihalindi=="") /*2*/
{
	
	$katislem=mysqli_query($con,"select * from kat where katid='$turalindi'");
	
	$turdegers=mysqli_query($con,"select * from turler where id='$turalindi'");

$turadial=mysqli_fetch_array($turdegers);
$turgoruntule=mysqli_num_rows($katislem);

	if($turgoruntule=="0")
{
	$bulanamadi='<font color="red"><center>Herhangi bir sonuç bulunamadı...</center></font>';
}
else{
	$bulanamadi='';
}

	
echo '
<div class="c-page">
                                <div class="entry-header">
                                    <div class="entry-header_wrap">
                                        <div class="entry-title">
                                            <h2 class="item-title">'.$turadial["adi"].' Listesi</h2>
                                        </div>
                                    </div>
                                </div>
								
                            <div class="c-page__content">
                                <div class="tab-wrap">
                                    <div class="c-blog__heading style-2 font-heading">
                                        <h4>
                              <i class="ion-ios-star"></i>['.$turgoruntule.'] Görüntülenen</h4>
										
<div class="c-nav-tabs">
    <span> Liste: </span>
    <ul class="c-tabs-content">
		 <li>
            <a href="list">
				Hepsi            </a>
        </li>
		 <li>
            <a href="?orderby=new-manga">
				Yeni            </a>
        </li>
        <li>
            <a href="?orderby=trending">
				Popüler            </a>
        </li>
        <li>
            <a href="?orderby=views">
				En Çok Görüntülenen  </a>
        </li>
    </ul>
</div>
                                    </div>
                                </div>
								
                                <div class="tab-content-wrap">
                                    <div role="tabpanel" class="c-tabs-item">
                                        <div class="page-content-listing">
											<div class="page-listing-item">
    <div class="row">
            ';
	echo $bulanamadi;		
	
				while($katsnc=mysqli_fetch_array($katislem))/* 3 değer alır*/
{
	$katessizidb=$katsnc["essizid"];
	$turislem=mysqli_query($con,"select * from manga where essizid='$katessizidb'");

	
		while($turgoster=mysqli_fetch_array($turislem))
{
	 $essizid=$turgoster["essizid"];
	 $mngbolum=mysqli_query($con,"select * from Bmanga where essizid='$essizid' ORDER BY bolumsirasi DESC LIMIT 2");
	echo'	
<div class="col-xs-12 col-md-6" style="margin-bottom:8px;">
<div class="page-item-detail">
<div id="manga-item-449" class="item-thumb hover-details c-image-hover" data-post-id="449">
<a href="manga.php?mg='.$turgoster["id"].'" title="">
<img data-src="uploads/'.$turgoster["kapak_resim"].'" class="img-responsive effect-fade lazyloaded" src="uploads/'.$turgoster["kapak_resim"].'" style="padding-top:150px;width:110px;height:150px" alt="'.$turgoster["ad"].' - izle.sukebeist.com">
</a>
</div>
<div class="item-summary">
<div class="post-title font-title">
<h5>
<span class="manga-title-badges new">YENİ</span>
<a href="manga.php?mg='.$turgoster["id"].'">'.$turgoster["ad"].'</a>
</h5>
</div>
<div class="meta-item rating">
<div class="post-total-rating">';

						/*rating işlemi dokunmayın*/
$mangaidget=$tumgoster["id"];
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
echo'
</div>
</div>
<div class="list-chapter">
';
	  while($mngbolumcek=mysqli_fetch_array($mngbolum))
	  {
	  $bolumlink = trim(str_replace(" ","_", $mngbolumcek["bolumadi"]));
	  	if($mngbolumcek["video"]=="video")
	{
		$linkadres="vbolum.php";
	}
	else{
		$linkadres="bolum.php";
	}
	  echo '<div class="chapter-item">
						<span class="chapter font-meta">
					<a href="'.$linkadres.'?id='.$mngbolumcek["bolumid"].'&'.$bolumlink.'""> '.$mngbolumcek["bolumadi"].' </a>
						</span>
							<span class="post-on font-meta">'.$mngbolumcek["yuklemetarihi"].'</span>
				    </div>';
	  
	  }
echo '
</div>
</div>
</div>
</div>
	';
}	
}
echo '
	 </div>
</div>
</div>
           
			</div>
         </div>
                            </div>
                        </div>
';

}
else{ /*3*/
	
	$katislem=mysqli_query($con,"select * from kat where katid='$turalindi'");
	
	$turdegers=mysqli_query($con,"select * from turler where id='$turalindi'");

$turadial=mysqli_fetch_array($turdegers);
$turgoruntule=mysqli_num_rows($katislem);

	if($turgoruntule=="0")
{
	$bulanamadi='<font color="red"><center>Herhangi bir sonuç bulunamadı...</center></font>';
}
else{
	$bulanamadi='';
}

	
echo '
<div class="c-page">
                                <div class="entry-header">
                                    <div class="entry-header_wrap">
                                        <div class="entry-title">
                                            <h2 class="item-title">'.$turadial["adi"].' Listesi</h2>
                                        </div>
                                    </div>
                                </div>
								
                            <div class="c-page__content">
                                <div class="tab-wrap">
                                    <div class="c-blog__heading style-2 font-heading">
                                        <h4>
                              <i class="ion-ios-star"></i>['.$turgoruntule.'] Görüntülenen</h4>
										
<div class="c-nav-tabs">
    <span> Liste: </span>
    <ul class="c-tabs-content">
		 <li>
            <a href="list">
				Hepsi            </a>
        </li>
		 <li>
            <a href="?orderby=new-manga">
				Yeni            </a>
        </li>
        <li>
            <a href="?orderby=trending">
				Popüler            </a>
        </li>
        <li>
            <a href="?orderby=views">
				En Çok Görüntülenen  </a>
        </li>
    </ul>
</div>
                                    </div>
                                </div>
								
                                <div class="tab-content-wrap">
                                    <div role="tabpanel" class="c-tabs-item">
                                        <div class="page-content-listing">
											<div class="page-listing-item">
    <div class="row">
            ';
	echo $bulanamadi;		
	
				while($katsnc=mysqli_fetch_array($katislem))/* 3 değer alır*/
{
	$katessizidb=$katsnc["essizid"];
	$turislem=mysqli_query($con,"select * from manga where essizid='$katessizidb' and YEAR(yayintarih)='$tarihalindi'");

	
		while($turgoster=mysqli_fetch_array($turislem))
{
	 $essizid=$turgoster["essizid"];
	 $mngbolum=mysqli_query($con,"select * from Bmanga where essizid='$essizid' ORDER BY bolumsirasi DESC LIMIT 2");
	echo'	
<div class="col-xs-12 col-md-6" style="margin-bottom:8px;">
<div class="page-item-detail">
<div id="manga-item-449" class="item-thumb hover-details c-image-hover" data-post-id="449">
<a href="manga.php?mg='.$turgoster["id"].'" title="">
<img data-src="uploads/'.$turgoster["kapak_resim"].'" class="img-responsive effect-fade lazyloaded" src="uploads/'.$turgoster["kapak_resim"].'" style="padding-top:150px;width:110px;height:150px" alt="'.$turgoster["ad"].' - izle.sukebeist.com">
</a>
</div>
<div class="item-summary">
<div class="post-title font-title">
<h5>
<span class="manga-title-badges new">YENİ</span>
<a href="manga.php?mg='.$turgoster["id"].'">'.$turgoster["ad"].'</a>
</h5>
</div>
<div class="meta-item rating">
<div class="post-total-rating">';

						/*rating işlemi dokunmayın*/
$mangaidget=$tumgoster["id"];
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
echo'
</div>
</div>
<div class="list-chapter">
';
	  while($mngbolumcek=mysqli_fetch_array($mngbolum))
	  {
	  $bolumlink = trim(str_replace(" ","_", $mngbolumcek["bolumadi"]));
	  	if($mngbolumcek["video"]=="video")
	{
		$linkadres="vbolum.php";
	}
	else{
		$linkadres="bolum.php";
	}
	  echo '<div class="chapter-item">
						<span class="chapter font-meta">
					<a href="'.$linkadres.'?id='.$mngbolumcek["bolumid"].'&'.$bolumlink.'""> '.$mngbolumcek["bolumadi"].' </a>
						</span>
							<span class="post-on font-meta">'.$mngbolumcek["yuklemetarihi"].'</span>
				    </div>';
	  
	  }
echo '
</div>
</div>
</div>
</div>
	';
}	
}
echo '
	 </div>
</div>
</div>
           
			</div>
         </div>
                            </div>
                        </div>
';
}




 ?>
						
						

						
                        
                    </div>
				<div class="ad c-ads custom-code body-bottom-ads"><img src="img/ads-1.jpg" alt="ads" style=""></div>
                </div>
				                

								<div class="sidebar-col col-md-4 col-sm-4">
							        <div id="main-sidebar" class="main-sidebar" role="complementary">
			
		<div class="row">
			<div id="manga-recent-4" class="widget col-xs-12 col-md-12   bordered  no-icon heading-style-1 c-popular manga-widget widget-manga-recent">
			<div class="widget__inner c-popular manga-widget widget-manga-recent__inner c-widget-wrap">
            <div class="c-widget-content style-1 with-button">
				<div class="widget-heading font-nav"><h5 class="heading">Hentai Ara</h5></div>
				
				<div class="widget-content">                        

				<form class="example"  action="search" method="GET" > 

<input type="text" name="V" placeholder="Ara ..."> 
					
						 <button type="submit"><i class="fa fa-search"></i></button>
			
					
					</form>
				
            </div>
			</div>
			</div>
			</div>
			</div>		
<div class="row">
			<div id="manga-recent-4" class="widget col-xs-12 col-md-12   bordered  no-icon heading-style-1 c-popular manga-widget widget-manga-recent">
			<div class="widget__inner c-popular manga-widget widget-manga-recent__inner c-widget-wrap">
            <div class="c-widget-content style-1 with-button">
				<div class="widget-heading font-nav"><h5 class="heading">Hentai ROBOTU</h5></div>
				
				<div class="widget-content">                        

				<form  action="animerobot" method="GET" > 
<div class="filter">
<select name="date" id="date">
	<option value="">- Tarih -</option>
		<option value="2019">2019</option>
		<option value="2018">2018</option>
		<option value="2017">2017</option>
		<option value="2016">2016</option>
		<option value="2015">2015</option>
		<option value="2014">2014</option>
		<option value="2013">2013</option>
		<option value="2012">2012</option>
		<option value="2011">2011</option>
		<option value="2010">2010</option>
		<option value="2009">2009</option>
		<option value="2008">2008</option>
		<option value="2007">2007</option>
		<option value="2006">2006</option>
		<option value="2005">2005</option>
		<option value="2004">2004</option>
		<option value="2003">2003</option>
		<option value="2002">2002</option>
		<option value="2001">2001</option>
		<option value="2000">2000</option>

	</select>
</div>
<div class="filter">
<select name="kat" id="kat">
	<option value="">- Kategori -</option>
	<?php
		 $mglisttur=mysqli_query($con,"select * from turler");
										 while($mglistturrow=mysqli_fetch_array($mglisttur)){
											  echo '
											  <option value="'.$mglistturrow["id"].'">'.$mglistturrow["adi"].'</option>
										 ';
											 }
	?>
		

	</select>
</div>
<div class="filter">
<select name="puan" id="puan">
	<option value="">- Puanı -</option>
	<option value="5">5+</option>
	<option value="4">4+</option>
	<option value="3">3+</option>
	<option value="2">2+</option>
	<option value="1">1+</option>
</select>
<div id="filmtoken"></div>
</div>
<div class="submit" style="display: flex;justify-content: space-between;">
<span class="c-wg-button-wrap">
						<input class="widget-view-more" style="float:left;" type="submit" value="Hentai Getir">
						<button class="widget-view-more" type="reset">Sıfırla</button>
                    </span>
</div>
					
					
					</form>
				
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
				        <a class="widget-view-more" href="list?orderby=trending">Tüm Popüler Animeler</a>
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
           
	 </div> 
	 </div>		 
<?php include("view/modal.php"); ?>
			
        <footer class="site-footer" style="background-color: #F3F3F3;">
<?php include("view/footer.php"); ?>
        </footer>	
</body>
</html>