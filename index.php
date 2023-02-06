<?php
session_start();
include("page_modules/DB_connection.php");
include("page_modules/login_status.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coco Bakery || Home</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/header.css">
</head>
<body>
    <?php include("page_modules/header.php");
    include("page_modules/header_article.php");?>
    </header>
    <?php include("page_modules/aside.php");?>
<main>
    <article id="new_menu"><!-----------------------------NEW MENU--------------------------------------------------->
        <h2>New Menu</h2>
        <h3>Based on our Study & Nutrition-oriented mind</h3>
        <p class="article_description">We have studied taste of bread and offered new products once a month. Just check them out and find your favourite flavour. New products are on sale up to 20% in all Grammy's Bakery branches</p>
        <a href="menu.php" class="moreinfo_btn">More Information</a>
        <div id="new_menu_showcase">
            <div id="new_menu_big_wrapper">
                <img src="assets/images/products/w800_jpg/2_full_mslemon.jpg" alt="Ms.Lemon-LemonCake" width="800" height="600"id="new_menu_big">
                <div id="description_right">
                    <h4>Ms.Lemon</h4>
                    <p>Fresh lemon cake layered with three lemony cakes. Lemon cream in between layers. Well-zested lemon filling on the top</p>
                        <div id="product_tool">
                            <a href="product_detail.php?id=2" class="moreinfo_btn">More</a>
                            <a href="#"><img src="assets/images/icons/wish.png" width="30" height="30" alt="wishlist_icon" class="wishlist_cart_btn"></a>
                            <a href="page_modules/tmp_cart.php?product_id=2&qty=1"> <img src="assets/images/icons/cart_small.png" width="30" height="30" alt="add_cart_icon" class="wishlist_cart_btn"></a>
                        </div>
                    <span class="big_price">$ 20.20</span>
                </div>
            </div>
            <div id="newmenue_carousel"> <!--*4-->
                <div id="slider_ctr_panel">
                    <a class="carousel_btn" id="carousel_btn_preview"><</a>
                    <p>Browse our New Products!</p>
                    <a class="carousel_btn" id="carousel_btn_next">></a>
                </div>
                <ul id="newmenue_carousel_carditem">
                <?php include("page_modules/showindex_new.php");?>
                </ul>
            </div>
        </div>
    </article><!-----------------------------NEW MENU--------------------------------------------------->
    <hr class="divider">
        <article id="specialty"><!-----------------------------SPECIALTY--------------------------------------------->
            <div id="specialty_photogallery">
                <div id="photogallery_textwrapper">
                    <h2>Specialty</h2>
                    <h3>With your satisfaction</h3>
                    <p class="article_description">We are happy to introduce best-selling items which our customers have loved since we started to bake. Our specialty items are available in any Coco Bakery branches and online here. Just try our recommended items and enjoy the taste.</p>
                    <a href="menu.php"class="moreinfo_btn">More information</a>
                </div>
                <img src="assets/images/specialty_1.jpg" alt="Coissant on the plate" width="544" height="333" id="specialty_1">
                <img src="assets/images/specialty_2.jpg" alt="Flavour" width="268" height="468" id="specialty_2">
                <img src="assets/images/specialty_3.jpg" alt="hand with flavour" width="267" height="331" id="specialty_3">
                <img src="assets/images/specialty_4.jpg" width="271" height="166" alt="A Chocolate donut" id="specialty_4">

            </div>
    <hr class="divider">
        <article id="location"> <!-----------------------------LOCATION--------------------------------------------------->
            <h2>Location</h2>
            <p class="article_description">Find our store in Calgary area and feel free to visit to convinient branches near you! We are welcome to visit one of our locations and willing to give you try!</p>
            <div id="location_wrapper">
                <img src="assets/images/branches.jpg" width="415" height="456" alt="Grammy's Bakery branches in Calgary">
                <h3>We are here !</h3>
                <p>We are located in Beltline, Loyal Mount, Cross Iron Mill, Kensington, and Chinook Centre. Please find detailed address below and contact us!</p>
                <ul id="branches">
                    <li><b>Beltline</b><p>510 12 AVE. SW Calgary E2R 0R3<br>(403) 532-6369</p></li>
                    <li><b>Loyal Mount</b><p>5120 18 AVE. SW Calgary T2R 3T5<br>(403) 658-6658</p></li>
                    <li><b>Cross Iron Mill</b><p>3200 4 ST. NE Calgary T2R 0R3<br>(403) 669-9654</p></li>
                    <li><b>Kensington</b><p>590 16 AVE. NW Calgary T2R 3Y7<br>(403) 962-6664</p></li>
                    <li><b>Chinook Centre</b><p>630 86 AVE. SW Calgary T9C 2W3<br>(403) 532-6152</p></li>
                    <li>+<p>Contact us for a <b>franchising</b> inquiry !</p></li>
                </ul>
            </div>
        </article> <!-----------------------------LOCATION--------------------------------------------------->
    
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