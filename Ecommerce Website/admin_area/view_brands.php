<?php
require_once("../includes/Database.php");

// Create an instance of the Database class
$conn = new Database();

// Fetch all brands from the database
$sql = "SELECT * FROM brands";
$conn->query($sql);
$brands = $conn->resultset();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <button onclick="history.back()" class="btn btn-secondary mb-3">Back</button>
        <h2 class="text-center">Brands List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Name</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($brands as $brand) : ?>
                    <tr>
                        <!-- <td><?php echo $brand['id']; ?></td> -->
                        <td><?php echo $brand['brand_title']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>