<?php

session_start();

if (!isset($_SESSION['User'])) {
    header("Location: Login.php");
    exit;
}
require_once("./includes/Database.php");

require_once __DIR__ . '/functions/common_function.php';

$db = new Database();
$email = $_SESSION['User']; // Retrieve the email from the session

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./images/Logo.png">
    <title>Active Life Hub</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Material Design Icons link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <!-- Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS file -->
    <link rel="stylesheet" href="style.css">
    <style>
        .card-text.description {
            max-height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .card {
            height: 100%;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title,
        .card-text,
        .btn {
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="row">

        <div class="container-fluid p-0">
            <!-- First child -->
            <nav class="navbar navbar-expand-lg bg-info">
                <div class="container-fluid">
                    <img src="./images/Logo.png" alt="" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cartModal"><i class="fas fa-shopping-cart"></i> Cart</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search" method="GET" action="index.php">
                            <input class="form-control me-2" type="search" name="search_query" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- About Modal -->
            <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="aboutModalLabel">About Active Life Hub</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h2>About Active Life Hub</h2>
                            <p>Welcome to <strong>Active Life Hub</strong>, your ultimate destination for everything fitness, style, and wellness. We believe that a healthy body is the cornerstone of a fulfilling life, and our mission is to empower you to achieve your best self.</p>

                            <h3>Who We Are</h3>
                            <p>At Active Life Hub, we are passionate about fitness and wellbeing. Our team consists of fitness enthusiasts, nutrition experts, and style aficionados dedicated to providing you with the latest insights and products in the fitness industry.</p>

                            <h3>Our Vision</h3>
                            <p>We envision a world where everyone has the tools and knowledge to lead an active, healthy, and stylish life. We strive to be your trusted partner on this journey, offering guidance, support, and inspiration every step of the way.</p>

                            <h3>What We Offer</h3>
                            <h4>Fitness</h4>
                            <p>We bring you the latest trends, tips, and techniques in the fitness world. Whether you’re just starting your fitness journey or are a seasoned athlete, we have something for everyone. Our expert advice and curated content will help you stay motivated and on track to reach your fitness goals.</p>

                            <h4>Style</h4>
                            <p>Looking good is an essential part of feeling good. At Active Life Hub, we believe that fitness and style go hand in hand. Our selection of stylish activewear and accessories ensures that you look and feel your best during every workout. Discover the latest trends and elevate your fitness wardrobe with our chic and functional pieces.</p>

                            <h4>Natural Supplements</h4>
                            <p>Your body deserves the best, and that’s why we offer a range of natural supplements to support your health and wellness. From vitamins and minerals to protein powders and herbal extracts, our supplements are carefully selected to provide you with the nutrients you need to thrive. Trust us to help you fuel your body the natural way.</p>

                            <h4>Wellness</h4>
                            <p>Taking care of your body goes beyond physical exercise. We provide resources and products that promote overall wellness, including mental health tips, relaxation techniques, and self-care strategies. Our holistic approach ensures that you have a well-rounded plan to nurture both your body and mind.</p>

                            <h3>Join the Community</h3>
                            <p>Active Life Hub is more than just a brand; it’s a community of like-minded individuals who are passionate about health, fitness, and style. Connect with us on social media, share your journey, and be inspired by others. Together, we can achieve greatness.</p>

                            <h3>Our Commitment</h3>
                            <p>We are committed to providing high-quality products and reliable information to support your fitness and wellness journey. Your health and satisfaction are our top priorities, and we continuously strive to exceed your expectations.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Contact Modal -->
            <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactModalLabel">Contact Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Active Life Hub</p>
                            <p>Email: activelife@hub.com</p>
                            <p>Tel: 021 654 7896</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Modal -->
            <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row" id="cartItemsContainer">
                                    <!-- Cart items rendered here by JavaScript (script below) -->
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-end">
                                        <h5 class="text-muted">Total: R<span id="cartTotal">0.00</span></h5>
                                        <button id="checkoutButton" class="btn btn-success mt-2">Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second child -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="padding: 0 20px;">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #fff;">Welcome <?php echo htmlspecialchars($email); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" style="color: #fff;">Logout</a>
                    </li>
                </ul>
            </nav>

            <!-- Third child -->
            <div class="bg-light text-center">
                <h3>Active Life Hub</h3>
                <p>Where Wellness Meets Motion</p>
            </div>

            <!-- Wrapping the sidebar and product cards in a row -->
            <div class="container mt-4">
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-md-2 bg-secondary p-0">
                        <!--brands to be displayed -->
                        <ul class="navbar-nav me-auto text-center">
                            <li class="nav-item bg-info"><a href="#" class="nav-link text-light">
                                    <h4>Brands</h4>
                                </a></li>
                            <?php
                            $result_brands = fetch_brands($db);
                            foreach ($result_brands as $row_data) {
                                $brand_title = $row_data['brand_title'];
                                $brand_id = $row_data['brand_id'];
                                echo "<li class='nav-item'>
                                    <a href='index.php?brand_id=$brand_id' class='nav-link text-light'>$brand_title</a>
                                </li>";
                            }
                            ?>
                        </ul>

                        <!--categories to be displayed -->
                        <ul class="navbar-nav me-auto text-center">
                            <li class="nav-item bg-info"><a href="#" class="nav-link text-light">
                                    <h4>Categories</h4>
                                </a></li>
                            <?php
                            $result_categories = fetch_categories($db);
                            foreach ($result_categories as $row_data) {
                                $category_title = $row_data['category_title'];
                                $category_id = $row_data['category_id'];
                                echo "<li class='nav-item'>
                                    <a href='index.php?category_id=$category_id' class='nav-link text-light'>$category_title</a>
                                </li>";
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- Product Cards -->
                    <div class="col-md-10">
                        <div class="row">
                            <?php
                            // Fetching and displaying products based on brand, category, or search query
                            if (isset($_GET['brand_id'])) {
                                $brand_id = $_GET['brand_id'];
                                $result_products = fetch_products_by_brand($db, $brand_id);
                            } elseif (isset($_GET['category_id'])) {
                                $category_id = $_GET['category_id'];
                                $result_products = fetch_products_by_category($db, $category_id);
                            } elseif (isset($_GET['search_query'])) {
                                $search_query = htmlspecialchars($_GET['search_query']);
                                $result_products = search_products($db, $search_query);
                            } else {
                                $result_products = fetch_products($db);
                            }

                            if ($result_products) {
                                foreach ($result_products as $row) {
                                    $product_id = $row['product_id'];
                                    $product_title = $row['product_title'];
                                    $product_description = isset($row['product_description']) ? $row['product_description'] : 'No description available';
                                    $product_image = $row['product_image'];
                                    $product_price = $row['product_price'];

                                    echo "
                                    <div class='col-md-4 mb-2'>
                                        <div class='card'>
                                            <img src='./images/$product_image' class='card-img-top' alt='$product_title'>
                                            <div class='card-body'>
                                                <h5 class='card-title'>$product_title</h5>
                                                <p class='card-text description'>$product_description</p>
                                                <p class='card-text'><strong>Price: </strong>R$product_price</p>
                                                <button class='btn btn-info add-to-cart' data-product-id='$product_id'>Add to cart</button>
                                                <button class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#productModal$product_id'>View more</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Product Modal -->
                                    <div class='modal fade' id='productModal$product_id' tabindex='-1' aria-labelledby='productModalLabel$product_id' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='productModalLabel$product_id'>$product_title</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    <img src='./images/$product_image' class='card-img-top mb-3' alt='$product_title'>
                                                    <p>$product_description</p>
                                                    <p><strong>Price: </strong>R$product_price</p>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                    <button type='button' class='btn btn-info add-to-cart' data-product-id='$product_id'>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                                }
                            } else {
                                echo "<p>No products found.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- jQuery cart script -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.add-to-cart').on('click', function() {
                        var productId = $(this).data('product-id');
                        $.ajax({
                            url: 'add_to_cart.php',
                            method: 'POST',
                            data: {
                                product_id: productId
                            },
                            success: function(response) {
                                alert(response);
                            }
                        });
                    });
                });
            </script>

            <!-- Cart script -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var cartModal = document.getElementById('cartModal');

                    cartModal.addEventListener('show.bs.modal', function() {
                        fetchCartItems();
                    });

                    document.getElementById('checkoutButton').addEventListener('click', function() {
                        window.location.href = 'checkout.php';
                    });

                    function fetchCartItems() {
                        fetch('cart.php')
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                var cartItemsContainer = document.getElementById('cartItemsContainer');
                                cartItemsContainer.innerHTML = '';

                                var cartTotal = 0;

                                if (data.error) {
                                    cartItemsContainer.innerHTML = '<p>' + data.error + '</p>';
                                } else if (data.length === 0) {
                                    cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
                                } else {
                                    data.forEach(item => {
                                        var totalItemPrice = parseFloat(item.product_price) * item.quantity;
                                        cartTotal += totalItemPrice;

                                        cartItemsContainer.innerHTML += `
                                            <div class="col-xl-12" data-product-id="${item.product_id}">
                                                <div class="card border shadow-none">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-start border-bottom pb-3">
                                                            <div class="me-4">
                                                                <img src="./images/${item.product_image}" alt="" class="avatar-lg rounded cart-item-image">
                                                            </div>
                                                            <div class="flex-grow-1 align-self-center overflow-hidden">
                                                                <div>
                                                                    <h5 class="text-truncate font-size-18"><a href="#" class="text-dark">${item.product_title}</a></h5>
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <ul class="list-inline mb-0 font-size-16">
                                                                    <li class="list-inline-item">
                                                                        <a href="#" class="text-muted px-1 remove-item" data-product-id="${item.product_id}">
                                                                            <i class="mdi mdi-trash-can-outline"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mt-3">
                                                                        <p class="text-muted mb-2">Price</p>
                                                                        <h5 class="mb-0 mt-2">R${parseFloat(item.product_price).toFixed(2)}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="mt-3">
                                                                        <p class="text-muted mb-2">Quantity</p>
                                                                        <div class="d-inline-flex">
                                                                            <select class="form-select form-select-sm w-xl update-quantity" data-product-id="${item.product_id}">
                                                                                <option value="1" ${item.quantity == 1 ? 'selected' : ''}>1</option>
                                                                                <option value="2" ${item.quantity == 2 ? 'selected' : ''}>2</option>
                                                                                <option value="3" ${item.quantity == 3 ? 'selected' : ''}>3</option>
                                                                                <option value="4" ${item.quantity == 4 ? 'selected' : ''}>4</option>
                                                                                <option value="5" ${item.quantity == 5 ? 'selected' : ''}>5</option>
                                                                                <option value="6" ${item.quantity == 6 ? 'selected' : ''}>6</option>
                                                                                <option value="7" ${item.quantity == 7 ? 'selected' : ''}>7</option>
                                                                                <option value="8" ${item.quantity == 8 ? 'selected' : ''}>8</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="mt-3">
                                                                        <p class="text-muted mb-2">Total</p>
                                                                        <h5 class="total-price" data-product-id="${item.product_id}">R${totalItemPrice.toFixed(2)}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                    });

                                    document.getElementById('cartTotal').innerText = cartTotal.toFixed(2);

                                    // Add event listeners to quantity dropdowns
                                    document.querySelectorAll('.update-quantity').forEach(function(select) {
                                        select.addEventListener('change', function() {
                                            var productId = this.getAttribute('data-product-id');
                                            var quantity = this.value;
                                            updateCartItemQuantity(productId, quantity);
                                        });
                                    });

                                    // Add event listeners to remove item buttons
                                    document.querySelectorAll('.remove-item').forEach(function(button) {
                                        button.addEventListener('click', function(event) {
                                            event.preventDefault();
                                            var productId = this.getAttribute('data-product-id');
                                            removeCartItem(productId);
                                        });
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error fetching cart items:', error);
                                var cartItemsContainer = document.getElementById('cartItemsContainer');
                                cartItemsContainer.innerHTML = '<p>Error loading cart items. Please try again later.</p>';
                            });
                    }

                    function updateCartItemQuantity(productId, quantity) {
                        fetch('update_cart.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: `product_id=${productId}&quantity=${quantity}`
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    fetchCartItems(); // Refresh the cart items to update the total price
                                } else {
                                    alert(data.error);
                                }
                            })
                            .catch(error => {
                                console.error('Error updating cart item quantity:', error);
                            });
                    }

                    function removeCartItem(productId) {
                        fetch('remove_from_cart.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: `product_id=${productId}`
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    fetchCartItems(); // Refresh the cart items to remove the deleted item
                                } else {
                                    alert(data.error);
                                }
                            })
                            .catch(error => {
                                console.error('Error removing cart item:', error);
                            });
                    }
                });
            </script>

            <!-- Last child -->
            <div class="bg-info text-center p-3">
                <p>All rights reserved...</p>
            </div>
        </div>
    </div>

    <style>
        .cart-item-image {
            max-width: 50px;
            max-height: 50px;
        }
    </style>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>