<?php
session_start();
require_once __DIR__ . '/includes/Database.php';

if (!isset($_SESSION['User'])) {
    echo json_encode(["error" => "Please log in to view the cart."]);
    exit;
}

$user_email = $_SESSION['User'];

$db = new Database();

// Fetch the user ID based on email
$db->query("SELECT user_id FROM users WHERE email = :email");
$db->bind(':email', $user_email);
$user = $db->single();

if (!$user) {
    echo json_encode(["error" => "User not found."]);
    exit;
}

$user_id = $user['user_id'];

// Fetch cart items for the user
$db->query("SELECT cart.product_id, cart.quantity, products.product_title, products.product_image, products.product_price
            FROM cart
            JOIN products ON cart.product_id = products.product_id
            WHERE cart.user_id = :user_id");
$db->bind(':user_id', $user_id);
$cartItems = $db->resultset();

echo json_encode($cartItems);
