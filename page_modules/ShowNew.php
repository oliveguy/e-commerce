<!-- PHP While ShowAll module-->
<?php
    $query = "SELECT * FROM products WHERE specialty_new = 'Specialty'";
    $sql = mysqli_query($connection, $query);
    while($products = mysqli_fetch_array($sql)){ echo'
    <li>
        <a href="product_detail.php?id='.$products["id"].'"><img src="assets/images/products/w256_jpg/'.$products["img_filename_full"].'" alt="'.$products["product_name"].'"width="auto" height="113" class="listing_photo"></a>
        <a href="product_detail.php?id='.$products["id"].'"><h4 class="product_title">'.$products["product_name"].'</h4></a>
        <a href="product_detail.php?id='.$products["id"].'"><h5 class="product_brief">'.$products["product_brief"].'</h5></a>
        <hr class="divider">
        <div class="price_wish_cart">
            <h6 class="product_price">$ '.$products["price"].'</h6>
            <span>
                <a href="assets/pages/wish.php?product_id='.$products["id"].'"><img src="assets/images/icons/wish.png" alt="add  wishlist button" width="15"height="15"class="wish_cart_btn"></a>
                <a href="page_modules/tmp_cart.php?product_id='.$products["id"].'&qty=1"><img src="assets/images/icons/cart_small.png" alt="add cart button" width="15"height="15"class="wish_cart_btn"></a>
            </span>
        </div>
    </li>';
    }
?>