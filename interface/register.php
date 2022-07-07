

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
             background-color: #b8001f;
             color:red;
             padding: 5px 15px;
             border-radius: 10px;
             color:white;
             font-weight: bold;
             transition: 0.25s;
         }
         a:hover {
            
             background-color: #d60024;
             color:white;
         }
         ._btn {
             background-color: transparent;
         }
     </style>
    <title>User Information</title>
</head>
<body>

     <div class="container mb-5">
     <nav class="bg-danger p-2 rounded">
            <h4 class="text-white text-center"> <i class="bi bi-people-fill mx-2"></i>Users Information</h4>
        </nav>
     </div>
    <div class="container mt-5">
             <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Password</th>
                                    <th class='text-center' scope="col">Delete User</th>
                                
                                  
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                                           require_once 'db.php';
                                            $sql = "SELECT * FROM users";
                                            $result = $pdo->prepare($sql);
                                            $result->execute();
                                            $posts = $result->fetchAll();

                                            foreach($posts as $key => $post){
                                                $newkey= $key+1;
                                                echo  "
                                                    <tr>
                                                        <td>$newkey</td>
                                                        <td>$post->username</td>
                                                        <td>$post->email</td>
                                                        <td>$post->gender</td>
                                                        <td>$post->class</td>
                                                        <td>$post->password</td>
                                                        <td class='text-center'> 
                                                             <a href='delete.php?id=".$post->id."' class='_btn'><i class='bi bi-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                
                                                ";
                                            }

                                     ?>
                            </tbody>
                </table>

                <a class="mt-3" href="index.php">Back</a>
    </div>
               
</body>
</html>