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

        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
            <div class="col-lg">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-users fa-2x"></i>&nbsp;&nbsp; Point System</h3>
                    </div>
                    <div class="panel-body">
                        <h4>Currency Control:</h4>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points all ">Send Points to Everyone</button>
                            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                        </form>
                        <br />
                        <br />
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points add ">Add Points</button>
                            <input id="input2" type="text" name="message3" placeholder="<name> <amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points take ">Withdraw Points</button>
                            <input id="input2" type="text" name="message3" placeholder="<name> <amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points set ">Set Points</button>
                            <input id="input2" type="text" name="message3" placeholder="<name> <amount>" value="">
                        </form>
                    </div>
                    <div class="panel-body">
                        <h4>Currency Settings:</h4>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points name ">Change Points Name</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>
                        <form action="" method="post">
                            <button id="pointstoggle" class="btn btn-sm  btn-default" name="message" value="!points toggle">Toggle Point Commands Mods/Admins</button>
                        </form>
                        <br />
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points gain ">Point Gain</button>
                            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points offlinegain ">Offline Point Gain</button>
                            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points mingift ">Minimum Gift</button>
                            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                        </form>
                        <br />
                        <br />
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points interval ">Point Gain Interval</button>
                            <input id="input1" type="text" name="message3" placeholder="<minutes>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points offlineinterval ">Offline Point Gain Interval</button>
                            <input id="input1" type="text" name="message3" placeholder="<minutes>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points bonus ">Group Point Bonus</button>
                            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                        </form>
                    </div>
                    <div class="panel-body">
                        <h4>Penalty System:</h4>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!penalty ">Set Penalty</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!points interval ">Set Custom Penalty</button>
                            <input id="input1" type="text" name="message3" placeholder="<amounts>" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
