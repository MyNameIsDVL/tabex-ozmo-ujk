<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "gpro");
$connection->query("SET NAMES utf8 COLLATE utf8_polish_ci");


if (isset($_POST['submitf']))
{
    $today = getdate();
    $dt = $today['year']."-".$today['mon']."-".$today['mday']." ".$today['hours'].":".$today['minutes'].":".$today['seconds'];
    $imagese = $_SESSION['avatar'];
    $name = $_SESSION['username'];
    $info = $_POST['comf'];


        $query = "INSERT into messages (email, date, info, photo) values ('$name', '$dt', '$info', '$imagese')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run)
        {
            header('Location: shop.php');
        }
        else{
            header('Location: shop.php');
        }    
}



?>