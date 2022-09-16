<?php
    session_start();
    include("page_modules/DB_connection.php");
    $id = $_GET['id'];
    $title = "product_detail";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grammy's Bakery || <?=$title?></title>
    <link rel="stylesheet" href="assets/css/<?=$title?>.css">
    <link rel="stylesheet" href="assets/css/header.css">
</head>
<body>
    <?php include("page_modules/header.php");?>
</header>
<?php include("page_modules/aside.php");?>
<main>
    <div id="sub_header">
        <h1>Item Details</h1>
        <p>Check below detailed information. if you need more, contact us</p>
    </div>
    <section>
            <?php include("page_modules/ShowDetail.php");?>
            <article id="more_bread">
                <h2>More Bread to explore</h2>
            </article>
        </section>
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
        // Qauntity Selector & Subtotal Calculator
        plus.addEventListener("click",function(){
            qty_input.value++;
            var currentQty = qty_input.value;
                var unitprice = price_digit.textContent
                var decimalPrice = currentQty*unitprice;
                sub_total_span.innerHTML = decimalPrice.toFixed(2);
            });
            minus.addEventListener("click",function(){
                qty_input.value--;
                var currentQty = qty_input.value;
                var unitprice = price_digit.textContent
                var decimalPrice = currentQty*unitprice;
                sub_total_span.innerHTML = decimalPrice.toFixed(2);
            });
    </script>
</body>
</html>