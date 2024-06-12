<?php
require_once("../includes/Database.php");

// Create an instance of the Database class
$conn = new Database();

// Fetch all products from the database
$sql = "SELECT * FROM products";
$conn->query($sql);
$products = $conn->resultset();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <button onclick="history.back()" class="btn btn-info mb-3">Back</button>
        <h2 class="text-center">Products List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- <th>Product</th> -->
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <!-- <td><img src="<?php echo $product['product_image']; ?>" alt="Product Image" style="width: 100px; height: auto;"></td> -->
                        <td><?php echo $product['product_title']; ?></td>
                        <td><?php echo $product['product_description']; ?></td>
                        <td>R<?php echo $product['product_price']; ?></td>
                        <td><?php echo $product['brand_id']; ?></td>
                        <td><?php echo $product['category_id']; ?></td>
                        <td>∞</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>