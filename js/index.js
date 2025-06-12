// Swiper initialization for hero carousel
const heroSwiper = new Swiper(".hero-swiper", {
  effect: "fade",
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".hero-swiper-pagination",
    clickable: true,
  },
  autoHeight: false,
  observer: false,
  observeParents: false,
  watchOverflow: true,
});

// Swiper for product cards (FreeMode + Navigation)
const productSwiper = new Swiper(".product-swiper", {
  slidesPerView: 1,
  spaceBetween: 16,
  freeMode: false,
  navigation: {
    nextEl: ".product-swiper-next",
    prevEl: ".product-swiper-prev",
  },
  autoplay: {
    delay: 0, // continuous
    disableOnInteraction: false,
  },
  speed: 3500, // smooth continuous speed
  loop: true,
  breakpoints: {
    768: {
      // tablet
      slidesPerView: 2,
      spaceBetween: 20,
      freeMode: true,
    },
    1024: {
      // desktop
      slidesPerView: 3,
      spaceBetween: 24,
      freeMode: true,
    },
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

  // --- Product Modal Logic (shared with products.php) ---
  let allProducts = [];
  // Fetch all products data once
  fetch("/data/products.json")
    .then((res) => res.json())
    .then((data) => {
      allProducts = data;
    });

  // Inject modal HTML if not present
  if (!document.getElementById("product-modal")) {
    const modalDiv = document.createElement("div");
    modalDiv.innerHTML = `
      <div id="product-modal" class="fixed px-4 md:px-0 inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden" data-aos="fade-up">
        <div class="bg-white rounded-2xl shadow-2xl w-full lg:max-w-4xl p-0 relative flex flex-col md:flex-row overflow-hidden max-h-[90vh]">
          <button id="modal-prev" class="absolute left-2 top-1/2 -translate-y-1/2 rounded-full shadow-lg w-12 h-12 flex items-center justify-center text-2xl text-gray-600 hover:bg-red-600 hover:text-white transition z-10 border-2 border-gray-200 p-0" style="display:none">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-full h-full pointer-events-none' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'><path stroke-linecap='round' stroke-linejoin='round' d='M15 19l-7-7 7-7'/></svg>
          </button>
          <div class="w-full md:w-1/2 flex items-center justify-center md:p-8 sm:mt-0">
            <img id="modal-image" src="" alt="Product Image" class="w-full h-48 md:h-80 object-cover" />
          </div>
          <div class="w-full md:w-1/2 flex flex-col p-4 md:p-8 overflow-y-auto">
            <div class="flex items-center gap-3 mb-2">
              <span class="text-xl md:text-2xl font-extrabold text-red-600" id="modal-name"></span>
            </div>
            <hr class="my-2 border-red-500">
            <div class="mb-4">
              <div class="flex items-center gap-2 mb-1">
                <span class="font-semibold text-base md:text-lg text-[#252525]">Description</span>
              </div>
              <p id="modal-description" class="text-gray-700 text-sm md:text-base"></p>
            </div>
            <hr class="my-2 border-red-500">
            <div>
              <div class="flex items-center gap-2 mb-2">
                <span class="font-semibold text-base md:text-lg text-[#252525]">Details</span>
              </div>
              <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                  <img src="/images/weigh.svg" alt="Weight" class="w-6 md:w-7 h-6 md:h-7 mb-1">
                  <span class="text-sm md:text-base text-[#252525]">Weight:</span>
                  <span id="modal-weight" class="text-sm md:text-base text-[#252525]"></span>
                </div>
                <div class="flex items-center gap-2">
                  <img src="/images/ruler.svg" alt="Dimension" class="w-6 md:w-7 h-6 md:h-7 mb-1">
                  <span class="text-sm md:text-base text-[#252525]">Dimension:</span>
                  <span id="modal-dimension" class="text-sm md:text-base text-[#252525]"></span>
                </div>
              </div>
            </div>
          </div>
          <button id="modal-next" class="absolute right-2 top-1/2 -translate-y-1/2 rounded-full shadow-lg w-12 h-12 flex items-center justify-center text-2xl text-gray-600 hover:bg-red-600 hover:text-white transition z-10 border-2 border-gray-200 p-0" style="display:none">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-full h-full pointer-events-none' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'><path stroke-linecap='round' stroke-linejoin='round' d='M9 5l7 7-7 7'/></svg>
          </button>
          <button id="close-modal" class="modal-close absolute top-2 right-2 text-2xl text-gray-400 hover:text-red-600">&times;</button>
        </div>
      </div>
    `;
    document.body.appendChild(modalDiv.firstElementChild);
  }

  // Track current modal product index for navigation
  let modalProductList = [];
  let modalCurrentIndex = -1;

  function showModalArrows(show) {
    const isMobile = window.innerWidth < 768;
    document.getElementById("modal-prev").style.display =
      show && !isMobile ? "" : "none";
    document.getElementById("modal-next").style.display =
      show && !isMobile ? "" : "none";
  }

  function openProductModal(id, productList = null) {
    const modal = document.getElementById("product-modal");
    const modalImage = document.getElementById("modal-image");
    const modalName = document.getElementById("modal-name");
    const modalDescription = document.getElementById("modal-description");
    const modalDimension = document.getElementById("modal-dimension");
    const modalWeight = document.getElementById("modal-weight");
    // Use provided list or allProducts
    modalProductList =
      Array.isArray(productList) && productList.length
        ? productList
        : allProducts;
    modalCurrentIndex = modalProductList.findIndex((p) => p.id == id);
    const product = modalProductList[modalCurrentIndex];
    if (product) {
      modalImage.src = product.image;
      modalName.textContent = product.name;
      modalDescription.textContent = product.description;
      modalDimension.textContent = product.dimension;
      modalWeight.textContent = product.weight;
      modal.classList.remove("hidden");
      if (window.AOS) {
        AOS.refreshHard && AOS.refreshHard();
        AOS.refresh && AOS.refresh();
      }
      // Only show arrows if this is the Top Products list
      const topProductIds = Array.from(
        document.querySelectorAll(".top-product-view-btn")
      ).map((b) => b.dataset.productId);
      const isTopProducts =
        Array.isArray(productList) &&
        productList.length &&
        productList.every((p) => topProductIds.includes(p.id.toString()));
      showModalArrows(isTopProducts && modalProductList.length > 1);
    }
  }

  // Modal arrow navigation
  document.addEventListener("click", function (e) {
    const modal = document.getElementById("product-modal");
    if (!modal) return;
    if (e.target === modal || (e.target && e.target.id === "close-modal")) {
      modal.classList.add("hidden");
    }
    if (
      e.target &&
      e.target.id === "modal-prev" &&
      modalProductList.length > 1
    ) {
      modalCurrentIndex =
        (modalCurrentIndex - 1 + modalProductList.length) %
        modalProductList.length;
      openProductModal(
        modalProductList[modalCurrentIndex].id,
        modalProductList
      );
    }
    if (
      e.target &&
      e.target.id === "modal-next" &&
      modalProductList.length > 1
    ) {
      modalCurrentIndex = (modalCurrentIndex + 1) % modalProductList.length;
      openProductModal(
        modalProductList[modalCurrentIndex].id,
        modalProductList
      );
    }
  });

  // --- End Product Modal Logic ---

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
            <div class="search-result-item" data-product-id="${product.id}">
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

  // Attach click event to search result items (event delegation)
  resultsBox.addEventListener("click", function (e) {
    let item = e.target;
    while (item && !item.classList.contains("search-result-item")) {
      item = item.parentElement;
    }
    if (item && item.dataset.productId) {
      openProductModal(item.dataset.productId);
    }
  });

  // Sidebar menu logic
  const burger = document.getElementById("burger-menu");
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("sidebar-overlay");
  const closeSidebar = document.getElementById("close-sidebar");

  function openSidebar() {
    sidebar.classList.remove("translate-x-full");
    overlay.classList.remove("hidden");
  }
  function closeSidebarFn() {
    sidebar.classList.add("translate-x-full");
    overlay.classList.add("hidden");
  }

  if (burger && sidebar && overlay && closeSidebar) {
    burger.addEventListener("click", openSidebar);
    overlay.addEventListener("click", closeSidebarFn);
    closeSidebar.addEventListener("click", closeSidebarFn);
  }

  // Top Products VIEW button logic (homepage)
  document.body.addEventListener("click", function (e) {
    const btn = e.target.closest(".top-product-view-btn");
    if (btn && btn.dataset.productId) {
      // Only show top products in modal navigation
      const topProductIds = Array.from(
        document.querySelectorAll(".top-product-view-btn")
      ).map((b) => b.dataset.productId);
      const topProducts = allProducts.filter((p) =>
        topProductIds.includes(p.id.toString())
      );
      openProductModal(btn.dataset.productId, topProducts);
    }
  });

  window.addEventListener("resize", function () {
    // Re-evaluate arrow visibility on resize
    const modal = document.getElementById("product-modal");
    if (modal && !modal.classList.contains("hidden")) {
      // Only show arrows if this is the Top Products list
      const topProductIds = Array.from(
        document.querySelectorAll(".top-product-view-btn")
      ).map((b) => b.dataset.productId);
      const isTopProducts =
        Array.isArray(window.modalProductList) &&
        window.modalProductList.length &&
        window.modalProductList.every((p) =>
          topProductIds.includes(p.id.toString())
        );
      showModalArrows(isTopProducts && window.modalProductList.length > 1);
    }
  });

  // --- Swipe support for modal on mobile ---
  (function () {
    let touchStartX = 0;
    let touchEndX = 0;
    function handleGesture() {
      const modal = document.getElementById("product-modal");
      if (!modal || modal.classList.contains("hidden")) return;
      // Only allow swipe if arrows would be shown (top products modal, >1 product)
      const prevBtn = document.getElementById("modal-prev");
      const nextBtn = document.getElementById("modal-next");
      if (window.innerWidth >= 500) return; // Only on mobile
      if (
        prevBtn.style.display === "none" &&
        nextBtn.style.display === "none"
      ) {
        if (touchEndX < touchStartX - 40) {
          // Swipe left (next)
          nextBtn.click();
        }
        if (touchEndX > touchStartX + 40) {
          // Swipe right (prev)
          prevBtn.click();
        }
      }
    }
    document.addEventListener("touchstart", function (e) {
      if (
        !document.getElementById("product-modal") ||
        document.getElementById("product-modal").classList.contains("hidden")
      )
        return;
      touchStartX = e.changedTouches[0].screenX;
    });
    document.addEventListener("touchend", function (e) {
      if (
        !document.getElementById("product-modal") ||
        document.getElementById("product-modal").classList.contains("hidden")
      )
        return;
      touchEndX = e.changedTouches[0].screenX;
      handleGesture();
    });
  })();
});
