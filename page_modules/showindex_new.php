<?php

$query = "SELECT id, img_filename_full, product_name, product_brief, price FROM products LIMIT 4";
$sql = mysqli_query($connection, $query);
while($products = mysqli_fetch_array($sql)){
echo'
<li>
<img src="assets/images/products/w256_jpg/'.$products["img_filename_full"].'" alt="'.$products["product_name"].'" width="256" height="192">
<h4 class="product_name">'.$products["product_name"].'</h4>
<p class="product_brief">'.$products["product_brief"].'</p>
<hr class="divider">
<div>
    <p class="small_price">$ '.$products["price"].'</p>
    <img src="assets/images/icons/wish.png" alt="wishlist_icon" class="wishlist_cart_btn">
    <a href=page_modules/tmp_cart.php?product_id='.$products["id"].'&qty=1><img src="assets/images/icons/cart_small.png" alt="add_cart_icon" class="wishlist_cart_btn"></a>
</div>
</li>  
';}

?>