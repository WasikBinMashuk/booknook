<?php
include "connect.php";
include "myFunctions.php";


if(isset($_POST['submitPost'])){
    $username=$_SESSION['user_description']['name'];
    $post=$_POST['post'];

    $review_query="INSERT INTO posts (username,post)
    VALUES('$username','$post')";

    $review_query_run=mysqli_query($conn,$review_query);
    if($review_query_run){
        redirect("sellerPage.php","Review has been submitted"); 
    }
    else{
        redirect("sellerPage.php","Something Went Wrong!"); 
    }
}

?>