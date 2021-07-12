<?php
session_start();

if(isset($_POST['submit']))
{
        $user_name = $_POST['email'];
        $user_pass = $_POST['password'];
        if(!$user_name || !$user_pass)
        {
            echo "Proszę wprowadzić wszystkie dane wymagane do zalogowania";
        }

    
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "gpro";

    
    
        $link = new mysqli($host, $user, $pass, $db);
   
    if($link->connect_errno > 0){
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }else{echo "connected"."";}
  
    $user_pass = mysqli_real_escape_string($link, $user_pass);
    $user_pass = md5($user_pass);

    $query = "SELECT email, password, photo FROM users WHERE email='".$user_name."'AND password='".$user_pass."' limit 1";
 
    $result = $link->query($query);

    if(!$result = $link->query($query))
    {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
        echo "Field";      
    }

    $row = $result->fetch_assoc();

  
    if($row['email']=="$user_name" && $row['password']=="$user_pass")
    {
        $_SESSION['username'] = $user_name;
        $_SESSION['avatar'] = $row['photo'];
        header("Location: shop.php");
    } 
        else
        {      
            $_SESSION['status'] = "Nazwa lub hasło jest błędne";   
            header("Location: login.php"); 
        } 
} 


?>