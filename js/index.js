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
const searchLabel = document.getElementById("search-label");
const searchGroup = document.getElementById("search-group");

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

function updateSearchLabel() {
  if (
    searchInput.value.trim() !== "" ||
    document.activeElement === searchInput ||
    (searchGroup && searchGroup.matches(":hover"))
  ) {
    searchLabel && searchLabel.classList.add("hide-label");
  } else {
    searchLabel && searchLabel.classList.remove("hide-label");
  }
}

if (searchInput && searchLabel && searchGroup) {
  searchInput.addEventListener("input", updateSearchLabel);
  searchInput.addEventListener("focus", updateSearchLabel);
  searchInput.addEventListener("blur", updateSearchLabel);
  searchGroup.addEventListener("mouseenter", updateSearchLabel);
  searchGroup.addEventListener("mouseleave", updateSearchLabel);
}

document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("search-input");
  const resultsBox = document.getElementById("search-results");

  if (!searchInput || !resultsBox) return;

  let lastQuery = "";
  let debounceTimeout;

  searchInput.addEventListener("input", function () {
    if (searchInput.value.trim() !== "") {
      searchInput.classList.add("has-value");
    } else {
      searchInput.classList.remove("has-value");
    }
    const query = searchInput.value.trim();
    clearTimeout(debounceTimeout);
    if (query === "") {
      resultsBox.innerHTML = "";
      resultsBox.classList.add("hidden");
      return;
    }
    debounceTimeout = setTimeout(() => {
      fetch(`search.php?q=${encodeURIComponent(query)}`)
        .then((res) => res.json())
        .then((products) => {
          if (!products.length) {
            resultsBox.innerHTML =
              '<div class="p-4 text-gray-500 text-center">No products found.</div>';
            resultsBox.classList.remove("hidden");
            return;
          }
          resultsBox.innerHTML = products
            .map(
              (product) => `
            <div class="search-result-item">
              <img src="${product.image}" alt="${product.name}" class="search-result-img" />
              <div>
                <div class="search-result-name">${product.name}</div>
                <div class="search-result-desc">${product.description}</div>
              </div>
            </div>
          `
            )
            .join("");
          resultsBox.classList.remove("hidden");
        });
    }, 200);
  });

  // Hide results when clicking outside
  document.addEventListener("click", function (e) {
    if (!resultsBox.contains(e.target) && e.target !== searchInput) {
      resultsBox.classList.add("hidden");
    }
  });
});
