<?php
include"connect.php";
include "myFunctions.php";

if(isset($_POST['submit'])){
   $name= $_POST['name']; 
   $description= $_POST['description']; 
   $meta_title=$_POST['meta_title'];
   $meta_description= $_POST['meta_description']; 
   $meta_keyword= $_POST['meta_keyword']; 
   $status= isset($_POST['status']) ? '1' : '0'; 
   $popular=isset($_POST['popular'])? '1' : '0';  

   $image=$_FILES['image']['name'];
   $path = "uploads";

   $image_ext = pathinfo($image,PATHINFO_EXTENSION);
   $filename=time().'.'.$image_ext;

   $cate_query="INSERT INTO categories(name,description,status,popular,image,meta_title,meta_description,meta_keywords)
   VALUES('$name','$description','$status',' $popular','$filename','$meta_title',' $meta_description',' $meta_keyword')";

   $cate_query_run=mysqli_query($conn,$cate_query);

   if($cate_query_run){
    move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);  
    redirect("addCategory.php","Updated");
   }
   else{
    redirect("addCategory.php","something went wrong");
   }
}
else if(isset($_POST['update'])){
   $category_id=$_POST['category_id'];
   $name= $_POST['name']; 
   $description= $_POST['description']; 
   $meta_title=$_POST['meta_title'];
   $meta_description= $_POST['meta_description']; 
   $meta_keyword= $_POST['meta_keyword']; 
   $status= isset($_POST['status']) ? '1' : '0'; 
   $popular=isset($_POST['popular'])? '1' : '0'; 
   
   $new_image=$_FILES['image']['name'];
   $old_image=$_POST['oldimage'];
   $path="uploads";
   if($new_image != ""){
       //$update_filename=$new_image;
       $image_ext = pathinfo($new_image,PATHINFO_EXTENSION);
       $update_filename=time().'.'.$image_ext;
   }
   else{
       $update_filename=$old_image;
   }

   $update_query="UPDATE categories SET name='$name',description='$description',status='$status',popular='$popular',image='$update_filename',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keyword' WHERE id='$category_id'";
   $update_query_run=mysqli_query($conn,$update_query);
   if($update_query_run){
       if($_FILES['image']['name']!=""){
           move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
           if(file_exists("uploads/".$old_image)){
               unlink("uploads/".$old_image);
           }
       }
       redirect("editCatagory.php?id=$category_id","Updated Successfully");
   }

}
else if(isset($_POST['addProduct'])){
    $cat_id=$_POST['cat_id'];
    $name= $_POST['name'];
    $author_name=$_POST['author_name']; 
    $small_description= $_POST['small_description']; 
    $description= $_POST['description']; 
    $original_price=$_POST['original_price'];
    $selling_price= $_POST['selling_price']; 
    $quantity= $_POST['quantity']; 
    $status= isset($_POST['status']) ? '1' : '0'; 
    $trending=isset($_POST['trending'])? '1' : '0';  
 
    $image=$_FILES['image']['name'];
    $path = "uploads";

    $image_ext = pathinfo($image,PATHINFO_EXTENSION);
    $filename=time().'.'.$image_ext;

   
        $product_query="INSERT INTO products(category_id,name,author_name,small_description,description,original_price,selling_price,image,quantity,status,trending)
        VALUES('$cat_id','$name',' $author_name','$small_description','$description','$original_price','$selling_price','$filename','$quantity','$status','$trending')";
    
        $product_query_run=mysqli_query($conn,$product_query);
        if($product_query_run){
            move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);  
            redirect("addProducts.php","Product Added Successfully"); 
        }
        else{
            redirect("addProducts.php","Something Went Wrong!"); 
        }
}
?>