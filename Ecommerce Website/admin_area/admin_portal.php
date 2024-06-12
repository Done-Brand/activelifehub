<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="./images/Logo.png">
    <title>ALH Admin Dashboard</title>
    <!-- bootsrap CSS link -->
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />




    <!-- CSS file-->
    <link rel="stylesheet" href="../style.css">

    <style>
        /* .admin_image {
  width: 100px;
  height: 100px;
  object-fit: contain;
} */
    </style>
</head>

<body>
    <!-- nav bar -->
    <div class="container-fluid p-0">
        <!-- First chile -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="conatainer-fluid">
                <img src="../images/Logo.png" alt="" width="50%" height="50%">
                <!-- <nav class="navbar navbar-expand-lg"> -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome admin</a>
                    </li>
                </ul>
                <!-- </nav> -->
            </div>
        </nav>


        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage details</h3>
        </div>

        <!-- Third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5 py-3">
                    <a href="#"><img src="..\images\Logo.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_product.php" class="nav-link text-light bg-info m-1">Insert Products</a></button>
                    <button><a href="view_products.php" class="nav-link text-light bg-info m-1">View Products</a></button>
                    <button><a href="admin_portal.php?insert_category" class="nav-link text-light bg-info m-1">Insert Categories</a></button>
                    <button><a href="view_categories.php" class="nav-link text-light bg-info m-1">View Categories</a></button>
                    <button><a href="admin_portal.php?insert_brands" class="nav-link text-light bg-info m-1">Insert Brands</a></button>
                    <button><a href="view_brands.php" class="nav-link text-light bg-info m-1">View Brands</a></button>
                    <button><a href="view_orders.php" class="nav-link text-light bg-info m-1">All Orders</a></button>
                    <button><a href="view_payments.php" class="nav-link text-light bg-info m-1">All Payments</a></button>
                    <button><a href="view_users.php" class="nav-link text-light bg-info m-1">List Users</a></button>
                    <button><a href="../Logout.php" class="nav-link text-light bg-info m-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- Fourth child -->

        <div class="container my-5">
            <?php
            if (array_key_exists('insert_category', $_GET)) {
                include('insert_categories.php');
            }
            if (array_key_exists('insert_brands', $_GET)) {
                include('insert_brands.php');
            }
            ?>
        </div>




        <!-- Last child -->
        <div class="bg-info text-center p-3">
            <p>All rights reserved...</p>
        </div>
    </div>



    <!-- bootsrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>