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
                <h3 class="panel-title"><i class="fa fa-users fa-2x"></i>&nbsp;&nbsp; User Stats</h3>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                <button id="top10" class="btn btn-sm  btn-default" name="message" value="!top10">Top 10 User Points</button>
                <button id="top10time" class="btn btn-sm  btn-default" name="message" value="!top10time">Top 10 User Time</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
