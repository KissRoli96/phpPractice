<?php


$db = require('config.php');

// Create connection
$conn = mysqli_connect($db['servername'],$db['username'],$db['password'],$db['database']);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

return $conn;