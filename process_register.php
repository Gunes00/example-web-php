<?php

require_once("connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Kayıt başarıyla eklendi";
        header("location: /register?durum=ok");
    } else {
        if (mysqli_errno($conn) == 1062){
            mysqli_close($conn);
            header("location: /register?durum=error");
          }  
        echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
        header("location: /register?durum=no");
    }
    
    mysqli_close($conn);
}
?>
