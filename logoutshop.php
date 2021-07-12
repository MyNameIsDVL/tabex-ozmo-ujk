<?php
session_start();

if (isset($_POST['logoutshop']))
{
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['avatar']);
    header('Location: index.php');
}
?>