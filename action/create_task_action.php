<?php
session_start();
require_once '../helper.php';
mustBeLoggedIn();
$conn = con();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //echo strtotime("Yesterday");
    $date = null;
    if (isset($time) && !empty($time)) {
        $date = date('Y-m-d H:i:s', strtotime($time));
    }
    $sql = "INSERT INTO `tasks` (body, expiry, user_id) VALUES('$body', '$date', '$user_id')";
    $query = $conn->query($sql);
    if ($query) {
        $_SESSION['message'] = 'Task added successfully';
        return header('location: ../tasks.php');
    }
}

$_SERVER['error'] = 'An error occurred!';
return header('location: ../create_todo.php');
//echo strtotime("+5 days") ."<br>";
//$date = new DateTime('Yesterday');
//echo $date->getTimestamp();
//echo date("Y/m/d h:i:sa");
/**
 * Y - year
 * m - month
 * d - day
 * h - hour (12)
 * H - hour (24)
 * i - minute
 * s - seconds
 * a - PM/AM
 */