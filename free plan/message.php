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
	<title>Side Navigation Bar</title>
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
		<a href="regpremium.php" class="active">Premium Plan</a>
        <a href="faqs.html">FAQs</a>
		<a href="contact.html">Contact</a>
        <a href="about.html">About</a>
	</div>

	<div class="notice">

       <p>Thank you for subscribing to our plan! We appreciate your support. Please note that the transaction process may take 2-3 days to complete. We will send you an email notification as soon as the transaction is finalized and you gain access to our premium content, including videos, tutorials, lessons, PDFs, quizzes, and mock tests."</p>

    </div>
</body>
</html>