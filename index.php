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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-white font-['Poppins']">
  <!-- Header / Navigation Bar -->
  <header class="w-full bg-white shadow flex items-center justify-between px-4 md:px-8 lg:px-16 xl:px-24 py-4 shadow-lg relative fixed top-0 left-0 z-50">
    <img src="/images/jmpi-logo.webp" alt="Joshua's Meat Products, Inc." class="h-16">
    <nav class="hidden lg:flex gap-x-24 font-bold text-lg absolute left-1/2 -translate-x-1/2">
      <?php foreach ($nav as $item): ?>
        <?php if ($item['name'] === 'HOME'): ?>
          <a href="<?= htmlspecialchars($item['link']) ?>" class="text-red-600"><?= htmlspecialchars($item['name']) ?></a>
        <?php else: ?>
          <a href="<?= htmlspecialchars($item['link']) ?>"><?= htmlspecialchars($item['name']) ?></a>
        <?php endif; ?>
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
              class="search-anim bg-white hover:bg-gray-100 focus:bg-gray-100 outline-none text-sm pl-8 py-2 transition-all duration-300 w-48 rounded-full"
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
  <section class="w-full flex flex-col items-center justify-center px-4 md:px-8 lg:px-16 xl:px-24 pt-16 md:pt-[100px] mt-16">
    <div class="relative w-full">
      <div class="hero-swiper h-56 md:h-96 lg:h-[600px] w-full rounded-3xl shadow-lg">
        <div class="swiper-wrapper h-full">
          <div class="swiper-slide flex items-center justify-center h-full relative">
            <img src="/images/Banner_1.webp" alt="Carousel 1" class="h-full w-full object-cover rounded-3xl" />
            <div class="absolute bottom-8 md:bottom-32 md:left-80 left-4 z-10">
              <button class="expand-button px-3 md:px-8 lg:px-12 py-2 md:py-3 lg:py-4 bg-white border border-red-600 text-red-600 rounded-full font-bold text-[10px] md:text-sm lg:text-base hover:text-white shadow-lg group cursor-pointer flex justify-center items-center">
                <span class="text-xs sm:text-sm md:text-base">VIEW PRODUCTS</span>
              </button>
            </div>
          </div>
          <div class="swiper-slide flex items-center justify-center h-full relative">
            <img src="/images/Banner_2.webp" alt="Carousel 2" class="h-full w-full object-cover rounded-3xl" />
            <div class="absolute bottom-8 md:bottom-32 md:left-80 left-4 z-10">
              <button class="expand-button px-3 md:px-8 lg:px-12 py-2 md:py-3 lg:py-4 bg-white border border-red-600 text-red-600 rounded-full font-bold text-[10px] md:text-sm lg:text-base hover:text-white shadow-lg group cursor-pointer flex justify-center items-center">
                <span class="text-xs sm:text-sm md:text-base">VIEW PRODUCTS</span>
              </button>
            </div>
          </div>
        </div>
        <div class="swiper-pagination hero-swiper-pagination"></div>
      </div>
    </div>
  </section>

  

  <!-- Top Products Section -->
  <section class="w-full flex flex-col justify-between items-center lg:flex-row md:gap-32 px-4 md:px-24 py-8 md:py-12 lg:py-16 mt-8">
    <!-- Products Column -->
    <div class="w-full lg:w-2/3 flex flex-col items-center justify-center text-center min-h-[600px]">
      <h2 class="text-xl sm:text-2xl md:text-4xl font-extrabold text-red-600 mb-2 text-center">JMPi Top Products</h2>
      <p class="text-sm sm:text-base md:text-lg text-gray-700 mb-8 text-center w-full md:max-w-5xl px-4 md:px-12">Discover the all-time favorites that bring extra flavor to every meal! These top picks are loved by families and foodies alike — perfect for everyday cooking, party platters, or quick bites.</p>
      <div class="swiper product-swiper w-full !p-1 h-auto">
        <div class="swiper-wrapper">
          <?php foreach ($products as $product): ?>
            <div class="swiper-slide bg-white rounded-3xl shadow w-56 lg:w-64 overflow-hidden group relative transition-all duration-300 ">
              <div class="w-full h-40 lg:h-72 overflow-hidden">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-40 lg:h-72 object-cover rounded-t-3xl transition-transform duration-300 group-hover:scale-110" />
              </div>
              <div class="p-4 flex flex-col items-center text-center min-h-40 bg-gray-100">
                <div class="text-base md:text-2xl font-semibold mb-2 group-hover:text-base transition-all duration-300"><?= htmlspecialchars($product['name']) ?></div>
                <div class="text-xs md:text-base group-hover:text-xs text-gray-700 mb-2 transition-all duration-300 opacity-0 max-h-0 overflow-hidden group-hover:opacity-100 group-hover:max-h-20 line-clamp-2">
                  <?= htmlspecialchars($product['description']) ?>
                </div>
                <button class="px-6 py-2 bg-red-600 text-white rounded-full font-bold text-xs md:text-sm lg:text-base">VIEW</button>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev product-swiper-prev"></div>
        <div class="swiper-button-next product-swiper-next"></div>
      </div>
    </div>
    <!-- New Product Column -->
    <div class="w-full lg:w-1/3 bg-red-600 text-white rounded-3xl flex flex-col items-center justify-center h-full mt-8 md:mt-0 group">
      <div class="px-12 py-12">
        <h3 class="text-lg md:text-2xl font-extrabold mb-4 text-center">New Products to Try!</h3>
        <p class="text-sm md:text-lg text-center">Exciting additions to the JMPi family — crispy, fun, and full of flavor.</p>
      </div>
      <div class="relative w-full h-[400px] overflow-hidden rounded-b-3xl">
        <div class="absolute inset-0 transition-opacity duration-300 group-hover:opacity-0">
          <img src="/images/fries.webp" class="w-full h-full object-cover rounded-b-3xl" />
          <div class="absolute top-4 left-4">
            <img src="/images/workspace_premium_svg.svg" class="w-12 h-12" />
          </div>
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
            <h4 class="text-2xl font-bold ml-4 mb-2">French Fries</h4>
          </div>
        </div>
        <div class="absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
          <img src="/images/chicken_pop.webp" class="w-full h-full object-cover rounded-b-3xl" />
          <div class="absolute top-4 left-4">
            <img src="/images/workspace_premium_svg.svg" class="w-12 h-12" />
          </div>
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
            <h4 class="text-2xl font-bold ml-4">Chicken Pops <br> <span class="text-sm font-normal">Regular/Spicy</span></h4>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="w-full flex flex-col lg:flex-row items-center justify-center md:gap-12 px-4 md:px-8 py-8 md:py-12 lg:py-16 mt-8">
    <!-- Video Column -->
    <div class="w-full lg:w-1/2 flex justify-center items-stretch mb-8 lg:mb-0">
      <div class="relative w-full max-w-2xl md:max-w-2xl lg:max-w-3xl aspect-video rounded-3xl overflow-hidden shadow-lg flex-shrink-0 bg-red-600">
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
      <h2 class="text-lg sm:text-xl md:text-3xl font-extrabold mb-4 text-gray-800">JMPi Main Store Grand Opening</h2>
      <p class="text-sm sm:text-base md:text-lg text-gray-700 mb-6 max-w-3xl opacity-80">
        <span class="font-bold">June 2, 2025</span> marked a major milestone for Joshua's Meat Products, Inc. as we officially opened the doors of our new and improved main store. This newly upgraded space is designed to serve you better — with wider selections, fresher meats, and improved customer experience. Thank you to everyone who joined us in this special milestone. We are excited to continue providing quality and trusted products to every Filipino home.
      </p>
      <p class="text-sm sm:text-base md:text-lg text-gray-700 mb-8 max-w-3xl opacity-80">
        Check out our other locations and store outlets by clicking the button below.
      </p>
      <button class="px-8 py-3 bg-red-600 text-white rounded-full font-bold text-xs md:text-sm lg:text-base shadow hover:bg-red-700 transition">SEE ALL LOCATIONS</button>
    </div>
  </section>

  <!-- About Us Section (New) -->
  <section class="w-full flex flex-col lg:flex-row items-center justify-center gap-12 py-8 md:py-12 lg:py-16 mt-8 bg-gray-100">
    <!-- Text Column -->
    <div class="w-full lg:w-1/2 flex flex-col items-center justify-center text-center h-full px-8">
      <h2 class="text-lg sm:text-xl md:text-3xl font-extrabold mb-4 text-gray-800">About Joshua's Meat Products, Inc.</h2>
      <p class="text-sm sm:text-base md:text-lg text-gray-700 mb-6 max-w-3xl opacity-80">
        For over three decades, <span class="font-bold">Joshua's Meat Products, Inc.</span> has established itself as a competitive force in the food manufacturing industry. Renowned for its commitment to excellence, the company upholds the highest standards in producing safe, high-quality meat products. With a diverse portfolio of over 40 product varieties, Joshua's continues to innovate and meet market demands while maintaining strict compliance with food safety regulations. Trusted by consumers and partners alike, Joshua's is a name synonymous with quality, consistency, and dedication.
      </p>
      <button class="px-8 py-3 bg-red-600 text-white rounded-full font-bold text-xs md:text-sm lg:text-base shadow hover:bg-red-700 transition">ABOUT US</button>
    </div>
    <!-- Image Column -->
    <div class="w-full lg:w-1/2 flex justify-center items-stretch mb-8 lg:mb-0 px-4 md:px-8">
      <div class="relative w-full max-w-xl md:max-w-2xl lg:max-w-3xl aspect-video rounded-3xl overflow-hidden shadow-lg flex-shrink-0">
        <img src="/images/carousel2.jpg" alt="About Joshua's Meat Products, Inc." class="w-full h-full object-cover rounded-3xl" />
      </div>
    </div>
  </section>

  <!-- JMPi Service Strengths Section -->
  <section class="w-full bg-gray-50 py-20 px-20">
    <div class="mx-auto">
      <h2 class="text-lg sm:text-2xl md:text-4xl font-extrabold text-red-600 text-center mb-2">JMPi Service Strengths</h2>
      <p class="text-sm sm:text-base md:text-lg text-gray-700 text-center mb-12">We're committed to providing top-notch service every step of the way.</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
        <?php foreach ($service_strengths as $strength): ?>
          <div class="flex flex-col items-center text-center px-4 group">
            <?php if ($strength['icon'] === 'truck'): ?>
              <svg class="w-10 h-10 sm:w-14 sm:h-14 md:w-16 md:h-16 mb-4 text-gray-400 group-hover:text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 17V7a2 2 0 012-2h11a2 2 0 012 2v10M16 17h2a2 2 0 002-2v-3a2 2 0 00-2-2h-2m-6 5a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            <?php elseif ($strength['icon'] === 'clock'): ?>
              <svg class="w-10 h-10 sm:w-14 sm:h-14 md:w-16 md:h-16 mb-4 text-gray-400 group-hover:text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/></svg>
            <?php elseif ($strength['icon'] === 'credit-card'): ?>
              <svg class="w-10 h-10 sm:w-14 sm:h-14 md:w-16 md:h-16 mb-4 text-gray-400 group-hover:text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M2 10h20"/></svg>
            <?php elseif ($strength['icon'] === 'percent'): ?>
              <svg class="w-10 h-10 sm:w-14 sm:h-14 md:w-16 md:h-16 mb-4 text-gray-400 group-hover:text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="19" y1="5" x2="5" y2="19"/><circle cx="6.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/></svg>
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
    <div class="bg-red-600 w-full py-16 px-2 md:px-4 lg:px-20 flex flex-col lg:flex-row justify-between items-center lg:items-start gap-8">
      <!-- Left Column -->
      <div class="w-full lg:flex-1 lg:max-w-xs flex flex-col items-center lg:items-start text-center lg:text-left text-white mb-6 lg:mb-0">
        <span class="font-extrabold text-base sm:text-lg md:text-xl mb-1 lg:text-xl">BE A DEALER!</span>
        <span class="text-xs sm:text-sm md:text-base">Interested in becoming a dealer?<span class="hidden lg:inline"><br></span><span class="inline lg:block"> Fill out our form now!</span></span>
        <a href="#" class="mt-4 lg:mt-6 inline-block px-4 md:px-6 lg:px-8 py-2 lg:py-3 bg-white text-red-600 font-bold rounded-full shadow transition hover:bg-red-600 hover:text-white text-xs md:text-sm lg:text-base">DEALER FORM</a>
      </div>
      <!-- Center Column -->
      <div class="w-full lg:flex-1 lg:max-w-xl flex flex-col items-center text-center mb-6 lg:mb-0">
        <img src="/images/jmpi-logo.webp" alt="Joshua's Meat Products, Inc." class="h-20 lg:h-32 mb-2">
        <div class="text-white mb-1 text-sm lg:text-base">
          <?php
            $footer_nav = array_filter($nav, function($item) {
              return $item['name'] !== 'HOME';
            });
            $footer_nav = array_map(function($item) {
              if ($item['name'] === 'PRODUCTS') {
                $item['name'] = 'JMPI PRODUCTS';
                return $item;
              }
              return $item;
            }, $footer_nav);
            $footer_links = array_map(function($item) {
              return '<a href="'.htmlspecialchars($item['link']).'" class="hover:underline">'.htmlspecialchars($item['name']).'</a>';
            }, $footer_nav);
            echo implode(' | ', $footer_links);
          ?>
        </div>
      </div>
      <!-- Right Column -->
      <div class="w-full lg:flex-1 lg:max-w-xs flex flex-col items-center lg:items-end text-center lg:text-right text-white text-base lg:text-xl">
        <span class="text-xs sm:text-sm md:text-base">Access our product promotion materials by clicking 'Download' to get a copy of our brochure.</span>
        <a href="#" class="mt-4 lg:mt-6 inline-block px-4 md:px-6 lg:px-8 py-2 lg:py-3 bg-white text-red-600 font-bold rounded-full shadow transition hover:bg-red-600 hover:text-white flex items-center justify-center gap-2 text-xs md:text-sm lg:text-base">
          DOWNLOAD
          <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
        </a>
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