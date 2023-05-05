<?php
session_start();
require_once './action/helper.php';
$conn = con();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //i received a request
    foreach ($_POST as $key => $value) {
        $$key = sanitize($value);
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES('$fname', '$lname','$email', '$password')";
    $query = $conn->query($sql);
    if($query->num_rows > 0){
        //went well
        $_SESSION['message'] = "Registration successful!";
        header('location: login.php');
    }
    else {
        $_SESSION['error'] = ['Sorry could not create user'];
    }
    header('location: register.php');
}