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
    <nav class="hidden md:flex gap-x-24 font-bold text-lg absolute left-1/2 -translate-x-1/2">
      <?php foreach ($nav as $item): ?>
        <a href="<?= htmlspecialchars($item['link']) ?>" class="hover:text-red-600"><?= htmlspecialchars($item['name']) ?></a>
      <?php endforeach; ?>
    </nav>
    <div class="flex items-center space-x-4">
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
  </header>

  <!-- Carousel -->
  <section class="w-full flex flex-col items-center justify-center md:px-8 pt-[100px]">
    <div class="relative w-full">
      <div class="hero-swiper h-[600px] w-full rounded-3xl shadow-lg">
        <div class="swiper-wrapper h-full">
          <div class="swiper-slide flex items-center justify-center h-full relative">
            <img src="/images/carousel2.jpg" alt="Carousel 1" class="h-full w-full object-cover rounded-3xl" />
            <div class="absolute bottom-28 right-72 z-10">
              <button class="expand-button px-12 py-4 bg-white border border-red-600 text-red-600 rounded-full font-bold text-lg hover:text-white shadow-lg group cursor-pointer flex justify-center items-center">
                <span>VIEW PRODUCTS</span>
                <span class="inline-block transition-all duration-300 group-hover:translate-x-1 ml-2">
                  <svg class="w-5 h-5 arrow-svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 32 24">
                    <line class="arrow-line" x1="4" y1="12" x2="20" y2="12" />
                    <line class="arrow-line-hover" x1="4" y1="12" x2="28" y2="12" />
                    <polyline points="22,6 28,12 22,18" />
                  </svg>
                </span>
              </button>
            </div>
          </div>
          <div class="swiper-slide flex items-center justify-center h-full relative">
            <img src="/images/carousel1.png" alt="Carousel 2" class="h-full w-full object-cover rounded-3xl" />
            <div class="absolute bottom-28 right-72 z-10">
              <button class="expand-button px-12 py-4 bg-white border border-red-600 text-red-600 rounded-full font-bold text-lg hover:text-white shadow-lg group cursor-pointer flex justify-center items-center">
                <span>VIEW PRODUCTS</span>
                <span class="inline-block transition-all duration-300 group-hover:translate-x-1 ml-2">
                  <svg class="w-5 h-5 arrow-svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 32 24">
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
  <section class="w-full flex flex-row gap-8 mt-12 px-8 pb-8 pt-8 items-stretch">
    <!-- Products Column -->
    <div class="w-2/3">
      <h2 class="text-4xl font-extrabold text-red-600 mb-2 text-center">JMPi Top Products</h2>
      <p class="text-lg text-gray-700 mb-8 text-center px-12">Discover the all-time favorites that bring extra flavor to every meal! These top picks are loved by families and foodies alike — perfect for everyday cooking, party platters, or quick bites.</p>
      <div class="swiper product-swiper w-full !p-1 h-[600px]">
        <div class="swiper-wrapper">
          <?php foreach ($products as $product): ?>
            <div class="swiper-slide bg-white rounded-3xl shadow flex flex-col items-center w-80 h-[600px] overflow-hidden group transition-all duration-300">
              <div class="w-full h-96 overflow-hidden">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-full object-cover mb-0 transition-transform duration-300 group-hover:scale-110" />
              </div>
              <div class="py-16 flex flex-col items-center w-full transition-all duration-300 bg-gray-50">
                <div class="text-3xl group-hover:text-xl mb-3 group-hover:mb-1 group-hover:text-semibold transition-all duration-300"><?= htmlspecialchars($product['name']) ?></div>
                <div class="text-base text-gray-500 mb-4 text-center max-h-0 overflow-hidden group-hover:max-h-20 group-hover:mb-4 transition-all duration-300">
                  <?= htmlspecialchars($product['description']) ?>
                </div>
                <button class="mt-auto px-6 py-2 bg-red-600 text-white rounded-full font-bold">VIEW</button>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev product-swiper-prev"></div>
        <div class="swiper-button-next product-swiper-next"></div>
      </div>
    </div>
    <!-- New Product Column -->
    <div class="w-1/3 bg-red-600 text-white rounded-3xl flex flex-col items-center justify-center p-10">
      <h3 class="text-2xl font-extrabold mb-4 text-center">New Products to Try!</h3>
      <p class="text-lg text-center">Exciting additions to the JMPi family — crispy, fun, and full of flavor.</p>
    </div>
  </section>

  <!-- About Section -->
  <section class="w-full flex flex-col md:flex-row items-stretch justify-center gap-12 px-8 py-16 mt-8">
    <!-- Video Column -->
    <div class="w-full md:w-1/2 flex justify-center items-stretch">
      <div class="relative w-[700px] h-[400px] rounded-3xl overflow-hidden shadow-lg flex-shrink-0">
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
    <div class="w-full md:w-1/2 flex flex-col items-center justify-center text-center h-full">
      <h2 class="text-4xl md:text-5xl font-extrabold text-red-600 mb-6">Joshua's Meat Products, Inc.</h2>
      <p class="text-lg md:text-xl text-gray-700 mb-8 max-w-3xl">Founded in 1993 in Nagcarlan, Laguna, with just PHP 2,000 and a homemade longganisa recipe, JMPI has grown into a trusted name in processed meats. Now offering over 30 products and producing up to 10 tons daily, JMPI is NMIS-certified (Double A) and serves regions including Laguna, Metro Manila, Bicol, and Northern Luzon. With 350+ employees and a strong commitment to quality and community, JMPI continues to uphold food safety and support local livelihoods.</p>
      <button class="px-8 py-3 bg-red-600 text-white rounded-full font-bold text-lg shadow hover:bg-red-700 transition">READ MORE</button>
    </div>
  </section>

  <!-- JMPi Service Strengths Section -->
  <section class="w-full bg-gray-50 py-20 px-20">
    <div class="mx-auto">
      <h2 class="text-4xl font-extrabold text-red-600 text-center mb-4">JMPi Service Strengths</h2>
      <p class="text-lg text-gray-700 text-center mb-16">We're committed to providing top-notch service every step of the way.</p>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
        <?php foreach ($service_strengths as $strength): ?>
          <div class="flex flex-col items-center text-center px-4">
            <?php if ($strength['icon'] === 'truck'): ?>
              <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 17V7a2 2 0 012-2h11a2 2 0 012 2v10M16 17h2a2 2 0 002-2v-3a2 2 0 00-2-2h-2m-6 5a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            <?php elseif ($strength['icon'] === 'clock'): ?>
              <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/></svg>
            <?php elseif ($strength['icon'] === 'credit-card'): ?>
              <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M2 10h20"/></svg>
            <?php elseif ($strength['icon'] === 'percent'): ?>
              <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="19" y1="5" x2="5" y2="19"/><circle cx="6.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/></svg>
            <?php endif; ?>
            <h3 class="font-bold text-xl mb-2"><?= htmlspecialchars($strength['title']) ?></h3>
            <p class="text-gray-700 text-base"><?= htmlspecialchars($strength['description']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="w-full">
    <div class="bg-orange-500 w-full py-16 px-20 flex flex-col md:flex-row justify-between items-center md:items-start gap-8">
      <!-- Left Column -->
      <div class="flex-1 flex flex-col items-start text-white max-w-xs">
        <span class="font-extrabold text-lg mb-1 text-xl">BE A DEALER!</span>
        <span class="text-xl">Interested in becoming a dealer?<br>Fill out our form now!</span>
      </div>
      <!-- Center Column -->
      <div class="flex-1 flex flex-col items-center text-center">
        <img src="/images/jmpilogo.png" alt="Joshua's Meat Products, Inc." class="h-24 mb-2">
        <div class="font-bold text-white mb-1">
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
        <div class="text-white text-sm">Brgy. Banago, Nagcarlan, Laguna, Philippines 4002</div>
      </div>
      <!-- Right Column -->
      <div class="flex-1 flex flex-col items-end text-white text-xl max-w-xs text-right">
        <span>Access our product promotion materials by clicking 'Download' to ge a copy of our brochure.</span>
      </div>
    </div>
    <div class="bg-gray-50 w-full py-8 text-center text-gray-400 text-sm">
      Copyright 2023. All Rights Reserved
    </div>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/js/index.js"></script>
</body>
</html> 