<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>
<body>
    
    <div class="container">
        
        <div class="jumbotron">
            <div class="container">
                <h1>Registration Page</h1>
            </div>
        </div>
        
        <form action="/action/register_action.php" method="post">
            <div class="form-group">
              <label for="">First Name</label>
              <input type="text" name="fname" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Last Name</label>
              <input type="text" name="lname" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" name="Email" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="Password" id="" class="form-control" placeholder="" aria-describedby="helpId" minlength="4">
              <small id="helpId" class="text-muted">Password must be more than 4</small>
            </div>
            
            <button type="submit" class="btn btn-success">Submit</button>
            
        </form>
    </div>
    
</body>
</html>