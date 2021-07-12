<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'gpro');
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
	<h2 class="login-title">- Przypomnienie hasła -</h2>
	<div class="panel panel-default">
		<div class="panel-body">
<?php

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$pass_errors = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	
		
		$q = 'SELECT id FROM users WHERE email="'.  mysqli_real_escape_string ($dbc, $_POST['email']) . '"';
		$r = mysqli_query ($dbc, $q);
		
		if (mysqli_num_rows($r) == 1) { 
			list($uid) = mysqli_fetch_array ($r, MYSQLI_NUM); 
		} else { 
            echo '<h2 style="text-align:center">Podany adres e-mail nie jest zarejstrowany w bazie danych!</h2>';
            echo '<button class="btn btn-primary btn-block" onclick="tryAgain()">Spróbuj jeszcze raz</button><script>
            function tryAgain()
            {
                 location.href = "remindpass.php";
            } 
            </script>';
            exit();
		}
		
	} else { 
		echo 'Wpisz poprawny adres e-mailowy!';
	} 
	
	if (empty($pass_errors)) { 


		$p = substr(uniqid(rand(), true), 9);

	
		$q = "UPDATE users SET password='" . $p . "' WHERE id=$uid LIMIT 1";
		$r = mysqli_query ($dbc, $q);
		
		if (mysqli_affected_rows($dbc) == 1) { 
		
			$body = "Hasło wymagane do zalogowania się na naszej witrynie zostało tymczasowo zmienione na '$p'. Zaloguj się, podając to hasło i adres e-mailowy. Po zalogowaniu hasło możesz zmienić.";
			require_once "PHPMailer.php";
      require_once "SMTP.php";
      require_once "Exception.php";


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
    $mail->Subject = "Przypomnij hasło";
    $mail->Body = $body;
    $mail->AddAddress($_POST['email']);
    $mail->CharSet = 'UTF-8';
    $mail->Send();
   
            echo '<h1 style="text-align:center">Twoje hasło zostało zmienione.</h1><p>Na Twoją skrzynkę mailową przyjdzie wiadomość z tymczasowym hasłem. Po zalogowaniu się w witrynie za pomocą nowego hasła, możesz je zmienić.</p>';
            echo '<button class="btn btn-primary btn-block" onclick="page()">Strona główna</button><script>
            function page()
            {
                 location.href = "index.php";
            } 
            </script>';
            
			exit(); 
			
		} else { 
	
			trigger_error('Hasło nie może zostać zmienione z powodu błędu systemu. Przepraszamy za kłopot.'); 

		}

    }}
?>
