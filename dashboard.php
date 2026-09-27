<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: auth/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard - DrinkVerse</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="index.php">
            🥤 DrinkVerse
        </a>

        <a class="btn btn-outline-light" href="auth/logout.php">
            Logout
        </a>

    </div>

</nav>


<div class="container my-5 text-center">

    <h1>
        Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! 🥤
    </h1>

    <p class="lead">
        Welcome to your DrinkVerse dashboard.
    </p>

    <div class="mt-4">

        <a href="drinks.php" class="btn btn-primary m-2">
            Explore Drinks
        </a>

        <a href="contact.php" class="btn btn-outline-primary m-2">
            Contact Us
        </a>

    </div>

</div>


<footer class="bg-dark text-white text-center p-3">

    <p class="mb-0">
        © 2026 DrinkVerse
    </p>

</footer>

</body>
</html>
