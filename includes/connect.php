<?php

$servername = "localhost";
$username = "root";
$password = "000";
$dbname = "testh";

global $conn;
 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("ERROR: " . $conn->connect_error);
}
?>
