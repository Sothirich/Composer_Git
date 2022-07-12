<?php
    require_once 'db.php';

    function setEmpty()
    {
        $_POST['username'] = "";
        $_POST['email'] = "";
        $_POST['gender'] = "";
        $_POST['class'] = "";
        $_POST['pass'] = "";
    }

    if (isset($_POST['submit'])) {
        $username = htmlentities($_POST['username']);
        $email = htmlentities($_POST['email']);;
        $gender = htmlentities($_POST['gender']);
        $class = htmlentities($_POST['class']);
        $pass = md5(htmlentities($_POST['pass']));

        if (!preg_match('/^\w{5,20}$/', $username)) {
            $invalidUsername = "Invalid Username";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $invalidEmail = "Invalid Email";
        } else  if (!preg_match('/^\w{1,20}$/', $gender)) {
            $invalidGender = "Invalid Gender";
        } else if (!preg_match('/^\w{1,20}$/', $class)) {
            $invalidClass = "Invalid Class Name";
        } else  if (!preg_match('/^\w{5,40}$/', $pass)) {
            $invalidPassword = "Invalid Password";
        } else {
            $sql = "SELECT username from users WHERE username=? or email=?;";
            $stmt = $pdo->prepare($sql);
            if (!$stmt->execute(array($username, $email))) {
                $stmt = null;
                header("Location:index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() > 0) {
                echo "<script>alert('Account Already Exist !')</script>";
            } else {

                $sql = 'INSERT INTO users (username,email,gender,class,password) VALUE (:username,:email,:gender,:class,:pass)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['username' => $username, 'email' => $email, 'gender' => $gender, 'class' => $class, 'pass' => $pass]);
                setEmpty();
                echo "<script>alert('Resgister Sucess ! You May Sign Up Now')</script>";
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
            a {
                text-decoration: none;
                background-color: white;
                color: red;
                padding: 5px 15px;
                border-radius: 10px;
                color: #b8001f;
                font-weight: bold;
                transition: 0.25s;
            }

            a:hover {
                color: white;
                background-color: #b8001f;
            }
        </style>
        <title>Home</title>
    </head>

    <body>
        <div class="container">
            <nav class="bg-danger p-2 rounded d-flex justify-content-between align-items-center p-3">
                <h4 class="text-white "> <i class="bi bi-card-checklist mx-2"></i>Registration Form</h4>
                <div>
                    <a href="signin.php">Login</a>
                </div>

            </nav>
            <div class="d-flex justify-content-center align-items-center mt-5">
                <form class="w-25" action="index.php" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control text-center" id="username" name="username" placeholder="Username" required value = <?php if (isset($_POST['username'])) echo $_POST['username']; ?>>
                        <?php if (isset($invalidUsername)) echo "<div class='text-danger'>" . $invalidUsername . "</div>"; ?>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control text-center" id="email" name="email" placeholder="Email" required value = <?php if (isset($_POST['email'])) echo $_POST['email']; ?>>
                        <?php if (isset($invalidEmail)) echo "<div class='text-danger'>" . $invalidEmail . "</div>"; ?>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control text-center" id="gender" name="gender" placeholder="Gender" required value=<?php if (isset($_POST['gender'])) echo $_POST['gender']; ?>>
                        <?php if (isset($invalidGender)) echo "<div class='text-danger'>" . $invalidGender . "</div>"; ?>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control text-center" id="class" name="class" placeholder="Class" required value=<?php if (isset($_POST['class'])) echo $_POST['class']; ?>>
                        <?php if (isset($invalidClass)) echo "<div class='text-danger'>" . $invalidClass . "</div>"; ?>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control text-center" id="pass" name="pass" placeholder="Password" required>
                        <?php 
                            if (isset($invalidPassword)) {
                            echo "<div class='text-danger'>" . $invalidPassword . "</div>";
                            $_POST['pass'] = "";
                            }
                        ?>
                    </div>



                    <div class="mb-3 text-center d-flex justify-content-center">
                        <input type="submit" class="form-control text-center w-50 bg-danger text-white text-center" id="submit" name="submit" value="Create">
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>

</html>