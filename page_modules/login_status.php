<?php
//Login function--------------
if(isset($_SESSION['login'])){
    $user_id_session = $_SESSION['user_id_string'];
    $login_query ="SELECT * FROM user where user_id='$user_id_session'";
    $login_sql = mysqli_query($connection, $login_query);
    $login_row = mysqli_fetch_array($login_sql);
    $username = $login_row['user_fname']." ".$login_row['user_lname'];
}
// Login End-------------------
?>