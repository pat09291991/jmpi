// Swiper initialization for hero carousel
const heroSwiper = new Swiper(".hero-swiper", {
  effect: "fade",
  loop: true,
  pagination: {
    el: ".hero-swiper-pagination",
    clickable: true,
  },
});

// Swiper for product cards (FreeMode + Navigation)
const productSwiper = new Swiper(".product-swiper", {
  slidesPerView: 3,
  spaceBetween: 24,
  freeMode: true,
  navigation: {
    nextEl: ".product-swiper-next",
    prevEl: ".product-swiper-prev",
  },
});

// Search animation logic
const searchBtn = document.getElementById("search-btn");
const searchInput = document.getElementById("search-input");

if (searchBtn && searchInput) {
  function showInput() {
    searchInput.classList.remove("w-0", "opacity-0", "invisible");
    searchInput.classList.add("input-animate-expand");
    searchInput.focus();
  }
  function hideInput() {
    if (!searchInput.value) {
      searchInput.classList.remove("input-animate-expand");
      searchInput.classList.add("w-0", "opacity-0", "invisible");
    }
  }
  searchBtn.addEventListener("mouseenter", showInput);
  searchBtn.addEventListener("focus", showInput);
  searchInput.addEventListener("blur", hideInput);
}
