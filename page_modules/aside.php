<?php
session_start();
include("page_modules/DB_connection.php");
include("page_modules/login_status.php");

$session_id = session_id();
if(isset($_SESSION['login'])){
    $login_id = $_SESSION['user_id_string'];
    $query = "SELECT cart_product_photo, cart_sub_total,cart_product_quantity FROM cart WHERE cart_user_id = '$login_id' ORDER BY cart_date_time ASC";
}else{
    $query = "SELECT cart_product_photo, cart_sub_total,cart_product_quantity FROM cart WHERE cart_session_id = '$session_id' ORDER BY cart_date_time ASC";
}

$sql = mysqli_query($connection, $query);
$aisde_total = 0;
$qty_check = mysqli_fetch_array($sql);
// echo $qty_check['cart_product_quantity'];

if(isset($qty_check['cart_product_quantity'])){
echo '
<aside>
    <div id="cart_aside">
        <a href="cart.php"><img src="assets/images/icons/cart_small.png" alt="cart_icon" width="30" height="30" id="aside_cart"></a>
    </div>
    <ul>
    ';
    $sql = mysqli_query($connection, $query);
    while($showcart_aside = mysqli_fetch_array($sql)){
        echo'
        <li><img src="assets/images/products/w256_jpg/'.$showcart_aside['cart_product_photo'].'" alt=""width="256" height="192" class="aside_cart"></li>';
        $aisde_total += $showcart_aside['cart_sub_total'];
        }
echo'
    </ul>
    <p id="aside_subtotal">Sub total<span id="aside_subtotal">$ '.$aisde_total.'</span></p>
</aside>
';
}
?>