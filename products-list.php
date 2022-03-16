<?php
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');
$products = Product::convertArrayToProducts($products_data);
