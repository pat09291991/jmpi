<?php if (!isset($nav)) $nav = json_decode(file_get_contents(__DIR__ . '/data/nav.json'), true); ?>

<!-- Header / Navigation Bar -->
<header class="w-full bg-white shadow flex items-center justify-between px-4 md:px-8 lg:px-16 xl:px-24 py-4 shadow-lg relative fixed top-0 left-0 z-50">
  <img src="/images/jmpi-logo.webp" alt="Joshua's Meat Products, Inc." class="h-10 md:h-12 lg:h-16">
  <nav class="hidden xl:flex gap-x-24 font-bold text-lg absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
    <?php foreach ($nav as $item): ?>
      <?php if (defined('ACTIVE_PAGE') && $item['name'] === ACTIVE_PAGE): ?>
        <a href="<?= htmlspecialchars($item['link']) ?>" class="text-red-600"><?= htmlspecialchars($item['name']) ?></a>
      <?php else: ?>
        <a href="<?= htmlspecialchars($item['link']) ?>"><?= htmlspecialchars($item['name']) ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
  </nav>
  <div class="hidden xl:flex items-center space-x-4">
    <div class="relative flex items-center group" id="search-group">
      <div class="flex items-center gap-x-1">
        <div class="relative">
          <span class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-800 pointer-events-none z-20 flex items-center gap-x-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/>
            </svg>
            <span id="search-label" class="font-bold transition-colors duration-300 w-[60px]">SEARCH</span>
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
    <a href="/dealer.php" class="px-4 py-2 border-2 border-red-600 text-red-600 rounded-full font-bold text-sm hover:bg-red-600 hover:text-white transition">BE A DEALER</a>
  </div>
  <!-- Burger menu for mobile and tablet -->
  <button id="burger-menu" class="block xl:hidden focus:outline-none ml-auto">
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
    <a href="/dealer.php" class="mt-4 px-4 py-2 border-2 border-red-600 text-red-600 rounded-full font-bold text-center hover:bg-red-600 hover:text-white transition text-xs md:text-sm lg:text-base">BE A DEALER</a>
  </nav>
</aside> 