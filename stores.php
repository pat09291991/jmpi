<?php
$nav = json_decode(file_get_contents(__DIR__ . '/data/nav.json'), true);
$branches = json_decode(file_get_contents(__DIR__ . '/data/stores.json'), true);
define('ACTIVE_PAGE', 'STORES');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JMPI Stores</title>
  <link href="/output.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="font-['Poppins']">
  <?php include 'header.php'; ?>

  <!-- Branches Section -->
  <section class="w-full flex flex-col items-center justify-center bg-gray-50 py-8 md:py-12 px-4 md:px-8 lg:px-16 xl:px-24 pt-16 md:pt-[100px] mt-16">
    <div class="w-full mx-auto">
      <div class="flex items-center justify-center mb-12">
        <svg class="w-7 h-7 mr-2 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
          <circle cx="12" cy="10" r="3" />
        </svg>
        <h2 class="text-2xl md:text-3xl font-extrabold text-[#252525]">BRANCH NEAR YOU</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-10 max-w-7xl mx-auto">
        <?php foreach ($branches as $i => $branch): ?>
          <?php $randDelay = rand(0, 6) * 100; ?>
          <div class="bg-white rounded-xl shadow p-6 flex flex-col h-full max-w-4xl"
               data-aos="zoom-in" data-aos-delay="<?= $randDelay ?>">
            <h3 class="font-extrabold text-base md:text-lg mb-1 text-[#252525]"><?= htmlspecialchars($branch['name']) ?></h3>
            <p class="text-gray-800 text-sm md:text-base mb-0"><?= nl2br(htmlspecialchars($branch['address'])) ?></p>
            <p class="text-gray-800 text-sm md:text-base mb-0"><?= htmlspecialchars($branch['contact_person']) ?></p>
            <p class="text-gray-800 text-sm md:text-base mb-0"><?= htmlspecialchars($branch['contact']) ?></p>
            <p class="text-gray-800 text-sm md:text-base mb-0"><?= htmlspecialchars($branch['days_open']) ?></p>
            <a href="<?= htmlspecialchars($branch['map_link']) ?>" target="_blank" class="text-[#F01B23] font-bold text-xs md:text-sm mt-auto inline-block">View Map</a>
          </div>
        <?php endforeach; ?>
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