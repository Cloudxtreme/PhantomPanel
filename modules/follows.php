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
                <h3 class="panel-title"><i class="fa fa-ticket fa-2x"></i>&nbsp;&nbsp; Follow Handler</h3>
            </div>
						  <div class="panel-body">
			<h5>Follow Message Tags:</h5>
			<ul>
			<li>(name) - Displays the followers name.</li>
			<li>(reward) - Displays the set reward amount.</li>
			<li>(pointname) - Displays the custom name for points.</li>
			</ul>
			</div>
			
			  <div class="panel-body">
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!follow ">Check Follower</button>
				<input id="input1" type="text" name="message3" placeholder="<name>" value="">
				</form>
				
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!followmessage ">Follow Message</button>
				<input id="input1" type="text" name="message3" placeholder="<message>" value="">
				</form>
				
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!followreward ">Follow Reward</button>
				<input id="input1" type="text" name="message3" placeholder="<amount>" value="">
				</form>
				</div>
				<div class="panel-body" >
			  <h5>Followers:</h5>
			<div style="height:100px;width:400px;border:1px solid #ccc;overflow:auto;font-size:13px;">

			<?php
			$myfile = fopen("$botpath/inistore/followed.ini", "r") or die("Bot Path not set in config.php!");
			echo fread($myfile,filesize("$botpath/inistore/followed.ini"));
			fclose($myfile);
			?>

</div></div>
        </div>
    </div>
</div>
</body>
</html>
