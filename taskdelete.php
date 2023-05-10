<?php
    session_start();
    require_once 'helper.php';
    mustBeLoggedIn();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        //delete
        $sql = "DELETE FROM tasks WHERE id = '$taskId' AND user_id = '$user_id'";
        $conn->query($sql);
    }
    //redirect to tasks.php
    return header('location: tasks.php');