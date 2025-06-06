<?php
header('Content-Type: application/json');
$query = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';
$products = json_decode(file_get_contents(__DIR__ . '/data/products.json'), true);

if ($query === '') {
    echo json_encode([]);
    exit;
}

$results = array_filter($products, function($product) use ($query) {
    return strpos(strtolower($product['name']), $query) !== false ||
           strpos(strtolower($product['description']), $query) !== false;
});

echo json_encode(array_values($results)); 