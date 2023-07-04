<?php
include "connect.php";
include "myFunctions.php";


if(isset($_POST['accept'])){

    $status=1;
    $update_query="UPDATE order_product SET status='$status'";
    $update_query_run=mysqli_query($conn,$update_query);
    if($update_query_run){
        redirect("Admin.php?id=$category_id","Updated Successfully");
        }
        else{
            redirect("Admin.php?id=$category_id","Updated Successfully");
        }
        
   }


?>