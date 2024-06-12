<?php
session_start();
require_once __DIR__ . '/includes/Database.php';

if (!isset($_SESSION['User'])) {
    echo json_encode(["error" => "Please log in to remove items from the cart."]);
    exit;
}

$user_email = $_SESSION['User'];
$product_id = $_POST['product_id'];

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

// Remove the product from the cart
$db->query("DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id");
$db->bind(':user_id', $user_id);
$db->bind(':product_id', $product_id);

try {
    if ($db->execute()) {
        echo json_encode(["success" => "Product removed from cart successfully."]);
    } else {
        echo json_encode(["error" => "Failed to remove product from cart."]);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => "PDOException: " . $e->getMessage()]);
}
