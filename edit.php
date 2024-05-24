<?php
session_start();
require_once "./db_connect.php";

if (isset($_POST["btnsave"])) {
    $id = $_POST["id"];
    $name = $_POST["txtName"];
    $editor = $_POST["txtEditor"];
    $image = $_POST["urlImage"];
    $description = $_POST["txtDescription"];
    $note = $_POST["note"];

    if (empty($name)) {
        echo "<script>alert('Please enter the name of the game'); window.location = './index.php';</script>";
    } elseif (empty($editor)) {
        echo "<script>alert('Please enter the editor of the game'); window.location = './index.php';</script>";
    } elseif (empty($description)) {
        echo "<script>alert('Please enter the description of the game'); window.location = './index.php';</script>";
    } else {
        // Mettre à jour la date avec la date et l'heure actuelles
        $currentDateTime = date('Y-m-d H:i:s');
        
        $sql = "UPDATE jeuxvidéo SET name = :name, editor = :editor, image = :image, description = :description, note = :note, date = :date WHERE id = :recordid;";
        $result = $conn->prepare($sql);
        $values = array(":name" => $name, ":editor" => $editor, ":image" => $image, ":description" => $description, ":note" => $note, ":date" => $currentDateTime, ":recordid" => $id);

        if ($result->execute($values)) {
            if ($result->rowCount() > 0) {
                echo "<script>alert('The game has been updated!'); window.location = './index.php';</script>";
            } else {
                echo "<script>alert('Failed to save data'); window.location = './index.php';</script>";
            }
        } else {
            $error = $result->errorInfo();
            echo "<script>alert('Failed to save data: " . $error[2] . "'); window.location = './index.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Game</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
    <header>
        <div class=topnav>
            <a class="active" href="logout.php">Déconnexion</a>
        </div>
    </header>

    <?php
    if (isset($_REQUEST["id"])) {
        try {
            $sql = "SELECT * FROM `jeuxvidéo` WHERE id = :recordid";
            $res = $conn->prepare($sql);
            $value = array(":recordid" => $_REQUEST["id"]);
            $res->execute($value);

            if ($res->rowCount() > 0) {
                $row = $res->fetch(PDO::FETCH_ASSOC);
                $id = $row["id"];
                $name = $row["name"];
                $editor = $row["editor"];
                $image = $row["image"];
                $description = $row["description"];
                $note = $row["note"];
            } else {
                echo "<script>alert('No game found'); window.location = './index.php';</script>";
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    ?>

    <div class="form-container" role="form" aria-labelledby="formTitle">

        <form action="" method="post">

            <!-- Récupération de l'ID à l'intérieur de la balise form-->
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <h2 id="formTitle">Edit Game</h2>

            <div class="form-group">
                <label for="txtName">Name:</label>
                <input type="text" id="txtName" value="<?php echo $name; ?>" name="txtName" placeholder="League Of Legends" required>
            </div>

            <div class="form-group">
                <label for="txtEditor">Editor:</label>
                <input type="text" id="txtEditor" value="<?php echo $editor; ?>" name="txtEditor" placeholder="Riot Games" required>
            </div>

            <div class="form-group">
                <label for="urlImage">Image:</label>
                <input type="text" id="urlImage" value="<?php echo $image; ?>" name="urlImage" placeholder="URL of the image">
            </div>

            <div class="form-group">
                <label for="txtDescription">Description:</label>
                <input type="text" id="txtDescription" value="<?php echo $description; ?>" name="txtDescription" placeholder="Kinda good but too addictive..." required>
            </div>

            <div class="form-group">
                <label for="note">Note:</label>
                <select id="note" name="note">
                    <?php
                    for ($i = 0; $i <= 20; $i++) {
                        $selected = ($i == $note) ? 'selected' : '';
                        echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" value="Save" name="btnsave">Save your edits</button>
            </div>
        </form>
    </div>

</body>
</html>
