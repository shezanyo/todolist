<?php
if ($_SERVER["REQUEST_METHOD"]==="POST") {

    $username =$_POST["username"];
    $pwd=$_POST["pwd"];
    $email =$_POST["email"];
    $phone=$_POST["phone"];


try {
    require_once '../dbh/dbh.php';
    require_once 'signup_model.php'; 
    require_once 'signup_contr.php';    
    require_once 'signup_view.php';

    $error=[];

    if(is_input_empty($username,$pwd,$email,$phone)){
        $error["empty_input"]="Fill in all the fields";
    };
    if(is_email_invalid($email)){
        $error["invalied_email"]="Invalid Email used";
    }
    if(is_username_taken($pdo,$username)){
        $error["username_taken"]="Username used";
    }
    if(is_email_registered($pdo,$email)){
        $error["email_used"]="Email used";
    }
    if(is_phone_registered($pdo,$phone)){
        $error["phone_used"]="Duplicate phone number";
    }
    require_once '../config/config_session.php';

    if($error){
        $_SESSION["errors_signup"]=$error;

        $signupData=[
            "username"=>$username,
            "email"=>$email,
            "phone"=>$phone
        ];

        $_SESSION["signup_data"]=$signupData;


        header("Location: signup_index.php");
        die();
    }

    create_user($pdo,$username,$pwd,$email,$phone);

    header("Location:signup_index.php?signup=success");

    $pdo=null;
    $stmt=null;

    die();


} catch (PDOException $e) {
    die("Query failed:".$e->getMessage());
}
} else {
    header("Location: ../signup_index.php");
    die();
}