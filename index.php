<?php
session_start();
require_once "./db_connect.php";

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: connection.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game List</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
</head>
<body>
    <header>
        <div class=topnav>
            <a class="active" href="logout.php">Déconnexion</a>
        </div>
    </header>

    <div class="container">
        <h1>Game List</h1>
        <div class="cards">

<?php
    $sql = "SELECT * FROM `jeuxvidéo`;";
    $res = $conn->prepare($sql);
    $res->execute();

    if ($res->rowCount() > 0) {
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='card'>
                    <img src='" . htmlspecialchars($row['image']) . "' alt='Image of " . htmlspecialchars($row['name']) . "'>
                    <h2>" . htmlspecialchars($row['name']) . "</h2>
                    <div class='buttons'>
                        <a href='./show.php?id=" . $row['id'] . "' class='showButton'>Show</a>
                        <a href='./delete.php?id=" . $row['id'] . "' onClick='return confirm(\"Are you sure to delete this game ?\")' class='deleteButton'>Delete</a>
                    </div>
                </div>";
        }
    } else {
        echo "<p>No data found</p>";
    }
?>
        </div>
        <a href="./create.php" class="add-game-link">Add new game</a>
    </div>
</body>
</html>
