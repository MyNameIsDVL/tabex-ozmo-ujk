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
                       Profil - Możesz tutaj zmienić swoje dane, hasło itp. 
                   </li>
               </ul><!-- breadcrumb Finish -->
               
		   </div><!-- col-md-12 Finish -->
		   
		   <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb" style="background: red; color: white;"><!-- breadcrumb Begin -->
                   <li>
                       !Uwaga - Aby ustawić własny awatar należy najpierw dodać go na serwer, potem wybrać go z dostępnych awatarów społeczności i zapisać.
                   </li>
               </ul><!-- breadcrumb Finish -->
               
		   </div><!-- col-md-12 Finish -->
		   

   <div class="border-one">

   <?php
			if (isset($_SESSION['success']) && $_SESSION['success'] !="")
			{
				echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
				unset($_SESSION['success']);
			}
			if (isset($_SESSION['status']) && $_SESSION['status'] !='')
			{
				echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
				unset($_SESSION['status']);
			}
		?>

            <?php
				$query = "SELECT * from users where email='$namesession'";
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();            
			?>

			<?php
				foreach($result as $row)
				{
					$country = $row['country'];
			?>
			<form class="formopin" method="post" action="sendtofolderimg.php" enctype="multipart/form-data">
				<div class = "form-group">
					<label for = "name">Awatar</label>
					<input type = "file" name="fieldfile" class = "form-control" value="">
				</div>
				<div class = "form-group">
					<button type="submit" class="btn btn-success">Wstaw na serwer</button>
				</div>	
			</form>	
   		<form class="formopin" method="post" action="sendtofolder.php">
			<div class = "form-group">
				<label for = "name">Nazwa użytkownika</label>
				<input type = "text" class = "form-control" placeholder = "" name="namep" value="<?php echo $row['username']; ?>">
			</div>
            <div class = "form-group">
				<label for = "name">Email</label>
				<input type = "email" class = "form-control" placeholder = "" name="emailp" value="<?php echo $row['email']; ?>">
            </div>
            <div class = "form-group">
				<label for = "name">Kraj</label>
				<select id="txtCountry" type="text" class="form-control" name="countryp">
                <option value="Afghanistan"<?=$row['country'] == 'Afghanistan' ? ' selected="selected"' : '';?>>Afghanistan</option>
                <option value="Åland Islands"<?=$row['country'] == 'Åland Islands' ? ' selected="selected"' : '';?>>Åland Islands</option>
                <option value="Albania"<?=$row['country'] == 'Albania' ? ' selected="selected"' : '';?>>Albania</option>
                <option value="Algeria"<?=$row['country'] == 'Algeria' ? ' selected="selected"' : '';?>>Algeria</option>
                <option value="American Samoa"<?=$row['country'] == 'American Samoa' ? ' selected="selected"' : '';?>>American Samoa</option>
                <option value="Andorra"<?=$row['country'] == 'Andorra' ? ' selected="selected"' : '';?>>Andorra</option>
                <option value="Angola"<?=$row['country'] == 'Angola' ? ' selected="selected"' : '';?>>Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria"<?=$row['country'] == 'Austria' ? ' selected="selected"' : '';?>>Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Polska"<?=$row['country'] == 'Polska' ? ' selected="selected"' : '';?>>Polska</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
			</div>
            <div class = "form-group">
				<label for = "name">Hasło</label>
				<input type = "password" class = "form-control" placeholder = "" name="passp" value="<?php echo $row['password']; ?>">
			</div>
			<div class = "form-group">
				<label for = "name">Ustaw awatar</label>
				<select class="form-control" name="filep">
                <?php
                    $dir_path1 = "images/";
                    $option = '';

                    if (is_dir($dir_path1))
                    {
                        $file = opendir($dir_path1);
                        {
                            if ($file)
                            {
                                while (($file_name = readdir($file)) !== FALSE)
                                {
                                    if ($file_name != '.' && $file_name != '..')
                                    {
                                        $option = $option."<option>$file_name</option>";
                                        
                                    }
                                }
                            }
                        }              
                    }
                    echo $option;
              ?>
              </select>
			</div>					
			<div class = "form-group">
				<button type="submit" class="btn btn-success" name="submitp">Zapisz</button>
			</div>
      	</form>

          <?php
			}
		?>

		  <?php
				$query = "SELECT * from messages ORDER BY date DESC";
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchAll();            
			?>

			<?php
				foreach($result as $row)
				{
			?>

		<!-- table -->
		

		<?php
			}
		?>
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