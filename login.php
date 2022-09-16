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
        <title>Grammy's Bakery || Login</title>
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/login.css">
    </head>
    <?php include("page_modules/login_member.php"); ?>    
<body>
<?php include("page_modules/header.php"); ?>
</header>
<?php include("page_modules/aside.php");?>
    <main>
        <img src="assets/images/grammys.svg" alt="Grammy's logo" width="200" height="auto">
        <h1>Grammy's Login</h1>
        <p>Welecome! Please type your ID and Password</p>
        <form action="page_modules/loginprocess.php" method="POST">
            <label for="login_id">Member ID</label>
            <input type="text" name="login_id" required>
            <label for="login_id">Password</label>
            <input type="password" name="login_pwd" required>

            <input type="submit" value="LOG IN" id="submit">
        </form>
        <a href="singup.html">Sign Up</a>
    </main>
    <?php include("page_modules/footer.php"); ?>
    <script>
    user_nav_username.addEventListener("click", function(){        
        user_panel.style.display ="flex";         
    })
    user_panel_close.addEventListener("click", function(){        
        user_panel.style.display ="none";              
    })
    document.addEventListener('keydown', function(event){
        if(event.key === "Escape"){
        user_panel.style.display ="none";
	}
});
</script>
</body>
</html>