<?php

require_once "../include/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if ($username == "" || $email == "" || $password == "") {

        $message = "Please fill in all fields.";

    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {

            $sql = "INSERT INTO users (username, email, password)
                    VALUES (:username, :email, :password)";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ":username" => $username,
                ":email" => $email,
                ":password" => $hashedPassword
            ]);

            $message = "Registration successful! You can now log in.";

        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                $message = "This email is already registered.";
            } else {
                $message = "Registration failed.";
            }
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

    <title>Register - DrinkVerse</title>

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
                Create an Account 🥤
            </h1>

            <?php if ($message != ""): ?>

                <div class="alert alert-info">
                    <?php echo $message; ?>
                </div>

            <?php endif; ?>


            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           placeholder="Enter your username"
                           required>

                </div>


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

                    Register

                </button>

            </form>


            <p class="text-center mt-3">

                Already have an account?

                <a href="login.php">
                    Login here
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