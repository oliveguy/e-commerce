<?php
session_start();
include("DB_connection.php");
$id = $_GET['id'];
if(isset($_SESSION['login'])){
    $login_id = $_SESSION['user_id_string'];
}
$session_id = session_id();

if(isset($_SESSION['login'])){
    $query = "DELETE FROM cart WHERE cart_product_id='$id' AND cart_user_id ='$login_id'";
}else{
    $query = "DELETE FROM cart WHERE cart_product_id='$id' AND cart_session_id = '$session_id'";
}
mysqli_query($connection, $query);
header('Location:../cart.php');
?>