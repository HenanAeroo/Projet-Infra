<?php
session_start();
require_once "./db_connect.php";

if (isset($_POST["btnsave"])){
    $name = $_POST["txtName"];
    $editor = $_POST["txtEditor"];
    $image = $_POST["urlImage"];
    $description = $_POST["txtDescription"];
    $note = $_POST["note"];

    if ($name == ""){
        echo "<script>alert('Please enter the name of the game'); window.location = './create.php';</script>";
    } elseif ($editor == ""){
        echo "<script>alert('Please enter the editor of the game'); window.location = './create.php';</script>";
    } elseif ($description == ""){
        echo "<script>alert('Please enter the description of the game'); window.location = './create.php';</script>";
    } else {
        $sql = "INSERT INTO jeuxvidéo(name, editor, image, description, note) VALUES(:name, :editor, :image, :description, :note);";

        $result = $conn->prepare($sql);
        $values = array(":name" => $name, ":editor" => $editor, ":image" => $image, ":description" => $description, ":note" => $note);

        $result->execute($values);

        if ($result->rowCount() > 0) {
            echo "<script>alert('The game has been added to the list!'); window.location = './index.php';</script>";
        } else {
            echo "<script>alert('Failed to save data'); window.location = './edit.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Game</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
    <header>
        <div class=topnav>
            <a class="active" href="logout.php">Déconnexion</a>
        </div>
    </header>

    <div class="form-container">
        <h2 id="formTitle">Add New Game</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="txtName">Name:</label>
                <input type="text" id="txtName" name="txtName" placeholder="League Of Legends" required>
            </div>

            <div class="form-group">
                <label for="txtEditor">Editor:</label>
                <input type="text" id="txtEditor" name="txtEditor" placeholder="Riot Games" required>
            </div>

            <div class="form-group">
                <label for="urlImage">Image:</label>
                <input type="text" id="urlImage" name="urlImage" placeholder="URL of the image">
            </div>

            <div class="form-group">
                <label for="txtDescription">Description:</label>
                <input type="text" id="txtDescription" name="txtDescription" placeholder="Kinda good but too addictive..." required>
            </div>

            <div class="form-group">
                <label for="note">Note:</label>
                <select id="note" name="note">
                    <?php
                        for ($i = 0; $i <= 20; $i++) {
                            echo '<option value="' . ($i + 1) . '">' . $i . '</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" value="Save" name="btnsave">Add your game</button>
            </div>
        </form>
    </div>
</body>
</html>
