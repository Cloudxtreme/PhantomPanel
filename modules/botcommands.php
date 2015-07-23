<?php
require_once('../includes/includes.php');
?>
<?php
if (isset($_POST['message'])) {
    $result = curl_put($_POST['message']);
}

if (isset($_POST['message2']) && isset($_POST['message3'])) {
    $result = curl_put($_POST['message2'] . $_POST['message3']);
}
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

        <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>


    </head>

    <body>

        <div class="container">
            <div class="col-lg">
                <div class="panel panel-primary">
                    <div class="panel-heading">
					<h3 class="panel-title" style="height: 25px;"><i class="fa fa-pencil-square-o" style="float:left;">&nbsp;&nbsp; </i>
						<div id="title" style="float:left;padding-top:3px;">Title: <span style="color:#a68ed2;" id="stream_title"></span></div>
						<div id="game" style="float:right;padding-top:3px;">Game: <span  style="color:#a68ed2;" id="stream_game"></span></div>
					</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!title ">title</button>
                            <input type="text" name="message3" placeholder="<Stream Title>" value="">
                        </form>
                        &nbsp;
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!game ">game</button>
                            <input type="text" name="message3"placeholder="<Game Name>" value="">
                        </form>
                        <br>
                        <br>
                        <form action="" method="post">
                            <button class="btn btn-sm btn-default" name="message" value="!clear">Clear Chat</button>
                            <button class="btn btn-sm btn-default" name="message" value="!uptime">Stream Uptime</button>
                            <button class="btn btn-sm  btn-default" name="message" value="!botuptime">Bot Uptime</button>
                            <button class="btn btn-sm  btn-default" name="message" value="!game">Current Game</button>
                            <button class="btn btn-sm  btn-default" name="message" value="!title">Current Stream Title</button>
                        </form>
                    </div>
                    <div class="panel-body">
                        <h5>Hightlights:</h5>
                        <br>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!highlight ">Highlight</button>
                            <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                        </form>
                        <form action="" method="post">
                            <button class="btn btn-sm btn-default" name="message" value="!clearhighlights">Clear Highlights</button>
                        </form>
                    </div>

                    <div class="panel-body">
                        <h5>Player Queue:</h5>
                        <br>
                        <form action="" method="post">
                            <button id="currentplayer" class="btn btn-sm  btn-default" name="message" value="!currentplayer">Current Player</button>
                            <button id="waitinglist" class="btn btn-sm  btn-default" name="message" value="!waitinglist">Waiting List</button>
                            <button id="nextround" class="btn btn-sm  btn-default" name="message" value="!nextround">Next Round</button>
                        </form>
                    </div>
                    <div class="panel-body">
                        <h5>Commercials:</h5>
                        <br>
                        <form action="" method="post">
                            <button class="btn btn-sm btn-default" name="message" value="!commercial enable">Enable Commercials</button>
                            <button class="btn btn-sm btn-default" name="message" value="!commercial disable">Disable Commercials</button>
                        </form>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!commercial ">Commercial</button>
                            <input id="input1" type="text" name="message3" placeholder="<seconds>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!commercial autotimer">Commercial Auto Message</button>
                            <input id="input4" type="text" name="message3" placeholder="<interval> <seconds> <message>" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    var channel_name = "<?php echo $owner; ?>";
    $.ajax({
        url: 'https://api.twitch.tv/kraken/channels/' + channel_name,
        type: 'GET',
        dataType: 'jsonp',
        contentType: 'application/json',
        mimeType: 'application/vnd.twitchtv.v2+json',
        success: function(json_result) {
            $('#stream_title').text(json_result.status);
            $('#stream_game').text(json_result.game);
        }
    });
</script>
