<?php
include "connect.php";
include "myFunctions.php";


if(isset($_POST['submit_order'])){
    $product_cat=$_POST['product_cat'];
    $bookname=$_POST['bookname'];
    $authorname=$_POST['authorname'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $quantity=$_POST['quantity'];
    $old= isset($_POST['old']) ? '1' : '0'; 
    $new=isset($_POST['new'])? '1' : '0'; 
    $username=$_SESSION['user_description']['name'];


    $image=$_FILES['image']['name'];
    $path = "uploads";
    $image_ext = pathinfo($image,PATHINFO_EXTENSION);
    $filename=time().'.'.$image_ext;

    $order_query="INSERT INTO order_product (username,category,bookname,authorname,address,phone,product_img,quantity,new,old)
    VALUES('$username','$product_cat','$bookname','$authorname',' $address',' $phone',' $filename','$quantity','$new','$old')";

    $order_query_run=mysqli_query($conn,$order_query);
    if($order_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);  
        redirect("preorder.php","Order has been placed"); 
    }
    else{
        redirect("preorder.php","Something Went Wrong!"); 
    }

}
else if (isset($_POST['sellBook'])){
    $product_cat=$_POST['product_cat'];
    $bookname=$_POST['bookname'];
    $authorname=$_POST['authorname'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $quantity=$_POST['quantity'];
    $old= isset($_POST['old']) ? '1' : '0'; 
    $username=$_SESSION['user_description']['name'];
    $price=$_POST['price'];


    $image=$_FILES['image']['name'];
    $path = "uploads";
    $image_ext = pathinfo($image,PATHINFO_EXTENSION);
    $filename=time().'.'.$image_ext;

    $order_query="INSERT INTO sellbooks (username,image,bookname,authorname,quantity,oldbook,price,address,phone)
    VALUES('$username','$filename','$bookname','$authorname','$quantity','$old','$price','$address',' $phone')";

    $order_query_run=mysqli_query($conn,$order_query);
    if($order_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);  
        redirect("sellbook.php","Order has been placed"); 
    }
    else{
        redirect("sellbook.php","Something Went Wrong!"); 
    }

}


?>