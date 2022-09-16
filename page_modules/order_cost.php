<?php
session_start();
$order_member_id = $_SESSION['user_id_string'];
$nonmember_session_id = session_id();
$order_number_session = $_SESSION['order_number'];

if(isset($_SESSION['user_id_string'])){

    $query ="SELECT * FROM orders WHERE order_member = '$order_member_id' AND order_id ='$order_number_session'";
    } else {
    $query ="SELECT * FROM orders WHERE order_session = '$nonmember_session_id' AND order_id ='$order_number_session'";
    }
$sql = mysqli_query($connection, $query);
$order_cost = mysqli_fetch_array($sql);

echo'
<div id="cost">
        <p>Total Item Cost <b>$ '.$order_cost['order_total_before_tax'].'</b></p>
        <p>Tax <b>$ '.$order_cost['order_total_tax'].'</b></p>
        <p>Grand Total <b>$ '.$order_cost['order_total_all'].'</b></p>
    </div>
    <p>Payment Method: Credit card ending <b>'.$_SESSION['card_number'].'</b></p>
</div>
';

?>