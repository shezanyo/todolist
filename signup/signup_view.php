<?php

declare(strict_types=1);

function check_signup_errors (){
    if(isset($_SESSION[ ' errors_signup'])){
        $errors = $_SESSION[ 'errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">'.$error.'</p>';
            }

        unset ($_SESSION[ 'errors_signup']);

    }else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo '<br>';
        echo '<p class="success">Signup Success</p>';
    }

}

function signup_inputs(){
    if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION[ "errors_signup"] ["username_taken"])) {
        echo '<input type="text" name="username" placeholder="Username" required> value="'.$_SESSION["signup_data"]["username"].'"';
    }else {
        echo '<input type="text" name="username" placeholder="Username" required>';
    }

    echo '<input type="password" name="pwd" placeholder="Password" required>';

    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION[ "errors_signup"] ["email_used"]) && !isset($_SESSION[ "errors_signup"] ["invalid_email"])) {
        echo '<input type="email" name="email" placeholder="Email" required value="'.$_SESSION["signup_data"]["email"].'">';
    }else {
        echo '<input type="email" name="email" placeholder="Email" required>';
    }

    if(isset($_SESSION["signup_data"]["phone"]) && !isset($_SESSION[ "errors_signup"] ["phone_used"])) {
        echo '<input type="tel" name="phone" placeholder="Phone Number" required value="'.$_SESSION["signup_data"]["phone"].'">';
    }else {
        echo '<input type="tel" name="phone" placeholder="Phone Number" required>';
}
}
