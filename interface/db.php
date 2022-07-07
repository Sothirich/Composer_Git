<?php 
    
     $user = 'root';
     $password= '';
     $pdo =  new PDO ("mysql:host=localhost;dbname=classlogin",$user,$password);
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>