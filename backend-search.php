<?php

include 'connect.php';

// (C) SEARCH
$stmt = $pdo->prepare("SELECT * FROM `products` WHERE `name` LIKE ? OR `author_name` LIKE ?");
$stmt->execute(["%".$_POST["search"]."%", "%".$_POST["search"]."%"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }

?>