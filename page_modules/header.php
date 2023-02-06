<?php
session_start();
include("page_modules/DB_connection.php");


if(isset($_SESSION['login'])){
    $user_name = $_SESSION['user_name'];
    
    $query = "SELECT date_time FROM login_log WHERE id = ".$_SESSION['last_id']-1;
    // $query = "SELECT date_time FROM login_log WHERE id < ".$_SESSION['last_id'];
    $sql = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($sql);
    $user_login_datetime = $row['date_time'];

// $user_login_datetime = $_SESSION['login_datetime'];
}else{
    $user_name = "Customer";
}
// <a href="index.php"><h1>Grammy\'s Bakery</h1></a>

echo '
<header>
    <div id="top_header">
        <div id="logo_h1_wrapper">
            <a href="index.php"><img src="assets/images/mainlogo.png" alt="coco-bakery-logo" width="800" height="558" id="mainlogo"></a>
            
        </div>
        <ul> <!-- User Navigation -->';            
            
            if(!isset($_SESSION['login'])){
                echo '
                <li><a href="/assets/pages/signup.php" class="user_nav_menu">Sign up</a></li>
                <li class="user_nav_login"><a href="login.php" class="user_nav_menu">Log in</a></li>'
            ;}
            echo '
            <li id="user_nav_username">
                <a href="#" class="user_nav_menu">Account &amp; Order
                <p>Hello, '.$user_name.'!</p>
                </a>
            </li>
            <li><a href="cart.php" id="cart"><img src="assets/images/icons/shopping_cart_big.jpg" alt="shoppingcart_icon" width="40" height="40"></a></li>
        </ul>
        <div id="user_panel"> <!-- User Navigation panel || Default: display:none; -->
            <div id="user_info">
                <img src="assets/images/icons/default_user_icon.jpg" alt="default_user_icon" width="30" height="30" id="user_icon">
                <div id="user_status">
                    <p id="username_userpanel">'.$user_name.' <span id="usergrade_userpanel"> / Silver member</span></p>
                    <p id="lastlogin_userpanel">';
                    if(isset($_SESSION['login'])){
                        echo "Last Login: ".$user_login_datetime;
                    }
                    echo '</p>
                </div>
                <a href="page_modules/logout.php">Logout</a> 
            </div>
            <div id="userpanel_menu">
                <ul>
                    <li class="user_panel_heading"><a href="#">Manage Account</a>
                        <ul>
                            <li><a href="#">View my Profile</a></li>
                            <li><a href="#">Edit my Profile</a></li>
                            <li><a href="#">Change Password</a></li>
                            <li><a href="#">Grammy\'s Mileage</a></li>
                            <li><a href="#">Notification</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Delete my Account</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="user_panel_heading"> <a href="../cart.php">Order &amp; Shopping</a>
                        <ul>
                            <li><a href="cart.php">View my Order</a></li>
                            <li><a href="cart.php">View my Cart</a></li>
                            <li><a href="cart.php">Wish List</a></li>
                            <li><a href="cart.php">Track Orders</a></li>
                            <li><a href="cart.php">My history</a></li>
                            <li><a href="cart.php">Payment</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="user_panel_heading"><a href="#">Customer Centre</a>
                        <ul>
                            <li><a href="#">Member\'s benefits</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact Info.</a></li>
                            <li><a href="#">Return Policy</a></li>
                            <li><a href="#">Catering Inquery</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a id="user_panel_close">
                <img src="assets/images/icons/close_btn.jpg" alt="close_button"width="25" height="25">
            </a>
        </div>
    </div>
    <nav> <!-- Main Navigation -->
        <ul id="main_nav"> 
            <li>
                <a href="brand.php">BRAND</a>
                <ul class="hidden_nav_menu">
                    <li><a href="#">Brand Story</li></a>
                    <li><a href="#">Ingredients</li></a>
                    <li><a href="#">How to Bake</li></a>
                    <li id="social_media_wrapper">
                        <img src="assets/images/icons/Twitter_white_36_36.png" alt="twitterIcon" width="36" height="36" class="socialmedia_icon">
                        <img src="assets/images/icons/YouTube_white_36_36.png" alt="YouTubeIcon" width="36" height="36" class="socialmedia_icon">
                        <img src="assets/images/icons/Instagram_white_36_36.png" alt="InstagramIcon" width="36" height="36" class="socialmedia_icon">
                    </li>
                </ul>
            </li>
            <li>
                <a href="menu.php">MENU</a>
                <ul class="hidden_nav_menu">
                    <li><a href="category_cake.php">Cake</a></li>
                    <li><a href="category_bread.php">Bread</a></li>
                    <li><a href="category_tartmuffin.php">Tart &amp; Muffin</a></li>
                    <li><a href="category_sandwich.php">Sandwich</a></li>
                    <li><a href="category_salad.php">Salad</a></li>
                    <li><a href="category_dessert.php">Dessert</a></li>
                    <li><a href="category_jam.php">Jam</a></li>
                </ul>
            </li>
            <li>
                <a href="#location_wrapper">LOCATION</a>
                <ul class="hidden_nav_menu">
                    <li><a href="#location_wrapper">Kensington</a></li>
                    <li><a href="#location_wrapper">Loyal Mount</a></li>
                    <li><a href="#location_wrapper">Chinook Centre</a></li>
                    <li><a href="#location_wrapper">Beltline</a></li>
                    <li><a href="#location_wrapper">Cross Iron Mill</a></li>
                </ul>
            </li>
            <li>
                <a href="#">ORDER</a>
                <ul class="hidden_nav_menu">
                    <li><a href="cart.php">Online Order</a></li>
                    <li><a href="cart.php">Notice</a></li>
                    <li><a href="cart.php">CS Centre</a></li>
                </ul>
            </li>
            <li>
                <a href="#">NEWS</a>
                <ul class="hidden_nav_menu">
                    <li><a href="#">Promotion</a></li>
                    <li><a href="#">Career</a></li>
                </ul>
            </li>
        </ul>
    </nav>
';
?>