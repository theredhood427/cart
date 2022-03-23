<?php
require('app/Customer.php');
require('app/Product.php');
require('app/ShoppingCart.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('John Doe', 'john@mail.com');

$shoppingCart = new ShoppingCart($customer);
$shoppingCartItems = $shoppingCart->getAllItems();
?>
<html>
<head>
    <title>My Cart</title>
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
<h1>Shopping Cart</h1>
<h4>
    <a href="products-list.php">Shop More Products</a>
</h4>
</div>
</div>

<?php if (count($shoppingCartItems) > 0): ?>

    <table>
    <thead>
        <th>Product</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Subtotal</th>
    </thead>
    <tbody>

    <?php foreach ($shoppingCartItems as $item): ?>

        <tr>
            <td><?php echo $item['product']->getName(); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['subtotal']; ?></td>
        </tr>

    <?php endforeach; ?>

        <tr>
            <td colspan="4">
                <?php echo $shoppingCart->getItemsTotal(); ?>
            </td>
        </tr>

    </tbody>
    </table>

    <?php endif; ?>

</body>
</html>