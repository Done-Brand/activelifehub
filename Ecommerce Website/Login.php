<?php
session_start();

require_once("./includes/Database.php");

if (isset($_SESSION['User'])) {
  // Unset the 'User' session variable
  unset($_SESSION['User']);
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Create an instance of the class
  $db = new Database();

  // Check if the user exists in the database
  $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
  $db->query($sql);
  $db->bind(':email', $email);
  $db->bind(':password', $password);
  $result = $db->single();


  if ($result) {
    // Store the email in the session
    $_SESSION['User'] = $email;

    // Check if the logged-in user is an admin
    if ($email === 'admin@admin.com' && $password === 'admin') {
      // Redirect to the admin portal
      echo "<script>window.location.replace('admin_area/admin_portal.php');</script>";
    } else {
      // Redirect to the index page for other users
      echo "<script>window.location.replace('index.php');</script>";
    }
    exit;
  } else {
    echo '<script>alert("No User found!");</script>';
  }
}
?>


<!--<!DOCTYPE html>-->
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width = device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="./images/Logo.png">
  <title>Active Life Hub</title>


  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
  <link rel="stylesheet" type="text/css" href="/style.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>



<body>
  <div class="header-text">Active Life Hub</div>
  <div class="container-fluid login-background">

    <!--Shop Start-->
    <div class="LoginContainer">
      <h1>Login</h1>

      <form action="Login.php" method="post" autocomplete="off">
        <label for="email">Email Address:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="submit" name="submit">
        <button id="register-button">Register</button>
      </form>
    </div>


  </div>

  <!--  about start  -->
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

  <!--Contact Start-->
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
      <p> 2024 by Active Life Hub.</p>
    </div>

  </Section>


</body>



</html>


<script>
  // Get the register button element
  var registerButton = document.getElementById("register-button");

  // Add click event listener to the register button
  registerButton.addEventListener("click", redirectToRegister);

  function redirectToRegister(event) {
    event.preventDefault(); // Prevent form submission

    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");

    // Remove the required attribute from the text areas
    emailInput.removeAttribute("required");
    passwordInput.removeAttribute("required");

    // Redirect to the register page
    window.location.href = "Register.php";

    // Add the required attribute from the text areas
    emailInput.required = true;
    passwordInput.required = true;
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


  .LoginContainer {
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

  .LoginContainer button {
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