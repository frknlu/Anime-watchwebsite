<?php
require_once("baglanti.php");
 
if (! (isset($_GET['pageNumber']))) {
    $pageNumber = 1;
} else {
    $pageNumber = $_GET['pageNumber'];
}
 
$perPageCount = 12;
 
 
if ($result = mysqli_query($con, "select * from manga WHERE 1")) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}
 
$pagesCount = ceil($rowCount / $perPageCount);
 
$lowerLimit = ($pageNumber - 1) * $perPageCount; 

$Bmanga=mysqli_query($con,"select * from Bmanga WHERE 1 ORDER BY yuklemetarihi DESC limit ".($lowerLimit).",".($perPageCount)." ");
 
 /*ORDER BY guncellemetarihi ASC LIMIT 12*/
 
	while($Bmangacek=mysqli_fetch_assoc($Bmanga))
  {
	  
	  $essizid=$Bmangacek["essizid"];
	 
	  $mngbolum=mysqli_query($con," select * from manga WHERE essizid='$essizid'");

	  
	    while($mangacek=mysqli_fetch_array($mngbolum))
	  {
		  
	  if($Bmangacek["video"]=="video")
	{
		$linkadres="vbolum.php";
	}
	else{
		$linkadres="bolum.php";
	}
	
	 $bolumlink = trim(str_replace(" ","_", $Bmangacek["bolumadi"]));
	  
	  echo '
		
        <div class="col-6 col-md-3">
            <div class="page-item-detail">

                <div class="item-thumb hover-details c-image-hover">
				<div id="imageContainer">
		        <a href="'.$linkadres.'?id='.$Bmangacek["bolumid"].'&'.$bolumlink.'"" title="'.$Bmangacek["bolumadi"].'">
					<img id="resim" style="width:175px;height:238px;max-height: 238px;min-height: 238px;" data-src="uploads/'.$mangacek["kapak_resim"].'" class="img-responsive effect-fade lazyloaded" src="uploads/'.$mangacek["kapak_resim"].'" alt="'.$mangacek["ad"].' - izle.sukebeist.com">
					<p id="yazi">
        '.$Bmangacek["bolumsirasi"].' BÖLÜM 
    </p>
						<p id="yazialt">
        '.$Bmangacek["bolumadi"].'  
    </p>
				</a>
				</div>			
</div>				
			 </div>
         </div>
              
                
                    

		';
	  }
  }
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