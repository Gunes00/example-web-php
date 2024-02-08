<?php

session_start();

if(isset($_SESSION['username'])) {
    echo 'Oturumda kayıtlı kullanıcı adı: ' . $_SESSION['username'];
} else {
    echo 'Oturumda kayıtlı kullanıcı yok';
}
?>
