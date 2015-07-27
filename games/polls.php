<?php
require_once('../includes/includes.php');
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
                        <h3 class="panel-title"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp; Poll/Vote System
						<form action="" method="post" style="float:right;margin-top: -4px;margin-right: -8px;">
						<button id="killbot" class="btn btn-sm  btn-danger" name="message" style=" height: 30px;"value="!module disable ./systems/pollSystem.js">Disable</button>
						</form></h3>
                    </div>
                    <div class="panel-body">
                        <h5>Voting:</h5>
                        <p>A simple poll system for voting on anything. You can enter more than 2 options if needed.<br />
                            To vote type !vote "<b>option</b>" in chat.</p>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!poll open ">Start A Poll</button>
                            <input id="input3" type="text" name="message3" placeholder="<option> <option2> " value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!poll open -t ">Start A Timed Poll</button>
                            <input id="input4" type="text" name="message3" placeholder="<seconds> <option> <option2> " value="">
                        </form>
                        <br />
                        <br />
                        <br />
                        <form action="" method="post">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!poll close ">End Poll</button>
                        </form>
                    </div>

                    <div class="panel-body">
                        <p>Displays last poll results in chat.</p>
                        <form action="" method="post">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!poll results ">Last Poll Results</button>
                        </form>
                    </div>

                </div>
            </div>
    </body>
</html>
