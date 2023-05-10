<?php
require_once  'config.php';
function sanitize(string $var)
{
    return htmlspecialchars(stripslashes(trim($var)));
}

function con()
{
    return new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}

foreach ($_REQUEST as $key => $value) {
    $$key = sanitize($value);
}

$conn = con();

if (isset($_SESSION['user_id'])) {
    //get user detail
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `users` WHERE id = '$user_id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 0 ) {
        /**
         * somehow, this user's data got deleted
         */
        return header('location: logout.php');
    }
    $user = $query->fetch_object();
}

function mustBeLoggedIn()
{
    if (!isset($_SESSION['is_logged_in'])) {
        $_SESSION['error'] = "Please login to continue!";
        return header('location: login.php');
    }
}