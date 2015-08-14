<?php
require_once(__DIR__ . '../includes/includes.php');
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
                        <h3 class="panel-title"><i class="fa fa-gavel"></i>&nbsp;&nbsp; Bidding System
						<form action="" method="post" style="float:right;margin-top: -4px;margin-right: -8px;">
						<button id="killbot" class="btn btn-sm  btn-danger" name="message" style=" height: 30px;"value="!module disable ./systems/bidSystem.js">Disable</button>
						</form></h3>
                    </div>

                    <div class="panel-body">
                        <form action="" method="post">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!bid end">End Current Bid</button>
                            <button  class="btn btn-sm btn-default"  name="message2" value="!bid warn">Bid End Warning</button>
                        </form>

                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!bid start ">Start a Bid</button>
                            <input id="input4" type="text" name="message3" placeholder="<amount> <increment amount>" value="">
                        </form>

                    </div>
                </div>
            </div>
    </body>
</html>
