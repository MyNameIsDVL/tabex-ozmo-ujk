<?php
session_start();


if(!empty($_SESSION["shopping_cart"]))
{
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
        $iden = $_SESSION["username"];
        $name = $values["product_name"];
        $quantity = $values["product_quantity"];
        $price = $values["product_price"];
        $pid = $values["product_id"];
        $total_price = $values["product_quantity"] * $values["product_price"];
    
        $connection = mysqli_connect("localhost", "root", "", "gpro");
        $connection->query("SET NAMES utf8 COLLATE utf8_polish_ci");
        $query = "INSERT into orders (email, pname, quantity, price, total) values ('$iden', '$name', '$quantity', '$price', '$total_price')";
        $query_run = mysqli_query($connection, $query);   

       $sql = "UPDATE tbl_product SET quan = (quan - '$quantity') WHERE id = '$pid'";
        mysqli_query($connection, $sql); 

     
        }
}
else
{
    echo "Nie udało się!";
}

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'empty')
	{
		unset($_SESSION["shopping_cart"]);
	}
}



?>