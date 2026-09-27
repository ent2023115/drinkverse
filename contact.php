<?php

require_once "include/db.php";

$messageStatus = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if ($name == "" || $email == "" || $message == "") {

        $messageStatus = "Please fill in all fields.";

    } else {

        try {

            $sql = "INSERT INTO messages (name, email, message)
                    VALUES (:name, :email, :message)";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ":name" => $name,
                ":email" => $email,
                ":message" => $message
            ]);

            $messageStatus = "Your message has been sent successfully! ✅";

        } catch (PDOException $e) {

            $messageStatus = "Something went wrong. Please try again.";

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

    <title>Contact - DrinkVerse</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- Navigation -->

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="index.php">
            🥤 DrinkVerse
        </a>

        <a class="btn btn-outline-light" href="index.php">
            Home
        </a>

    </div>

</nav>


<!-- Contact Section -->

<div class="container my-5">

    <h1 class="text-center">
        Contact Us 📩
    </h1>

    <p class="text-center">
        Have a question? Send us a message.
    </p>


    <?php if ($messageStatus != ""): ?>

        <div class="alert alert-info text-center">

            <?php echo htmlspecialchars($messageStatus); ?>

        </div>

    <?php endif; ?>


    <div class="row justify-content-center">

        <div class="col-md-7">

            <form id="contactForm" method="POST">

                <!-- Name -->

                <div class="mb-3">

                    <label for="name" class="form-label">
                        Name
                    </label>

                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="Enter your name"
                           required>

                    <small id="nameError"
                           class="text-danger"></small>

                </div>


                <!-- Email -->

                <div class="mb-3">

                    <label for="email" class="form-label">
                        Email
                    </label>

                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="Enter your email"
                           required>

                    <small id="emailError"
                           class="text-danger"></small>

                </div>


                <!-- Message -->

                <div class="mb-3">

                    <label for="message" class="form-label">
                        Message
                    </label>

                    <textarea class="form-control"
                              id="message"
                              name="message"
                              rows="5"
                              placeholder="Write your message"
                              required></textarea>

                    <small id="messageError"
                           class="text-danger"></small>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Send Message

                </button>

            </form>

        </div>

    </div>

</div>


<!-- Footer -->

<footer class="bg-dark text-white text-center p-3">

    <p class="mb-0">
        © 2026 DrinkVerse
    </p>

</footer>


<!-- JavaScript -->

<script src="js/script.js"></script>

</body>
</html>
