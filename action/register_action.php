<?php
session_start();
require_once '../helper.php';
$conn = con();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //i received a request
    // foreach ($_POST as $key => $value) {
    //     $$key = sanitize($value);
    // }

    $errors = [];
    //validate that email is unique
    $sql = "SELECT `email` FROM `users` WHERE email = '$email'";
    $query = $conn->query($sql);
    if ($query->num_rows >0) {
        $errors['email'] = "Email already exists";
    }

    //validate that username is unique
    $sql = "SELECT `username` FROM `users` WHERE username='$username'";
    $query = $conn->query($sql);
    if ($query->num_rows >0) {
        $errors['username'] = "Username already exists";
    }

    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (first_name, last_name, username, email, password) VALUES('$fname', '$lname', '$username', '$email', '$password')";
        if($conn->query($sql) === true){
            //went well
            $_SESSION['message'] = "Registration successful!";
            return header('location: ../login.php');
        }
        else {
            $_SESSION['error'] = 'Sorry an error occurred please again!';
        }
    }
    $_SESSION['errors'] = $errors;
    header('location: ../register.php');
}