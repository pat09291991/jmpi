<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joshua's Meat Products, Inc.</title>
  <link href="/output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="/style.css">
</head>
<body class="bg-white">
  <!-- Header / Navigation Bar -->
  <header class="w-full bg-white shadow flex items-center justify-between px-8 py-4 shadow-lg relative">
    <img src="/images/logo.png" alt="Joshua's Meat Products, Inc." class="h-12">
    <nav class="hidden md:flex gap-x-24 font-bold text-lg absolute left-1/2 -translate-x-1/2">
      <a href="#" class="hover:text-red-600">HOME</a>
      <a href="#" class="hover:text-red-600">PRODUCTS</a>
      <a href="#" class="hover:text-red-600">ABOUT JMPI</a>
      <a href="#" class="hover:text-red-600">STORES</a>
    </nav>
    <div class="flex items-center space-x-4">
      <div class="relative flex items-center" id="search-group">
        <div class="flex items-center gap-x-1">
          <div class="relative">
            <span class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-800 pointer-events-none z-20">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/>
              </svg>
            </span>
            <input
              id="search-input"
              type="text"
              class="search-anim bg-white hover:bg-gray-100 focus:bg-gray-100 outline-none text-sm pl-8 py-2 transition-all duration-300 w-24"
            />
          </div>
        </div>
        <span class="mx-2 text-gray-400">|</span>
        <a href="#" class="px-4 py-2 border-2 border-red-600 text-red-600 rounded-full font-bold text-sm hover:bg-red-600 hover:text-white transition">BE A DEALER</a>
      </div>
    </div>
  </header>

  <!-- Carousel -->
  <section class="w-full flex flex-col items-center justify-center md:px-8">
    <div class="relative w-full">
      <div class="swiper h-[600px] w-full rounded-3xl shadow-lg">
        <div class="swiper-wrapper h-full">
          <div class="swiper-slide flex items-center justify-center h-full">
            <img src="/images/carousel1.png" alt="Carousel 1" class="h-full w-full object-cover rounded-3xl" />
          </div>
          <div class="swiper-slide flex items-center justify-center h-full">
            <img src="/images/carousel2.jpg" alt="Carousel 2" class="h-full w-full object-cover rounded-3xl" />
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/index.js"></script>
</body>
</html> 