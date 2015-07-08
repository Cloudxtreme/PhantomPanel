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
                <h3 class="panel-title"><i class="fa fa-ticket fa-2x"></i>&nbsp;&nbsp; Raffles</h3>
            </div>
			  <div class="panel-body">
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!raffle start ">Start Custom Raffle</button>
				<input id="input5" type="text" name="message3" placeholder="[-followers] <price> <keyword> <reward>" value="">
				</form>
				</div>
            <div class="panel-body">
					<form action="" method="post" style="float: left; padding-right: 5px;">
					<button class="btn btn-sm  btn-default" name="message2" value="!raffle start -followers 0 signmeup ">Start Free Raffle (for followers)</button>
					<input id="input1" type="text" name="message3" placeholder="<prize>" value="">
					</form>
					<form action="" method="post" style="float: left; padding-right: 5px;">
                <button class="btn btn-sm  btn-default" name="message2" value="!raffle start 0 signmeup ">Start Free Raffle (for anyone)</button>
					<input id="input1" type="text" name="message3" placeholder="<prize>" value="">
					</form>
				<form action="" method="post" style="float: left; padding-right: 5px;">
                <button id="raffleend" class="btn btn-sm  btn-default" name="message" value="!raffle end">End The Raffle</button>
                <button id="rafflerepick" class="btn btn-sm  btn-default" name="message" value="!raffle repick">Repick Winner</button>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
