<?php
require_once('includes/includes.php');

if (isset($_GET['login'])) {
    if (CheckLogin($_POST['username'], $_POST['password'])) {
        set_loggedin(true);

        header('Location: controlpanel.php');
        die();
    }
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
                        <?php
                        if (isset($_GET['login']) && $session_data['loggedin'] == false) {
                            echo '<div class="error">Invalid Username or Password</div>';
                        }
                        ?>
                        <h5>LOGIN</h5>
                        <?php if ($session_data['loggedin'] == false) { ?>
                            <form action="?login" method="post" class="loginform">
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
                            </form>
                        <?php } else { ?>
                            <meta http-equiv="refresh" content="5;url=controlpanel.php">
                            Login Successful.<br />
                            Redirecting in 5 seconds. Click <a href="controlpanel.php" target="_self">here</a> if the redirect does not go
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
