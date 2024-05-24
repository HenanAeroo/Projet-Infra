<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Connection</title>
</head>
<body class="connection-page">
    <div class="center-form">
        <div class="connection">
            <div class="connection-form">
                <?php
                    if (isset($_GET['error']) && $_GET['error'] == 'login_failed') {
                        echo "<script>alert('Username or password is wrong. Please try again.'); window.location = './connection.php';</script>";
                    }
                ?>
                
                <h1>Please login</h1>

                <form action="login.php" method="POST">
                    <input type="text" name="username" class="form-control" placeholder="Enter a username">
                    <input type="password" name="password" class="form-control" placeholder="Enter a password">
                    <div class="center-button">
                        <button type="submit" value="Login" class="btn">Login</button>
                        <a href="register.php" class="btn btn-register">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
