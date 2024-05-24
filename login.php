<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "db_connect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM auth WHERE username = :username";

    $statement = $conn->prepare($query);
    $statement->execute(array(':username' => $username));
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // User found, check the password
        if (password_verify($password, $user['password'])) {
            // Correct password, start session and redirect to index.php
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            // Incorrect password, redirect to connection.php with error message
            header("Location: connection.php?error=login_failed");
            exit();
        }
    } else {
        // User not found, redirect to connection.php with error message
        header("Location: connection.php?error=login_failed");
        exit();
    }

    $conn = null;
}
?>
