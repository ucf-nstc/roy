// Barebones nav
const mobileNav = document.querySelector(".mobile-nav");
const mobileNavToggle = document.querySelector(".nav-toggle");

console.log(mobileNav);
console.log(mobileNavToggle);

mobileNavToggle.addEventListener("click", function(event) {
  mobileNav.classList.toggle("is-hidden-mobile");
  mobileNav.classList.toggle("is-hidden-tablet");
});
