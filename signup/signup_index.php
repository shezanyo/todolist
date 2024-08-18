<?php
require_once 'signup_view.php';
require_once '../config/config_session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="signup-container">
        <h2>Signup</h2>
        <form action="signup_handl.php" method="POST">
            <?php
            signup_inputs();
            ?>
            <input type="submit" value="Signup">
        </form>

        <?php
        check_signup_errors ();
        ?>

        <form action="../login/login_index.php" method="get">
            <button type="submit">Go to Login</button>
        </form>
        
    </div>

</body>
</html>


