<?php
session_start();
require_once '../helper.php';
$conn = con();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //i received a request
    foreach ($_POST as $key => $value) {
        $$key = sanitize($value);
    }

    //is this user pat of the system?
    $sql = "SELECT * FROM `users` WHERE email = '$email'";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
        //validate your password is correct
        $result = $query->fetch_assoc();
        if (password_verify($password, $result['password'])) {
            //log the user in
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_id'] = $result['id'];
            return header('location: ../tasks.php');
        }
    }

    //send the user back
    $_SESSION['error'] = "Invalid credentials";
    return header('location: ../login.php');
}