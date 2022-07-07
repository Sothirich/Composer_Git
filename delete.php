<?php 

   require_once 'db.php';

   if(isset($_GET['id'])){
       $id= $_GET['id'];
       $sql = "DELETE FROM users WHERE id =?";
       $stmt =$pdo->prepare($sql);
       if(!$stmt->execute(array($id))){
        $stmt=null;
        header("Location:register.php?error=stmtfailed");
        exit();
       }
       else
       {
        header("Location:register.php");
       }
   }
   else{
       echo "Hello";
   }


?>