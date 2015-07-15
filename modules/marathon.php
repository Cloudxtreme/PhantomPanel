<?php require_once('../includes/includes.php'); ?>

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
                    <h3 class="panel-title"><i class="fa fa-android fa-2x"></i>&nbsp;&nbsp; Marathon Commands</h3>
                </div>
                <div class="panel-body">
			     <h4>Marathon Settings:</h4>
                    <br>
						<form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!marathon schedule add ">Schedule a Marathon</button>
                        <input id="input4" type="text" name="message3" placeholder="<name> <MM/DD> <HH:MM>" value="">
                    </form>
					<br />
					<br />
					<br />
                    <form action="" method="post">
                        <button class="btn btn-sm btn-default" name="message" value="!marathon">Current Marathon</button>
                        <button class="btn btn-sm btn-default" name="message" value="!marathon clear">Clear Marathons</button>
                    </form>
                </div>
                <div class="panel-body">
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!marathon name ">Marathon Name</button>
                        <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                    </form>
					<form action="" method="post">
					<button class="btn btn-sm  btn-default" name="message" value="!marathon nameclear">Clear Marathon Name</button>
                    </form>
                </div>
				<div class="panel-body">
						<form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!marathon link ">Marathon Link</button>
                        <input id="input1" type="text" name="message3" placeholder="<URL>" value="">
                    </form>
					<form action="" method="post">
					<button class="btn btn-sm  btn-default" name="message" value="!marathon linkclear">Clear Marathon Link</button>
                    </form>
            </div>
				<div class="panel-body">
			     <h4>Time Zone:</h4>
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