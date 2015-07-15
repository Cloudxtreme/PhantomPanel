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
                <h3 class="panel-title"><i class="fa fa-ticket fa-2x"></i>&nbsp;&nbsp; Notices/Announcements</h3>
            </div>
			  <div class="panel-body">
				<div class="panel-body">
				<h5>Notice Creation:</h5>
				Notices are like announcements for your channel. You can add, delete and modify them here.
				<br />
				<form action="" method="post" style="padding-bottom: 25px;padding-top: 15px;">
                <button class="btn btn-sm btn-default" name="message" value="!notice toggle">Notices on/off</button>
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;display:inline;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!addnotice ">Create Notice</button>
				<input id="input1" type="text" name="message3" placeholder="<message>" value="">
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;display:inline;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!delnotice ">Delete Notice</button>
				<input id="input1" type="text" name="message3" placeholder="<Notice #>" value="">
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;display:inline;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!notice insert ">Notice Order</button>
				<input id="input3" type="text" name="message3" placeholder="<Notice #> <message>" value="">
				</form>
				</div>
				<div class="panel-body">
				<h5>Notice Triggering:</h5> 
				Notices are triggered based on both by the number of messages and time.<br />
				A notice will appear if the number of messages are sent into chat within the amount of time set.
				<br /><br />
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!notice req ">Message Requirement</button>
				<input id="input1" type="text" name="message3" placeholder="<amount>" value="">
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!notice timer ">Notice Interval</button>
				<input id="input1" type="text" name="message3" placeholder="<minutes>" value="">
				</form>
				</div></div></div>

        </div>
    </div>
</div>
</body>
</html>
