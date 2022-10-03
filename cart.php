<?php
    session_start();
    include("page_modules/DB_connection.php");
    include("page_modules/login_status.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grammy's Bakery || Cart &amp; Checkout</title>
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/header.css">
</head>
<body>
<?php include("page_modules/header.php"); ?>
    </header>
    <main>
        <article id="checkout_info">
            <h1>Cart &amp; Order</h1>
            <img src="assets/images/checkout_info.jpg" alt="checkout_information" width="809" height="122">
            <div id="checkout_info_text">
                <p><b>Grammy's Bakery Order</b></p>
                <p>Before you proceed payment, please select delivery time slot in the end of this cart item list.</p>
                <p>Deactivated slot(s) in grey color is not available now</p>
            </div>
        </article>
        <section id="cartitems_checkout">
            <article id="cart">
                <h3>Your Cart</h3>
                <hr>
                <ul id="cart_items">
                    <?php include("page_modules/cartShow.php");?>
                </ul>
                    <?php include("page_modules/cartSub-total.php");?>               
            </article>
            <article id="checkout">
                <form action="page_modules/order_process.php" method="POST">
                    <div id="delivery" class="delivery_payment">
                        <h3 id="delivery">Delivery</h3>
                        <hr>
                        <p class="title">Delivery Time Slot</p>
                        <p class="title_description">Select the delivery time slot you want</p>
                        <p><b>Today, <?php echo date("F, j Y"); ?></b></p>
                        <p>Depart from one of our locations</p>
                        <div id="delivery_time">
                            <input type="radio" name="delivery_time" value="AM_09:00" id="AM_09:00">
                            <label for="AM_09:00" class="delivery_time_btn">AM 09:00</label>
                            <input type="radio" name="delivery_time" value="AM_11:00" id="AM_11:00">
                            <label for="AM_11:00" class="delivery_time_btn">AM 11:00</label>
                            <input type="radio" name="delivery_time" value="PM_01:00" id="PM_01:00">
                            <label for="PM_01:00" class="delivery_time_btn">PM 01:00</label>
                            <input type="radio" name="delivery_time" value="PM_03:00" id="PM_03:00">
                            <label for="PM_03:00" class="delivery_time_btn">PM 03:00</label>
                        </div>
                        <div id="contact_info">
                            <p class="title" id="contact_info_title">Contact Information</p>
                            <p class="title_description" id="contact_info">Add your information or login for automatic input</p>
                            <p id="required">*required</p>
                            <div id="input_field">
                                <div>
                                    <label for="fname" class="input_label">First name*</label>
                                    <input type="text" name="fname" class="input_field">

                                    <label for="lname" class="input_label">Lasst name*</label>
                                    <input type="text" name="lname" class="input_field">

                                    <label for="m_number" class="input_label">Mobile Number*</label>
                                    <input type="text" name="m_number" class="input_field" placeholder="+1 000-000-0000">

                                    <label for="email" class="input_label">E-mail*</label>
                                    <input type="text" name="email" class="input_field">
                                </div>
                                <div>
                                    <label for="address" class="input_label">Address*</label>
                                    <input type="text" name="address" class="input_field">
    
                                    <label for="city" class="input_label">City*</label>
                                    <input type="text" name="city" class="input_field">
    
                                    <label for="province" class="input_label">Province/Territory*</label>
                                    <select name="province" id="province">
                                        <option value="">--Province--</option>
                                        <option value="AB">Alberta</option>
                                        <option value="BC">British Columbia</option>
                                        <option value="MB">Manitoba</option>
                                        <option value="NB">New Brunswick</option>
                                        <option value="NL">Newfoundland and Labrador</option>
                                        <option value="NS">Nova Scotia</option>
                                        <option value="ON">Ontario</option>
                                        <option value="PE">Prince Edward Island</option>
                                        <option value="QC">Quebec</option>
                                        <option value="SK">Saskatchewan</option>
                                        <option value="NWT">Northwest Territories</option>
                                        <option value="NU">Nunavut</option>
                                        <option value="YT">Yukon</option>
                                    </select>
    
                                    <label for="postal_code" class="input_label">Postal code*</label>
                                    <input type="text" name="postal_code" class="input_field">
                                </div>
                            </div>
                            <label id="special_note">Special request or note(optional)</label>
                            <textarea name="request" id="request" cols="42" rows="2" placeholder="please leave your message here.."></textarea>
                        </div>
                    </div>
                    <div id="payment" class="delivery_payment">
                    <?php include("page_modules/total_detail.php"); ?>
                        <div id="payment_method">
                            <p class="title">Payment method</p>
                            <p class="title_description">Add your payment method</p>
                            <div id="payment_sub">
                                <input type="radio" name="payment_method" value="card" id="card" class="payment_select" checked>
                                <label for="card" id="pay_card">Credit or debit card</label>
                                    <label for="card_number" class="input_label">Card number*</label>
                                    <input type="text" name="card_number" class="input_field" placeholder="0000-0000-0000-0000">
                                    <label for="card_name" class="input_label">Name on card*</label>
                                    <input type="text" name="card_name" class="input_field">
                                    <label for="card_expiration" class="input_label">Expiration Date(MM/YY)*</label>
                                    <input type="text" name="card_expiration" class="input_field" placeholder="MM/YY">
                                    <label for="card_cvc" class="input_label">CVC(3 digits in signiture space)*</label>
                                    <input type="text" name="card_cvc" class="input_field" placeholder="000">
                                <div class="newpayment">
                                    <input type="radio" name="payment_method" value="paypal" id="paypal" class="payment_select">
                                    <label for="paypal"><img src="assets/images/icons/paypal.jpg" alt="paypal logo" width="118" height="50" class="newpayment"></label>
                                </div>
                                <div class="newpayment">
                                    <input type="radio" name="payment_method" value="e-transfer" id="e-transfer" class="payment_select">
                                    <label for="e-transfer"><img src="assets/images/icons/e-transper.jpg" alt="e-transfer logo" width="118" height="50" class="newpayment"></label>
                                </div>
                                <div id="agree_terms">
                                    <input type="checkbox" id="agree" name="agree" required>
                                    <label for="agree" id="agree_terms_contents">I am confirming that I have read and agree to Grammy’s Terms of Use and Privacy Policy.</label>
                                </div>
                                <div id="orderpassword">
                                    <label for="orderpwd" id="order_pwd_label">Order Password*</label>
                                    <input type="password" name="orderpwd" id="order_pwd" min="8" max="20" required >
                                </div>
                            </div>
                            <input type="submit" value="Confirm and Processd Payment" id="submit_btn">      
                        </div>
                    </div>
                </form>
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
</script>
</body>
</html>