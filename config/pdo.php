<?php
    require_once "db.php";
    $pdo =  new PDO ("mysql:host=localhost;dbname=$dbname",$user,$password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>