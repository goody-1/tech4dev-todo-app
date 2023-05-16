<?php
    session_start();
    require_once 'helper.php';
    $conn = con();
    if (!isset($_SESSION['is_logged_in'])) {
        $_SESSION['error'] = "Please login to continue!";
        return header('location: login.php');
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
    <title>Create Tasks</title>
</head>
<body>
    <div class="container">

        <div class="jumbotron">
            <div class="container">
                <h1>Create Tasks Page</h1>
            </div>
            <p>Welcome <?=$user->username?>!</p>
            <p class="lead">
                <!-- <a class="btn btn-primary btn-lg" href="index.php" role="button">Home</a> -->
                <a class="btn btn-success btn-lg" href="tasks.php" role="button">View all task</a>
                <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
            </p>
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
        <div class="container">
            <form action="action/create_task_action.php" method="post">
                <div class="form-group">
                    <label for="">What do you want to do?</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                  <label for="">What time do you want to do this?</label>
                  <input type="time" name="time" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>