<?php
require_once("../includes/Database.php");

// Create an instance of the Database class
$conn = new Database();

// Dummy data for payments (corresponding to the dummy orders)
$payments = [
    ['payment_id' => 1, 'order_id' => 1, 'user_id' => 101, 'amount' => 199.98, 'payment_date' => '2024-01-16', 'payment_method' => 'Credit Card'],
    ['payment_id' => 2, 'order_id' => 2, 'user_id' => 102, 'amount' => 149.99, 'payment_date' => '2024-02-11', 'payment_method' => 'PayPal'],
    ['payment_id' => 3, 'order_id' => 3, 'user_id' => 103, 'amount' => 299.99, 'payment_date' => '2024-03-06', 'payment_method' => 'Credit Card'],
    ['payment_id' => 4, 'order_id' => 4, 'user_id' => 104, 'amount' => 899.97, 'payment_date' => '2024-04-13', 'payment_method' => 'Debit Card'],
    ['payment_id' => 5, 'order_id' => 5, 'user_id' => 105, 'amount' => 1349.98, 'payment_date' => '2024-05-21', 'payment_method' => 'Credit Card'],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payments</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <button onclick="history.back()" class="btn btn-secondary mb-3">Back</button>
        <h2 class="text-center">Payments List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Payment Method</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment) : ?>
                    <tr>
                        <td><?php echo $payment['payment_id']; ?></td>
                        <td><?php echo $payment['order_id']; ?></td>
                        <td><?php echo $payment['user_id']; ?></td>
                        <td><?php echo 'R' . number_format($payment['amount'], 2); ?></td>
                        <td><?php echo $payment['payment_date']; ?></td>
                        <td><?php echo $payment['payment_method']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>