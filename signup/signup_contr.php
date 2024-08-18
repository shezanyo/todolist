<?php

declare(strict_types=1);

function is_input_empty(string $username,string $pwd,string $email,string $phone){
    if (empty($username) || empty($pwd) || empty($email) || empty($phone)) {
        return true;
    } else {
        return false;
}
}

function is_email_invalid(string $email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
}
}

function is_username_taken (object $pdo, string $username){
    if (get_username ($pdo, $username)) {
        return true; 
    } else {
        return false;
}
}

function is_phone_registered(object $pdo,string $phone){
    if (get_phone ($pdo, $phone)) {
        return true; 
    } else {
        return false;
}
}

function create_user (object $pdo,string $username,string $pwd,string $email,string $phone){
    set_user($pdo,$username,$pwd,$email,$phone);
}