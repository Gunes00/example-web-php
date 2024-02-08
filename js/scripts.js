const loginButton = document.getElementById('loginButton');
const loginForm = document.getElementById('loginForm');

loginButton.addEventListener('click', function () {
  loginForm.classList.toggle('hidden');
});

document.addEventListener('click', function (event) {
  const targetElement = event.target;
  if (!loginButton.contains(targetElement) && !loginForm.contains(targetElement)) {
    loginForm.classList.add('hidden');
  }
});
