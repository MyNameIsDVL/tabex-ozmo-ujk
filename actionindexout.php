<?php
$conn = mysqli_connect("localhost", "root", "", "gpro");
$conn->query("SET NAMES utf8 COLLATE utf8_polish_ci");

$record_per_page = 8;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 
 $sql = "SELECT * FROM tbl_product where name like '%".$_POST["search"]."%'";
$result = mysqli_query($conn, $sql);

$query = "SELECT * FROM tbl_product ORDER BY id DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($conn, $query);  

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<div class="col-md-3" style="margin-top:12px;">  
        <div class="cart-model" style="padding:16px; height:350px; box-shadow: 0 2px 5px 0 rgba(0,0,0,0.5), 0 2px 10px 0 rgba(0,0,0,0.5); background: url(images/'.$row["image"].'); background-size: 100% 100%;" align="center">
            <div class="position-me">
            <h4 class="text-info">'.$row["name"].'</h4>
            <h4 class="text-danger">zł '.$row["price"] .'</h4>
            <input type="text" name="quantity" id="quantity' . $row["id"] .'" class="form-control" value="1" disabled/>
            <input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
            <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
            <input type="button" name="add_to_cart" id="'.$row["id"].'" style="margin-top:5px; background: green;" class="btn btn-success form-control add_to_cart" value="Dodaj do koszyka" disabled/>
            </div>
        </div>
    </div>';
    }
    $output .= '<div class="col-md-10" style="margin-top: 2rem;" id="paginkox">';
    $page_query = "SELECT * FROM tbl_product ORDER BY id DESC";  
    $page_result = mysqli_query($conn, $page_query);  
    $total_records = mysqli_num_rows($page_result);  
    $total_pages = ceil($total_records/$record_per_page);  
    for($i=1; $i<=$total_pages; $i++)  
    {  
        $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
    }  
    $output .= '</div><br /><br />';  
    echo $output;
}
else {
    echo 'Brak produktów';
}


?>