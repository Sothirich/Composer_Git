<?php  

$sname = "localhost";
$uname = "root";
$password = "Raksa111003@#";

$db_name = "crud_db";

$conn  = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}