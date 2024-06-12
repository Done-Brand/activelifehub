<?php
session_start();

if (!isset($_SESSION['User'])) {
    header("Location: Login.php");
    exit;
}
require_once("./includes/Database.php");

$db = new Database();
$email = $_SESSION['User']; // Retrieve the email from the session

// Fetch user ID based on email
$db->query("SELECT user_id FROM users WHERE email = :email");
$db->bind(':email', $email);
$user = $db->single();
$user_id = $user['user_id'];

// Fetch cart items for the user
$db->query("SELECT cart.product_id, cart.quantity, products.product_title, products.product_image, products.product_price
            FROM cart
            JOIN products ON cart.product_id = products.product_id
            WHERE cart.user_id = :user_id");
$db->bind(':user_id', $user_id);
$cartItems = $db->resultset();

$totalPrice = 0;
foreach ($cartItems as $item) {
    $product_price = str_replace(',', '.', preg_replace("/[^0-9,.]/", "", $item['product_price'])); // Convert to float-compatible format
    $product_price = is_numeric($product_price) ? (float)$product_price : 0;
    $quantity = is_numeric($item['quantity']) ? (int)$item['quantity'] : 0;
    $totalPrice += $product_price * $quantity;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./images/Logo.png">
    <title>Checkout - Active Life Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .cart-item-image {
            max-width: 50px;
            max-height: 50px;
        }

        .cart-item {
            margin-bottom: 1rem;
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 1rem;
        }

        .cart-item h5 {
            font-size: 1.1rem;
        }

        .cart-item p {
            margin: 0;
        }

        .total-price {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Checkout</h2>
        <div class="row">
            <div class="col-md-8">
                <h4>Your Cart</h4>
                <div class="cart-items">
                    <?php if ($cartItems) : ?>
                        <?php foreach ($cartItems as $item) : ?>
                            <div class="row mb-3 cart-item">
                                <div class="col-md-2">
                                    <img src="./images/<?php echo htmlspecialchars($item['product_image']); ?>" alt="<?php echo htmlspecialchars($item['product_title']); ?>" class="img-fluid cart-item-image">
                                </div>
                                <div class="col-md-4">
                                    <h5><?php echo htmlspecialchars($item['product_title']); ?></h5>
                                </div>
                                <div class="col-md-2">
                                    <p>Quantity: <?php echo htmlspecialchars($item['quantity']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p>Price: R<?php echo htmlspecialchars($item['product_price']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p>Total: R<?php echo number_format((float)str_replace(',', '.', preg_replace("/[^0-9,.]/", "", $item['product_price'])) * $item['quantity'], 2); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Your cart is empty.</p>
                    <?php endif; ?>
                </div>
                <h4 class="mt-4 total-price">Total: R<?php echo number_format($totalPrice, 2); ?></h4>
            </div>
            <div class="col-md-4">
                <h4>Shipping Address</h4>
                <form action="process_checkout.php" method="POST">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="mb-3">
                        <label for="postal_code" class="form-label">Postal Code</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                    </div>
                    <h4>Payment Method</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="creditCard" value="credit_card" required>
                        <label class="form-check-label" for="creditCard">Credit Card</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="debitCard" value="debit_card" required>
                        <label class="form-check-label" for="debitCard">Debit Card</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal" required>
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Pay</button>
                    <a href="index.php" class="btn btn-secondary mt-3">Back</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>