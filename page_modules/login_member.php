<?php
if(isset($_SESSION['login'])){
    include("page_modules/header.php");
    echo "<main>
    <img src='assets/images/grammys.svg' alt='Grammy's logo' width='200' height='auto'>
    <h1>Grammy's Login</h1>
    ";
    echo "<p>You are already logged in Grammy's Bakery!</p>";
    echo "<p>Browse our bread in Menu!</p>";
    echo "<a href='menu.php'>Menu</a>
    </main>";
    include("page_modules/footer.php");
}
?>