<?php 
    session_start();
    require_once 'helper.php';
    $conn = con();
    if (!isset($_SESSION['is_logged_in'])) {
        $_SESSION['error'] = "Please login to continue!";
        return header('location: login.php');
    }

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

    //get this users tasks
    $sql = "SELECT * FROM `tasks` WHERE user_id = '$user_id'";
    $query = $conn->query($sql);
    $tasks  = $query->fetch_assoc();
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
    <title>Tasks</title>
</head>
<body>
    <div class="container">
        
        <div class="jumbotron">
            <div class="container">
                <h1>Tasks Page</h1>
            </div>
        </div>
        <?php
          if(isset($_SESSION['error'])){
            ?>
              <div class="alert alert-danger">
                <strong>Sorry!</strong> <?=$_SESSION['error']?>
              </div>
              <?php
              unset($_SESSION['error']);
          }

        ?>
        <div class="col">
            
        </div>
    </div>
    
</body>
</html>