<?php

require_once("includes/connect.php");

include('includes/functions.php');
session_start();
$kullaniciAdi = $_SESSION['username'];

$yetki = yetkiKontrol($kullaniciAdi);

$minimumYetkiSeviyesi = 3;

if ($yetki < $minimumYetkiSeviyesi) {

    http_response_code(404);
    exit();
}


$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Kullanıcı Adı: " . $row["username"]. " - Email: " . $row["email"]. "<br>";
        } 
    } else {
        echo "Tabloda hiç kullanıcı yok";
    }
} else {
    echo "ERROR: " . $conn->error;
}

$conn->close();
?>