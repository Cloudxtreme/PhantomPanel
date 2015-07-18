<?php require_once('../includes/includes.php'); ?>
<?php
if (isset($_POST['message'])) {
    $result = curl_put($_POST['message']);
}
if (isset($_POST['message2']) && isset($_POST['message3'])) {
    $result = curl_put($_POST['message2'] . $_POST['message3']);
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>PhantomBot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/youtube.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
        <form action="" method="post" style="display:inline;">
            <button class="btn btn-sm btn-default" name="message" value="!skipsong ">Skip ♫</button>
            <button class="btn btn-sm  btn-default" name="message" value="!song shuffle ">Shuffle ♫</button>
            <button class="btn btn-sm  btn-default" name="message" value="!stealsong ">Steal ♫</button>
			<button class="btn btn-sm  btn-default" name="message" value="!nextsong ">Next ♫</button>
        </form>
        <form action="" method="post"style="margin-top: 10px;">
		    <button class="btn btn-sm  btn-default" name="message" value="!currentsong ">Current ♫</button>
		</form>

	<form action="" method="post">
            <button class="btn btn-sm btn-default" name="message2" value="!song limit ">Limit</button>
            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
        </form>
	<form action="" method="post">
            <button class="btn btn-sm btn-default" name="message2" value="!pricecom addsong " style="display:inline;">Price</button>
            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
        </form>
		<br />
        <form action="" method="post" style="display:inline;">
            <button class="btn btn-sm btn-default" name="message2" value="!addsong ">Add</button>
            <input id="input1" type="text" name="message3" placeholder="<link>" value="">
        </form>
        <form action="" method="post" style="display:inline;">
            <button class="btn btn-sm btn-default" name="message2" value="!delsong ">Remove</button>
            <input id="input1" type="text" name="message3" placeholder="<link>" value="">
        </form>
        <br />
		<br />
		<br />
  <form action="" method="post" style="display:inline;">
            <button class="btn btn-sm  btn-default" name="message" value="!song titles ">Toggle Titles</button>
			        </form>	
		<form action="" method="post" style="display:inline;">
			<button class="btn btn-sm  btn-default" name="message" value="!song toggle " >Toggle Messages</button>
        </form>
			<br />
			
			<br />
		        <form action="" method="post" style="">
            <button class="btn btn-sm btn-default" name="message2" value="!playsong ">Play </button>
            <input id="input3" type="text" name="message3" placeholder="<song from playlist>" value="">
        </form>
		


</body>

</html>

