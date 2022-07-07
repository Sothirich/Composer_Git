<?php 

session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['username']) || !isset($_SESSION['email']) || !isset($_SESSION['gender']) || !isset($_SESSION['class']) || !isset($_SESSION['password']) ) {
    header("Location:signin.php");
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
      
    </style>
    <title>Welcome</title>
</head>
<body>
    
    

   

        <div class="container vh-100 d-flex justify-content-center align-items-center">
                    <div class="card w-50 shadow-lg">
                        <h4 class="card-header text-center"> <?php  echo $_SESSION['username'];  ?></h4>
                        <div class="card-body">
                            <h5 class="card-title">Email</h5>
                            <p class="card-text"> <?php  echo $_SESSION['email'];  ?></p>
                            <h5 class="card-title">Gender</h5>
                            <p class="card-text">  <?php   echo $_SESSION['gender'];  ?></p>
                            <h5 class="card-title">Class</h5>
                            <p class="card-text">  <?php  echo $_SESSION['class'];  ?></p>
                            <h5 class="card-title">Password</h5>
                            <p class="card-text">  <?php  echo $_SESSION['password'];  ?></p>
                            <div class="w-100 text-center">
                            <a href="logout.php" class="btn btn-danger">Log out</a>
                            </div>
                        
                    </div>
                </div>
            </div>


   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 

</body>
</html>