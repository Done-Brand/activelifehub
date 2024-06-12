<?php
session_start();
require_once("./includes/Database.php");

if (isset($_POST['Submit'])) {
  $email = $_POST['Email'];
  $password = $_POST['Password'];
  $repassword = $_POST['RePassword'];

  // Create an instance of the Database class
  $conn = new Database();

  // Check if the email already exists
  $sql = "SELECT * FROM users WHERE Email = :email";
  $conn->query($sql);
  $conn->bind(':email', $email);
  $existingUser = $conn->single();

  if ($existingUser) {
    echo '<script>alert("Email already exists!");</script>';
  } else {
    if ($password === $repassword) {
      $dateRegistered = date('Y-m-d H:i:s');

      // SQL query to insert the values into the database
      $sql = "INSERT INTO users (Email, Password, Date_registered) VALUES (:email, :password, :date_registered)";
      $conn->query($sql);
      $conn->bind(':email', $email);
      $conn->bind(':password', $password);
      $conn->bind(':date_registered', $dateRegistered);

      // Execute the query and check if the insertion was successful
      if ($conn->execute()) {
        // User registered successfully
        $_SESSION['User'] = $email;
        echo "<script>window.location.replace('Login.php')</script>";
        exit;
      } else {
        // Registration failed
        echo '<script>alert("Registration failed! Please try again.");</script>';
      }
    } else {
      // Passwords do not match
      echo '<script>alert("Passwords do not match!");</script>';
    }
  }

  unset($_POST['Email']);
  unset($_POST['Password']);
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="./images/Logo.png">
  <title>Active Life Hub</title>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="header-text">Active Life Hub</div>
  <div class="container-fluid login-background">

    <div class="RegisterContainer">
      <h1>Register</h1>

      <form action="Register.php" method="post" autocomplete="off">
        <label for="Email">Email Address:</label>
        <input type="text" id="Email" name="Email" required>

        <label for="Password">Password:</label>
        <input type="password" id="Password" name="Password" required>

        <label for="RePassword">Retype Password:</label>
        <input type="password" id="RePassword" name="RePassword" required>

        <input type="submit" value="Submit" name="Submit">
        <button id="Login-button">Login</button>
      </form>
    </div>
  </div>

  <section class="about" id="about">
    <div class="about-content">
      <h2>About</h2>
      <p>
        Introducing Active Life Hub - Where Wellness Meets Motion
      </p>
      <p>
        Welcome to Active Life Hub, your ultimate destination for everything fitness, style, and wellness. We believe that a healthy body is the cornerstone of a fulfilling life, and our mission is to empower you to achieve your best self.
      </p>
    </div>
  </section>

  <section class="contact" id="contact">
    <div class="main-contact">
      <div class="contact-content">
        <li><a href="index.php">Shop</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </div>
      <div class="contact-content">
        <li><a href="#">Shipping & Returns</a></li>
        <li><a href="#">Store Policy</a></li>
        <li><a href="#">Payment Methods</a></li>
      </div>
      <div class="contact-content">
        <li>Contact</li>
        <li>Tel: +27 21 569 9845</li>
      </div>
      <div class="contact-content">
        <li><a href="https://www.facebook.com/trendtrove/">Facebook</a></li>
        <li><a href="https://www.instagram.com/trendtrove.in/">Instagram</a></li>
        <li><a href="https://twitter.com/trovedao_?lang=en">Twitter</a></li>
      </div>
    </div>
    <div class="last">
      <p>2024 by Active Life Hub</p>
    </div>
  </section>

</body>

</html>

<script>
  var LoginButton = document.getElementById("Login-button");

  LoginButton.addEventListener("click", redirectToLogin);

  function redirectToLogin(event) {
    event.preventDefault(); // Prevent form submission
    window.location.href = "Login.php";
  }
</script>

<style>
  body {
    background-color: lightgrey;
    padding-top: 5%;
    margin-top: 0px;
  }

  .login-background {
    background-image: url('./images/Background.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    position: relative;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .header-text {
    position: absolute;
    top: 0;
    font-size: 3em;
    font-weight: bold;
    color: white;
    width: 100%;
    padding: 20px 0;
    z-index: 1;
  }

  .RegisterContainer {
    background-color: rgba(255, 255, 255, 0.8);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
    width: 300px;
    margin: 0 auto;
    margin-bottom: 5%;
    margin-top: 3px;
  }

  form {
    margin-top: 20px;
  }

  label {
    display: block;
    margin-bottom: 10px;
  }

  input[type="text"],
  input[type="password"],
  textarea {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
  }

  .RegisterContainer button {
    background-color: blueviolet;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .about {
    background: #f7f6f6;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }

  .about-content {
    text-align: center;
  }

  .about-content h2 {
    font-size: var(--main-font);
    margin-top: 7%;
    margin-bottom: 7%;
  }

  .about-content p {
    max-width: 600px;
    font-size: var(--p-font);
    font-weight: 600;
    color: var(--text-color);
    line-height: 300%;
    margin-bottom: 10%;
  }

  .contact {
    padding: 80px 17%;
    background: var(--text-color);
  }

  .main-contact {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, auto));
    gap: 2rem;
    margin-bottom: 3rem;
  }

  .contact-content li {
    margin-bottom: 15px;
    list-style-type: none;
  }

  .contact-content li a {
    display: block;
    color: var(--bg-color);
    font-size: var(--p-font);
    font-weight: 600;
    transition: all .40s ease;
  }

  .contact-content li a:hover {
    transform: translateX(-10px);
  }

  .button:hover {
    background-color: blueviolet;
  }

  input[type="submit"] {
    background-color: blueviolet;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: blueviolet;
  }
</style>