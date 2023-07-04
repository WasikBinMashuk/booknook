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
<html>
<head>
<title>BOOKNOOK</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@300&family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="customCSS/style.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>
<body>
    <section id="main-header">
        <a href="index.html"><img src="img/bn.png" class="logo"></a>
        <div>
            <ul id="navbar">

                <div class="search-container">
                    <form onsubmit="return ajsearch();">
                        <input type="text" placeholder="Search..." id="search" required/>
                        <button type="submit"><ion-icon name="search"></ion-icon></ion-icon></button>
                    </form>
                    <!-- SEARCH RESULTS -->
                    <div id="results"></div>
                </div>
                <li><a  href="index.php">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="preorder.php">Pre-order</a></li>
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
<li><a href="sellerProfile.php" style="text-decoration: none;" class="fas fa-user" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"></a></li>
                
            </ul>
        </div>
    </section>

    <section id="pro" class="section-p1">
        <h2>All Products</h2>
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
                                        <button onclick="location.href='rent.php'" style="width:100%;"  name="#">Rent</button>
                                        <form action="shop.php" method="POST"> 
                                        <button  style="margin-top:10px;width:100%;"  name="add" type="submit" class="ADDTOCART">ADD TO CART</button>
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


<!--cart code -->


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





 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<!-- custom js file link  -->
<script src="main.js"></script>
<script src="script.js"></script>
<script src="custom.js"></script>

<!--ion Icon cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/6.0.1/esm/ionicons.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://kit.fontawesome.com/dad4ea03f6.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="cartscript.js"></script>


<script>
function ajsearch () {
  // (A) GET SEARCH TERM
  var data = new FormData();
  data.append("search", document.getElementById("search").value);
  data.append("ajax", 1);
 
  // (B) AJAX SEARCH REQUEST
  fetch("search.php", { method:"POST", body:data })
  .then(res => res.json()).then((results) => {
    var wrapper = document.getElementById("results");
    if (results.length > 0) {
      wrapper.innerHTML = "";
      for (let res of results) {
        let line = document.createElement("div");
        line.innerHTML = `${res["name"]} - ${res["author_name"]}`;
        wrapper.appendChild(line);
      }
    } else { wrapper.innerHTML = "No results found"; }
  });
  return false;
}
</script> 

    
</body>
</html>