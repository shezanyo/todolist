<?php
require_once 'login_view.php';
require_once '../config/config_session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login_handl.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password</label>
        <input type="password" id="pwd" name="pwd" required>
        <br><br>

        <?php
            check_login_errors();
        ?>    

        <button type="submit">Login</button>
    </form>
</body>
</html>
