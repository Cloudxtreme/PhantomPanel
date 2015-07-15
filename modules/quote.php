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
                <h3 class="panel-title"><i class="fa fa-ticket fa-2x"></i>&nbsp;&nbsp; Quote System</h3>
            </div>
				<div class="panel-body">
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!addquote ">Add Quote</button>
				<input id="input1" type="text" name="message3" placeholder="<message>" value="">
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!delquote ">Delete Quote</button>
				<input id="input1" type="text" name="message3" placeholder="<Quote ID#>" value="">
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!editquote ">Edit Quote</button>
				<input id="input4" type="text" name="message3" placeholder="<Quote ID #> <message>" value="">
				</form>
				<form action="" method="post" style="float: left; padding-right: 5px;">
				<button  class="btn btn-sm btn-default"  name="message2" value="!quote ">Specified Quote</button>
				<input id="input1" type="text" name="message3" placeholder="<ID>" value="">
				</form>
				</div>
				<div class="panel-body" >
			  <h5>Quotes:</h5>
			<div style="height:200px;width:400px;border:1px solid #ccc;overflow:auto;font-size:13px;">

			<?php
			$myfile = fopen("$botpath/inistore/quotes.ini", "r") or die("Bot Path not set in config.php!");
			echo fread($myfile,filesize("$botpath/inistore/quotes.ini"));
			fclose($myfile);
			?>

</div></div>

        </div>
    </div>
</div>
</body>
</html>
