<?php
//index.php

session_start();

if (!$_SESSION['username'] || !$_SESSION['avatar'])
{
    header('Location: login.php');
}


$connect = new PDO("mysql:host=localhost;dbname=gpro", "root", "");
$connect->query("SET NAMES utf8 COLLATE utf8_polish_ci");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>TABEX-OZMO</title>
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
		.popover
		{
		    width: 100%;
			max-width: 600px;
		}
		/* Top Styles */

		#top{
			background: #555555;
			padding: 10px 0;
		}
		#top .offer{
			color: #ffffff;
		}
		#top .offer .btn{
			text-transform: uppercase;
		}
		@media(max-width: 991px){
			#top .offer{
				margin-bottom: 10px;
			}
		}
		@media(max-width: 991px){
			#top{
				font-size: 12px;
				text-align: center;
			}
		}
		#top a{
			color: #ffffff;
		}
		#top ul.menu{
			padding-top: 5px;
			margin: 0px;
			text-align: right;
			font-size: 12px;
			list-style: none;
		}
		@media(max-width: 991px){
			#top ul.menu{
				text-align: center;
			}
		}
		#top ul.menu > li{
			display: inline-block;
		}
		#top ul.menu > li a{
			color: #eeeeee;
		}
		#top ul.menu > li + li:before{
			content: "|\00a0";
			color: #f7f7f7;
			padding: 0 5px;
		}
		/* Header Styles */

		.navbar{
			background: url(images/liscie_spadajace.gif);
		}
		.navbar-collapse .right{
			float: right;
		}
		.navbar-brand{
			float: left;
			padding: 10px 15px;
			font-size: 18px;
			line-height: 20px;
			height: 70px;
		}
		.navbar-brand:hover,
		.navbar-brand:focus{
			text-decoration: none;
		}
		.navbar ul.nav > li > a{
			text-transform: uppercase;
			font-weight: bold;
			font-size: 14px;
		}
		.navbar ul.nav > li > a:hover{
			background: #e7e7e7;
		}
		.padding-nav{
			padding-top: 10px;
		}
		.btn-primary{
			color: rgb(255, 255, 255);
			background: rgb(79, 191, 168);
			border-color: rgb(65, 179, 156);
		}
		#search .navbar-form{
			float: right;
		}
		#search{
			clear: both;
			border-top: solid 1px #9adacd;
			text-align: right;
		}
		#search .navbar-form .input-group{
			display: table;
		}
		#search .navbar-form .input-group .form-control{
			width: 100%;
		}
		#slider{
			margin-bottom: 20px;
			width: 100%;
			height: 100%;
		}
		.searchproduct {
			border: 1px solid grey;
			border-radius: 2px;
			font-weight: bold;
			color: grey;
			height: 30px;
		}
		.carousel-inner .item img {
			width: 100%;
			height: 500px;
		}
		#infonav {
			margin: 0;
		}
		.info-carts {
			color: grey;
			text-decoration: none;
			font-weight: bold;
			font-size: 20px;
		}
		.navinfoot {
			border: 1px solid grey;
			width: 100%;
			border-radius: 20px;
			padding: 10px;
		}
		.navinfoot a {
			text-decoration: none;
		}
		/* advantages Styles */

		#advantages{
			text-align: center;
			margin-top: 20px;
		}
		.box{
			background: #ffffff;
			margin: 0 0 30px;
			border: solid 1px #e6e6e6;
			box-sizing: border-box;
			padding: 20px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
		}
		#advantages .box .icon{
			position: absolute;
			font-size: 120px;
			width: 100%;
			text-align: center;
			top: -20px;
			left: 0px;
			height: 100%;
			float: left;
			color: #dadada;
			box-sizing: border-box;
			z-index: 1;
		}
		#advantages .box h3{
			position: relative;
			margin: 0 0 20px;
			font-weight: 300;
			text-transform: uppercase;
			z-index: 2;
		}
		#advantages .box h3 a{
			color: grey;
		}
		#advantages .box h3 a:hover{
			text-decoration: none;
		}
		#advantages .box p{
			position: relative;
			z-index: 2;
			color: #555555;
		}

		/* Latest Products Styles */
		#hot {
			margin-top: 20px;
		}

		#hot h2{
			font-size: 36px;
			font-weight: 400;
			color: grey;
			text-align: center;
			text-transform: uppercase;
		}
		#content{
		padding-left: 25px; 
		}
		.popover-title {
			background: #555555;
			color: white;
		}
		.popover-content {
			background: grey;
		}
		.position-me {
			position: relative;
			top: 160px;
			text-align: center;
		}
		.text-info {
			background: rgba(0, 0, 0, .6);
			padding: 5px;
			color: white;
			border-radius: 5px;
		}
		.text-danger {
			background: rgba(0, 0, 0, .6);
			padding: 5px;
			color: white;
			border-radius: 5px;
		}
        .menu a img {
            background: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
		}
		.btnlogout{
			background: none;
			border-style: none;
		}
		.breadcrumb {
			box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
			color: grey;
			font-weight: bold;
		}
		.sidebar-menu {
			color: grey;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
		}
		.sidebar-menu .panel-heading {
			background: #555555;
			color: white;
		}
		.sidebar-menu .panel-body li a {
			color: grey;
		}
		.slide1 {
			height: 400px;
		}
		.slide1 .carousel-caption img {
			width: 200px;
			height: 300px;
			box-shadow: 0 2px 5px 0 rgba(0,0,0,0.5),
              0 2px 10px 0 rgba(0,0,0,0.5); 
		}
		.slide1 .item {
			height: 390px;
		}
		.slide1 .carousel-indicators li {
			background: grey;
		}
		.border-one {
			width: 100%;
		}
		.border-one .media {
			width: 80%;
			margin: 10px auto;
			border-bottom: 1px solid grey;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
			padding: 5px;
		}
		.border-one .media .media-left img {
			border: 1px solid grey;
		}
		.border-one .formopin {
			width: 80%;
			margin: 0 auto;
		}
		</style>
	</head>
	<body>

	<div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <span>Kontakt: +48 546 345 231</span>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
						<form action="logoutshop.php" method="post">
							<button type="submit" name="logoutshop" class="btnlogout"><a>Wyloguj</a></button>
						</form>
                   </li>
                   <li>
                       	<a href="profile.php"><img src="images/<?php echo $_SESSION['avatar']; ?>"> <?php echo $_SESSION['username']; ?></a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->



   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/logo.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li class="active">
                           <a href="shop.php">Sklep</a>
                       </li>
                       <li>
                           <a href="pricespace.php">Galeria</a>
					   </li>
                       <li>
                           <a href="contact.php">Kontakt</a>
					   </li>
					   <li>
							<a id="cart-popover" class="btn" data-placement="bottom" title="Koszyk">
								<span class="glyphicon glyphicon-shopping-cart"></span>
								<span class="badge"></span>
								<span class="total_price">zł 0.00</span>
							</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
					<button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search" style="background: grey;"><!-- btn btn-primary navbar-btn Begin -->

						<i class="fa fa-search"></i>
						
					</button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search" style="border-top: 1px solid grey;"><!-- collapse clearfix Begin -->
                   
                   <form method="post" action="" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control searchinput" placeholder="Szukaj" name="searchme" id="searchme" required>
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->


   <div class="container" id="slider"><!-- container Begin -->
       
       <div class="col-md-14"><!-- col-md-12 Begin -->
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol><!-- carousel-indicators Finish -->
               
               <div class="carousel-inner"><!-- carousel-inner Begin -->
                   
                   <div class="item active">
                       
                       <img src="images/s2.jpg" alt="Slider Image 1">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="images/klin_szamotowy.jpg" alt="Slider Image 2">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="images/zaprawa_szamotowa.jpg" alt="Slider Image 3">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="images/ksztaltka_andaluzytowa.png" alt="Slider Image 4">
                       
                   </div>
                   
               </div><!-- carousel-inner Finish -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a><!-- left carousel-control Finish -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a><!-- left carousel-control Finish -->
               
           </div><!-- carousel slide Finish -->
           
       </div><!-- col-md-12 Finish -->
       
   </div><!-- container Finish -->

		<div class="container">

		<div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       Produkty
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
		   <div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
			<div class="panel-heading"><!-- panel-heading Begin -->
				<h3 class="panel-title">Wymiary</h3>
			</div><!-- panel-heading Finish -->
			
			<div class="panel-body"><!-- panel-body Begin -->
				<ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->
					
					<?php
						$query = "SELECT DISTINCT type from tbl_product GROUP by type ORDER BY type";
						$query1 = "SELECT DISTINCT category from tbl_product GROUP by type ORDER BY category";
						$query2 = "SELECT DISTINCT recommended from tbl_product GROUP by type ORDER BY recommended";
						$statement = $connect->prepare($query);
						$statement1 = $connect->prepare($query1);
						$statement2 = $connect->prepare($query2);
						$statement->execute();
						$statement1->execute();
						$statement2->execute();
						$result = $statement->fetchAll();   
						$result1 = $statement1->fetchAll(); 
						$result2 = $statement2->fetchAll();             
					?>

                    <?php
                        foreach($result as $row)
                        {
                    ?>

					<li><a><input type="checkbox" class="radiobtn" id="typeradio" onClick="" name="typeradio" value="<?php echo $row['type']; ?>"> <?php echo $row['type']; ?> </a></li>
					
					<?php
                    }
                ?>

				</ul><!-- nav nav-pills nav-stacked category-menu Finish -->
			</div><!-- panel-body Finish -->
			
		</div><!-- panel panel-default sidebar-menu Finish -->


		<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
			<div class="panel-heading"><!-- panel-heading Begin -->
				<h3 class="panel-title">Kategorie</h3>
			</div><!-- panel-heading Finish -->
			
			<div class="panel-body"><!-- panel-body Begin -->
				<ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->
					
					<?php
                        foreach($result1 as $row)
                        {
                    ?>

					<li><a><input type="checkbox" class="radiobtn" id="categoryradio" onClick="" name="categoryradio" value="<?php echo $row['category']; ?>"> <?php echo $row['category']; ?> </a></li>
					
					<?php
                    	}
                	?>

				</ul><!-- nav nav-pills nav-stacked category-menu Finish -->
			</div><!-- panel-body Finish -->
			
		</div><!-- panel panel-default sidebar-menu Finish -->

		<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
			<div class="panel-heading"><!-- panel-heading Begin -->
				<h3 class="panel-title">Polecane</h3>
			</div><!-- panel-heading Finish -->
			
			<div class="panel-body"><!-- panel-body Begin -->
				<ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->
					
					<?php
                        foreach($result2 as $row)
                        {
                    ?>

					<li><a><input type="checkbox" class="radiobtn" id="recommendedradio" onClick="" name="recommendedradio" value="<?php echo $row['recommended']; ?>"> <?php echo $row['recommended']; ?> </a></li>

					<?php
                    	}
                	?>
					
				</ul><!-- nav nav-pills nav-stacked category-menu Finish -->
			</div><!-- panel-body Finish -->
			
		</div><!-- panel panel-default sidebar-menu Finish -->
               
           </div><!-- col-md-3 Finish -->

			<div id="popover_content_wrapper" style="display: none">
				<span id="cart_details"></span>
				<div align="right">
					<button class="btn btn-primary" id="check_out_cart" name="order">
						<span class="glyphicon glyphicon-shopping-cart"></span> Kup
					</button>
					<!--
					<a href="#" class="btn btn-primary" id="check_out_cart" name="order">
					<span class="glyphicon glyphicon-shopping-cart"></span> Kup
					</a>
					-->
					<a href="#" class="btn btn-default" id="clear_cart">
					<span class="glyphicon glyphicon-trash"></span> Usuń
					</a>
				</div>
			</div>

			<div id="display_item">
						

			</div>
			
		</div>


		<div id="hot"><!-- #hot Begin -->
       
       <div class="box"><!-- box Begin -->
           
           <div class="container"><!-- container Begin -->
               
               <div class="col-md-12"><!-- col-md-12 Begin -->
                   
                   <h2>
                       U nas!
                   </h2>
                   
               </div><!-- col-md-12 Finish -->
               
           </div><!-- container Finish -->
           
       </div><!-- box Finish -->
       
   </div><!-- #hot Finish -->

		<div id="advantages"><!-- #advantages Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="same-height-row"><!-- same-height-row Begin -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-heart"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Najlepsza oferta</a></h3>
                       
                       <p>Najlepsze materiały, sprawdź wymiary lub zamów własne. Wszystko tylko tutaj. Przekonaj się sam.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-tag"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Najlepsze ceny</a></h3>
                       
                       <p>Najlepsze ceny, potwierdzone przez dokładne zbadanie rynku.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-thumbs-up"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">100% Jakości</a></h3>
                       
                       <p>100% jakość materiałów ogniotrwałych. Najlepsza obsługa. Sprawdź sam.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
           </div><!-- same-height-row Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- #advantages Finish -->


   <div id="hot"><!-- #hot Begin -->
       
       <div class="box"><!-- box Begin -->
           
           <div class="container"><!-- container Begin -->
               
               <div class="col-md-12"><!-- col-md-12 Begin -->
                   
                   <h2>
                       Proponowane
                   </h2>
                   
               </div><!-- col-md-12 Finish -->
               
           </div><!-- container Finish -->
           
       </div><!-- box Finish -->
       
   </div><!-- #hot Finish -->


