<?php

$order_member_id = $_SESSION['user_id_string'];
$nonmember_session_id = session_id();

if(isset($_SESSION['user_id_string'])){

    $query ="SELECT * FROM orders_detail WHERE orderdetail_member = '$order_member_id'";
    } else {
    $query ="SELECT * FROM orders_detail WHERE orderdetail_session = '$nonmember_session_id'";
    }
$sql = mysqli_query($connection, $query);
while($order = mysqli_fetch_array($sql)){
echo '
    <li>
        <a href="product_detail.php?id='.$order['orderdetail_product_id'].'">
            <img src="assets/images/products/w256_jpg/'.$order['orderdetail_product_img'].'" alt="'.$order['orderdetail_product_name'].'" width="256" height="192" class="order_photo">
        </a>
        <div class="product_brief">
            <p class="product_name">'.$order['orderdetail_product_name'].'</p>
            <p>'.$order['orderdetail_product_brief'].'</p>
        </div>
        <div class="product_info">
            <p><b>$ '.$order['orderdetail_unitprice'].'</b>/each</p>
            <p><b>'.$order['orderdetail_qty'].'ea</b></p>
            <p>Sub total <b>$ '.$order['orderdetail_subtotal'].'</b></p>
        </div>
    </li>
    ';
    }

?>