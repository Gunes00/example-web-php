<?php

$servername = "localhost";
$username = "root"; //
$password = "000"; //
$dbname = "sss"; //


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$sql = "SELECT * FROM topics";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '
        <li class="py-4">
            <div class="flex space-x-3">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="profil-resmi.jpg" alt="Profil Resmi">
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">' . $row["user_id"] . '</p>
                    <p class="text-sm text-gray-500">' . $row["contents"] . '</p>
                </div>
            </div>
        </li>';
    }
}


