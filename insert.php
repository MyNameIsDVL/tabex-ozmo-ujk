<?php
session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$country = $_POST['country'];
$newpassword = $_POST['password'];


if(!empty($username) || !empty($email) || !empty($country) || !empty($newpassword)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "gpro";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    $passw = mysqli_real_escape_string($conn, $newpassword);
    if (strlen($passw) >= 5) {
        if (!ctype_upper($passw) && !ctype_lower($passw) && !ctype_digit($passw)) {
            if (preg_match("#[0-9]+#",$passw) && preg_match("#[A-Z]+#",$passw) && preg_match("#[a-z]+#",$passw)) {
                if(mysqli_connect_error()){
                    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
                }else{
                    $passw = md5($passw);

                    $SELECT = "SELECT email from users where email = ? LIMIT 1";
                    $INSERT = "INSERT Into users (username, email, country, password) values (?,?,?,?)";
            
                    //To protected connection
                    $stmt = $conn->prepare($SELECT);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->bind_result($email);
                    $stmt->store_result();
                    $rnum = $stmt->num_rows;
            
                    if($rnum==0)
                    {
                        $stmt->close();
            
                        $stmt = $conn->prepare($INSERT);
                        $stmt->bind_param("ssss", $username, $email, $country, $passw);
                        $stmt->execute();
                        
                        header("Location: login.php");
                    }else{
                        echo "Nie udało się zarejestrować";
                        $_SESSION['status'] = "Ten mail jest już zajęty!"; 
                        header("Location: register.php");
                    }
                    $stmt->close();
                    $conn->close();
                }
            }
            else {
                $_SESSION['status'] = "Hasło musi zawierać małe, duże litery oraz cyfry!"; 
                header("Location: register.php");
            }
        }
        else {
            $_SESSION['status'] = "Hasło nie może składać się z samych wielki lub mały liter lub samych cyfr!"; 
            header("Location: register.php");
        }
    }
    else {
        $_SESSION['status'] = "Hasło musi mieć wiecej niż 5 znaków!"; 
        header("Location: register.php");
    }    
}
else{
    echo "Wszystkie pola są wymagane";
    die();
}

?>