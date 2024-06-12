<?php
require_once("../includes/Database.php");

// Create an instance of the Database class
$conn = new Database();

// Dummy data for orders
$orders = [
    ['order_id' => 1, 'user_id' => 101, 'product' => 'Ab Roller Wheel', 'quantity' => 2, 'total_price' => 199.98, 'order_date' => '2024-01-15'],
    ['order_id' => 2, 'user_id' => 102, 'product' => 'Hip Resistance Exercise Band', 'quantity' => 1, 'total_price' => 149.99, 'order_date' => '2024-02-10'],
    ['order_id' => 3, 'user_id' => 103, 'product' => '7 Piece Portable Fitness Set', 'quantity' => 1, 'total_price' => 299.99, 'order_date' => '2024-03-05'],
    ['order_id' => 4, 'user_id' => 104, 'product' => 'Bioteen Sleep', 'quantity' => 3, 'total_price' => 899.97, 'order_date' => '2024-04-12'],
    ['order_id' => 5, 'user_id' => 105, 'product' => 'Bioteen Lean', 'quantity' => 2, 'total_price' => 1349.98, 'order_date' => '2024-05-20'],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <button onclick="history.back()" class="btn btn-secondary mb-3">Back</button>
        <h2 class="text-center">Orders List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['user_id']; ?></td>
                        <td><?php echo $order['product']; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo 'R' . number_format($order['total_price'], 2); ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>