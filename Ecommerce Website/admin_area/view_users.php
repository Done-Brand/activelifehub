<?php
require_once("../includes/Database.php");

// Create an instance of the Database class
$conn = new Database();

// Fetch all users from the database
$sql = "SELECT * FROM users";
$conn->query($sql);
$users = $conn->resultset();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <button onclick="history.back()" class="btn btn-secondary mb-3">Back</button>
        <h2 class="text-center">Users List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Email</th>
                    <th>Date Registered</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <!-- <td><?php echo $user['id']; ?></td> -->
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['date_registered']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>