<?php 
include"connect.php";
session_start();
?>

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
  <input type="text" name="name" class="form-control" placeholder="Enter Product Name" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <textarea name="description" class="form-control" placeholder="Enter description" aria-label="With textarea"></textarea>
</div> 

<div class="input-group mb-3">
  <label for="">Upload Image</label>
  <input type="file" name="image" class="form-control">
</div>
<div class="input-group mb-3">
  
  <input type="text" name="meta_title" class="form-control" placeholder="Enter meta title" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <textarea name="meta_description"  class="form-control" placeholder=" Enter meta description"aria-label="With textarea"></textarea>
</div>

<div class="input-group mb-3">
  <textarea name="meta_keyword" class="form-control"  placeholder=" Enter meta keywords" aria-label="With textarea"></textarea>
</div>

<div class="input-group mb-3">
    <label for="">status</label>
  <input type="checkbox" name="status">
</div>

<div class="input-group mb-3">
    <label for="">Popular</label>
  <input type="checkbox" name="popular">
</div>

<div class="input-group mb-3">
    <button type="submit" class="btn btn-danger" name="submit">Save</button>
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
