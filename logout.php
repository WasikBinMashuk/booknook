<?php
include "connect.php";
include "myFunctions.php";
setcookie('user',time()+60);
header('location:index.php');
die();

?>