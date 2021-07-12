<?php

session_start();

   
   
    $connection = mysqli_connect("localhost", "root", "", "gpro");
    $connection->query("SET NAMES utf8 COLLATE utf8_polish_ci");


if (isset($_POST['submitp']))
{
    $file1 = $_POST['filep'];
    $sessname = $_SESSION['username'];
    $name = $_POST['namep'];
    $email = $_POST['emailp'];
    $country = $_POST['countryp'];
    $password = $_POST['passp'];

    $passw = mysqli_real_escape_string($connection, $password);
    if (strlen($passw) >= 5) {
        if (!ctype_upper($passw) && !ctype_lower($passw) && !ctype_digit($passw)) {
            if (preg_match("#[0-9]+#",$passw) && preg_match("#[A-Z]+#",$passw) && preg_match("#[a-z]+#",$passw)) {
                if(mysqli_connect_error()){
                    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
                }else{
                    $passw = md5($passw);

                    $query = "UPDATE users set username='$name', email='$email', country='$country', password='$passw', photo='$file1' where email='$sessname'";
                    $query_run = mysqli_query($connection, $query);


                    if ($query_run)
                    {
                        session_destroy();
                        unset($_SESSION['username']);
                        unset($_SESSION['avatar']);
                        header('Location: index.php');
                    }
                    else{
                        $_SESSION['status'] = "Nie zapisano.";
                        header('Location: profile.php');
                    }
                }
            }
            else {
                $_SESSION['status'] = "Hasło musi zawierać małe, duże litery oraz cyfry!"; 
                header("Location: profile.php");
            }
        }
        else {
            $_SESSION['status'] = "Hasło nie może składać się z samych wielki lub mały liter lub samych cyfr!"; 
            header("Location: profile.php");
        }
    }
    else {
        $_SESSION['status'] = "Hasło musi mieć wiecej niż 5 znaków!"; 
        header("Location: profile.php");
    }    
}
   
?>