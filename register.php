<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <nav class="bg-gray-600 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-white text-2xl font-bold">PUSH</a>

            <div class="md:flex space-x-4">
                <a href="#" class="text-white nav-pseudo hover:text-blue-300">test</a>
                <a href="#" class="text-white nav-pseudo hover:text-blue-300">test</a>
                <a href="#" class="text-white nav-pseudo hover:text-blue-300">test</a>
                <a href="login" class="text-white hover:text-blue-300">Login</a>
            </div>
        </div>
    </nav>
    <div class="h-screen bg-gradient-to-b from-gray-100 to-gray-400 flex items-center justify-center h-screen">

        <div class="bg-gray-600 p-4 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-white">Register</h2>
            <form method="post" action="process_register.php">
                <div class="mb-4">
                    <label for="username" class="block text-white font-bold mb-2">Username</label>
                    <input type="text" id="username" name="username"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                        placeholder="Enter your username">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-white font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                        placeholder="Enter your email">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-white font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                        placeholder="Enter your password">
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:bg-blue-600 hover:bg-blue-600 w-full">Register</button>
                <a href="/" class="text-white hover:text-blue-300">Login</a>
            </form>
        </div>
    </div>
</body>

</html>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/sweetalert/sweetalert2.all.min.js"></script>
<?php if(@$_GET['durum'] == "no") { ?>
    <script>
        Swal.fire({
            type: 'error',
            title: 'Server Error',
            showConfirmButton: true,
            confirmButtonText: 'Kapat'
        })
    </script>
<?php } ?>
<?php if(@$_GET['durum'] == "error") { ?>
    <script>
        Swal.fire({
            type: 'error',
            title: 'Bu kullanıcı zaten kayıtlı !',
            showConfirmButton: true,
            confirmButtonText: 'Kapat'
        })
    </script>
<?php } ?>
<?php if(@$_GET['durum'] == "ok") { ?>
    <script>
        Swal.fire({
            type: 'success',
            title: 'Hesabınız başarıyla oluşturuldu !',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
<?php } ?>