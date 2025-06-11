<?php
$nav = json_decode(file_get_contents(__DIR__ . '/data/nav.json'), true);
define('ACTIVE_PAGE', 'ABOUT JMPI');
$aosAnimations = ['fade-up', 'fade-down', 'zoom-in'];
function randomAos() {
  global $aosAnimations;
  $anim = $aosAnimations[array_rand($aosAnimations)];
  $delay = rand(0, 6) * 100;
  return "data-aos=\"$anim\" data-aos-delay=\"$delay\"";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Joshua's Meat Products, Inc.</title>
  <link href="/output.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="font-['Poppins']">
<?php include 'header.php'; ?>
  <!-- About Banner Section -->
  <section class="w-full flex justify-center items-center pb-8 bg-white pt-16 md:pt-[100px]" <?= randomAos() ?>>
    <div class="relative w-full aspect-[16/8] sm:aspect-[16/5] md:aspect-[16/4] overflow-hidden">
      <img src="/images/Banner_1.webp" alt="Joshua's Meat Products Banner" class="absolute inset-0 w-full h-full object-contain" />
    </div>
  </section>

  <!-- Our Legacy Section -->
  <section class="w-full flex justify-center items-center bg-white pb-8 px-4 md:px-8 lg:px-16 xl:px-24" <?= randomAos() ?>>
    <div class="bg-white  w-full mx-4 md:mx-auto mt-4 text-center border-b-2 border-gray-200">
      <h2 class="text-lg md:text-xl lg:text-2xl font-extrabold inline-block pb-2">OUR LEGACY OF EXCELLENCE</h2>
      <p class="text-gray-700 text-sm md:text-base lg:text-lg leading-relaxed mt-0 md:mt-4 pb-12 text-justify">
        JMPI prides itself on its double A rating from the National Meat Inspection Services (NMIS) since May 2006, a testament to our commitment to superior standards and fresh ingredients sourced from reputable suppliers. Starting locally in Nagcarlan, Laguna, we've expanded our reach across Quezon, Batangas, Cavite, Bicol Region, and even ventured into international markets. JMPI prides itself on its double A rating from the National Meat Inspection Services (NMIS) since May 2006, a testament to our commitment to superior standards and fresh ingredients sourced from reputable suppliers. Starting locally in Nagcarlan, Laguna, we've expanded our reach across Quezon, Batangas, Cavite, Bicol Region, and even ventured into international markets.
      </p>
    </div>
  </section>

  <!-- The Journey Section -->
  <section class="w-full flex justify-center items-center bg-white py-8 md:py-12 px-4 md:px-8 lg:px-16 xl:px-24" <?= randomAos() ?>>
    <div class="flex flex-col md:flex-row items-center justify-between w-full mx-4 md:mx-auto pb-12 gap-8 border-b-2 border-gray-200">
      <div class="flex-1 text-left">
        <h2 class="text-lg md:text-xl lg:text-2xl font-extrabold mb-2">THE JOURNEY OF RESILIENCE AND TRANSFORMATION</h2>
        <p class="text-gray-700 text-sm md:text-base lg:text-lg leading-relaxed mt-0 md:mt-4">
          Manny Valencia, our founder, embarked on a journey from humble beginnings. Starting as a candy delivery boy to support his family, fate led him to discover a recipe for skinless longganisa, igniting the spark for our venture. With determination and unwavering faith, Manny and Virginia Valencia established JMPI in 1993 with a meager investment, creating a legacy that stands tall today.
        </p>
      </div>
      <div class="flex-1 flex justify-center">
        <img src="/images/founder.webp" alt="JMPI Founders" class="w-full max-w-md rounded-lg object-cover" />
      </div>
    </div>
  </section>

  <!-- Vision, Success, and Quality Section -->
  <section class="w-full flex justify-center items-center bg-white py-8 md:py-12 px-4 md:px-8 lg:px-16 xl:px-24" <?= randomAos() ?>>
    <div class="w-full mx-4 md:mx-auto border-b-2 border-gray-200 pb-12">
      <div class="mb-8">
        <h3 class="font-extrabold text-sm md:text-base lg:text-lg mb-1">DRIVEN BY VISION</h3>
        <p class="text-gray-700 text-sm md:text-base lg:text-lg">From a small-scale endeavor to becoming a household name, JMPI's success story resonates through our commitment to quality, innovation, and customer satisfaction. Over 25 years later, our dedication to providing exceptional meat products remains unwavering. Our aspiration is clear – to be the prime local and global producer of processed meat products.</p>
      </div>
      <div class="mb-8">
        <h3 class="font-extrabold text-sm md:text-base lg:text-lg mb-1">THE SPIRIT OF SUCCESS</h3>
        <p class="text-gray-700 text-sm md:text-base lg:text-lg">With a workforce exceeding 300 employees, JMPI continues to expand, catering to various regions and international markets. Despite our growth, our ethos remains grounded in supporting local sellers and prioritizing consumer well-being. Our hands-on approach ensures strict adherence to food safety and sanitation guidelines.</p>
      </div>
      <div>
        <h3 class="font-extrabold text-sm md:text-base lg:text-lg mb-1">CHOOSE JOSHUA'S – CHOOSE QUALITY</h3>
        <p class="text-gray-700 text-sm md:text-base lg:text-lg">For those seeking unparalleled quality and delectable meat products, Joshua's Meat Products Inc. stands as your ultimate choice. Join us in experiencing the essence of excellence with every bite.</p>
      </div>
    </div>
  </section>

  <!-- Vision and Mission Section -->
  <section class="w-full flex justify-center items-center bg-white py-8 md:py-12 px-4 md:px-8 lg:px-16 xl:px-24" <?= randomAos() ?>>
    <div class="w-full max-w-7xl flex flex-col md:flex-row gap-8 md:gap-12">
      <div class="flex-1 bg-gradient-to-br from-red-500 to-red-700 rounded-xl p-12 flex flex-col items-center text-center shadow">
        <h3 class="text-white font-extrabold text-base md:text-lg lg:text-xl mb-4">VISION</h3>
        <p class="text-white text-sm md:text-base lg:text-lg">PRIME LOCAL AND GLOBAL PRODUCER OF PROCESSED MEAT PRODUCTS</p>
      </div>
      <div class="flex-1 bg-gradient-to-br from-red-500 to-red-700 rounded-xl p-12 flex flex-col items-center justify-center text-center shadow">
        <h3 class="text-white font-extrabold text-base md:text-lg lg:text-xl mb-4">MISSION</h3>
        <p class="text-white text-sm md:text-base lg:text-lg">JOSHUAS MEAT PRODUCTS INCORPORATED (JMPI) is a meat processing plant producing locally and globally competitive quality processed and comminuted meat products seeking to provide job opportunities among</p>
      </div>
    </div>
  </section>

  <!-- Accreditation Section -->
  <section class="w-full flex flex-col items-center justify-center bg-white py-8 md:py-12 px-4 md:px-8 lg:px-16 xl:px-24" <?= randomAos() ?>>
    <div class="w-full mx-auto flex flex-col items-center">
      <h3 class="text-lg md:text-xl lg:text-2xl font-semibold mb-6 text-center">ACCREDITATION</h3>
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

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="/js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ once: false, duration: 800 });
  window.addEventListener('load', () => { setTimeout(() => { AOS.refresh(); }, 500); });
</script>
</body>
</html> 