<?php
include 'connect.php';
session_start();

function redirect($url,$message){
    $_SESSION['message'] = $message;
    header('location:'.$url); 
}

function getAll($table){
    global $conn;
    $query="SELECT * FROM $table";
    return $query_run= mysqli_query($conn,$query);
}
function getProduct($table,$id){
    global $conn;
    $query="SELECT * FROM $table WHERE section='$id'";
    return $query_run= mysqli_query($conn,$query);
}
function getById($table,$id){
    global $conn;
    $query="SELECT * FROM $table WHERE id='$id'";
    return $query_run= mysqli_query($conn,$query);
}

function getByUserName($table,$user){
    global $conn;
    $query="SELECT * FROM $table WHERE username='$user' ORDER BY order_date ASC";
    return $query_run= mysqli_query($conn,$query);
}
function getByUserNameForSell($table,$user){
    global $conn;
    $query="SELECT * FROM $table WHERE username='$user' ORDER BY created_at ASC";
    return $query_run= mysqli_query($conn,$query);
}

function getCategoryName($table,$ID){
    global $conn;
    $query="SELECT name FROM categories as t1 JOIN $table as t2 WHERE t1.id=t2.category";
    return $query_run= mysqli_query($conn,$query);
}



?>