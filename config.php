<?php
require_once "vendor/autoload.php";

$servername = "127.0.0.1";
$username = "root";
$db_password = "";
$dbname = "pepper";

// Create connection
$conn = mysqli_connect($servername, $username, $db_password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>