<div id="carousel-example-generic" class="carousel slide slide1" data-ride="slide1">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <!-- Slider content (slider wrap)-->
  <div class="carousel-inner">
    <div class="item active">

      <div class="carousel-caption">
	  <img src="images/kli_szamotowy_2.jpg" alt="...">
	  <img src="images/klin_szamotowy.jpg" alt="...">
	  <img src="images/ksztaltka_wieloszamotowa_2.jpg" alt="...">
      </div>
	</div>
	<div class="item">

      <div class="carousel-caption">
	  <img src="images/ksztaltka_wieloszamotowa.jpg" alt="...">
	  <img src="images/plytka_szamotowa.jpg" alt="...">
	  <img src="images/prostka_izolacyjna_perlit.jpg" alt="...">
      </div>
	</div>
	<div class="item">

      <div class="carousel-caption">
	  <img src="images/plyta_szamotowa_fenixus.jpg" alt="...">
	  <img src="images/tkanina_izolacyjna.jpg" alt="...">
	  <img src="images/tkanina_ogniotrwala.jpg" alt="...">
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>


		<!-- Footer -->
		<footer class="page-footer font-small unique-color-dark" style="margin-top: 20px; background-color: grey;">

		<div style="background-color: #555555; padding: 10px; color: white;">
		<div class="container">

			<!-- Grid row-->
			<div class="row py-4 d-flex align-items-center">

			<!-- Grid column -->
			<div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
				<h6 class="mb-0">Możesz się z nami skontaktować za pomocą medi społecznościowych!</h6>
			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-md-6 col-lg-7 text-center text-md-right">

				<!-- Facebook -->
				<a class="fb-ic" href="" style="color: white; font-size: 25px; text-decoration: none;">
				<i class="fa fa-facebook"> </i>
				</a>
				<!-- Twitter -->
				<a class="tw-ic" href="" style="color: white; font-size: 25px; text-decoration: none;">
				<i class="fa fa-twitter"> </i>
				</a>
				<!-- yt +-->
				<a class="gplus-ic" href="" style="color: white; font-size: 25px; text-decoration: none;">
				<i class="fa fa-youtube"> </i>
				</a>
				<!--Instagram-->
				<a class="ins-ic" href="" style="color: white; font-size: 25px; text-decoration: none;">
				<i class="fa fa-instagram"> </i>
				</a>

			</div>
			<!-- Grid column -->

			</div>
			<!-- Grid row-->

		</div>
		</div>
	
		<!-- Footer Links -->
		<div class="container text-center text-md-left mt-5" style="padding: 40px;">

		<!-- Grid row -->
		<div class="row mt-3">

			<!-- Grid column -->
			<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" style="color: white;">

			<!-- Content -->
			<h6 class="text-uppercase font-weight-bold">TABEX-OZMO</h6>
			<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
			<p>Jest to sklep internetowy oferujący materiały ogniotrwałe. Działamy nieprzerwanie od 2002 roku dając wam produkty najwyższej jakości.</p>

			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" style="color: white;">

			<!-- Links -->
			<h6 class="text-uppercase font-weight-bold">Produkty</h6>
			<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
			<p>
				<a href="#!" style="color: white;">Materiały ogniotrwałe</a>
			</p>
			<p>
				<a href="#!" style="color: white;">Preparaty</a>
			</p>
			<p>
				<a href="#!" style="color: white;">Akcesoria</a>
			</p>
			<p>
				<a href="#!" style="color: white;">Inne</a>
			</p>

			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4" style="color: white;">

			<!-- Links -->
			<h6 class="text-uppercase font-weight-bold">Linki</h6>
			<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
			<p>
				<a href="#!" style="color: white;">Sklep</a>
            </p>
            <p>
				<a href="#!" style="color: white;">Galeria</a>
			</p>
			<p>
				<a href="#!" style="color: white;">Kontakt</a>
			</p>

			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4" style="color: white;">

			<!-- Links -->
			<h6 class="text-uppercase font-weight-bold">Kontakt</h6>
			<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
			<p>
				<i class="fa fa-home mr-3"></i> Warszawa, Śląska 4, PL</p>
			<p>
				<i class="fa fa-envelope mr-3"></i> TABEX-OZMO@gmail.com</p>
			<p>
				<i class="fa fa-phone mr-3"></i> +48 546 345 231</p>
			<p>
				<i class="fa fa-phone mr-3"></i> +48 444 231 423</p>

			</div>
			<!-- Grid column -->

		</div>
		<!-- Grid row -->

		</div>
		<!-- Footer Links -->

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3" style="background-color: #555555; padding: 10px; color: white;">© 2019 Copyright:
		<a href="" style="color: white; text-decoration: none;"> TABEX-OZMO.pl</a>
		</div>
		<!-- Copyright -->

		</footer>
		<!-- Footer -->
		<script>
			$('.slide1').carousel({
			interval: 2000,
			pause: 'hover',
			wrap: true
			});
		</script>
		<script src="js/search.js"></script>
	</body>
