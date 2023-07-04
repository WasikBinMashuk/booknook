<?php
include "connect.php";
include "myFunctions.php";


if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['pid'], $item_array_id)){
            redirect("index.php","Product is already added in the cart..!"); 
    }else{

        $count = count($_SESSION['cart']);
        $item_array = array(
            'product_id' => $_POST['pid']
        );

        $_SESSION['cart'][$count] = $item_array;
    }

}else{

        $item_array = array(
                'product_id' => $_POST['pid']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
    }
}

else if(isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                redirect("index.php","Product has been removed"); 
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoiHat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@300&family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="customCSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
    <section id="main-header">
        <a href="index.html"><img src="img/bn.png" class="logo"></a>
        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="preorder.php">PreOrder</a></li>
                <li><a href="sellbook.php">Sell Books</a></li>
                <li><a style="text-decoration:none;" href="review.php">Review</a></li>
                <li> <a href="#" style="text-decoration: none;" class="fas fa-shopping-cart" data-bs-target="#exampleModal5" data-bs-toggle="modal" aria-hidden="true"></a></li>
        <?php
if (isset($_SESSION['cart'])){
    $count = count($_SESSION['cart']);
    ?>
    <span id='cart_count' class='text-warning bg-dark'><?=$count?></span>
    <?php
}
else{
    ?>
    <span id='cart_count' class='text-warning bg-dark'>0</span>;
    <?php
}
?>
<li><a href="sellerProfile.php" style="text-decoration: none;" class="fas fa-user"> </a>
</li>
            </ul>
        </div>
    </section>
    <section id="header-bottom">
        <p>We are proud to release our project website. We value your <font color="#F15726">feedback</font>.</p>
    </section>
    <section id="hero">
        <div class="content">
            <h1>Buy and sell your books<br>at the <span>Best Price</span></h1> 
        </div>
       
    </section>
    <section id="service" class="section-p1">
        <h2>Why buy books with BoiHut?</h2>
        <div>
            <div class="icon-box">
                <img src="img/search.svg">
                <p>Find your desire book <br>with a single <strong>search</strong></p>
            </div>
            <div class="icon-box">
                <img src="img/saving.svg">
                <p><strong>Save</strong> up to 70% on <strong>Coupon</strong></p>
            </div>
            <div class="icon-box">
                <img src="img/talk.png">
                <p>Talk Directly to the <strong>seller</strong></p>
            </div>
        </div>

    </section>
    <hr class="divider">
    <section id="pro" class="section-p1">
        <h2>Featured Boooks</h2>
        <div class="pro-container">
                   <?php
                    $product=getAll("products");

                    if(mysqli_num_rows($product)>0){
                        foreach($product as $item){
                    ?>                     
                                  <div class="product">
                                    <img src="uploads/<?=$item['image']?>">
                                    <div class="pro-title">
                                        <h5><?=$item['name']?></h5>
                                        <span><?=$item['author_name']?></span>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4><?=$item['selling_price']?>Tk</h4>
                                        <a href="#"><img src="img/cart.png" alt=""></a>
                                        <form action="index.php" method="POST"> 
                                        <button name="add" type="submit" class="ADDTOCART">ADD TO CART</button>
                                        <input type="hidden" name="pid" value="<?= $item['id'] ?>"> 
                                        </form> 
                                    </div>
                                </div>
                                <?php
                        }
                    }
                    ?>
                            </div>
        
    </section>



    <section id="rating" class="section-p1">
        <div class="image">
            <img src="img/8bffd6db9d44480ee6fbcca31eebd796-removebg-preview.png">
        </div>
        <div class="rating-contect">
            <h2>Seller Ratings & Reviews</h2>
            <p>BoiHat users can rate and review each vendor with our feedback system. <br>We display this rating next to each textbook rental website so you can buy your college books with confidence.</p>
            <div class="star">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star last"></i>
            </div>
        </div>
    </section>
    <section id="pro" class="section-p1">
        <h2>New Added Books</h2>
        <div class="pro-container">
            <div class="product">
                <img src="img/new_book1.jpg">
                <div class="pro-title">
                    <h5>Harry Poter</h5>
                    <span>J.K Rowling</span>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>৳80</h4>
                </div>
                <a href="#"><img src="img/cart.png" alt=""></a>
            </div>
            <div class="product">
                <img src="img/new_book2.jpg">
                <div class="pro-title">
                    <h5>The Lord Of The Rings</h5>
                    <span>J.R.R Tolkien</span>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>৳100</h4>
                </div>
                <a href="#"><img src="img/cart.png" alt=""></a>
            </div>
            <div class="product">
                <img src="img/new_book3.jpeg">
                <div class="pro-title">
                    <h5>Red White & Royel Blue</h5>
                    <span>Casey Mcquiston</span>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>৳90</h4>
                    <button class="ADDTOCART">ADD TO CART</button>
                </div>
                <a href="#"><img src="img/cart.png" alt=""></a>
            </div>
            <div class="product">
                <img src="img/new_book4.jpg">
                <div class="pro-title">
                    <h5>The Book Theif</h5>
                    <span>Markus Zusak</span>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>৳110</h4>
                </div>
                <a href="#"><img src="img/cart.png" alt=""></a>
            </div>
        </div>
    </section>
    <hr class="divider">
    <section id="app" class="section-p1">
        <div class="app-content">
            <h2>Our Mobile App</h2>
            <p>We are currently working on our mobile app. Once it's ready, you will be able to download the app...</p>
            <button>for Android</button>
            <button class="ios">for iOS</button>
        </div>
        <div class="app-image">
            <img src="img/mobileapp.svg" alt="">
        </div>
    </section>
    <section id="main-footer">
        <div class="footer-menu">
            <ul>
                <li><a href="">FAQ</a></li>
                <li><a href="">Our Policy</a></li>
                <li><a href="">Contact</a></li>
                <span>|</span>
                <li><a href="">Buy</a></li>
                <li><a href="">Sell</a></li>
                <li><a href="">Be Our Partner</a></li>
            </ul>
        </div>
        <hr class="l">
        <div class="Social-icons">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-whatsapp"></i>
        </div>
    </section>
    <section id="abs-footer">
        <p>Copyright ©2022 BoiHat, Campus Project</p>
    </section>


    <section>
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <H4 id="modal-signin">SIGN IN</H4>
                        
            <form action="login.php" method="POST" class="login">
              <div class="form-group">
                <input style="text-transform:none;" type="email" name="email"  class="form-control gap1 input-box" placeholder=" Enter Your Email" id="email" required> 
              </div>
              <div class="form-group">      
                <input style="text-transform:none;" type="password" name="pass" class="form-control gap1 input-box" placeholder="Enter Your Password" id="pwd" required>
              </div>
              <button style=" background-color:rgb(163, 33, 85);  border:1px solid rgb(163, 33, 85);" type="submit" name="submit" class="btn btn-primary signin-btn ">Sign in</button>
              <a class="forgot" style="text-decoration: none; margin-left:20%;"  data-bs-target="#exampleModal4" data-bs-toggle="modal" href="#">Forgot Password?</a>
            </form>
                      </div>
                      <div class="modal-footer">
                        <button style="margin-right:34%;background-color:rgb(163, 33, 85);  border:1px solid rgb(163, 33, 85);" class="btn btn-primary"  data-bs-target="#exampleModal3" data-bs-toggle="modal">Create Account</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Hide this modal and show the first with the button below.
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                      </div>
                    </div>
                  </div>
                </div>
              </section>



             <!-- cart Code  -->

             <section>
                        <!-- Modal for signing in -->
                        <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header" style="border: none;">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="padding:0 5; font-size:11px;">Product Name</th>
                            <th style="padding:0 5; font-size:11px;">Product Image</th>
                            <th style="padding:0 5; font-size:11px;">Product Price</th>
                            <th style="padding:0 5; font-size:11px;">Total Price</th>
                            <th style="padding:0 5; font-size:11px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                 <?php
                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result =getAll("products");
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    $total+=(int)$row['selling_price'];
                                    ?>

                            <tr>
                            <td style="padding:0 5; font-size:11px; font-weight:bold;"><?=$row['name']?></td>
                            <td>
                                <img src="uploads/<?=$row['image']?>" width="50px" height="50px" alt="<?=$row['name']?>">
                            </td>
                            <td style="padding:0 5; font-size:11px; font-weight:bold;"><?=$row['selling_price']; ?></td>
                            <td style="padding:0 5; font-size:11px; font-weight:bold;">
                             <form action="index.php?action=remove&id=<?=$id?>" method="post">
                            <button style="width:70px; color:white;" type="submit" class="btn btn-sm btn-info" name="remove">REMOVE</button>

                                </form>
                            </td>
                            <td>
                            <button onclick="location.href='cartDetails.php'" style="width:70px; color:white;" type="button" class="btn btn-sm btn-info" name="updateQty">EDIT</button>
                                </td>

                        </tr>
                                </div>

                                <?php
                                   
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>
                </tbody>

           </table>

           <h4>Total Price &nbsp;&nbsp; BDT&nbsp;<?= $total?></h4>
           <?php
                            $_SESSION['total_price']=$total;
                             ?>
                                   <button style="height:30px; width:100px; font-size:14px; color:white;float:right;" onclick="location.href='checkout.php'" class="btn btn-info">CheckOut</button>
                               </div> 
                              </div>
                            </div>
                          </div>
                        </div>
                            </section>



              <!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- custom js file link  -->
<script src="main.js"></script>
<script src="script.js"></script>
<script src="custom.js"></script>

<!--ion Icon cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/6.0.1/esm/ionicons.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://kit.fontawesome.com/dad4ea03f6.js" crossorigin="anonymous"></script>

<script>
    <?php
    if(isset($_SESSION['message'])){
        ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<?=$_SESSION['message']; ?>');
<?php
    } 
    unset($_SESSION['message']);
    ?>  
</script>
</body>
</html>