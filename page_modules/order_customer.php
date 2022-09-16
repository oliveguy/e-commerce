<?php
session_start();
$order_member_id = $_SESSION['user_id_string'];
$nonmember_session_id = session_id();
$order_number_session = $_SESSION['order_number'];

if(isset($_SESSION['user_id_string'])){

    $query ="SELECT order_id, order_customer_name, order_customer_address FROM orders WHERE order_member = '$order_member_id' AND order_id ='$order_number_session'";
    } else {
    $query ="SELECT order_id, order_customer_name, order_customer_address FROM orders WHERE order_session = '$nonmember_session_id' AND order_id ='$order_number_session'";
    }

$sql = mysqli_query($connection, $query);
$order_info = mysqli_fetch_array($sql);
echo'
<div id="customer_info">
    <h2>Your Order Information</h2>
    <h3>Order No.:'.$order_info['order_id'].'</h3>

    <p>Customer\'s name: <b>'.$order_info['order_customer_name'].'</b></p>
    <p>Delivery Address: <b>'.$order_info['order_customer_address'].'</b></p>
    <p>Delivery Time: <b>'.$order_info['order_delivery_time'].'</b></p>
    <p class="notice" id="important">Keep the order number and order password to track your order</p>
    <p class="notice">We will send you email regarding above order detail.</p>
</div>
';
?>