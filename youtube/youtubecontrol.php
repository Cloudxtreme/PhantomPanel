
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
    <div id="youtubeframe" class="panel-body">
        <form action="" method="post">
            <button class="btn btn-sm btn-default" name="message" value="!skipsong ">Skip Song</button>
            <button class="btn btn-sm  btn-default" name="message" value="!currentsong ">Current Song</button>
            <button class="btn btn-sm  btn-default" name="message" value="!stealsong ">Steal Song</button>
        </form>
        <form action="" method="post">
            <button class="btn btn-sm  btn-default" name="message" value="!nextsong ">Next Song</button>
            <button class="btn btn-sm  btn-default" name="message" value="!song toggle ">Music on/off</button>
        </form>
    </div>
    <div id="youtubeframe" class="panel-body">
        <form action="" method="post" style="float: left; padding-right: 5px;">
            <button class="btn btn-sm btn-default" name="message2" value="!addsong ">Add Song</button>
            <input id="input1" type="text" name="message3" placeholder="<YouTube link>" value="">
        </form>
        <br />
        <br />
        <form action="" method="post" style="float: left; padding-right: 5px;">
            <button class="btn btn-sm btn-default" name="message2" value="!delsong ">Delete Song</button>
            <input id="input1" type="text" name="message3" placeholder="<YouTube link>" value="">
        </form>
        <br />
        <br />
        <form action="" method="post" style="float: left; padding-right: 5px;">
            <button class="btn btn-sm btn-default" name="message2" value="!song limit ">Song Limit</button>
            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
        </form>
        <br />
        <br />
        <form action="" method="post" style="float: left; padding-right: 5px;">
            <button class="btn btn-sm btn-default" name="message2" value="!pricecom addsong ">Song Price</button>
            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
        </form>
    </div>

  <form action="" method="post">
            <button class="btn btn-sm  btn-default" name="message" value="!song titles ">Song Titles</button>
            <button class="btn btn-sm  btn-default" name="message" value="!song storing ">Enable Storing</button>
			<button class="btn btn-sm  btn-default" name="message" value="!song storepath <?php echo $botpath ?>/web">Set StorePath</button>
        </form>	
<br />

Now Playing: 
<marquee style="width: 318px;" behavior="scroll" direction=left>
<div id="now-playing" style="width: 318px;"></div>
</marquee>
Next:

<div style="height:200px;width:318px;border:1px solid #3E3E3E;overflow:auto;font-size:13px;">
<?php
$myfile = fopen("$botpath/web/queue.txt", "r") or die("Bot Path not set in config.php!");
echo fread($myfile,filesize("$botpath/web/queue.txt"));
fclose($myfile);
?><br />
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