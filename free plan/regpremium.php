<?php
session_start();
require_once('config.php');

if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['plan']) && isset($_POST['payment']) && isset($_POST['code']) && isset($_POST['username']) && isset($_POST['password'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $plan = $_POST['plan'];
    $payment = $_POST['payment'];
    $code = $_POST['code'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO user_info (first_name, last_name, email, plan, payment, code, username, password) VALUES ('$first_name', '$last_name', '$email', '$plan', '$payment', '$code', '$username', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['username'] = $username;
        header("Location: message.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CSE ReviewBoost</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="lr.css">
</head>
<body>

	<header>
		<div id="header-title">CSE Prof and Sub-Prof ReviewBoost</div>
	</header>

	<div class="sidebar">
		<img class="logo" src="image-14.png" alt="Image 14">
		<a href="free.html">Free Plan</a>
		<a href="premium.html" class="active">Premium Plan</a>
        <a href="faqs.html">FAQs</a>
		<a href="contact.html">Contact</a>
        <a href="about.html">About</a>
	</div>

	<div class="lr">

        <h1>Premium Plan Form</h1>
        <form method="POST" action="regpremium.php">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required><br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <select name="plan" for="plan" required>
                <option value="">Select a Plan</option>
                <option value="Monthly">Monthly (PHP 99.00)</option>
                <option value="Annual">Annual (PHP 999.00)</option>
            </select><br>

            <select name="payment" for="payment" required>
                <option value="">Select a Payment Method</option>
                <option value="Gcash">Gcash: 09078706422</option>
                <option value="Palawan">Palawan: 09078706422</option>
            </select><br>

            <label for="code">Transaction Code:</label>
            <input type="text" name="code" required><br>

            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
    <div style="position: relative;">
      <input type="password" id="password" name="password" required>
      <button type="button" onclick="togglePassword()">Show</button>
    </div><br>

            <input type="submit" value="Register">
        </form>

    </div>

    <script>
function togglePassword() {
  var password = document.getElementById("password");
  if (password.type === "password") {
    password.type = "text";
    document.querySelector("button").textContent = "Hide";
  } else {
    password.type = "password";
    document.querySelector("button").textContent = "Show";
  }
}
</script>

	<script src="script.js"></script>
</body>
</html>