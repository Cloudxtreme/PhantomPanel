<?php
include('../includes/includes.php');
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

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users fa-2x"></i>&nbsp;&nbsp; Misc Commands</h3>
            </div>
            <div class="panel-body">
			This panel is only for enabling the bot to write logs to help with debugging issues.<br /><br />
                <form action="" method="post">
                <button class="btn btn-sm  btn-default" name="message" value="!log enable">Enable Logs</button>
                <button class="btn btn-sm  btn-default" name="message" value="!log disable">Disable Logs</button>
                </form>
				<br />
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!log days ">Set Log Days</button>
				<input id="input1" type="text" name="message3" placeholder="<days>" value="">
				</form>
            </div>
			<div class="panel-body">
			Enable or Disable the response of the bot. <br /><br />
			<form action="" method="post">
			<button class="btn btn-sm  btn-default" name="message" value="!response disable">Mute Bot</button>
			<button class="btn btn-sm  btn-default" name="message" value="!response enable">Un-Mute Bot</button>
			</form>
			</div>
        </div>
    </div>
</div>
</body>
</html>