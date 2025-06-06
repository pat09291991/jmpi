<?php
$products = json_decode(file_get_contents(__DIR__ . '/data/products.json'), true);
$service_strengths = json_decode(file_get_contents(__DIR__ . '/data/service-strengths.json'), true);
$nav = json_decode(file_get_contents(__DIR__ . '/data/nav.json'), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joshua's Meat Products, Inc.</title>
  <link href="/output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Inter:400,500,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
</head>
<body class="bg-white">
  <!-- Header / Navigation Bar -->
  <header class="w-full bg-white shadow flex items-center justify-between px-8 py-4 shadow-lg relative fixed top-0 left-0 z-50">
    <img src="/images/jmpilogo.png" alt="Joshua's Meat Products, Inc." class="h-16">
    <nav class="hidden lg:flex gap-x-24 font-bold text-lg absolute left-1/2 -translate-x-1/2">
      <?php foreach ($nav as $item): ?>
        <a href="<?= htmlspecialchars($item['link']) ?>" class="hover:text-red-600"><?= htmlspecialchars($item['name']) ?></a>
      <?php endforeach; ?>
    </nav>
    <div class="hidden lg:flex items-center space-x-4">
      <div class="relative flex items-center group" id="search-group">
        <div class="flex items-center gap-x-1">
          <div class="relative">
            <span class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-800 pointer-events-none z-20 flex items-center gap-x-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/>
              </svg>
              <span id="search-label" class="font-bold transition-all duration-300">SEARCH</span>
            </span>
            <input
              id="search-input"
              type="text"
              class="search-anim bg-white hover:bg-gray-100 focus:bg-gray-100 outline-none text-sm pl-8 py-2 transition-all duration-300 w-24"
            />
          </div>
        </div>
        <div id="search-results" class="absolute left-[-40px] top-full mt-2 w-96 bg-white rounded-xl shadow-lg z-50 hidden"></div>
      </div>
      <span class="mx-2 text-gray-400">|</span>
      <a href="#" class="px-4 py-2 border-2 border-red-600 text-red-600 rounded-full font-bold text-sm hover:bg-red-600 hover:text-white transition">BE A DEALER</a>
    </div>
    <!-- Burger menu for mobile -->
    <button id="burger-menu" class="block lg:hidden focus:outline-none ml-auto">
      <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </header>
  <!-- Sidebar overlay and drawer -->
  <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-40 z-50 hidden"></div>
  <aside id="sidebar" class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg z-50 transform translate-x-full transition-transform duration-300">
    <div class="flex justify-end items-center px-6 py-4 border-b">
      <button id="close-sidebar" class="text-gray-500 hover:text-red-600 focus:outline-none">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <nav class="flex flex-col gap-4 px-6 py-6">
      <?php foreach ($nav as $item): ?>
        <a href="<?= htmlspecialchars($item['link']) ?>" class="py-2 px-2 rounded hover:bg-red-50 text-xs md:text-sm lg:text-base font-semibold text-gray-700 hover:text-red-600 transition">
          <?= htmlspecialchars($item['name']) ?>
        </a>
      <?php endforeach; ?>
      <a href="#" class="mt-4 px-4 py-2 border-2 border-red-600 text-red-600 rounded-full font-bold text-center hover:bg-red-600 hover:text-white transition text-xs md:text-sm lg:text-base">BE A DEALER</a>
    </nav>
  </aside>

  <!-- Carousel -->
  <section class="w-full flex flex-col items-center justify-center md:px-8 pt-[100px]">
    <div class="relative w-full">
      <div class="hero-swiper h-56 md:h-96 lg:h-[600px] w-full rounded-none md:rounded-3xl shadow-lg">
        <div class="swiper-wrapper h-full">
          <div class="swiper-slide flex items-center justify-center h-full relative">
            <img src="/images/carousel2.jpg" alt="Carousel 1" class="h-full w-full object-cover rounded-none md:rounded-3xl" />
            <div class="absolute bottom-8 md:bottom-20 md:right-32 right-4 z-10">
              <button class="expand-button px-3 md:px-8 lg:px-12 py-2 md:py-3 lg:py-4 bg-white border border-red-600 text-red-600 rounded-full font-bold text-[10px] md:text-sm lg:text-base hover:text-white shadow-lg group cursor-pointer flex justify-center items-center">
                <span class="text-xs sm:text-sm md:text-base">VIEW PRODUCTS</span>
                <span class="inline-block transition-all duration-300 group-hover:translate-x-1 ml-2">
                  <svg class="w-4 h-4 md:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 32 24">
                    <line x1="4" y1="12" x2="28" y2="12" />
                    <polyline points="22,6 28,12 22,18" />
                  </svg>
                  <svg class="w-5 h-5 arrow-svg hidden md:inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 32 24">
                    <line class="arrow-line" x1="4" y1="12" x2="20" y2="12" />
                    <line class="arrow-line-hover" x1="4" y1="12" x2="28" y2="12" />
                    <polyline points="22,6 28,12 22,18" />
                  </svg>
                </span>
              </button>
            </div>
          </div>
          <div class="swiper-slide flex items-center justify-center h-full relative">
            <img src="/images/carousel1.png" alt="Carousel 2" class="h-full w-full object-cover rounded-none md:rounded-3xl" />
            <div class="absolute bottom-8 md:bottom-20 md:right-32 right-4 z-10">
              <button class="expand-button px-3 md:px-8 lg:px-12 py-2 md:py-3 lg:py-4 bg-white border border-red-600 text-red-600 rounded-full font-bold text-[10px] md:text-sm lg:text-base hover:text-white shadow-lg group cursor-pointer flex justify-center items-center">
                <span class="text-xs sm:text-sm md:text-base">VIEW PRODUCTS</span>
                <span class="inline-block transition-all duration-300 group-hover:translate-x-1 ml-2">
                  <svg class="w-4 h-4 md:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 32 24">
                    <line x1="4" y1="12" x2="28" y2="12" />
                    <polyline points="22,6 28,12 22,18" />
                  </svg>
                  <svg class="w-5 h-5 arrow-svg hidden md:inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 32 24">
                    <line class="arrow-line" x1="4" y1="12" x2="20" y2="12" />
                    <line class="arrow-line-hover" x1="4" y1="12" x2="28" y2="12" />
                    <polyline points="22,6 28,12 22,18" />
                  </svg>
                </span>
              </button>
            </div>
          </div>
        </div>
        <div class="swiper-pagination hero-swiper-pagination"></div>
      </div>
    </div>
  </section>

  <!-- Top Products Section -->
  <section class="w-full flex flex-col lg:flex-row gap-8 mt-6 lg:mt-12 px-2 lg:px-8 pb-4 pt-4 lg:pb-8 lg:pt-8 items-stretch">
    <!-- Products Column -->
    <div class="w-full lg:w-2/3 mb-8 lg:mb-0">
      <h2 class="text-xl sm:text-2xl md:text-4xl font-extrabold text-red-600 mb-2 text-center">JMPi Top Products</h2>
      <p class="text-sm sm:text-base md:text-lg text-gray-700 mb-8 text-center px-4 md:px-12">Discover the all-time favorites that bring extra flavor to every meal! These top picks are loved by families and foodies alike — perfect for everyday cooking, party platters, or quick bites.</p>
      <div class="swiper product-swiper w-full !p-1 h-auto lg:h-[600px]">
        <div class="swiper-wrapper">
          <?php foreach ($products as $product): ?>
            <div class="swiper-slide bg-white rounded-3xl shadow flex flex-col items-center w-64 h-auto lg:w-80 lg:h-[600px] overflow-hidden group transition-all duration-300">
              <div class="w-full h-40 lg:h-96 overflow-hidden">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-40 lg:h-96 object-cover mb-0 transition-transform duration-300 group-hover:scale-110" />
              </div>
              <div class="flex-1 py-4 lg:py-16 flex flex-col items-center w-full transition-all duration-300 bg-gray-50">
                <div class="text-base md:text-2xl group-hover:text-lg mb-3 group-hover:mb-1 group-hover:text-semibold transition-all duration-300"><?= htmlspecialchars($product['name']) ?></div>
                <div class="text-xs md:text-base text-gray-500 mb-4 text-center max-h-0 overflow-hidden group-hover:max-h-20 group-hover:mb-4 transition-all duration-300">
                  <?= htmlspecialchars($product['description']) ?>
                </div>
                <button class="mt-auto px-6 py-2 bg-red-600 text-white rounded-full font-bold text-xs md:text-sm lg:text-base">VIEW</button>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev product-swiper-prev"></div>
        <div class="swiper-button-next product-swiper-next"></div>
      </div>
    </div>
    <!-- New Product Column -->
    <div class="w-full lg:w-1/3 bg-red-600 text-white rounded-3xl flex flex-col items-center justify-center p-6 md:p-10 min-h-[350px] md:min-h-[750px]">
      <h3 class="text-lg md:text-2xl font-extrabold mb-4 text-center">New Products to Try!</h3>
      <p class="text-sm md:text-lg text-center">Exciting additions to the JMPi family — crispy, fun, and full of flavor.</p>
    </div>
  </section>

  <!-- About Section -->
  <section class="w-full flex flex-col lg:flex-row items-stretch justify-center gap-12 px-4 py-16 mt-8">
    <!-- Video Column -->
    <div class="w-full lg:w-1/2 flex justify-center items-stretch mb-8 lg:mb-0">
      <div class="relative w-full max-w-md md:max-w-xl lg:max-w-2xl aspect-video rounded-3xl overflow-hidden shadow-lg flex-shrink-0">
        <video class="w-full h-full object-cover rounded-3xl" poster="/images/about-poster.jpg">
          <source src="/videos/about.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <button class="absolute inset-0 flex items-center justify-center focus:outline-none" aria-label="Play Video">
          <span class="block w-24 h-24 bg-white bg-opacity-80 rounded-full flex items-center justify-center border-4 border-white shadow-lg">
            <svg class="w-12 h-12 text-red-600" fill="currentColor" viewBox="0 0 24 24">
              <polygon points="9.5,7.5 16.5,12 9.5,16.5" />
            </svg>
          </span>
        </button>
      </div>
    </div>
    <!-- About Details Column -->
    <div class="w-full lg:w-1/2 flex flex-col items-center justify-center text-center h-full">
      <h2 class="text-lg sm:text-xl md:text-3xl lg:text-5xl font-extrabold text-red-600 mb-6">Joshua's Meat Products, Inc.</h2>
      <p class="text-sm sm:text-base md:text-lg text-gray-700 mb-8 max-w-3xl">Founded in 1993 in Nagcarlan, Laguna, with just PHP 2,000 and a homemade longganisa recipe, JMPI has grown into a trusted name in processed meats. Now offering over 30 products and producing up to 10 tons daily, JMPI is NMIS-certified (Double A) and serves regions including Laguna, Metro Manila, Bicol, and Northern Luzon. With 350+ employees and a strong commitment to quality and community, JMPI continues to uphold food safety and support local livelihoods.</p>
      <button class="px-8 py-3 bg-red-600 text-white rounded-full font-bold text-xs md:text-sm lg:text-base shadow hover:bg-red-700 transition">READ MORE</button>
    </div>
  </section>

  <!-- JMPi Service Strengths Section -->
  <section class="w-full bg-gray-50 py-20 px-20">
    <div class="mx-auto">
      <h2 class="text-lg sm:text-2xl md:text-4xl font-extrabold text-red-600 text-center mb-2">JMPi Service Strengths</h2>
      <p class="text-sm sm:text-base md:text-lg text-gray-700 text-center mb-12">We're committed to providing top-notch service every step of the way.</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
        <?php foreach ($service_strengths as $strength): ?>
          <div class="flex flex-col items-center text-center px-4">
            <?php if ($strength['icon'] === 'truck'): ?>
              <svg class="w-10 h-10 sm:w-14 sm:h-14 md:w-16 md:h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 17V7a2 2 0 012-2h11a2 2 0 012 2v10M16 17h2a2 2 0 002-2v-3a2 2 0 00-2-2h-2m-6 5a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            <?php elseif ($strength['icon'] === 'clock'): ?>
              <svg class="w-10 h-10 sm:w-14 sm:h-14 md:w-16 md:h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/></svg>
            <?php elseif ($strength['icon'] === 'credit-card'): ?>
              <svg class="w-10 h-10 sm:w-14 sm:h-14 md:w-16 md:h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M2 10h20"/></svg>
            <?php elseif ($strength['icon'] === 'percent'): ?>
              <svg class="w-10 h-10 sm:w-14 sm:h-14 md:w-16 md:h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="19" y1="5" x2="5" y2="19"/><circle cx="6.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/></svg>
            <?php endif; ?>
            <h3 class="font-bold text-base sm:text-lg md:text-xl mb-2"><?= htmlspecialchars($strength['title']) ?></h3>
            <p class="text-xs sm:text-sm md:text-base text-gray-700 text-base"><?= htmlspecialchars($strength['description']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="w-full">
    <div class="bg-orange-500 w-full py-16 px-2 md:px-4 lg:px-20 flex flex-col lg:flex-row justify-between items-center lg:items-start gap-8">
      <!-- Left Column -->
      <div class="w-full lg:flex-1 lg:max-w-xs flex flex-col items-center lg:items-start text-center lg:text-left text-white mb-6 lg:mb-0">
        <span class="font-extrabold text-base sm:text-lg md:text-xl mb-1 lg:text-xl">BE A DEALER!</span>
        <span class="text-xs sm:text-sm md:text-base">Interested in becoming a dealer?<span class="hidden lg:inline"><br></span><span class="inline lg:block"> Fill out our form now!</span></span>
        <a href="#" class="mt-4 lg:mt-6 inline-block px-4 md:px-6 lg:px-8 py-2 lg:py-3 bg-white text-orange-600 font-bold rounded-full shadow transition hover:bg-orange-100 text-xs md:text-sm lg:text-base">DEALER FORM</a>
      </div>
      <!-- Center Column -->
      <div class="w-full lg:flex-1 lg:max-w-xs flex flex-col items-center text-center mb-6 lg:mb-0">
        <img src="/images/jmpilogo.png" alt="Joshua's Meat Products, Inc." class="h-20 lg:h-24 mb-2">
        <div class="font-bold text-white mb-1 text-sm lg:text-base">
          <?php
            $footer_nav = array_filter($nav, function($item) {
              return $item['name'] !== 'HOME';
            });
            $footer_links = array_map(function($item) {
              return '<a href="'.htmlspecialchars($item['link']).'" class="hover:underline">'.htmlspecialchars($item['name']).'</a>';
            }, $footer_nav);
            echo implode(' | ', $footer_links);
          ?>
        </div>
        <div class="text-white text-xs sm:text-sm md:text-base">Brgy. Banago, Nagcarlan, Laguna, Philippines 4002</div>
      </div>
      <!-- Right Column -->
      <div class="w-full lg:flex-1 lg:max-w-xs flex flex-col items-center lg:items-end text-center lg:text-right text-white text-base lg:text-xl">
        <span class="text-xs sm:text-sm md:text-base">Access our product promotion materials by clicking 'Download' to get a copy of our brochure.</span>
        <a href="#" class="mt-4 lg:mt-6 inline-block px-4 md:px-6 lg:px-8 py-2 lg:py-3 bg-white text-orange-600 font-bold rounded-full shadow transition hover:bg-orange-100 flex items-center justify-center gap-2 text-xs md:text-sm lg:text-base">DOWNLOAD <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></a>
      </div>
    </div>
    <div class="bg-gray-50 w-full py-8 text-center text-gray-400 text-xs lg:text-sm">
      Copyright 2023. All Rights Reserved
    </div>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/js/index.js"></script>
</body>
</html> 