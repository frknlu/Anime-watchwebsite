<?php include("baglanti.php");

$bolumid=$_GET["id"];

$bolumislem=mysqli_query($con,"select * from bolum where bolumid='$bolumid' ORDER BY sira ASC");


$bolumoku=mysqli_query($con,"select * from Bmanga where bolumid='$bolumid'");
$boku=mysqli_fetch_array($bolumoku);

$siteresult=mysqli_query($con,"SELECT * FROM setting");
$setting = mysqli_fetch_array($siteresult,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
  
<title><?php echo $boku["bolumadi"] ?> - <?php echo $setting["title"];?></title>

  <link rel="stylesheet" href="css/swiper.css">
  

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  
<link rel="stylesheet" id="bootstrap-css" href="css/bootstrap.min.css?ver=4.9.6" type="text/css" media="all">
<script type="text/javascript" src="css/bootstrap.min.js"></script>

  <script type="text/javascript" src="css/jquery.js"></script>
<script type="text/javascript" src="css/jquery-migrate.min.js"></script>

</head>

 <style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #222222;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
  </style>

<body>


	<div class="row">
	<div style="color:white;text-align:center">	
                         <div style="display:inline-flex; ">
			
					<div class="col-sm-2">
						   <ul class="pager">
                                <li class="previous">
                                    <a href="/" >Anasayfa</a>
                                </li>
                            </ul>
							</div>	 
							
						<div class="col-sm-5">
						   <ul class="pager">
                                <li class="previous">
                                    <a href="/" >Önceki Bölüm</a>
                                </li>
                            </ul>
							</div>	
						 
                           <div class="col-sm-3">
						   <ul class="pager once">
                                <li class="previous">
                                    <a href="" class="prev">« Geri</a>
                                </li>
                            </ul>
							</div>
							
<div class="col-sm-2">
<ul class="pager">
Sayfa <div class="swiper-pagination"></div>
</ul>
</div>
                   <div class="col-sm-3">
                          <ul class="pager sonra">
                                <li class="nextg">
                                    <a href=""  class="next">İleri »</a>
                                </li>
                            </ul>
							</div>
							
					<div class="col-sm-5">
						   <ul class="pager">
                                <li class="previous">
                                    <a href="/" >Sonraki Bölüm</a>
                                </li>
                            </ul>
							</div>
							
					<div class="col-sm-2">		
					<div style="display: inline-block;padding: 5px 14px;background-color: #fff;border: 1px solid #ddd;border-radius: 15px;color:black;" class="pull-right pager">
					<i class="fa-2x fa fa-arrows-alt" alt="Büyük Ekran" aria-hidden="true" onclick="toggleFullScreen()"></i>
				    </div>
					</div>
							
							
							
                         </div>	 
			</div> 
         </div>
		 
<div class="container">

  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
	
<?php 
while($blmsnc=mysqli_fetch_array($bolumislem))
{
	
	echo '
	<div class="swiper-slide" data-hash="'.$blmsnc["sira"].'"> 
	  <img class="responsive-img" src="bolum/'.$blmsnc["url"].'" />
	  </div>
	  
	';
}
?>

	  
	  
	  
    </div>
  </div>
  
  <div class="row">
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



<!-- Swiper JS -->
  <script src="css/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      hashNavigation: {
        watchState: true,
      }, 
     coverflowEffect: {
     rotate: 30,
     slideShadows: false,
      },
      pagination: {
         el: '.swiper-pagination',
        type: 'fraction',
      },
      navigation: {
        nextEl: '.nextg',
        prevEl: '.prev',
      },
    });
  </script>
  <script>
  function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}
  </script>
  

</body>
</html>