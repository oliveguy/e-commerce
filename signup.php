<?php
session_start();
include("page_modules/DB_connection.php");
include("page_modules/login_status.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coco Bakery || Signup</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/signup.css">
</head>
<body>
    <?php include("page_modules/header.php");?>
    <main>
        <img src="assets/images/mainlogo.png" alt="Coco Bakery logo" width="200" height="auto">
        <h1>Sign Up</h1>
        <p>It's quick and easy.</p>
        <form action="page_modules/signup-process.php" method="POST">
            <input type="text" name="login_id" placeholder="Member ID" required class="fielditems">
            <input type="password" name="login_pwd" placeholder="Password" required class="fielditems">
            <input type="text" name="fname" placeholder="First name" required class="fielditems">
            <input type="text" name="lname" placeholder="Last name" required class="fielditems">
            <input type="text" name="email" placeholder="E-mail" required class="fielditems">
            <input type="text" name="mnumber" placeholder="Mobil" required class="fielditems">
            <input type="submit" value="Sign Up" class="fielditems">
        </form>
    </main>

</body>
</html>