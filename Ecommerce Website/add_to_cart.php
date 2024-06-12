<?php
session_start();
require_once __DIR__ . '/includes/Database.php';

if (!isset($_SESSION['User'])) {
    echo "Please log in to add items to the cart.";
    exit;
}

$user_email = $_SESSION['User'];
$product_id = $_POST['product_id'];
$quantity = 1; // Default quantity

$db = new Database();

// Fetch the user ID based on email
$db->query("SELECT user_id FROM users WHERE email = :email");
$db->bind(':email', $user_email);
$user = $db->single();

if (!$user) {
    echo "User not found. Email: " . htmlspecialchars($user_email);
    exit;
}

$user_id = $user['user_id'];

// Check if the product is already in the cart
$db->query("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id");
$db->bind(':user_id', $user_id);
$db->bind(':product_id', $product_id);
$cartItem = $db->single();

if ($cartItem) {
    // Product already in cart, update the quantity
    $newQuantity = $cartItem['quantity'] + $quantity;
    $db->query("UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id");
    $db->bind(':quantity', $newQuantity);
    $db->bind(':user_id', $user_id);
    $db->bind(':product_id', $product_id);
    if ($db->execute()) {
        echo "Product quantity updated successfully.";
    } else {
        $errorInfo = $db->stmt->errorInfo();
        echo "Failed to update product quantity. Error: " . htmlspecialchars($errorInfo[2]);
    }
} else {
    // Product not in cart, add as new item
    $db->query("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
    $db->bind(':user_id', $user_id);
    $db->bind(':product_id', $product_id);
    $db->bind(':quantity', $quantity);
    if ($db->execute()) {
        echo "Product added to cart successfully.";
    } else {
        $errorInfo = $db->stmt->errorInfo();
        echo "Failed to add product to cart. Error: " . htmlspecialchars($errorInfo[2]);
    }
}
