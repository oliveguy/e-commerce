<?php
session_start();
include("DB_connection.php");
include("login_status.php");
// Check existing ID
$inputID = $_POST['login_id'];
$inputpwd = $_POST['login_pwd'];
$hashedPWD = hash('sha512', $inputpwd);
$inputFname = $_POST['fname'];
$inputLname = $_POST['lname'];
$inputMobile = $_POST['mnumber'];
$inputEmail = $_POST['email'];

$query = "SELECT user_id FROM user WHERE user_id ='".$inputID."'";
$sql = mysqli_query($connection, $query);

  if(mysqli_num_rows($sql) == 0){
    $query_signin = "INSERT INTO user(user_id, user_pwd, user_fname, user_lname, mobil_num, email) VALUES('$inputID','$hashedPWD','$inputFname','$inputLname','$inputMobile','$inputEmail')";
    mysqli_query($connection, $query_signin);
    echo"<script>
    alert('Please login');
    location.replace('../login.php');
    </script>
    ";
  } else {
    echo"<script>
    alert('Please try another user ID!');
    location.replace('../signup.php');
    </script>
    ";
  }
?>