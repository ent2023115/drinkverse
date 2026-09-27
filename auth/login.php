<?php

session_start();

require_once "../include/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if ($email == "" || $password == "") {

        $message = "Please enter your email and password.";

    } else {

        $sql = "SELECT * FROM users WHERE email = :email";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":email" => $email
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            header("Location: ../dashboard.php");
            exit();

        } else {

            $message = "Invalid email or password.";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - DrinkVerse</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="../index.php">
            🥤 DrinkVerse
        </a>

        <a class="btn btn-outline-light" href="../index.php">
            Home
        </a>

    </div>

</nav>


<div class="container my-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <h1 class="text-center mb-4">
                Login 🔐
            </h1>

            <?php if ($message != ""): ?>

                <div class="alert alert-danger">
                    <?php echo $message; ?>
                </div>

            <?php endif; ?>


            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Enter your email"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Enter your password"
                           required>

                </div>


                <button type="submit"
                        class="btn btn-primary w-100">

                    Login

                </button>

            </form>


            <p class="text-center mt-3">

                Don't have an account?

                <a href="register.php">
                    Register here
                </a>

            </p>

        </div>

    </div>

</div>


<footer class="bg-dark text-white text-center p-3">

    <p class="mb-0">
        © 2026 DrinkVerse
    </p>

</footer>

</body>
</html>