<?php 
include 'connect.php';
include 'myFunctions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="customCSS/style.css">
    <!-- custom css file link  -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" type="image" style="height: 900px;" href="ICONLOGO (3).png">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

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
<li><a href="sellerProfile.php" style="text-decoration: none;" class="fas fa-user"></a></li>
            </ul>
        </div>
    </section>

<form action="orderProductCode.php" method="post" enctype="multipart/form-data">
<div class="float-container" style="display: flex;">
    <div class="left" style="width: 60%; margin-top:4%; margin-left:10px; padding: 0 15px; box-shadow: 5px 10px #888888; ">
  <div class="input-group mb-3">
    <label for="">Upload Image</label>
    <input type="file" name="image" class="form-control">
  </div>
  <div class="input-group mb-3">
    <label for="">Book Name</label>
    <input type="text" name="bookname" class="form-control">
  </div>
  <div class="input-group mb-3">
    <label for="">Author Name</label>
    <input type="text" name="authorname" class="form-control">
  </div>
  <div class="input-group mb-3">
    <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity of the Products" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  
  
  <!-- CheckBox for original 1 and mastercopy2 -->
  <div class="input-group mb-3">
     <label style="font-size: large ;"><p> Select type</p></label>
      <div class="input-group mb-3">
         <input type="checkbox" name="new">
         <label for="">New Book</label>
      </div>
      <div class="input-group mb-3">
         <input type="checkbox" name="old">
         <label for="">Old Book</label> 
    </div>
  
  </div>

  <div class="input-group mb-3">
    <label for="">Address</label>
    <input type="text" name="address" class="form-control">
  </div>
  <div class="input-group mb-3">
    <label for="">Phone Number</label>
    <input type="text" name="phone" class="form-control">
  </div>
  
  
  <!--Quantity -->
  
  <!---->
  <p>Note: You will be notified once your ordered product is approved after a required number of similar order has been recieved. Thank You </p>
  
  
  <div class="input-groupbtn mb-3">
      <button type="submit" class="btn btn-danger" name="submit_order">Submit Order</button>
  </div>
 
  
  
  </div>




<!-- LOST OG ORDERS -->

<div class="right-side" style="flex-grow: 1;box-shadow: 5px 10px #888888; margin-left:30px;">
  <section class="ListOrder">

<h1 style="margin-left:50%;">List Of Orders</h1>
<!--Images and labels of being pending or confirmed-->
<div>
<table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="padding:0 5; font-size:11px;">Product Image</th>
                            <th style="padding:0 5; font-size:11px;">Product Quantity</th>
                            <th style="padding:0 5; font-size:11px;">Order Date</th>
                            <th style="padding:0 5; font-size:11px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php
                              $userName=$_SESSION['user_description']['name'];
                              $orders=getByUserName("order_product",$userName);
                              if(mysqli_num_rows($orders)>0){
  
                                foreach( $orders as $item ){
                                  ?>
                                     <td> <img src="uploads/<?=$item['product_img']?>" width="50px" height="50px">
                                      </td>
                                      <td style="padding:0 5; font-size:11px; font-weight:bold;"><?=$item['quantity']?></td>
                                      <td style="padding:0 5; font-size:11px; font-weight:bold;"><?=$item['order_date']?></td>
                                      <?php
                                      if($item['status']==0){
                                        ?>
                                          <td style="padding:0 5; font-size:11px; font-weight:bold;">Pending</td>
                                        <?php
                                      }
                                      else if($item['status']==1){
                                        ?>
                                          <td style="padding:0 5; font-size:11px; font-weight:bold;">Accepted</td>
                                        <?php
                                      }
                                      else{
                                        ?>
                                          <td style="padding:0 5; font-size:11px; font-weight:bold;">Cancelled</td>
                                        <?php
                                      }
                                      ?>
                                     </tr>
                                    <?php
                                }
                              }
                            

                              ?>
</tbody>
</table>

</form>
</div>


</section>
</div>
                            </div>







<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- custom js file link  -->

<!--ion Icon cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/6.0.1/esm/ionicons.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</script>
</body>
</html>
    
</body>
</html>