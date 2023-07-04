<?php 
include'connect.php';
include'myFunctions.php';
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

    <!-- custom css file link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" type="image" style="height: 900px;" href="ICONLOGO (3).png">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


    <style>
        .form-control{
            border:1px solid #b3a1a1 !important;
            padding: 8px 10px;
        }
    </style>
</head>
<body>

<form action="addCategoryCode.php" method="POST" enctype="multipart/form-data">
<div class="input-group mb-3">
  <label for="">Select Category</label>
  <select name="cat_id" class="form-select">
  <option selected>Select Category</option>
      <?php 
      $product=getAll("products");
      if(mysqli_num_rows($product)>0){
        foreach( $product as $item ){
            ?>
            <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
            <?php
        }
      }
      else{
          echo "No Category Available";
      }
      
      ?>
   
</select>
</div>


<div class="input-group mb-3">
  <input type="text" name="name" class="form-control" placeholder="Enter Product Name" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <input type="text" name="author_name" class="form-control" placeholder="Enter Author Name" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <textarea name="small_description" class="form-control" placeholder="Enter description" aria-label="With textarea"></textarea>
</div> 
<div class="input-group">
  <textarea name="description" class="form-control" placeholder="Enter description" aria-label="With textarea"></textarea>
</div>
<div class="input-group mb-3">
  <input type="text" name="original_price" class="form-control" placeholder="Enter Original Price of the Products" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <input type="text" name="selling_price" class="form-control" placeholder="Enter selling Price of the Products" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <label for="">Upload Image</label>
  <input type="file" name="image" class="form-control">
</div>
<div class="input-group mb-3">
  <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity of the Products" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
    <label for="">status</label>
  <input type="checkbox" name="status">
</div>

<div class="input-group mb-3">
    <label for="">trending</label>
  <input type="checkbox" name="trending">
</div>

<div class="input-group mb-3">
    <button type="submit" class="btn btn-danger" name="addProduct">UPLOAD</button>
</div>

</div>

</form>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- custom js file link  -->

<!--ion Icon cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/6.0.1/esm/ionicons.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>

    <?php
    if(isset($_SESSION['message'])){
        ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<?=$_SESSION['message']; ?>');
<?php
    } ?>  
</script>
</body>
</html>
    
</body>
</html>