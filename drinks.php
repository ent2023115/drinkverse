<?php

require_once "include/db.php";

$sql = "SELECT * FROM drinks ORDER BY id ASC";

$stmt = $pdo->query($sql);

$drinks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Drinks - DrinkVerse</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="index.php">
            🥤 DrinkVerse
        </a>

        <div>

            <a class="btn btn-outline-light"
               href="index.php">

                Home

            </a>

        </div>

    </div>

</nav>


<!-- Page Heading -->

<div class="container text-center my-5">

    <h1>
        Explore Our Drinks 🥤
    </h1>

    <p>
        Choose your favourite type of drink.
    </p>


    <!-- Filter Buttons -->

    <button class="btn btn-primary m-1"
            onclick="filterDrinks('all')">

        All

    </button>

    <button class="btn btn-success m-1"
            onclick="filterDrinks('juice')">

        Juice

    </button>

    <button class="btn btn-warning m-1"
            onclick="filterDrinks('smoothie')">

        Smoothie

    </button>

</div>


<!-- Drinks -->

<div class="container">

    <div class="row">

        <?php foreach ($drinks as $drink): ?>

            <div class="col-md-4 mb-4 drink-card
                        <?php echo htmlspecialchars($drink["category"]); ?>">

                <div class="card h-100">
                    <img src="image/<?php echo htmlspecialchars($drink["image"]); ?>"
         class="card-img-top drink-image"
         alt="<?php echo htmlspecialchars($drink["name"]); ?>">


                    <div class="card-body">

                        <h3 class="card-title text-center">

                            <?php

                            if ($drink["category"] == "juice") {
                                echo "🥤 ";
                            } else {
                                echo "🍹 ";
                            }

                            echo htmlspecialchars($drink["name"]);

                            ?>

                        </h3>


                        <p class="text-center">

                            <span class="badge bg-secondary">

                                <?php echo htmlspecialchars($drink["category"]); ?>

                            </span>

                        </p>


                        <hr>


                        <h5>
                            Ingredients
                        </h5>

                        <p>
                            <?php echo htmlspecialchars($drink["ingredients"]); ?>
                        </p>


                        <h5>
                            Instructions
                        </h5>

                        <p>
                            <?php echo htmlspecialchars($drink["instructions"]); ?>
                        </p>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

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
