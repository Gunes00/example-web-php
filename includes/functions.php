<?php
include('connect.php');

function yetkiKontrol($kullaniciAdi) {
    
    global $conn;
    
    $sorgu = "SELECT yetki FROM users WHERE username = ?";
    $stmt = $conn->prepare($sorgu);
    $stmt->bind_param("s", $kullaniciAdi);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($yetki);
        $stmt->fetch();
        $stmt->close();
        return $yetki;
    } else {
        $stmt->close();
        return -1;
    }
}

function kullaniciGirisKontrol($kullaniciAdi, $sifre) {

    global $conn;

    $sorgu = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sorgu);
    $stmt->bind_param("s", $kullaniciAdi);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($sifre == $row['password']) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

    //password_verify($sifre, $row['password'])

function exit_func() {
    session_start();
    session_destroy();
    header("Location: /");
    exit();
}

function push_sub(){

    global $conn;
    $sql = "SELECT * FROM topics";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '
            <div class="container mx-auto py-8">
      <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <ul class="">
        <li class="bg-gray-700">
            <div class="px-4 py-5 sm:px-6">
              <a href="headers/forum-basligi-1.html" class="text-lg text-gray-200 font-semibold">'.$row["title"].'</a>
              <p class="mt-1 max-w-2xl text-sm text-gray-300">'.$row["contents"].'</p>
            </div>
            <div class="border-t border-gray-400 px-1 py-1 sm:px-3">
              <div class="flex items-center">
                <div class="flex-shrink-0">
                  <img class="h-10 w-15 rounded-full" src="admin.jpg" alt="Forum-Admin">
                </div>
                <div class="ml-1">
                  <a href="headers/admin.html" class="text-sm font-small text-indigo-600">'.$row["username"].'</a>
                  <p class="text-sm text-gray-400">25 Kasım 2023</p>
                </div>
              </div>
            </div>
        </li>
        </ul>
      </div>
      </div>';
        }
    }

}

function push_create($contents, $title, $username){

    global $conn;

    $sql = "INSERT INTO topics (contents, title, username) VALUES ('$contents','$title','$username')";
  
    if ($conn->query($sql) === TRUE) {
       return true;
    } else {
       return false;
    }
    return true;
}
?>