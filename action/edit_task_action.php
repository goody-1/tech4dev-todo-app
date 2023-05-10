<?php
session_start();
require_once '../helper.php';
mustBeLoggedIn();
$conn = con();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //echo strtotime("Yesterday");
    $date = date('Y-m-d H:i:s', strtotime('now'));
    if (isset($time) && !empty($time)) {
        $date = date('Y-m-d H:i:s', strtotime($time));
    }

    $sql = "UPDATE `tasks` SET `body` = '$body', `expiry` = '$date' WHERE id ='$taskId' AND user_id = '$user_id'";
    if ($conn->query($sql) === true) {
        $_SESSION['message'] = 'Task updated successfully';
        return header('location: ../tasks.php');
    }
}
$_SERVER['error'] = 'An error occurred!';
return header('location: ../tasks.php');