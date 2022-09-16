<?php
session_start();
$login_id = $_SESSION['user_id_string'];
$session_id = session_id();
$product_id = $_GET['product_id'];
$operator = $_GET['operation'];

include("DB_connection.php");

if($operator == "minus"){
    $operation = "-1";
} elseif($operator == "plus"){
    $operation = "+1";}

//OPERATION
$query = "UPDATE cart SET cart_product_quantity=cart_product_quantity".$operation." WHERE cart_product_id = $product_id";
$sql = mysqli_query($connection, $query);


//SUB TOTAL PROCESSING
$query = "UPDATE cart SET cart_sub_total=cart_product_quantity*cart_product_unitprice"." WHERE cart_product_id = $product_id";
$sql = mysqli_query($connection, $query);

// REMOVE ROW WHEN QTY IS 0
$query = "SELECT cart_product_quantity FROM cart WHERE cart_product_id = $product_id";
$sql = mysqli_query($connection, $query);
$row = mysqli_fetch_array($sql);
if($row['cart_product_quantity'] == 0){
    $removeQuery = "DELETE FROM cart WHERE cart_product_id = $product_id";
    mysqli_query($connection, $removeQuery);
}

// REDIRESTION
if($sql){
    header('Location:../cart.php');
} else {
    echo "Some errors occur";
}
?>
