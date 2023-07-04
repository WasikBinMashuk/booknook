<!DOCTYPE html>
<html>
<head>
<title>BoiHat</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;200;300;400;700;800;900&family=Poppins:wght@100;300;400;500;600&display=swap">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cartstyle.css">
</head>
<body>
    <section id="main-header">
        <a href="index.html"><img src="image/icon.png" class="logo"></a>
        <div>
            <ul id="navbar">
                <li><a class="active" href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>

                <li><a href="preorder.html">pre-order</a></li>
                <li class="cart">
                    <a href="cart.html">
                        <ion-icon name="basket"></ion-icon>cart<span>0</span></a>
                </li>
                
            </ul>
        </div>
    </section>
    <div class="products-container">
        <div class="product-header">
            <h5 class="product-title">PRODUCT</h5>
            <h5 class="price">PRICE</h5>
            <h5 class="quantity">QUANTITY</h5>
            <h5 class="total">TOTAL</h5>
        </div>
        <div class="products">

        </div>

        <button  style=" background-color:rgb(163, 33, 85);  border:1px solid rgb(163, 33, 85);" type="submit" name="submit" class="btn btn-primary signin-btn" onclick="location.href = 'checkout.php'">Check Out</button>
    </div>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="cartscript.js"></script>
    </body>
</html>