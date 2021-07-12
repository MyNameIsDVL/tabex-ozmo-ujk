<?php
//index.php

session_start();

if (!$_SESSION['username'] || !$_SESSION['avatar'])
{
    header('Location: login.php');
}


$connect = new PDO("mysql:host=localhost;dbname=gpro", "root", "");
$connect->query("SET NAMES utf8 COLLATE utf8_polish_ci");

$namesession = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>TABEX-OZMO</title>
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src="js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
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
        .payinfo {
            margin: 20px;
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
                       	<a href=""><img src="images/<?php echo $_SESSION['avatar']; ?>"> <?php echo $_SESSION['username']; ?></a>
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
                       
                       <li>
                           <a href="shop.php">Sklep</a>
                       </li>
                       <li>
                           <a href="pricespace.php">Galeria</a>
					   </li>
                       <li>
                           <a href="contact.php">Kontakt</a>
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



		<div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       Dziękujemy! Teraz pozostało tylko zapłacić. Po dokonaniu wpłaty otrzymasz fakturę. 
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
		   
            <script
                src="https://www.paypal.com/sdk/js?client-id=SB_CLIENT_ID">
            </script>

            <?php
                $connection= mysqli_connect('localhost', 'root', '', 'gpro');
                $querypay = "SELECT SUM(total) from orders where email='$namesession'";
                $query_run = mysqli_query($connection, $querypay);
		
		

				
                while ($data = mysqli_fetch_array($query_run, MYSQLI_NUM)){
            ?>

            <h2 class="payinfo">Twoje id: <?php echo $namesession ?></h2>
            <h2 class="payinfo">Do zapłaty: <?php echo $_SESSION['cart_tprice']; ?> zł</h2>


			
            <div class="text-center">
                <div id="paypal-button-container"></div>
            </div>

            <script>
                 paypal.Buttons({
                    createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                        amount: {
                            value: '<?php echo $_SESSION['cart_tprice']; ?>',
							currency: 'PLN'
                        }
                        }]
                    });
                    },
					env: 'sandbox',
                    client: {
                        sandbox: 'AQFe2AETnWlLQ1QhdLcYtpBCZCzIzM3l6uAEC2PFuVoi77P3cF619KDXvUkfcw4ymx_Lr31BDMzSWEqk'
                    },
                    onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        alert('Transaction completed by ' + details.payer.name.given_name);
						window.location.href = "invoice.php";
                        // Call your server to save the transaction
                        return fetch('/paypal-transaction-complete', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                        });
                    });
                    }
                }).render('#paypal-button-container');
            </script>

            <?php
            }
            ?>

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
				<a href="#!" style="color: white;">Strefa premier</a>
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
		<?php
		
include('database_connection.php');

$query = "SELECT * FROM tbl_product ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
$result = $statement->fetchAll();
$body = '';
	foreach($result as $row){
		if($row["quan"] < 10){
		$body .= 'Produkt '.$row["name"].' o ID '.$row["id"].' kończy się. Zostało '.$row["quan"].' sztuk <br/>';

	}
	else {
		$body = 'Nowe zamówienie <br/>';
	}
}
	if(!empty($body))
	{
	require_once "PHPMailer.php";
	require_once "SMTP.php";
	
	
	$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "gproauto123@gmail.com";
		$mail->Password = "aplikacja1";
		$mail->SetFrom("gproauto123@gmail.com");
		$mail->Subject = "Konczą się towary";
		$mail->Body = $body;
		$mail->AddAddress('mateuszhus1994@gmail.com');
		//pass: aplikacja1
		$mail->CharSet = 'UTF-8';
		$mail->Send();
	}
		?>
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