<?php
include("includes/functions.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["login"])) {
    $girilenKullaniciAdi = $_POST['username'];
    $girilenSifre = $_POST['password'];
  
    if(isset($girilenKullaniciAdi, $girilenSifre)) {
      if(kullaniciGirisKontrol($girilenKullaniciAdi, $girilenSifre)) {
        session_start();
        $_SESSION['username'] = $girilenKullaniciAdi;
        header("Location: /?durum=pass");
      } else {
        header("Location: /?durum=error");
      }
    } else {
      header("Location: /?durum=no");
    }
  }
}

?>
<html>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">

<head>
  <Title>PUSH test</Title>
</head>

<body class="h-screen bg-gray-600">
  <nav class="bg-gray-800 py-6">
    <div class="container mx-auto flex justify-between items-center">
      <!-- Logo -->
      <a href="/" class="text-gray-200 text-2xl font-bold">PUSH</a>
      <?php session_start();
        if((isset($_SESSION['username']))) {
      echo '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded" onclick="toggleForm()">PUSH</button>
    
    <div id="pushform" style="display: none;">
        <form action="/" method="post">
            <div class="border border-gray-300 rounded px-3 py-2 w-full">
                <input type="text" name="title" class="border-none outline-none w-full" placeholder="Başlık">
            </div>
            <div class="border border-gray-300 rounded px-3 py-2 w-full">
                <textarea name="contents" rows="4" cols="50" placeholder="İçeriği buraya yazın..." class="border-none outline-none w-full"></textarea>
            </div>
            <input type="submit" name="push" value="push" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </form>
    </div>';}?>
      <div class="md:flex space-x-2">
        <a href="#" class="text-gray-200 nav-pseudo hover:text-blue-300">test</a>
        <a href="#" class="text-gray-200 nav-pseudo hover:text-blue-300">test</a>
        <a href="#" class="text-gray-200 nav-pseudo hover:text-blue-300">test</a>
        <?php session_start();
        if(!(isset($_SESSION['username']))) {
          echo '
                  <div class="relative">
                   <button id="loginButton" class=" login-button bg-blue-500 hover:bg-blue-400 text-white font-bold px-2 mt-1 rounded">Giriş Yap</button>
                    <div id="loginForm" class="hidden absolute bg-white p-4 mt-2 rounded shadow-md top-10 right-0">
                      <form method="post" action="/">
                        <div class="mb-4">
                          <label for="username" class="block text-gray-700 font-bold mb-2">Kullanıcı Adı</label>
                          <input type="text" id="username" name="username" class="border border-gray-300 rounded px-3 py-2 w-full">
                        </div>
                        <div class="mb-4">
                          <label for="password" class="block text-gray-700 font-bold mb-2">Şifre</label>
                          <input type="password" id="password" name="password" class="border border-gray-300 rounded px-3 py-2 w-full">
                        </div>
                        <button name="login" type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">Giriş</button>
                        <a href="register" class="text-blue-500 hover:text-blue-400">Register Now</a>
                      </form>
                    </div>';
        } ?>
        <?php
        session_start();
        if((isset($_SESSION['username']))) {
          echo '
        
        <div class="flex justify-end pr-4">
          <div class="relative">


            <button id="settingsButton"
              class="bg-gray-500 hover:bg-gray-300 text-white font-bold px-2 mt-1 rounded focus:outline-none focus:shadow-outline">
              settings
            </button>


            <div id="menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
              <ul>
                <a href="/">
                  <li class="px-4 py-2 hover:bg-gray-200">Profil</li>
                </a>
                <a href="/">
                  <li class="px-4 py-2 hover:bg-gray-200">Ayarlar</li>
                </a>
                <a href="exit">
                  <li class="px-4 py-2 hover:bg-gray-200">Çıkış</li>
                </a>
              </ul>
            </div>
          </div>
        </div>
        <script>
          document.getElementById("settingsButton").addEventListener("click", function () {
            document.getElementById("menu").classList.toggle("hidden");
          });

          document.addEventListener("click", function (event) {
            const menu = document.getElementById("menu");
            const settingsButton = document.getElementById("settingsButton");

            if (!menu.contains(event.target) && event.target !== settingsButton) {
              menu.classList.add("hidden");
            }
          });

        </script>';
        } ?>
      </div>
    </div>
    </div>
  </nav>
  <?php session_start();
  if(isset($_SESSION['username'])) {
      push_sub();
  }
  ?>
</body>
<script src="js/scripts.js"></script>

</html>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/sweetalert/sweetalert2.all.min.js"></script>

<script>
        function toggleForm() {
            var form = document.getElementById("pushform");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
</script>
<?php if(@$_GET['durum'] == "pushpass") { ?>
  <script>
    Swal.fire({
      type: 'success',
      title: 'Başarıyla Pushlandı :)',
      showConfirmButton: false,
      timer: 2000
    }).then(function () {
      window.location.href = "/";
    })
  </script>
<?php } ?>

<?php if(@$_GET['durum'] == "pushincorrect") { ?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Pushlanamadı ! Fuck you Bill Gates !',
      showConfirmButton: false,
      timer: 2000
    }).then(function () {
      window.location.href = "/";
    })
  </script>
<?php } ?>

<?php if(@$_GET['durum'] == "pass") { ?>
  <script>
    Swal.fire({
      type: 'success',
      title: 'Giriş başarılı.',
      showConfirmButton: false,
      timer: 2000
    }).then(function () {
      window.location.href = "/";
    })
  </script>
<?php } ?>
<?php if(@$_GET['durum'] == "error") { ?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Kullanıcı adı veya şifre hatalı!',
      showConfirmButton: true,
      confirmButtonText: 'Kapat'
    }).then(function () {
      window.location.href = "/";
    })
  </script>
<?php } ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["push"])) {
          session_start();
          $contents = $_POST['contents'];
          $title = $_POST['title'];
          $username = $_SESSION['username'];
          if(push_create($contents, $title, $username)) {
            header("Location: /?durum=pushpass");
          } else {
            header("Location: /?durum=pushincorrect");
          }
        }
    }
?>