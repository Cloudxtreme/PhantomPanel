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
                <h3 class="panel-title"><i class="fa fa-ticket fa-2x"></i>&nbsp;&nbsp; Poll System</h3>
            </div>

			  <div class="panel-body">
			    <form action="" method="post">
				<button  class="btn btn-sm btn-default"  name="message2" value="!poll results ">Last Poll Results</button>
				<button  class="btn btn-sm btn-default"  name="message2" value="!poll close ">End Current Poll</button>
				</form>
				</div>
				<div class="panel-body">
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!poll open ">Start A Poll</button>
				<input id="input3" type="text" name="message3" placeholder="<option> <option2> " value="">
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!poll open -t ">Start A Timed Poll</button>
				<input id="input4" type="text" name="message3" placeholder="<seconds> <option> <option2> " value="">
				</form>
				
        </div>
    </div>
</div>
</body>
</html>
