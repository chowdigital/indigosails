document.addEventListener("DOMContentLoaded", function () {
  const nav = document.getElementById("site-navigation");
  const toggle = document.querySelector(".menu-toggle");

  if (toggle && nav) {
    toggle.addEventListener("click", function () {
      const expanded = toggle.getAttribute("aria-expanded") === "true";
      toggle.setAttribute("aria-expanded", String(!expanded));
      nav.classList.toggle("is-active");
      toggle.classList.toggle("is-active"); // ✅ animate icon
    });
  }
});
