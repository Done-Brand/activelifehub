<?php
require_once("../includes/Database.php");

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = "true";

    // Accessing images
    $product_image = $_FILES['product_image']['name'];

    // Accessing image tmp name
    $temp_image = $_FILES['product_image']['tmp_name'];

    // Checking empty condition
    if (empty($product_title) || empty($product_description) || empty($product_keywords) || empty($product_category) || empty($product_brands) || empty($product_price) || empty($product_image)) {
        echo "<script>alert('Please fill in all fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image, "./product_images/$product_image");

        // Create an instance of the Database class
        $db = new Database();

        // Insert query
        $insert_products = "INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id, product_image, product_price, date, status) 
        VALUES (:product_title, :product_description, :product_keywords, :product_category, :product_brands, :product_image, :product_price, NOW(), :product_status)";

        $db->query($insert_products);
        $db->bind(':product_title', $product_title);
        $db->bind(':product_description', $product_description);
        $db->bind(':product_keywords', $product_keywords);
        $db->bind(':product_category', $product_category);
        $db->bind(':product_brands', $product_brands);
        $db->bind(':product_image', $product_image);
        $db->bind(':product_price', $product_price);
        $db->bind(':product_status', $product_status);

        if ($db->execute()) {
            echo "<script>alert('Successfully inserted the product')</script>";
        } else {
            echo "<script>alert('Failed to insert the product: " . $db->stmt->errorInfo()[2] . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <button onclick="history.back()" class="btn btn-secondary mb-3">Back</button>
        <h1 class="text-center">Insert Products</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!-- Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!-- Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                    $db = new Database();
                    $select_query = "SELECT * FROM categories";
                    $db->query($select_query);
                    $result_query = $db->resultSet();
                    foreach ($result_query as $row) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select Brand</option>
                    <?php
                    $select_query = "SELECT * FROM brands";
                    $db->query($select_query);
                    $result_query = $db->resultSet();
                    foreach ($result_query as $row) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control" required="required">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Price R:</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
</body>

</html>