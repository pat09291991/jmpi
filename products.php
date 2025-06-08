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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
    <div class="mx-auto grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8 px-8 md:px-24 text-center mb-24 rounded-t-2xl">
      <?php foreach ($filtered_products as $product): ?>
        <div class="bg-white shadow flex flex-col overflow-hidden">
          <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>"
            class="w-full h-48 object-contain  group-hover:scale-105 transition-all duration-300">
          <div class="flex flex-col flex-1 p-6 items-center text-center py-12">
            <div class="text-lg md:text-xl mb-2"><?= htmlspecialchars($product['name']) ?></div>
            <button class="mt-auto px-6 py-2 bg-black text-white rounded-full font-bold text-xs md:text-sm lg:text-base hover:bg-red-600 hover:text-white" onclick="openProductModal(<?= htmlspecialchars($product['id']) ?>)">VIEW</button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <?php include 'footer.php'; ?>

  <div class="modal-overlay hidden" id="product-modal">
    <div class="modal-card">
      <div class="modal-img-col">
        <img id="modal-image" src="" alt="Product Image" class="modal-img" />
      </div>
      <div class="modal-content-col">
        <h2 id="modal-name"></h2>
        <p id="modal-description"></p>
        <div class="modal-details">
          <span id="modal-dimension"></span>
          <span class="divider">|</span>
          <span id="modal-weight" class="weight-block"></span>
        </div>
      </div>
      <button id="close-modal" class="modal-close">&times;</button>
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
        modalName.textContent = product.name.toUpperCase();
        modalDescription.textContent = product.description;
        modalDimension.textContent = `DIMENSIONS: ${product.dimension}`;
        modalWeight.textContent = `WEIGHT: ${product.weight}`;
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
</body>
</html> 