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
                        <h3 class="panel-title"><i class="fa fa-ticket "></i>&nbsp;&nbsp; Raffles
						<form action="" method="post" style="float:right;margin-top: -4px;margin-right: -8px;">
						<button id="killbot" class="btn btn-sm  btn-danger" name="message" style=" height: 30px;"value="!module disable ./systems/raffleSystem.js">Disable</button>
						</form></h3>
                    </div>
                    <div class="panel-body">
                        <h5>Raffle/Give-away:</h5>
                        <p>Raffle system can also be used for Give-aways.<br />
                            <b>Note:</b> "<b>prize</b>" Can either be the amount of points or a word & for messages use quotes.</p>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm  btn-default" name="message2" value="!raffle start -followers ">Start Raffle (for followers)</button>
                            <input id="input4" type="text" name="message3" placeholder="<ticket price> <keyword> <prize>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm  btn-default" name="message2" value="!raffle start  ">Start Raffle </button>
                            <input id="input4" type="text" name="message3" placeholder="<ticket price> <keyword> <prize>" value="">
                        </form>
                        <br />
                        <br />
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button id="raffleend" class="btn btn-sm  btn-default" name="message" value="!raffle end">End The Raffle</button>
                            <button id="rafflerepick" class="btn btn-sm  btn-default" name="message" value="!raffle repick">Repick Winner</button>
                            <button id="rafflerepick" class="btn btn-sm  btn-default" name="message" value="!raffle limit">Toggle Entry Limit On/Off</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
