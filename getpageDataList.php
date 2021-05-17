<?php
require_once("baglanti.php");
 
if (! (isset($_GET['pageNumber']))) {
    $pageNumber = 1;
} else {
    $pageNumber = $_GET['pageNumber'];
}
 
$perPageCount = 20;
 
 
if ($result = mysqli_query($con, "select * from manga WHERE 1")) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}
 
$pagesCount = ceil($rowCount / $perPageCount);
 
$lowerLimit = ($pageNumber - 1) * $perPageCount; 

$manga=mysqli_query($con,"select * from manga WHERE 1 ORDER BY guncellemetarihi ASC limit ".($lowerLimit).",".($perPageCount)." ");
 
$tummanga=mysqli_query($con,"select * from manga");
$mangasayisi=mysqli_num_rows($tummanga);

echo '
<div class="c-page">
                                <div class="entry-header">
                                    <div class="entry-header_wrap">
                                        <div class="entry-title">
                                            <h2 class="item-title">Anime Listesi</h2>
                                        </div>
                                    </div>
                                </div>
								
                            <div class="c-page__content">
                                <div class="tab-wrap">
                                    <div class="c-blog__heading style-2 font-heading">
                                        <h4>
                              <i class="ion-ios-star"></i>['.$mangasayisi.'] Görüntülenen</h4>
										
<div class="c-nav-tabs">
    <span> Liste: </span>
    <ul class="c-tabs-content">
		 <li class="active">
            <a href="list">
				Hepsi            </a>
        </li>
		 <li>
            <a href="?orderby=new-anime">
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
 
	while($tumgoster=mysqli_fetch_assoc($manga))
  {
	  
	  	 $essizid=$tumgoster["essizid"];
	 $mngbolum=mysqli_query($con,"select * from Bmanga where essizid='$essizid' ORDER BY bolumsirasi DESC LIMIT 2");
	echo'	
<div class="col-12 col-md-6" style="margin-bottom:8px;">
<div class="page-item-detail">
<div class="item-thumb hover-details c-image-hover">
<a href="anime?mg='.$tumgoster["id"].'" title="">
<img data-src="uploads/'.$tumgoster["kapak_resim"].'" class="img-responsive effect-fade lazyloaded" src="uploads/'.$tumgoster["kapak_resim"].'" style="padding-top:150px;width:110px;height:150px" alt="'.$tumgoster["ad"].' - izle.sukebeist.com">
</a>
</div>
<div class="item-summary">
<div class="post-title font-title">
<h5>
<!--<span class="manga-title-badges new">YENİ</span>-->
<a href="anime?mg='.$tumgoster["id"].'">'.$tumgoster["ad"].'</a>
</h5>
</div>
<div class="meta-item rating">
<div class="post-total-rating">
';

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
	
	$newDate = date("d-m-Y", strtotime($mngbolumcek["yuklemetarihi"]));
	$mngbolumad = substr($mngbolumcek["bolumadi"], 0, 19);
	  echo '<div class="chapter-item">
						<span class="chapter font-meta">
					<a href="'.$linkadres.'?id='.$mngbolumcek["bolumid"].'&'.$bolumlink.'"">'.$mngbolumad.'.. </a>
						</span>
							<span class="post-on font-meta">'.$newDate.'</span>
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

  ?>
  
<table width="50%" align="center">
    <tr>
 
        <td valign="top" align="center">
            <?php
	for ($i = 1; $i <= $pagesCount; $i ++) {
    if ($i == $pageNumber) {
        ?> <a href="javascript:void(0);" class="current">
                <?php echo $i ?>
        </a> <?php
    } else {
        ?> <a href="javascript:void(0);" class="pages"
            onclick="showRecords('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');">
                <?php echo $i ?>
        </a> <?php
    } // endIf
} // endFor
 
?>
        </td>
        <td align="right" valign="top">Sayfa <?php echo $pageNumber; ?>
             Toplam <?php echo $pagesCount; ?>
        </td>
    </tr>
</table>