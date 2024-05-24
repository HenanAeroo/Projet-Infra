<?php
session_start();
require_once "./db_connect.php";

if (isset($_POST["btnsave"])){
    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];

    if ($username == ""){
        echo "<script>alert('Please enter a valid username.'); window.location = './inscription.php';</script>";
    } elseif ($password == ""){
        echo "<script>alert('Please enter a valid password.'); window.location = './inscription.php';</script>";
    } else {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO auth(username, password) VALUES(:username, :password);";

        $result = $conn->prepare($sql);
        $values = array(":username" => $username, ":password" => $passwordHash);

        $result->execute($values);

        if ($result->rowCount() > 0) {
            echo "<script>alert('You have been created !'); window.location = './index.php';</script>";
        } else {
            echo "<script>alert('Failed to save data'); window.location = './inscription.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Registration</title>
</head>
<body>
    <div class="form-container">
        <h2 id="formTitle">Let's register you !</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="txtUsername">Name:</label>
                <input type="text" id="txtUsername" name="txtUsername" placeholder="Your username" required>
            </div>

            <div class="form-group">
                <label for="txtPassword">Name:</label>
                <input type="password" id="txtPassword" name="txtPassword" placeholder="Your password" required>
            </div>

            <div class="form-group">
                <button type="submit" value="Save" name="btnsave">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
