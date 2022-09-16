<?php
session_start();
include("page_modules/DB_connection.php");
include("page_modules/login_status.php");
$title = "Menu";
$_SESSION['show_query'] = " WHERE top_category='Salad'";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grammy's Bakery || <?= $title?></title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/Menu.css">
</head>
<body>
    <?php include("page_modules/header.php");?>
</header>
<?php include("page_modules/aside.php");?>
    <main>
    <div id="sub_header">
        <h1>Menu</h1>
        <p>We bake freshly everyday</p>
    </div>
    <div id="menu_nav_new_menu">
        <div class="wrapper">
            <div id="menu_nav">
                <img src="assets/images/grammys.svg" alt="Grammy bakery logo" width="50" height="auto" id="grammylogo">
                <ul>
                    <li><a>New Bread</a></li>
                    <li><a>Specialty</a></li>
                    <li><a>Sale</a></li>
                    <li><a href="category_cake.php">Cake</a></li>
                    <li><a href="category_bread.php">Bread</a></li>
                    <li><a href="category_tartmuffin.php">Tart &amp; Muffin</a></li>
                    <li><a href="category_sandwich.php">Sandwich</a></li>
                    <li><a href="category_salad.php">Salad</a></li>
                    <li><a href="category_dessert.php">Dessert</a></li>
                    <li><a href="category_jam.php">Jam</a></li>
                </ul>
                <div id="sale_banner">
                    <h3>20% OFF</h3>
                    <h2>SALE!</h2>
                    <p>20% off on the week of St. Patrick Day from March 14 to March 20 2022 Don't miss this promotion!</p>
                    <a href="#" class="more_btn">More</a>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div id="new_menu">
                <div id="new_menu_header">
                    <h2>New Menu</h2>
                    <p>Available from Apr.22 Tuesday, 2022</p>
                </div>
                <div id="new_menu_big">
                    <img src="assets/images/products/w256_jpg/3_full_espressotornado.jpg" alt="">
                    <div id="big_text_wrapper">
                        <h3>Ms.Lemon</h3>
                        <p>Fresh lemon cake layered with 3 lemony cakes emon cream in between layers ell-zested lemon filling on the top</p>
                        <div id="user_btn">
                            <a href="#" id="more_btn_big">More</a>
                            <a href="#"><img src="assets/images/icons/wish.png" alt="add  wishlist button" width="15"height="15"class="wish_cart_btn"></a>
                            <a href="#"><img src="assets/images/icons/cart_small.png" alt="add cart button" width="15"height="15"class="wish_cart_btn"></a>
                        </div>
                    </div>
                </div>
                <hr>
                <div id="carousel_wrapper">
                    <ul id="new_menu_carousel">
                        <?php include("page_modules/ShowNew.php");?>
                    </ul>
                </div>
                <div id="control">
                    <img src="assets/images/icons/preview.png" alt="preview button" width="20" height="38" class="prev">
                    <img src="assets/images/icons/next.png" alt="next button" width="20" height="38" class="next">
                </div>
            </div>
        </div>
    </div>
    <div id="sort">
        <h3 id="browse">Browse our fresh bread!</h3>
        <form action="#">
            <p>Sort bread by</p>
            <div>
                <select name="price" id="sort_price">
                    <option value="asc">Price</option>
                    <option value="asc">Ascending Order</option>
                    <option value="desc">Descending Order</option>
                </select>
                <select name="Calories" id="sort_calorie">
                    <option value="asc">Calories</option>
                    <option value="asc">Ascending Order</option>
                    <option value="desc">Descending Order</option>
                </select>
            </div>
        </form>
        <p>
            <a href="menu.php">All bread</a><span> .</span>
            <a href="category_cake.php">Cake</a><span> .</span>
            <a href="category_bread.php">Bread</a><span> .</span>
            <a href="category_tartmuffin.php">Tart &amp; Muffin</a><span> .</span>
            <a href="category_sandwich.php">Sandwich</a><span> .</span>
            <a href="category_salad.php" style="color:#000;border-bottom:1px solid #000">Salad</a><span> .</span>
            <a href="category_dessert.php">Dessert</a><span> .</span>
            <a href="category_jam.php">Jam</a>
        </p>
    </div>
    <ul id=allproducts>
        <?php include("page_modules/ShowAll.php");?>
    </ul>
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
        var carousel = document.querySelector("#new_menu_carousel"),
            slide = document.querySelectorAll("#new_menu_carousel li"),
            currentIndex = 0,
            slideCount = slide.length,
            slideWidth = 150,
            slideMargin = 10,
            preview = document.querySelector(".prev"),
            next = document.querySelector(".next");

            makeClone();
            
            function makeClone(){
                for(let i=0;i<slideCount;i++){
                    let cloneSlide = slide[i].cloneNode(true);
                    cloneSlide.classList.add('clone');
                    carousel.appendChild(cloneSlide);
                }
                for(let i=slideCount-1; i>=0; i--){
                    let cloneSlide = slide[i].cloneNode(true);
                    cloneSlide.classList.add('clone');
                    carousel.prepend(cloneSlide);
                }
                updateWidth();
                setInitialPos();
                setTimeout(function(){
                    carousel.classList.add("animated");
                },100);
            }
            
            function updateWidth(){
                let currentCarousel = document.querySelectorAll("carousel li");
                let newSlideCount = currentCarousel.lenght;

                let newWidth = (slideWidth + slideMargin)*newSlideCount -slideMargin +"px";
                carousel.style.width = newWidth;
            }
            function setInitialPos(){
                let intialTranslateValue = -(slideWidth + slideMargin)*slideCount;
                carousel.style.transform= "translateX("+intialTranslateValue+"px)";
            }
            next.addEventListener('click', function(){
                moveSlide(currentIndex + 1);
            })
            preview.addEventListener('click', function(){
                moveSlide(currentIndex - 1);
            })

            function moveSlide(num){
                carousel.style.left = -num * (slideWidth + slideMargin) +"px";
                currentIndex =num;
                console.log(currentIndex, slideCount);
                if(currentIndex == slideCount || currentIndex == -slideCount){
                    
                    setTimeout(function(){
                        carousel.classList.remove("animated");
                        carousel.style.left ="0px";
                        currentIndex = 0;
                    }, 500);
                    setTimeout(function(){
                        carousel.classList.add("animated");
                    },600);
                }
            }   

    </script>
    <script src="assets/js/sort.js"></script>
</body>
</html>