<?php
require_once(__DIR__ . '/../includes/includes.php');
?>
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
                        <h3 class="panel-title"><i class="fa fa-usd"></i>&nbsp;&nbsp; Bet System
						<form action="" method="post" style="float:right;margin-top: -4px;margin-right: -8px;">
						<button id="killbot" class="btn btn-sm  btn-danger" name="message" style=" height: 30px;"value="!module disable ./systems/betSystem.js">Disable</button>
						</form></h3>
                    </div>

                    <div class="panel-body">
                        <h5>Bets:</h5>
                        <p>One of the many solutions to wagering on a winner.</p>
                        <br />
                        <form action="" method="post">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!bet start ">Start Default Bet</button>
                        </form>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!bet start ">Start Custom Bet</button>
                            <input id="input5" type="text" name="message3" placeholder="<option> <option2> <option3> <option4>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!bet win ">Winner</button>
                            <input id="input1" type="text" name="message3" placeholder="<option>" value="">
                        </form>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!bet max ">Maximum Bet</button>
                            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!bet min ">Minimum Bet</button>
                            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!bet time ">Bet Entry Time</button>
                            <input id="input1" type="text" name="message3" placeholder="<seconds>" value="">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
