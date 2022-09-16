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
    <title>Grammy's || Order</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/order.css">
</head>
<body>
    <?php include("page_modules/header.php");?>
    </header>
    <main>
        <article>
            <div id="top">
                <h1>Your order detail</h1>
                <p>Thank you for your order!</p>
            </div>
            <div id="ordered_item">
                <h2>Ordered Items</h2>
                <ul>
                <?php include("page_modules/order_listing.php");?>
                </ul>                
                <?php include("page_modules/order_cost.php");?>
            <?php include("page_modules/order_customer.php");?>

        </article>
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