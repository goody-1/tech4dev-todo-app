<?php
session_start();
if (isset($_SESSION['is_logged_in'])) {
    header('location: tasks.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Tech4Dev Todo App (Bancked Evening Session)</title>
</head>
<body>
    
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Welcome to our TODO app</h1>
                <p class="lead">Nice having you!</p>
                <hr class="my-2">
                <!-- <p>More info</p> -->
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="register.php" role="button">Register</a>
                    <a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a>
                </p>
            </div>
        </div>
    </div>
    
</body>
</html>