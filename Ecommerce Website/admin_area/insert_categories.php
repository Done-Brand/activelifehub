<?php
require_once("../includes/Database.php");

if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    // Create an instance of the Database class
    $db = new Database();

    // Check if the category already exists
    $check_query = "SELECT * FROM categories WHERE category_title = :category_title";
    $db->query($check_query);
    $db->bind(':category_title', $category_title);
    $db->execute();

    if ($db->rowCount() > 0) {
        echo "<script>alert('Category already exists');</script>";
    } else {
        // Insert new category
        $insert_query = "INSERT INTO categories (category_title) VALUES (:category_title)";
        $db->query($insert_query);
        $db->bind(':category_title', $category_title);

        if ($db->execute()) {
            echo "<script>alert('Category has been inserted successfully');</script>";
        } else {
            echo "<script>alert('Error inserting category: " . $db->stmt->errorInfo()[2] . "');</script>";
        }
    }
}
?>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info b-0 p-2 my-3" name="insert_cat" value="Insert Categories">
    </div>
</form>