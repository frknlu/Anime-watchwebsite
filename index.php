<?php include("baglanti.php");
$siteresult=mysqli_query($con,"SELECT * FROM setting");
$setting = mysqli_fetch_array($siteresult,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
   


<title><?php echo $setting["title"];?></title>
<meta name="description" content="<?php echo $setting["description"];?>">
<meta name="keywords" content="<?php echo $setting["keywords"];?>">

<script
    src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

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

.pages {
    padding: 10px 14px;
    color: #000000;
    border-radius: 50%;
    background: #CCC;
    text-decoration: none;
    margin: 0px 6px;
    font-size: 0.9em;
}

.pages:hover {
    color: #ffffff;
    background: #666;
}

.current {
    padding: 10px 14px;
    color: #ffffff;
    background: #EE4147;
    text-decoration: none;
    border-radius: 50%;
    margin: 0px 6px;
}

body.page .c-page-content .c-page .c-page__content .page-content-listing .page-listing-item .page-item-detail .item-thumb {
  width: 170px;!immortant
  float: left;
  overflow: hidden;
  margin-right: 20px;
}

#imageContainer
{
    height:238px;
    position:relative;
}

#resim
{    
    position:absolute;
    left:0;
    top:0;
}
#yazi
{
    z-index:100;
    position:absolute;    
    color:#FFF;
    font-size:24px;
    font-weight:bold;
    left:20px;
    top:1px;
	background-color: #9f9f9f5c;
}
#yazialt
{
    z-index:100;
    position:absolute;    
    color:#FFF;
    font-size:13px;
    font-weight:bold;
    left:20px;
    top:1px;
	background-color: #9f9f9f5c;
	margin-top: 5.3cm;
    margin-left: -0.5cm;
}

* {
  box-sizing: border-box;
}

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

<body class="home page-template page-template-page-templates page-template-front-page page-template-page-templatesfront-page-php page page-id-12 header-style-1 sticky-enabled sticky-style-2 is-sidebar text-ui-dark wpb-js-composer js-comp-ver-5.4.2 vc_responsive" style="margin-bottom: 0px;">



<div class="wrap">
    <div class="body-wrap" style="background-color: #f3f3f3;">
        <header class="site-header">
           
<?php include("view/header.php"); ?>

<!-- Button trigger modal -->


<div class="clone-header" style="height: 0px;"></div>
</header>

<div class="site-content">

    <div class="c-page-content style-1">
        <div class="content-area" style="margin-top: 50px">
            <div class="container">
                <div class="row ">

                    <div class="main-col col-md-8 col-sm-8">
                        <div class="main-col-inner c-page">

<div class="c-blog__heading style-2 font-heading ">
<h4><i class="ion-ios-star"></i>EN SON YÜKLENENLER</h4>
</div>
							
<div class="c-blog-listing c-page__content manga_content">
<div class="c-blog__inner">
<div class="c-blog__content">

<div id="loop-content" class="page-content-listing item-big_thumbnail">

<div class="page-listing-item">
            <div id="results"></div>
            <div id="loader"></div>
</div>											

</div>

			
                                    </div>
                                </div>
                            </div>

                        </div>


						<div class="ad c-ads custom-code body-bottom-ads"><?php echo $setting["reklam1"]; ?></div>

						
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
        <a title="Manga Video Chapters" href="anime?mg='.$mangacekpop["id"].'">
			<img width="75" height="106" data-src="uploads/'.$mangacekpop["kapak_resim"].'" class="img-responsive effect-fade lazyloaded" src="uploads/'.$mangacekpop["kapak_resim"].'" style="padding-top:106px; " >
			</a>
    </div>

<div class="popular-content">
    <h5 class="widget-title">
        <a title="manga adi" href="anime?mg='.$mangacekpop["id"].'">'.$mangacekpop["ad"].'</a>
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
</div>		
	 
	 
	 
	 <?php include("view/modal.php"); ?>
	 

			
        <footer class="site-footer" style="background-color: #F3F3F3;">
<?php include("view/footer.php"); ?>
        </footer>

		<script type="text/javascript">
    function showRecords(perPageCount, pageNumber) {
        $.ajax({
            type: "GET",
            url: "getpageData.php",
            data: "pageNumber=" + pageNumber,
            cache: false,
    		beforeSend: function() {
                $('#loader').html('<img src="img/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">');
    			
            },
            success: function(html) {
                $("#results").html(html);
                $('#loader').html(''); 
            }
        });
    }
    
    $(document).ready(function() {
        showRecords(10, 1);
    });
</script>
		
</body>
</html>