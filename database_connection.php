<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=gpro", "root", "");
$connect->query("SET NAMES utf8 COLLATE utf8_polish_ci");

?>