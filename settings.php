<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="flex justify-end pr-4">
    <div class="relative">
    
   
        <button id="settingsButton" class="bg-gray-500 hover:bg-gray-300 text-white font-bold px-3 mt-2 rounded focus:outline-none focus:shadow-outline">
          settings
        </button>
      

        <div id="menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
          <ul>
            <a href="index.html"><li class="px-4 py-2 hover:bg-gray-200">Profil</li></a>
            <a href=""><li class="px-4 py-2 hover:bg-gray-200">Ayarlar</li></a>
            <a href=""><li class="px-4 py-2 hover:bg-gray-200">Çıkış</li></a>
          </ul>
        </div>
      </div>
</div>
  <script>
    document.getElementById('settingsButton').addEventListener('click', function() {
document.getElementById('menu').classList.toggle('hidden');
});

document.addEventListener('click', function(event) {
const menu = document.getElementById('menu');
const settingsButton = document.getElementById('settingsButton');

if (!menu.contains(event.target) && event.target !== settingsButton) {
menu.classList.add('hidden');
}
});

  </script>   