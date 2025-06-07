<?php
$products = json_decode(file_get_contents(__DIR__ . '/data/products.json'), true);
$nav = json_decode(file_get_contents(__DIR__ . '/data/nav.json'), true);
$categories = ['BestSeller', 'Pork', 'Beef', 'Chicken', 'All'];
$selected_category = $_GET['category'] ?? 'BestSeller';

// Filter products by category if not 'All'
$filtered_products = ($selected_category === 'All') ? $products : array_filter($products, function($p) use ($selected_category) {
    if (isset($p['category'])) {
        if (is_array($p['category'])) {
            return in_array($selected_category, $p['category']);
        } else {
            return $p['category'] === $selected_category;
        }
    }
    return false;
});


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JMPI Products</title>
  <link href="/output.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-['Poppins']">
  <!-- Header / Navigation Bar -->
  <header class="w-full bg-white shadow flex items-center justify-between px-4 md:px-8 lg:px-16 xl:px-24 py-4 shadow-lg relative fixed top-0 left-0 z-50">
    <img src="/images/jmpi-logo.webp" alt="Joshua's Meat Products, Inc." class="h-16">
    <nav class="hidden lg:flex gap-x-24 font-bold text-lg absolute left-1/2 -translate-x-1/2">
      <?php foreach ($nav as $item): ?>
        <?php if ($item['name'] === 'PRODUCTS'): ?>
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
  
  <section class="w-full flex flex-col items-center justify-center py-8 md:py-12 lg:py-16 mt-16 bg-gray-100">
    <!-- Breadcrumbs -->
    <div class="w-full px-4 md:px-8 lg:px-16 xl:px-24 py-6 flex items-center text-gray-700 text-sm">
      <img src="/images/homesvg.svg" alt="Home" class="w-6 h-6 mr-1">
      <a href="/" class="flex items-center justify-center hover:text-red-600">
        HOME
      </a>
      <span class="mx-2">/</span>
      <span class="font-bold text-red-600">PRODUCTS</span>
    </div>

    <!-- Title -->
    <div class="w-full flex flex-col items-center justify-center mb-6">
      <h1 class="text-2xl md:text-3xl font-extrabold text-gray-800 mb-2">PRODUCTS</h1>
      <!-- Category Filters -->
      <div class="flex gap-2 md:gap-4 items-center justify-center mb-4">
        <?php foreach ($categories as $cat): ?>
          <a href="?category=<?= urlencode($cat) ?>"
            class="px-3 py-1 rounded font-bold text-sm md:text-base transition <?php if ($selected_category === $cat) echo 'bg-red-600 text-white'; else echo 'text-gray-800 hover:bg-red-600 hover:text-white'; ?>">
            <?= $cat === 'BestSeller' ? 'Best Seller' : htmlspecialchars($cat) ?>
          </a>
          <?php if ($cat !== end($categories)) echo '<span class="text-gray-400">|</span>'; ?>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Products List -->
    <?php if (empty($filtered_products)): ?>
        <div class="flex-grow min-h-[70vh] md:min-h-[75vh] flex items-center justify-center w-full text-center text-gray-400 px-4 py-24" style="min-height: 22vh;">No products found in this category.</div>
    <?php endif; ?>
    <div class="mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8 px-8 md:px-24 text-center mb-24">
      <?php foreach ($filtered_products as $product): ?>
        <div class="bg-white shadow flex flex-col overflow-hidden" style="border-radius: 20px;">
          <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-48 object-cover rounded-t-2xl group-hover:scale-105 transition-all duration-300">
          <div class="flex flex-col flex-1 p-6 items-center text-center py-12">
            <div class="text-lg md:text-xl mb-2"><?= htmlspecialchars($product['name']) ?></div>
            <button class="mt-auto px-6 py-2 bg-black text-white rounded-full font-bold text-xs md:text-sm lg:text-base hover:bg-red-600 hover:text-white">VIEW</button>
          </div>
        </div>
      <?php endforeach; ?>
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
</body>
</html> 