 <div class="c-header__top">
                
                <div class="main-navigation style-1 ">
                    <div class="container ">
                        <div class="row" style="height: 70px;">
                            <div class="col-md-12">
                                <div class="main-navigation_wrap">
                                    <div class="wrap_branding">
                                        <a class="logo" href="/" title="">
										<img class="img-responsive" src="img/logo.png" alt="izle.sukebeist.com">
                                        </a>
                                    </div>

<div class="main-menu">
<ul class="nav navbar-nav main-navbar">


<li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23">
<a href="/">Anasayfa</a></li>

<li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23">
<a href="list">Hentai Listesi</a></li>

<li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23">
<a href="/?" target="_blank">Manga Oku</a></li>

				
</ul>    
</div>

<!-- -->

<div class="search-navigation search-sidebar">

		
			<div id="manga-search-3" class="widget col-xs-12 col-md-12 default">
			
		<div class="search-navigation__wrap" style="width: 180px;color: white;">

		<?php 
		
		 session_start();
 if(!isset($_SESSION['login'])){
echo '<div class="link-adv-search">
<i class="fas fa-sign-in-alt"></i>
				<a href="javascript:void(0)" data-toggle="modal" data-target="#form-login" class="btn-active-modal">GİRİŞ YAP</a>
			</div>
		    <div class="link-adv-search">
			<i class="fa fa-registered" aria-hidden="true"></i>
				<a href="javascript:void(0)" data-toggle="modal" data-target="#form-sign-up" class="btn-active-modal">KAYIT OL</a>
			</div>
			';
 }
 else{
	 if(!isset($_SESSION["user"]))
	 {
		 header("Refresh:0; url=logout.php");
	 }
	 $kulbul=$_SESSION["user"];
	 $k=mysqli_query($con,"select * from users where email='$kulbul' or kullaniciadi='$kulbul'");
	 $kulbilgi=mysqli_fetch_array($k);
	 
	 echo'
<img style="max-width:50px;position: absolute;margin-left: 20px;" src="'.$kulbilgi["uyeresim"].'" class="img-circle">

	 <div class="main-menu">
<ul class="nav navbar-nav main-navbar">
<li id="menu-item-596" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-596">
<a href="#">'.$kulbilgi["kullaniciadi"].'</a>
<ul class="sub-menu">
	<li id="menu-item-595" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-595">
	<a href="hesabim.php#account"><i class="fa fa-id-card" aria-hidden="true"></i> Hesabım</a></li>
	<li id="menu-item-594" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-594">
	<a href="hesabim.php#boomarks"><i class="fa fa-bookmark" aria-hidden="true"></i> Listem</a></li>
	
	<li id="menu-item-594" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-594">
	<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Çıkış Yap</a></li>
</ul>
</li>			
</ul>    
</div>';
 }
		?>
		


		
		</div>
		</div>

		
    </div>
	
	<!--Mobil Menü-->


    <div class="c-togle__menu">
        <button type="button" class="menu_icon__open">
            <span></span> <span></span> <span></span>
        </button>
    </div>

	
	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>