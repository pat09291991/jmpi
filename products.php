<?php
$products = json_decode(file_get_contents(__DIR__ . '/data/products.json'), true);
$nav = json_decode(file_get_contents(__DIR__ . '/data/nav.json'), true);
$categories = ['BestSeller', 'Pork', 'Beef', 'Chicken', 'All'];
$selected_category = $_GET['category'] ?? 'BestSeller';
define('ACTIVE_PAGE', 'PRODUCTS');

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="font-['Poppins']">
  <?php include 'header.php'; ?>
  
  <section class="w-full flex flex-col items-center justify-center py-8 md:py-12 lg:py-16 bg-gray-100">
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
    <div class="mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 px-8 lg:px-24 xl:px-36 text-center mb-24">
      <?php foreach ($filtered_products as $product): ?>
        <?php $randDelay = rand(0, 6) * 100; ?>
        <div class="bg-white rounded-2xl shadow flex flex-col overflow-hidden transition-all duration-300" data-aos="zoom-in" data-aos-delay="<?= $randDelay ?>">
          <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>"
            class="w-full h-48 object-cover rounded-t-2xl">
          <div class="flex flex-col flex-1 p-6 text-left">
            <div class="text-lg md:text-xl font-bold mb-1"><?= htmlspecialchars($product['name']) ?></div>
            <div class="text-gray-700 text-base md:text-lg mb-4 line-clamp-2 xl:line-clamp-3"><?= htmlspecialchars($product['description']) ?></div>
            <div class="flex items-center gap-2 mb-2">
              <img src="/images/weigh.svg" alt="Weight" class="w-6 md:w-7 h-6 md:w-7 inline">
              <span class="text-base md:text-lg"><?= htmlspecialchars($product['weight']) ?></span>
            </div>
            <div class="flex items-center gap-2 mb-4">
              <img src="/images/ruler.svg" alt="Dimension" class="w-6 md:w-7 h-6 md:w-7 inline">
              <span class="text-base md:text-lg"><?= htmlspecialchars($product['dimension']) ?></span>
            </div>
            <div class="flex justify-end mt-auto">
              <button class="px-6 py-2 bg-red-500 text-white rounded-full font-bold text-sm hover:bg-red-600 transition"
                onclick="openProductModal(<?= htmlspecialchars($product['id']) ?>)">
                VIEW
              </button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <?php include 'footer.php'; ?>

  <div id="product-modal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl shadow-lg w-full lg:max-w-4xl p-0 relative flex flex-col md:flex-row overflow-hidden max-h-[90vh]">
      <!-- Left: Product Image -->
      <div class="w-full md:w-1/2 flex items-center justify-center p-4 md:p-8">
        <img id="modal-image" src="" alt="Product Image" class="w-full h-48 md:h-80 object-cover" />
      </div>
      <!-- Right: Product Details -->
      <div class="w-full md:w-1/2 flex flex-col p-4 md:p-8 overflow-y-auto">
        <div class="flex items-center gap-3 mb-2">
          <span class="text-xl md:text-2xl font-extrabold text-red-600" id="modal-name"></span>
        </div>
        <hr class="my-2 border-red-500">
        <!-- Description -->
        <div class="mb-4">
          <div class="flex items-center gap-2 mb-1">
            <span class="font-semibold text-base md:text-lg text-gray-800">Description</span>
          </div>
          <p id="modal-description" class="text-gray-700 text-sm md:text-base"></p>
        </div>
        <hr class="my-2 border-red-500">
        <!-- Details -->
        <div>
          <div class="flex items-center gap-2 mb-2">
            <span class="font-semibold text-base md:text-lg text-gray-800">Details</span>
          </div>
          <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                  <img src="/images/weigh.svg" alt="Weight" class="w-6 md:w-7 h-6 md:h-7 mb-1">
                  <span class="text-base md:text-lg text-gray-700 font-semibold">Weight:</span>
                  <span id="modal-weight" class="font-bold text-base md:text-lg text-gray-800"></span>
                </div>
                <div class="flex items-center gap-2">
                  <img src="/images/ruler.svg" alt="Dimension" class="w-6 md:w-7 h-6 md:h-7 mb-1">
                  <span class="text-base md:text-lg text-gray-700 font-semibold">Dimension:</span>
                  <span id="modal-dimension" class="font-bold text-base md:text-lg text-gray-800"></span>
                </div>
              </div>
        </div>
      </div>
      <button id="close-modal" class="modal-close absolute top-2 right-2 text-2xl text-gray-400 hover:text-red-600">&times;</button>
    </div>
  </div>
  <script>
    const products = <?php echo json_encode(array_values($filtered_products)); ?>;
    function openProductModal(id) {
      const modal = document.getElementById('product-modal');
      const modalImage = document.getElementById('modal-image');
      const modalName = document.getElementById('modal-name');
      const modalDescription = document.getElementById('modal-description');
      const modalDimension = document.getElementById('modal-dimension');
      const modalWeight = document.getElementById('modal-weight');
      const product = products.find(p => p.id == id);
      if (product) {
        modalImage.src = product.image;
        modalName.textContent = product.name;
        modalDescription.textContent = product.description;
        modalDimension.textContent = product.dimension;
        modalWeight.textContent = product.weight;
        modal.classList.remove('hidden');
      }
    }
    document.addEventListener('DOMContentLoaded', function() {
      const modal = document.getElementById('product-modal');
      const closeModal = document.getElementById('close-modal');
      closeModal.addEventListener('click', function() {
        modal.classList.add('hidden');
      });
      modal.addEventListener('click', function(e) {
        if (e.target === modal) modal.classList.add('hidden');
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>AOS.init({ once: false, duration: 800 }); window.addEventListener('load', () => { setTimeout(() => { AOS.refresh(); }, 500); });</script>
</body>
</html> 