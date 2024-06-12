<?php
session_start();
require_once("./includes/Database.php");

if (!isset($_SESSION['User'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

$db = new Database();
$email = $_SESSION['User'];

// Fetch user ID based on email
$db->query("SELECT user_id FROM users WHERE email = :email");
$db->bind(':email', $email);
$user = $db->single();
$user_id = $user['user_id'];

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Update cart item quantity
$sql = "UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id";
$db->query($sql);
$db->bind(':quantity', $quantity);
$db->bind(':user_id', $user_id);
$db->bind(':product_id', $product_id);

if ($db->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Failed to update cart item']);
}
