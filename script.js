// BURGER SCRIPT(JS1)
const burger = document.querySelector(".burger");
const navLink = document.querySelector(".nav-center");

burger.addEventListener("click", openMenu);

function openMenu() {
  burger.classList.toggle("active");
  navLink.classList.toggle("active");
}