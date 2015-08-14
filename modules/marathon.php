<?php require_once(__DIR__ . '/../includes/includes.php'); ?>
<?php
if (isset($_POST['message'])) {
    $result = curl_put($_POST['message']);
}

if (isset($_POST['message2']) && isset($_POST['message3'])) {
    $result = curl_put($_POST['message2'] . $_POST['message3']);
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>PhantomBot</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/main.css" />

        <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>


    </head>

    <body>

        <div class="container">
            <div class="col-lg">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-flag"></i>&nbsp;&nbsp; Marathon Commands
						<form action="" method="post" style="float:right;margin-top: -4px;margin-right: -8px;">
						<button id="killbot" class="btn btn-sm  btn-danger" name="message" style=" height: 30px;"value="!module disable ./commands/marathonCommand.js">Disable</button>
						</form></h3>
                    </div>
                    <div class="panel-body">
                        <h5>Marathon Settings:</h5>
                        <p>Edit or schedule upcoming marathons. Also includes a link and custom name. Good for doing long marathon streams and etc.</p>
                        <br>
                        <form action="" method="post">
                            <button class="btn btn-sm btn-default" name="message" value="!marathon">Current Marathon</button>
                            <button class="btn btn-sm btn-default" name="message" value="!marathon clear">Clear Marathons</button>
                        </form>
                        <br />
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!marathon schedule add ">Schedule Marathon</button>
                            <input id="input4" type="text" name="message3" placeholder="<name> <MM/DD> <HH:MM>" value="">
                        </form>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!marathon name ">Marathon Name</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>
                        <form action="" method="post">
                            <button class="btn btn-sm  btn-default" name="message" value="!marathon nameclear">Clear Name</button>
                        </form>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!marathon link ">Marathon Link</button>
                            <input id="input1" type="text" name="message3" placeholder="<URL>" value="">
                        </form>
                        <form action="" method="post">
                            <button class="btn btn-sm  btn-default" name="message" value="!marathon linkclear">Clear Link</button>
                        </form>
                    </div>
                    <div class="panel-body">
                        <h5>Time Zone:</h5>
                        Marathon commands use the Time-Zone module that's included in the script. This helps make it easier to schedule your marathons without having to change up the start time and dates.</p>
                        <br>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!timezone ">Set Time Zone</button>
                            <input id="input1" type="text" name="message3" placeholder="<timezone>" value="">
                        </form>
                        <form action="" method="post">
                            <button class="btn btn-sm btn-default" name="message" value="!timezone">Current Time Zone</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