</html>

<script>  
$(document).ready(function(){

	load_product();

	load_cart_data();
    
	function load_product()
	{
		$.ajax({
			url:"fetch_item_shop.php",
			method:"POST",
			success:function(data)
			{
				$('#display_item').html(data);
			}
		});
	}

	function load_cart_data()
	{
		$.ajax({
			url:"fetch_cart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badge').text(data.total_item);
			}
		});
	}

	$('#cart-popover').popover({
		html : true,
        container: 'body',
        content:function(){
        	return $('#popover_content_wrapper').html();
        }
	});

	$(document).on('click', '.add_to_cart', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = $('#quantity'+product_id).val();
		var action = "add";
		if(product_quantity > 0)
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
				success:function(data)
				{
					load_cart_data();
					alert("Produkt został dodany do koszyka!");
				}
			});
		}
		else
		{
			alert("Proszę wybrać ilość!");
		}
	
	});

	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Czy na pewno chcesz usunąć ten produkt?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					$('#cart-popover').popover('hide');
					alert("Produkt został usunięty z koszyka!");
				}
			})
		}
		else
		{
			return false;
		}
	});

	$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				alert("Wszystkie produkty zostały usunięte z koszyka!");
			}
		});
	});

	$(document).on('click', '#check_out_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"ordersin.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				var url = "payment.php";
                window.open(url, "_blank");
			}
		});
	});
    
});

</script>