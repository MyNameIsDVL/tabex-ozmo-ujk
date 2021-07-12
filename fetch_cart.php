<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order_table" style="border-radius: 5px;">
	<table class="table table-bordered table-striped" style="color: #222;">
		<tr>  
            <th width="40%" style="background: #555555;">Nazwa produktu</th>  
            <th width="10%" style="background: #555555;">Ilość</th>  
            <th width="20%" style="background: #555555;">Cena</th>  
            <th width="15%" style="background: #555555;">Razem</th>  
            <th width="5%" style="background: #555555;">Akcja</th>  
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$output .= '
		<tr>
			<td>'.$values["product_name"].'</td>
			<td>'.$values["product_quantity"].'</td>
			<td align="right">zł '.$values["product_price"].'</td>
			<td align="right">zł '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
			<td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Usuń</button></td>
		</tr>
		';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;
		
	}
	$output .= '
	<tr>  
        <td colspan="3" align="right">Do zapłaty</td>  
        <td align="right">zł '.number_format($total_price, 2).'</td>  
        <td></td>  
    </tr>
	';
	$_SESSION['cart_tprice'] = number_format($total_price, 2);

	}
else
{
	$output .= '
    <tr>
    	<td colspan="5" align="center">
    		Twój koszyk jest pusty!
    	</td>
    </tr>
    ';
}
$output .= '</table></div>';
$data = array(
	'cart_details'		=>	$output,
	'total_price'		=>	'zł' . number_format($total_price, 2),
	'total_item'		=>	$total_item
);	
echo json_encode($data);

		
?>