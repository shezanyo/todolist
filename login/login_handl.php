<?php
if ($_SERVER["REQUEST_METHOD"]==="POST") {

    $username =$_POST["username"];
    $pwd=$_POST["pwd"];


try{
    require_once '../dbh/dbh.php';
    require_once 'login_model.php'; 
    require_once 'login_contr.php';    
    require_once 'login_view.php';
    $error=[];

    if(is_input_empty($username,$pwd)){
        $error["empty_input"]="Fill in all the fields";
    }

    $result =get_user($pdo, $username);

    if (is_username_wrong ($result)) {
        $error ["login_incorrect"] = "Incorrect login info!";
    }
    if (!is_username_wrong ($result) && is_password_wrong ($pwd, $result["pwd"])) { 
        $error["login_incorrect"] = "Incorrect login info!";
    }

    require_once '../config/config_session.php';

    if($error){
        $_SESSION["errors_login"]=$error;

        header("Location: login_index.php");
        die();
    }
    $newsessionId=session_create_id();
    $sessionId=$newsessionId."_".$result["id"];
    session_id($sessionId);


    $_SESSION["userId"]=$result["id"];
    $_SESSION["username"]=htmlspecialchars($result["username"]);

    $_SESSION["last_regeneration"]=time();
    
    header("Location: ../dashboard/dashboard_index.php");


    $pdo=null;
    $stmt=null;
    die();
    
} catch (PDOException $e) {
    die("Query failed:".$e->getMessage());
}
} else {
    header("Location: login_index.php");
    die();
}
