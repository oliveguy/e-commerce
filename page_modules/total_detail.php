<?php
session_start();
include("page_modules/DB_connection.php");
include("page_modules/login_status.php");
$session_id = session_id();
$login_id = $_SESSION['user_id_string'];

if(isset($_SESSION['login'])){
    $query = "SELECT cart_sub_total FROM cart WHERE cart_user_id = '$login_id'";
}else{
    $query = "SELECT cart_sub_total FROM cart WHERE cart_session_id = '$session_id'";
}
$sql = mysqli_query($connection, $query);

$showtotal = 0;
while($calculation = mysqli_fetch_array($sql)){
    $showtotal += $calculation['cart_sub_total'];
}
$tax = $showtotal*0.05;
$grand_total = $tax + $showtotal;

$showtotal = number_format($showtotal, 2, '.', '');
$tax = number_format($tax, 2, '.', '');
$grand_total = number_format($grand_total, 2, '.', '');

echo '
<div id="total_detail">
    <h3 id="payment">Payment</h3>
    <hr>
    <p class="title">Summary</p>
    <p class="title_description">Your payment detail</p>
    <p class="payment_detail"><span>Your order: </span><span id="cost_before_tax">$'.$showtotal.'</span></p>
    <p class="payment_detail"><span>Delivery</span><span>Free of charge</span></p>
    <p class="payment_detail"><span>Tax(GST)</span><span>$'.$tax.'</span></p>
    <p class="payment_detail" id="grand_total"><span>Grand total</span><span id="grand_total_amount">$ '.$grand_total.'</span></p>
</div>
';

?>