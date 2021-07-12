<?php
//index.php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>GPro</title>
		<script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="register.css" />
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

  <div class="container login-form">
	<h2 class="login-title">- Logowanie -</h2>
	<div class="panel panel-default">
		<div class="panel-body">
			
		<?php
    
			if (isset($_SESSION['status']) && $_SESSION['status'] !='')
			{
				echo '<h2 class="bg-danger"> '.$_SESSION['status'].' </h2>';
				unset($_SESSION['status']);
			}
		?>
			<form action="selectLogin.php" method="post">
				<div class="input-group login-userinput">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input id="txtEmail" type="email" class="form-control" name="email" placeholder="Email" required>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input  id="txtPassword" type="password" class="form-control" name="password" placeholder="Hasło" required>
					<span id="showPassword" class="input-group-btn">
            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
          </span>  
				</div>
				<button class="btn btn-primary btn-block login-button" type="submit" name="submit"><i class="fa fa-sign-in"></i> Zaloguj</button>
				<div class="checkbox login-options">
					<label><input type="checkbox"/> Zapamiętaj</label>
					<a href="remindpass.php" class="login-forgot">Zapomniałeś/aś loginu/hasła?</a>
				</div>		
			</form>			
		</div>
	</div>
</div>
<script src="js/password.js"></script>
</body>
</html>