<?php 

session_start();
$timeout = 3600*6; // Number of seconds until it times out.
 
// Check if the timeout field exists.
if(isset($_SESSION['timeout'])) {
    // See if the number of seconds since the last
    // visit is larger than the timeout period.
    $duration = time() - (int)$_SESSION['timeout'];
    if($duration > $timeout) {
        // Destroy the session and restart it.
        session_destroy();
        session_start();
    }
}
 
// Update the timout field with the current time.
$_SESSION['timeout'] = time();

include('includes/config.php');

 
if ($_GET['login']) {
     // Only load the code below if the GET
     // variable 'login' is set. You will
     // set this when you submit the form
 
     if ($_POST['username'] == $loginuser
         && $_POST['password'] == $loginpass) {
         // Load code below if both username
         // and password submitted are correct
 
         $_SESSION['loggedin'] = 1;
          // Set session variable

         header("Location: controlpanel.php");
         exit;
         // Redirect to a protected page
 
     } else echo "Wrong details";
     // Otherwise, echo the error message
 
}
 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>PhantomBot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/sandstone/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>


<body>

<div class="container" style="margin-top:5%">
  <div class="col-md-3 col-md-offset-4">
    <div class="panel member_signin">
      <div class="panel-body">
        <div class="fa_user">
          <img src="http://i.imgur.com/a0h0zM5.png" />
        </div>
        <h5>LOGIN</h5>
        <form action="?login=1" method="post" class="loginform">
          <div class="form-group">
            <label class="sr-only">Username</label>
            <div class="input-group">
              <input type="username" class="form-control"
                placeholder="Username" name="username">
            </div>
          </div>
          <div class="form-group">
            <label class="sr-only">Password</label>
            <div class="input-group">
              <input type="password" class="form-control"
                placeholder="Password" name="password">
            </div>
          </div>
          <button type="submit" class="btn btn-default">LOG IN</button>
        </form><br />
        <h6>web-gui v0.x</h6>
      </div>
    </div>
  </div>
</div>

</body>

</html>