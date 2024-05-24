<?php
session_start();
require_once "./db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Details</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <header>
        <div class=topnav>
            <a class="active" href="logout.php">Déconnexion</a>
        </div>
    </header>

    <div class="container">
        <h1>Game Details</h1>
        <div class="cards">

<?php
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
        $sql = "SELECT * FROM `jeuxvidéo` WHERE id = :id;";
        $res = $conn->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();

        if ($res->rowCount() > 0) {
            $row = $res->fetch(PDO::FETCH_ASSOC);
            echo "<div class='card'>
                    <img src='" . htmlspecialchars($row['image']) . "' alt='Image of " . htmlspecialchars($row['name']) . "'>
                    <h2>" . htmlspecialchars($row['name']) . "</h2>
                    <p><strong>Editor :</strong> " . htmlspecialchars($row['editor']) . "</p>
                    <p><strong>Description :</strong> " . htmlspecialchars($row['description']) . "</p>
                    <div class='info'>
                        <p><strong>Note :</strong> " . htmlspecialchars($row['note']) . "</p>
                        <p><strong>Last edit :</strong> " . htmlspecialchars($row['date']) . "</p>
                    </div>
                    <p><a href='./edit.php?id=" . $row['id'] . "' class='editButton'>Edit</a></p>
                </div>";
        } else {
            echo "<p>No game found with the provided ID.</p>";
        }
    } else {
        echo "<p>No ID provided. Please go back and select a game.</p>";
    }
?>
        </div>
        <a href="./index.php" class="add-game-link">Back to Game List</a>
    </div>
</body>
</html>
