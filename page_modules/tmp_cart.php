<?php
session_start();
$id = $_GET['product_id'];
include("DB_connection.php");
    // INPUT FROM PAGES
    $product_id = $_GET['id'];
    $query = "SELECT id, product_name, product_brief,img_filename_full, price FROM products WHERE id=$id";
    $sql = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($sql);

    $input_session_id        = session_id();
    $input_user_id           = $_SESSION['user_id_string'];
    $input_product_id        = $row['id'];
    $input_product_name      = $row['product_name'];
    $input_product_brief     = $row['product_brief'];
    $input_product_photo     = $row['img_filename_full'];
    $input_product_unitprice = $row['price'];
    $input_product_qty       = $_GET['qty'];
    $input_product_subtotal  = $row['price'] * $_GET['qty'];
    $input_datetime          = date('Y/m/d H:i:s');

// In case of NON MEMBER
if(!isset($_SESSION['login'])){
    $input_user_id ="non_member";
    $query = "SELECT * FROM cart WHERE cart_session_id='$input_session_id' AND cart_product_id ='$input_product_id'";
} 
// In case of MEMBER
elseif(isset($_SESSION['login'])){
    $query = "SELECT * FROM cart WHERE cart_user_id='$input_user_id' AND cart_product_id ='$input_product_id'";
}
// Query to find the same item as already added
$sql = mysqli_query($connection, $query);
$row = mysqli_fetch_array($sql);

// INSERT OR UPDATE depending on item added
if($row == 0){
    $query ="INSERT INTO
    cart(cart_session_id, cart_user_id, cart_product_id, cart_product_name, cart_product_brief, cart_product_photo, cart_product_unitprice, cart_product_quantity, cart_sub_total, cart_date_time)
    VALUES('$input_session_id','$input_user_id','$input_product_id','$input_product_name','$input_product_brief','$input_product_photo','$input_product_unitprice','$input_product_qty','$input_product_subtotal','$input_datetime')";
}else{
    $query ="UPDATE cart SET cart_product_quantity = cart_product_quantity+$input_product_qty, cart_sub_total = cart_sub_total+$input_product_subtotal WHERE cart_product_id ='$input_product_id' AND(cart_session_id='$input_session_id' OR cart_user_id='$input_user_id')";
}
mysqli_query($connection, $query);
// REDIRECTION
header('Location:../cart.php');
?>