<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" href="customCSS/shout.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shoutbox for NETTUTS by Dan Harper</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="container">
 
  <h1>Shoutbox</h1>
  <h5><a href="http://www.danharper.me" title="Dan Harper">Dan Harper </a> : <a href="http://www.nettuts.com" title="NETTUTS - Spoonfed Coding Skills">NETTUTS</a></h5>
 
  <div id="boxtop" />
  <div id="content">

         <form action="<?php $self ?>" method="post">
<h2>Shout! </h2>
<div class="fname"><label for="name"><p>Name:</p></label><input name="name" type="text" cols="20" /></div>
<div class="femail"><label for="email"><p>Email:</p></label><input name="email" type="text" cols="20" /></div>
<textarea name="post" rows="5" cols="40"></textarea>
<input name="send" type="hidden" />
<p><input type="submit" value="send" /></p>
</form>
 
</div><!--/content-->
<div id="boxbot"></div>
</div><!--/container-->
</body>
</html>

    <?php

    $self = $_SERVER['PHP_SELF']; //the $self variable equals this file
$ipaddress = ("$_SERVER[REMOTE_ADDR]"); //the $ipaddress var equals users IP
include ('db.php'); // for db details
 
$connect = mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');
 
mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');

    if(isset($_POST['send'])) {
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['post'])) {
        echo('<p class="error">You did not fill in a required field.</p>');
    } else {
      $name = htmlspecialchars(mysql_real_escape_string($_POST['name'])); 
$email = htmlspecialchars(mysql_real_escape_string($_POST['email'])); 
$post = htmlspecialchars(mysql_real_escape_string($_POST['post']));
 
$sql = "INSERT INTO shouts SET name='$name', email='$email', post='$post', ipaddress='$ipaddress';";
 
    if (@mysql_query($sql)) {
        echo('<p class="success">Thanks for shouting!</p>');
    } else {
        echo('<p class="error">There was an unexpected error when submitting your shout.</p>');
    }
}

}
$query = "SELECT * FROM `shouts` ORDER BY `id` DESC LIMIT 8;";
     
$result = @mysql_query("$query") or die('<p class="error">There was an unexpected error grabbing shouts from the database.</p>');
 
?><ul><?

while ($row = mysql_fetch_array($result)) {
 
    $ename = stripslashes($row['name']);
    $eemail = stripslashes($row['email']);
    $epost = stripslashes($row['post']);
     
    $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5(strtolower($eemail))."&size=70"; 
     
    echo('<li><div class="meta"><img src="'.$grav_url.'" alt="Gravatar" />
    <p>'.$ename.'</p></div><div class="shout"><p>'.$epost.'</p></div></li>');
 
}
?></ul>

     ?>


