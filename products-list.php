<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('Jason Todd', 'jasontodd@gmail.com');
?>
<html>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<head>
    <title>My Cart</title>
</head>
<body style="background-image: url('wallpaper.jpg');">

<nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a href="products-list.php" class="navbar-brand"><img src="logo.png" alt="" width="100" height="80" class="img-fluid"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><h3>HERE WE GROCERY</h3></a>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="products-list.php" class="nav-link"><h4>Home</h4></a>
                    </li>
                    <li class="nav-item">
                        <a href="shopping-cart.php" class="nav-link"><h4>Shopping Cart</h4></a></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
    <div class="card-body text-center">
<h1>Welcome <?php echo $customer->getName() ?>!</h1>
</div>
</div>
<br>

<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
    <div class="card-body text-center">
<h3>Products</h3>
</div>
</div>

<?php foreach ($products as $product): ?>

<form action="add-to-cart.php" method="POST" p class="text-light">
    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
    <h3><?php echo $product->getName(); ?></h3>
    <img src="<?php echo $product->getImage(); ?>" height="100px" />
    <p>
        <?php echo $product->getDescription(); ?><br/>
        <span style="color: red">PHP <?php echo $product->getPrice(); ?></span>
        <span style="color: white">Qty</span> <input type="number" name="quantity" class="quantity" value="0" />
        <button type="submit" class="btn btn-primary">
            ADD TO CART
        </button>
    </p>
</form>

<?php endforeach; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>
</html>