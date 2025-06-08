<?php
$nav = json_decode(file_get_contents(__DIR__ . '/data/nav.json'), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JMPI About</title>
  <link href="/output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-['Poppins']">
  <!-- Header / Navigation Bar -->
  <header class="w-full bg-white shadow flex items-center justify-between px-4 md:px-8 lg:px-16 xl:px-24 py-4 shadow-lg relative fixed top-0 left-0 z-50">
    <img src="/images/jmpi-logo.webp" alt="Joshua's Meat Products, Inc." class="h-16">
    <nav class="hidden lg:flex gap-x-24 font-bold text-lg absolute left-1/2 -translate-x-1/2">
      <?php foreach ($nav as $item): ?>
        <?php if ($item['name'] === 'ABOUT JMPI'): ?>
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

  <!-- About Banner Section -->
  <section class="w-full flex justify-center items-center pb-8 bg-white">
    <img src="/images/Banner_1.webp" alt="Joshua's Meat Products Banner" class="max-w-full h-auto shadow-lg" />
  </section>

  <!-- Our Legacy Section -->
  <section class="w-full flex justify-center items-center bg-white pb-8 px-4 md:px-8 lg:px-16 xl:px-24">
    <div class="bg-white  w-full mx-4 md:mx-auto mt-4 text-center border-b-2 border-gray-200">
      <h2 class="text-2xl md:text-2xl font-extrabold mb-4 inline-block pb-2">OUR LEGACY OF EXCELLENCE</h2>
      <p class="text-gray-700 text-base md:text-lg leading-relaxed mt-4 pb-12 text-justify">
        JMPI prides itself on its double A rating from the National Meat Inspection Services (NMIS) since May 2006, a testament to our commitment to superior standards and fresh ingredients sourced from reputable suppliers. Starting locally in Nagcarlan, Laguna, we've expanded our reach across Quezon, Batangas, Cavite, Bicol Region, and even ventured into international markets. JMPI prides itself on its double A rating from the National Meat Inspection Services (NMIS) since May 2006, a testament to our commitment to superior standards and fresh ingredients sourced from reputable suppliers. Starting locally in Nagcarlan, Laguna, we've expanded our reach across Quezon, Batangas, Cavite, Bicol Region, and even ventured into international markets.
      </p>
    </div>
  </section>

  <!-- The Journey Section -->
  <section class="w-full flex justify-center items-center bg-white py-8 md:py-12 px-4 md:px-8 lg:px-16 xl:px-24">
    <div class="flex flex-col md:flex-row items-center justify-between w-full mx-4 md:mx-auto pb-12 gap-8 border-b-2 border-gray-200">
      <div class="flex-1 text-left">
        <h2 class="text-xl md:text-2xl font-extrabold mb-2">THE JOURNEY OF RESILIENCE AND TRANSFORMATION</h2>
        <p class="text-gray-700 text-base md:text-lg leading-relaxed">
          Manny Valencia, our founder, embarked on a journey from humble beginnings. Starting as a candy delivery boy to support his family, fate led him to discover a recipe for skinless longganisa, igniting the spark for our venture. With determination and unwavering faith, Manny and Virginia Valencia established JMPI in 1993 with a meager investment, creating a legacy that stands tall today.
        </p>
      </div>
      <div class="flex-1 flex justify-center">
        <img src="/images/pork_longganisa.webp" alt="JMPI Founders" class="w-full max-w-md rounded-lg object-cover" />
      </div>
    </div>
  </section>

  <!-- Vision, Success, and Quality Section -->
  <section class="w-full flex justify-center items-center bg-white py-8 md:py-12 px-4 md:px-8 lg:px-16 xl:px-24">
    <div class="w-full mx-4 md:mx-auto border-b-2 border-gray-200 pb-12">
      <div class="mb-8">
        <h3 class="font-extrabold text-base md:text-lg mb-1">DRIVEN BY VISION</h3>
        <p class="text-gray-700 text-base md:text-lg">From a small-scale endeavor to becoming a household name, JMPI's success story resonates through our commitment to quality, innovation, and customer satisfaction. Over 25 years later, our dedication to providing exceptional meat products remains unwavering. Our aspiration is clear – to be the prime local and global producer of processed meat products.</p>
      </div>
      <div class="mb-8">
        <h3 class="font-extrabold text-base md:text-lg mb-1">THE SPIRIT OF SUCCESS</h3>
        <p class="text-gray-700 text-base md:text-lg">With a workforce exceeding 300 employees, JMPI continues to expand, catering to various regions and international markets. Despite our growth, our ethos remains grounded in supporting local sellers and prioritizing consumer well-being. Our hands-on approach ensures strict adherence to food safety and sanitation guidelines.</p>
      </div>
      <div>
        <h3 class="font-extrabold text-base md:text-lg mb-1">CHOOSE JOSHUA'S – CHOOSE QUALITY</h3>
        <p class="text-gray-700 text-base md:text-lg">For those seeking unparalleled quality and delectable meat products, Joshua's Meat Products Inc. stands as your ultimate choice. Join us in experiencing the essence of excellence with every bite.</p>
      </div>
    </div>
  </section>

  <!-- Vision and Mission Section -->
  <section class="w-full flex justify-center items-center bg-white py-8 md:py-12 px-4 md:px-8 lg:px-16 xl:px-24">
    <div class="w-full max-w-7xl flex flex-col md:flex-row gap-8 md:gap-12">
      <div class="flex-1 bg-gradient-to-br from-red-500 to-red-700 rounded-xl p-12 flex flex-col items-center justify-center text-center shadow">
        <h3 class="text-white font-extrabold text-lg md:text-xl mb-4">VISION</h3>
        <p class="text-white text-base md:text-lg">PRIME LOCAL AND GLOBAL PRODUCER OF PROCESSED MEAT PRODUCTS</p>
      </div>
      <div class="flex-1 bg-gradient-to-br from-red-500 to-red-700 rounded-xl p-12 flex flex-col items-center justify-center text-center shadow">
        <h3 class="text-white font-extrabold text-lg md:text-xl mb-4">MISSION</h3>
        <p class="text-white text-base md:text-lg">JOSHUAS MEAT PRODUCTS INCORPORATED (JMPI) is a meat processing plant producing locally and globally competitive quality processed and comminuted meat products seeking to provide job opportunities among</p>
      </div>
    </div>
  </section>

  <!-- Accreditation Section -->
  <section class="w-full flex flex-col items-center justify-center bg-white py-8 md:py-12 px-4 md:px-8 lg:px-16 xl:px-24">
    <div class="w-full mx-auto flex flex-col items-center">
      <h3 class="text-lg md:text-xl font-semibold mb-6 text-center">ACCREDITATION</h3>
      <div class="flex flex-col md:flex-row items-center justify-center gap-6 mb-4">
        <div class="flex flex-col items-center">
          <img src="/images/fries.webp" alt="FDA" class="h-10 md:h-12 mb-1" />
          <span class="text-gray-800 text-sm md:text-base font-semibold">LTO-3000001646583</span>
        </div>
        <div class="flex flex-row items-center gap-4">
          <img src="/images/chicken_bologna.webp" alt="Accreditation 1" class="h-10 md:h-12" />
          <img src="/images/pork_longganisa.webp" alt="Accreditation 2" class="h-10 md:h-12" />
        </div>
      </div>
      <div class="flex items-center w-full my-6">
        <hr class="flex-grow border-gray-200">
        <span class="mx-4 font-bold tracking-wide text-gray-700 whitespace-nowrap">SINCE 1993</span>
        <hr class="flex-grow border-gray-200">
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