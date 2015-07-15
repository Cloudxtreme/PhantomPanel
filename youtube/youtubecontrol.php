
<?php include( '../includes/includes.php'); ?>
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
♫ Now Playing: 
<marquee style="width:318px;background-color: #24242a;border:1px solid #3E3E3E;" behavior="scroll" direction=left>
<div id="now-playing" style="width: 318px;">Searching for currentsong.txt...</div>
</marquee>
<br />
<br />
        <form action="" method="post" style="display:inline;">
            <button class="btn btn-sm btn-default" name="message" value="!skipsong ">Skip ♫</button>
            <button class="btn btn-sm  btn-default" name="message" value="!currentsong ">Current ♫</button>
            <button class="btn btn-sm  btn-default" name="message" value="!stealsong ">Steal ♫</button>
        </form>
        <form action="" method="post"style="display:inline;">
            <button class="btn btn-sm  btn-default" name="message" value="!nextsong ">Next ♫</button>
		</form>
			<br />
			<br />
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
			<br /><br />

♫ Queue:
<div style="height:150px;width:318px;border:1px solid #3E3E3E;overflow:auto;font-size:13px;background-color: #24242a;">
<div id="playlist">Searching for queue.txt...</div>
<br />
</div>


</body>

</html>

<script type="text/javascript">// <![CDATA[
$(document).ready(function() {
$.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
setInterval(function() {
$('#now-playing').load('nowplaying.php');
}, 5000); // the "3000" here refers to the time to refresh the div.  it is in milliseconds. 
});
// ]]></script>

<script type="text/javascript">// <![CDATA[
$(document).ready(function() {
$.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
setInterval(function() {
$('#playlist').load('playlist.php');
}, 5000); // the "3000" here refers to the time to refresh the div.  it is in milliseconds. 
});
// ]]></script>