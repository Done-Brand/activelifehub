<?php
require_once("../includes/Database.php");

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // Create an instance of the Database class
    $db = new Database();

    // Check if the brand already exists
    $check_query = "SELECT * FROM brands WHERE brand_title = :brand_title";
    $db->query($check_query);
    $db->bind(':brand_title', $brand_title);
    $db->execute();

    if ($db->rowCount() > 0) {
        echo "<script>alert('Brand already exists');</script>";
    } else {
        // Insert new brand
        $insert_query = "INSERT INTO brands (brand_title) VALUES (:brand_title)";
        $db->query($insert_query);
        $db->bind(':brand_title', $brand_title);

        if ($db->execute()) {
            echo "<script>alert('Brand has been inserted successfully');</script>";
        } else {
            echo "<script>alert('Error inserting brand: " . $db->stmt->errorInfo()[2] . "');</script>";
        }
    }
}
?>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info b-0 p-2 my-3" name="insert_brand" value="Insert Brands">
    </div>
</form>