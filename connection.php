<?php
$servername="localhost";
$username="root";
$password="";
$db_name="php_login";
$conn = new mysqli($servername,$username,$password,$db_name,3306);



// define("DB_HOST", "localhost");
// define("DB_USER", "root");
// define("DB_PASSWORD", "");
// define("DB_DATABASE", "php_login");

// $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
// echo "";
echo "connected";


?>