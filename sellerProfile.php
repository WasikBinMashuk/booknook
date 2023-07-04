<?php
include "connect.php";
include "login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKNOOK</title>
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
        <a href="index.php"><img src="" class="logo"></a>
        <div>
            <ul id="navbar">
                <li><a class="active" href="sellerPage.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="index.php" style="text-decoration: none;" class="btn btn-danger">Log Out</a></li>
            </ul>
        </div>
    </section>

<!-- header section ends -->

<!-- home section starts  -->

    
    <!-- header section ends -->

    <!-- header My Profile  starts -->
    <div class="container-fluid p-4  shadow mx-auto" style="max-width: auto;">
    
    <div class="row">
    <div class="col-sm-4 col-md-3">
        
        <img src="32 copy.JPG" class=" border border-primary d-block mx-auto rounded-circle" style=" width: 120px;" >
        
    
    </div>
    <div class="col-sm-6 col-md-7 bg-light p-2">
        <table class="table table-hover table-striped table=bordered">
            
            <tr><th> Username:</th><td><?=$_SESSION['user_description']['name'];?></td></tr>
            <tr><th> Address:</th><td>Dhaka, Bangladesh</td></tr>
            <tr><th>Date of Birth:</th><td>22-11-1997</td></tr>
            <tr><th> Gender:</th><td>Female</td></tr>

            
        </table>
    </div>
  
  </div>
  <br>
  <div class="container-fluid ">
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#Accountinfo">Acccount Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Username & Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Order & Returns</a>
        </li>
        
      </ul>
      <div data-bs-spy="scroll" data-bs-target="#Accountinfo" data-bs-offset="0" class="scrollspy-example" tabindex="0">
       <!---- <h4 id="scrollspyHeading1">Accountinfo</h4>-->
        
 <div class="container-fluid p-4  shadow mx-auto" style="max-width: auto;">
    <div class="card"> 
        <div class="info">
            <!---- <span><h4></h4>Edit form</h4></span> -->
             <button id="savebutton">edit</button>
             </div> <div class="forms"> 
                         <div class="inputs"> 
                             <span>Date of Birth</span>
                              <input type="text" readonly value="10-01-1997"> 
                            </div> 
                            <div class="inputs"> 
                                <span>Gender</span>
                                 <input type="text" readonly value="Male"> 
                                </div> 
                                <div class="inputs"> 
                                    <span>Billing Address</span>
                                     <input type="text" readonly value="Dhaka,Bangladesh"> 
                                    </div>
                                 </div> 
                                </div>
</div>


  </div>
</div>  
  </section>


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
var savebutton = document.getElementById('savebutton');
var readonly = true;
var inputs = document.querySelectorAll('input[type="text"]');
savebutton.addEventListener('click',function(){

 for (var i=0; i<inputs.length; i++) {
 inputs[i].toggleAttribute('readonly');
 };

if (savebutton.innerHTML == "edit") {
  savebutton.innerHTML = "save";
     } else {
  savebutton.innerHTML = "edit";
  } 
});
</script>
</body>
</html>
