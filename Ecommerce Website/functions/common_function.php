<?php
require_once("./includes/Database.php");

function fetch_products($db) {
    $sql = "SELECT * FROM products";
    $db->query($sql);
    return $db->resultSet();
}

function fetch_brands($db) {
    $db->query("SELECT * FROM brands");
    return $db->resultSet();
}

function fetch_categories($db) {
    $db->query("SELECT * FROM categories");
    return $db->resultSet();
}

function fetch_products_by_brand($db, $brand_id) {
    $sql = "SELECT * FROM products WHERE brand_id = :brand_id";
    $db->query($sql);
    $db->bind(':brand_id', $brand_id);
    return $db->resultSet();
}

function fetch_products_by_category($db, $category_id) {
    $sql = "SELECT * FROM products WHERE category_id = :category_id";
    $db->query($sql);
    $db->bind(':category_id', $category_id);
    return $db->resultSet();
}


function search_products($db, $search_query) {
    $sql = "SELECT * FROM products WHERE product_title LIKE :search_query";
    $db->query($sql);
    $db->bind(':search_query', '%' . $search_query . '%');
    return $db->resultSet();
}

?>
