<?php
require_once('../includes/includes.php');
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
                <h3 class="panel-title"><i class="fa fa-users fa-2x"></i>&nbsp;&nbsp; Time System</h3>
            </div>
            <div class="panel-body">
<form action="" method="post">
				<button  class="btn btn-sm btn-default"  name="message2" value="!timetoggle ">Toggle Time on/off</button>
				<button  class="btn btn-sm btn-default"  name="message2" value="!timelevel ">Toggle Promote from Time on/off</button>
				</form>
			</div>
            <div class="panel-body">
			<h4>Time Control:</h4>
			<br />
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!time ">Someone's Time</button>
				<input id="input1" type="text" name="message3" placeholder="<name>" value="">
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!time give ">Add Time</button>
				<input id="input2" type="text" name="message3" placeholder="<name> <amount>" value="">
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!time take ">Deduct time</button>
				<input id="input2" type="text" name="message3" placeholder="<name> <amount>" value="">
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!time set ">Set Time</button>
				<input id="input2" type="text" name="message3" placeholder="<name> <amount>" value="">
				</form>
				<br />
				<br />
				<br />
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!timepromotehours ">Group Promote Hours</button>
				<input id="input1" type="text" name="message3" placeholder="<hours>" value="">
				</form>
				</div>


            </div>
        </div>
    </div>
</div>

</body>
</html>
