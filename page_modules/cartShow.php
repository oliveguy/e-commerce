<?php

$session_id = session_id();
// CART EMPTY CHECK-------------
if(isset($_SESSION['login'])){
    $query = "SELECT * FROM cart WHERE cart_session_id = '$session_id' OR cart_user_id = '$login_id'";
} else{
    $query = "SELECT * FROM cart WHERE cart_session_id = '$session_id' ORDER BY cart_date_time ASC";
}
$sql = mysqli_query($connection,$query);
$row=mysqli_fetch_array($sql);

if(!isset($row)){
    echo "<p style=text-align:center;'>There is no item in your cart.</p>";
}
// -----------------------------

if(isset($_SESSION['login'])){
    $login_id = $_SESSION['user_id_string'];
    $query = "SELECT * FROM cart WHERE cart_user_id = '$login_id' ORDER BY cart_date_time ASC";
}else{
    $query = "SELECT * FROM cart WHERE cart_session_id = '$session_id' ORDER BY cart_date_time ASC";
}
$sql = mysqli_query($connection, $query);
$total_num_item = array();
$total = 0;
$total_num_qty = 0;
while($showcart = mysqli_fetch_array($sql)){
    echo'
    <li class="cart_items_listed">
        <a href="product_detail.php?id='.$showcart['cart_product_id'].'"><img src="assets/images/products/w256_jpg/'.$showcart['cart_product_photo'].'" alt="'.$showcart['cart_product_name'].'" width="256" height="192" class="cart_photo"></a>
        <div id="product_brief">
            <h4>'.$showcart['cart_product_name'].'</h4>
            <h5>'.$showcart['cart_product_brief'].'</h5>
            <a href="page_modules/remove.php?id='.$showcart['cart_product_id'].'" class="cartitem_btn">Remove</a>
            <a href="product_detail.php?id='.$showcart['cart_product_id'].'" class="cartitem_btn">Item Info.</a>
        </div>
        <div id="product_info">
            <h5>$ '.$showcart['cart_sub_total'].'</h5>
            <h6>$ '.$showcart['cart_product_unitprice'].'/ea</h6>
            <h6>Quantity</h6>
            <div id="qty_selector">
                <a href="page_modules/qtySelector.php?operation=minus&product_id='.$showcart['cart_product_id'].'"class="operator">-</a>
                <p>'.$showcart['cart_product_quantity'].'</p>
                <a href="page_modules/qtySelector.php?operation=plus&product_id='.$showcart['cart_product_id'].'"class="operator">+</a>
            </div>
            <a><img src="assets/images/icons/available.jpg" alt="availability signal" width="15" height="15" >Available Now</a>
        </div>
    </li>
    ';
    $total += $showcart['cart_sub_total'];
    $total_num_qty += $showcart['cart_product_quantity'];
    array_push($total_num_item, $showcart['cart_product_id']);
}
    $num_item = count($total_num_item);    

?>