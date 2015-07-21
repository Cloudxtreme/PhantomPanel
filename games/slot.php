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
                        <h3 class="panel-title"><i class="fa fa-gift"></i>&nbsp;&nbsp; Slot Machine Commands</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <h5>Slot Settings</h5>
                            Win points by hitting 3 of the same emotes in a row!
                            <br /><br />
                            <form action="" method="post">
                                <button  class="btn btn-sm btn-default"  name="message" value="!slot ">Play the Slot</button>
                                <button  class="btn btn-sm btn-default"  name="message" value="!slot CooldownMessages toggle ">Cooldown Messages On/Off</button>
                            </form>
                        </div>
                        <div class="panel-body">
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot time ">Set Slot Cooldown</button>
                                <input id="input1" type="text" name="message3" placeholder="<seconds>" value="">
                            </form>
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot bonus ">Set Slot Bonus</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot jackpot ">Set Slot Jackpot</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                        </div>
                        <div class="panel-body">
                            <h5>Slot Emotes:</h5>
                            You can replace the 7 emotes the slot machine uses.<br />
                            <b>Note:</b> Turbo & subscription emotes will not work, unless you give the bot either Turbo or paid subscription emotes.<br />
                            <br />
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot emote 1 ">Emote 1</button>
                                <input id="input1" type="text" name="message3" placeholder="<emote>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot emote 2 ">Emote 2</button>
                                <input id="input1" type="text" name="message3" placeholder="<emote>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot emote 3 ">Emote 3</button>
                                <input id="input1" type="text" name="message3" placeholder="<emote>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot emote 4 ">Emote 4</button>
                                <input id="input1" type="text" name="message3" placeholder="<emote>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot emote 5 ">Emote 5</button>
                                <input id="input1" type="text" name="message3" placeholder="<emote>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot emote 6 ">Emote 6</button>
                                <input id="input1" type="text" name="message3" placeholder="<emote>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot emote 7 ">Emote 7</button>
                                <input id="input1" type="text" name="message3" placeholder="<emote>" value="">
                            </form>
                        </div>
                        <div class="panel-body">
                            <h5>Slot Rewards:</h5>
                            Set custom rewards for each emote you get 3 in a row.<br />
                            <b>Note:</b>The rewards are numbered after the emotes above if Emote 1 = Reward 1<br />
                            <br />
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot reward 1 ">Reward 1</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot reward 2 ">Reward 2</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot reward 3 ">Reward 3</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot reward 4 ">Reward 4</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot reward 5 ">Reward 5</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot reward 6 ">Reward 6</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot reward 7 ">Reward 7</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                        </div>
                        <div class="panel-body">
                            <h5>Slot Half-Rewards:</h5>
                            Set a custom reward or toggle off the ability to recieve points when you get 2 of the same emote in a row.<br />
                            <br />
                            <form action="" method="post">
                                <button  class="btn btn-sm btn-default"  name="message" value="!slot halfrewards toggle ">Toggle Half-Rewards On/Off</button>
                            </form>
                            <br />
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot halfreward 3 ">Half Reward 3</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot halfreward 4 ">Half Reward 4</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot halfreward 5 ">Half Reward 5</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot halfreward 6 ">Half Reward 6</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="padding-bottom:5px;float: left; padding-right: 5px;display:inline;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!slot halfreward 7 ">Half Reward 7</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
