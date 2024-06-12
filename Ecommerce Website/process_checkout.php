<?php
session_start();
require_once("./includes/Database.php");

if (!isset($_SESSION['User'])) {
    header("Location: Login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $email = $_SESSION['User'];

    // Fetch user ID based on email
    $db->query("SELECT user_id FROM users WHERE email = :email");
    $db->bind(':email', $email);
    $user = $db->single();
    $user_id = $user['user_id'];

    $address = $_POST['address'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $payment_method = $_POST['payment_method'];

    // Here, you can add code to process the payment using the selected payment method
    // For this example, we will assume the payment is successful

    // Clear the cart
    $db->query("DELETE FROM cart WHERE user_id = :user_id");
    $db->bind(':user_id', $user_id);
    if ($db->execute()) {
        // Redirect to a thank you page or confirmation page
        header("Location: thank_you.php");
        exit;
    } else {
        echo "Failed to clear the cart. Please try again.";
    }
}
