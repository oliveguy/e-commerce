<?php
    $query = "SELECT * FROM products WHERE id=$id";
    $sql = mysqli_query($connection, $query);
    $detail = mysqli_fetch_array($sql);
    echo '                
    <article>
        <div class="product_component" id="product_pic_name_brief">
            <img src="assets/images/icons/stars.png" alt="stars" width="112" height="18">
            <img src="assets/images/products/w800_png_revised/'.$detail["img_filename_png"].'" alt="'.$detail["product_name"].'" width="800" height="600" id="product_pic">
            <h2 id="product_name">'.$detail["product_name"].'</h2>
            <h3 id="product_brief">'.$detail["product_brief"].'</h3>
            <div id="share_reviw">
                <img src="assets/images/icons/share.png" alt="share icon" width="16" height="16"><p class="share_review">Share this item via email</p>
                <img src="assets/images/icons/review.png" alt="reiew icon" width="16" height="16"><p class="share_review">Customer\'s Review(+20)</p>
            </div>
            <p id="notice">* Product information or packaging displayed may not be current or complete.</p>
        </div>
        <div class="product_component" id="product_detail_info">
        '.$detail["description"].'
            <hr id="divider_product">
            <h4 id="product_price">$
                <span id="price_digit">'.$detail["price"].'</span>
                <span id="unit">/each</span>
            </h4>
            <ul>
                <li>24 hour delivery on order before noon on weekday</li>
                
                <li>Curb-side pickup available</li>
            </ul>
            <h4 id="nutrition_info">Nutrition Fact</h4>
            <table>
                <tbody>
                    <tr>
                        <td class="calories">Calories</td>
                        <td class="calories">'.$detail["NF_Calories"].' Kcal</td>
                    </tr>
                    <tr>
                        <td class="unit">Amount per '.$detail["Daily_Value_Unit"].'</td>
                        <td class="unit">% Daily Value</td>
                    </tr>
                    <tr>
                        <td><b>Total Fat: '.$detail["NF_Total_Fat"].'g</b></td>
                        <td>'.$detail["NF_Total_Fat_DV"].'%</td>
                    </tr>
                    <tr>
                        <td>Saturated Fat: '.$detail["NF_Saturated_Fat"].'g</td>
                        <td>'.$detail["NF_Saturated_Fat_DV"].'%</td>
                    </tr>
                    <tr>
                        <td><b>Cholesterol: '.$detail["NF_Cholesterol"].'mg</b></td>
                        <td>'.$detail["NF_Cholesterol_DV"].'%</td>
                    </tr>
                    <tr>
                        <td><b>Sodium: '.$detail["NF_Sodium"].'mg</b></td>
                        <td>'.$detail["NF_Sodium_DV"].'%</td>
                    </tr>
                    <tr>
                        <td><b>Total Carbohydrate: '.$detail["NF_Total_Carbohydrate"].'g</b></td>
                        <td>'.$detail["NF_Total_Carbohydrate_DV"].'%</td>
                    </tr>
                    <tr>
                        <td>Sugars: '.$detail["NF_Sugars"].'g</td>
                        <td>'.$detail["NF_Sugars_DV"].'%</td>
                    </tr>
                    <tr>
                        <td><b>Protein: '.$detail["NF_Protein"].'g</b></td>
                        <td>20%</td>
                    </tr>
                </tbody>
            </table>
            <h4 id="allergens">Allergens Information</h4>
            <p>gluten, eggs, milk</p>
            <p id="notice_change">Nutrition fact and Allergen information are subject to change due to Grammy\'s Bakery</p>
        </div>
        <div class="product_component" id="buy">
            <a><img src="assets/images/icons/available.jpg" alt="availability signal" width="15" height="15" >Available to order now</a>
            <ul>
                <li>Free delivery for member</li>
                <li>Flat delivery fee in Calgary city</li>
            </ul>
            <hr class="divider_product">
            <div id="product_buy">
                <img src="assets/images/products/w256_jpg/'.$detail["img_filename_full"].'" alt="'.$detail["product_name"].'" width="256" height="192" id="buy_product_pic">
                <div id="product_buy_info">
                    <p><b>'.$detail["product_name"].'</b></p>
                    <p>'.$detail["product_brief"].'</p>
                    <p><b>$ '.$detail["price"].' </b>/each</p>
                </div>
            </div>
            <div id="qty">
                <form action="page_modules/tmp_cart.php" method="GET" id="qty_selestor">
                    <div id="qty_wrapper">
                        <p><b>Quantity</b></p>
                        <div id="qty_control">
                            <input type="button" value="-" id="minus" class="operator">
                            <label for="qty"></label>
                            <input type="text" name="qty" value="1" id="qty_input">
                            <input type="button" value="+" id="plus" class="operator">
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="'.$detail["id"].'">
                    <hr class="divider_product" id="divider_buy">
                    <p id="sub_total"><b>Total/ <span class="bigbold_price">$</span><span class="bigbold_price" id="sub_total_span">'.$detail["price"].'</span></b></p>
                    <input type="image" src="assets/images/icons/addcart_btn.jpg" alt="Submit" width="178" height="40">
                    <input type="image" src="assets/images/icons/buynow_btn.jpg" alt="Submit" width="178" height="40">
                    <a href="wish.php?id='.$detail["id"].'"><img src="assets/images/icons/addwisht_btn.jpg" alt="wishlistbutton" width="178" height="40"></a>
                </form>
                <a href="">
                    <img src="assets/images/giftcard_banner.jpg" alt="Grammy\'s gift card" width="178" height="115">
                </a>
            </div>
        </div>
    </article>
'; 
?>