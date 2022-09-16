<?php
    session_start();
    include("DB_connection.php");
    $session_id = session_id();
// USER //
$login_id = $_SESSION['user_id_string'];
if(!isset($_SESSION['user_id_string'])){
    $login_id = "Non member";
}
// CUSTOMER INFO //
$order_number = "GRAM".date("mdHis");
// STORE Order number into SESSION
$_SESSION['order_number'] = $order_number;
$order_password = $_POST['orderpwd'];

$order_delivery_time = $_POST['delivery_time'];

$order_time = date('Y/m/d H:i:s');
$order_customer_fname = $_POST['fname'];
$order_customer_lname = $_POST['lname'];
    $order_customer_name = $order_customer_fname." ".$order_customer_lname;
$order_customer_mnumber = $_POST['m_number'];
$order_customer_email = $_POST['email'];

$order_customer_address = $_POST['address'];
$order_customer_city = $_POST['city'];
$order_customer_province = $_POST['province'];
$order_customer_postal = $_POST['postal_code'];
$order_customer_address = $order_customer_address." ".$order_customer_city." ".$order_customer_province." ".$order_customer_postal;

$order_customer_request = $_POST['request'];

$order_payment_method = $_POST['payment_method'];
$order_payment_cardnumber = $_POST['card_number'];
    // SEND CARD NUMBER TO order.cost.php
    $_SESSION['card_number'] = substr($order_payment_cardnumber, -4);
$order_payment_card_name = $_POST['card_name'];
$order_payment_card_expiration = $_POST['card_expiration'];
$order_payment_card_cvc = $_POST['card_cvc'];

// SEND ORDERS data to orders table
// DISTINGUSH USER
if(isset($_SESSION['user_id_string'])){

    $query ="SELECT SUM(cart_product_unitprice*cart_product_quantity) FROM cart WHERE cart_user_id = '$login_id'";
    } else {
    $query ="SELECT SUM(cart_product_unitprice*cart_product_quantity) FROM cart WHERE cart_session_id = '$session_id'";
    }
$sql = mysqli_query($connection, $query);
$row = mysqli_fetch_array($sql);

$total_amount = $row[0];
$order_tax = $total_amount* 0.05;
$grandtotal_tax = $total_amount + $order_tax;

// SEND DATA to orders
$query ="INSERT INTO orders(order_id, order_pwd, order_member, order_session, order_date_time, order_customer_name, order_customer_email, order_customer_address, order_customer_phone, order_total_before_tax, order_total_tax, order_total_all, order_delivery_time)
    VALUES('$order_number','$order_password','$login_id','$session_id','$order_time','$order_customer_name','$order_customer_email','$order_customer_address','$order_customer_mnumber','$total_amount','$order_tax','$grandtotal_tax','$order_delivery_time')";

mysqli_query($connection, $query);


// LOAD CARTED ITEMS //
// DISTINGUSH USER
if(isset($_SESSION['user_id_string'])){

    $query ="SELECT * FROM cart WHERE cart_user_id = '$login_id'";
    } else {
    $query ="SELECT * FROM cart WHERE cart_session_id = '$session_id'";
    }
$sql = mysqli_query($connection, $query);
// INSERT PRODUCTS INTO ORDER DETAIL
while($item_row = mysqli_fetch_array($sql)){
    
    $order_item_id = $item_row['cart_product_id'];
    $order_item_name = $item_row['cart_product_name'];
    $order_item_brief = $item_row['cart_product_brief'];
    $order_item_photo = $item_row['cart_product_photo'];
    $order_item_unitprice = $item_row['cart_product_unitprice'];
    $order_item_qty = $item_row['cart_product_quantity'];
    $order_item_subtotal = $item_row['cart_sub_total'];    
   
    $query = "INSERT INTO orders_detail
    (order_id, orderdetail_member, orderdetail_session, orderdetail_product_id, orderdetail_product_name, orderdetail_product_brief,orderdetail_product_img, orderdetail_qty, orderdetail_unitprice, orderdetail_subtotal) VALUES('$order_number','$login_id','$session_id','$order_item_id','$order_item_name','$order_item_brief','$order_item_photo','$order_item_qty','$order_item_unitprice','$order_item_subtotal')";
    
    mysqli_query($connection, $query);

}

// DELETE CARTED ITEM AFTER ORDER
if(isset($_SESSION['user_id_string'])){

    $query ="DELETE FROM cart WHERE cart_user_id = '$login_id'";
    } else {
    $query ="DELETE FROM cart WHERE cart_session_id = '$session_id'";
    }

mysqli_query($connection, $query);

// REDIRECTION
header('Location:../order.php');

?>