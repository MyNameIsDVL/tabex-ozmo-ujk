<?php
$conn = mysqli_connect("localhost", "root", "", "gpro");
$conn->query("SET NAMES utf8 COLLATE utf8_polish_ci");
$output = '';

$sql = "SELECT * FROM tbl_product where name like '%".$_POST["search"]."%'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<div class="col-md-3" style="margin-top:12px;">  
        <div class="cart-model" style="padding:16px; height:380px; box-shadow: 0 2px 5px 0 rgba(0,0,0,0.5), 0 2px 10px 0 rgba(0,0,0,0.5); background: url(images/'.$row["image"].'); background-size: 100% 100%;" align="center">
            <div class="position-me">
            <h4 class="text-info">'.$row["name"].'</h4>
            <h4 class="text-danger">zł '.$row["price"] .'</h4>
            <h6 class="text-danger">Ilość: '.(($row["quan"] < 1 )?'Brak towaru':''.$row["quan"].'').'</h6>
            <input type="number"  min="1" max="'.$row["quan"].'" name="quantity" id="quantity' . $row["id"] .'" class="form-control" value="1" />
            <input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
            <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
            <input type="button" name="add_to_cart" id="'.$row["id"].'" style="margin-top:5px; background: green;" class="btn btn-success form-control add_to_cart '.(($row["quan"] < 1 )?'disabled':"").'" value="Dodaj do koszyka"/>
            </div>
        </div>
    </div>';
    }
    echo $output;
}
else {
    echo 'Brak produktów';
}

?>
<script>
$(document).on('keyup', 'input[name=quantity]', function () {
    var _this = $(this);
    var min = parseInt(_this.attr('min'));
    var max = parseInt(_this.attr('max'));
    var val = parseInt(_this.val()) || (min - 1);
    if(val < min)
        _this.val( min );
    if(val > max)
        _this.val( max );
});
</script>