<?php

    require_once 'db.php';

    session_start();

    if (isset($_SESSION['id']) || isset($_SESSION['username']) || isset($_SESSION['email']) || isset($_SESSION['gender']) || isset($_SESSION['class']) || isset($_SESSION['password']) ) {
        header("Location:welcome.php");
    }
    else
    {
                    
                if(isset($_POST['submit'])){
                    $email = htmlentities($_POST['email']);
                    $pass=md5(htmlentities($_POST['pass']));

                    
                    
                    $sql = "SELECT password from users WHERE  email=?;";  // query password from input email 
                    $stmt =$pdo->prepare($sql);

                    if(!$stmt->execute(array($email))){
                        $stmt = null;
                        header("Location:signin.php?error=stmtfailed");
                        exit();
                    }
                    if($stmt->rowCount()==0){   // no data match 
                        $stmt= null;
                        header("Location:signin.php?error=usernotfound");
                        exit();
                        
                    }

                    $result = $stmt->fetchAll();
                    $userpassword =$result[0]->password;
                
                    // check password 
                    if( $userpassword!==$pass){
                        $stmt= null;
                        header("Location:signin.php?error=wrongpassword");
                        exit();
                        
                    }
                    else if ( $userpassword==$pass){

                        $sql = "SELECT * from users WHERE  email=? AND password=?;";
                        $stmt =$pdo->prepare($sql);
                        if(!$stmt->execute(array($email,$pass))){
                            $stmt = null;
                            header("Location:signin.php?error=stmtfailed");
                            exit();
                        }
                        if($stmt->rowCount()==0){
                            $stmt= null;
                            header("Location:signin.php?error=usernotfound");
                            exit();
                            
                        }
                        $user = $stmt->fetchAll();
                        $_SESSION['id'] = $user[0]->id;
                        $_SESSION['username'] = $user[0]->username;
                        $_SESSION['email'] = $user[0]->email;

                        $_SESSION['gender'] = $user[0]->gender;
                        $_SESSION['class'] = $user[0]->class;
                        $_SESSION['password'] = $user[0]->password;
                        header("Location:welcome.php");
                    

                
                }

        }
    }



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <style>
         a{
             text-decoration: none;
             background-color: white;
             color:red;
             padding: 5px 15px;
             border-radius: 10px;
             color:#b8001f;
             font-weight: bold;
             transition: 0.25s;
         }
         a:hover {
             color:white;
             background-color: #b8001f;
         }
     </style>
    <title>Sign In</title>
</head>
<body>
     
<div class="container">
        <nav class="bg-danger p-2 rounded d-flex justify-content-between align-items-center p-3">
            <h4 class="text-white"> <i class="bi bi-box-arrow-in-right mx-2"></i> Sign In Form</h4>
            <a href="index.php">Register</a>
            
        </nav>
        <div class="d-flex justify-content-center align-items-center mt-5">
                <form class="w-25" action="signin.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control text-center" id="email" name="email" placeholder="Email">
                          
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control text-center" id="pass" name="pass" placeholder="Password" required>
                          
                        </div>
                       
                        <div class="mb-3 text-center d-flex justify-content-center">
                            <input type="submit" class="form-control text-center w-50 bg-danger text-white text-center" id="submit" name="submit" value="Sign in">
                        </div>
                                
                </form>
        </div>
        
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 

</body>
</html>