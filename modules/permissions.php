<?php
require_once(__DIR__ . '/../includes/includes.php');
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
                        <h3 class="panel-title"><i class="fa fa-users"></i>&nbsp;&nbsp; Group Commands
						<form action="" method="post" style="float:right;margin-top: -4px;margin-right: -8px;">
						<button id="killbot" class="btn btn-sm  btn-danger" name="message" style=" height: 30px;"value="!module disable ./util/permissions.js">Disable</button>
						</form></h3>
                    </div>
                    <div class="panel-body">
                        <h5>Rank Up Settings:</h5><br />
                        Section for changing prices or required time for the command !rankup.
                        <br />
                        <br />
                        <form action="" method="post">
                            <button class="btn btn-sm btn-default" name="message" value="!rankup toggle">RankUp Toggle on/off</button>
                        </form>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;display:inline;">
                            <button class="btn btn-sm btn-default" name="message2" value="!rankup price ">Rank Up Price</button>
                            <input id="input2" type="text" name="message3" placeholder="<group> <amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!rankup time ">Rank Up Time</button>
                            <input id="input2" type="text" name="message3" placeholder="<group> <minutes>" value="">
                        </form>
                    </div>
                    <div class="panel-body">
                        <h5>Group Settings:</h5>
                        <p>Create, Remove, Change and Set Groups for your channel.<br />
						In order to set command permissions for each group you must use the <a target="main"  style="color: #6441a5;" href="../modules/addcommand.php"><i class="fa fa-wrench"></i>&nbsp;Custom Commands</a> panel.
						</p>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!group ">Group Level</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!group create ">Create Group</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!group remove ">Remove from Group</button>
                            <input id="input1" type="text" name="message3" placeholder="<group>" value="">
                        </form>
                        <br />
                        <br />
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!group set ">Set Group</button>
                            <input id="input2" type="text" name="message3" placeholder="<name> <group>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!group name ">Modify Group</button>
                            <input id="input3" type="text" name="message3" placeholder="<group> <new name>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button class="btn btn-sm btn-default" name="message2" value="!group points ">Group Point Gain</button>
                            <input id="input3" type="text" name="message3" placeholder="<group> <multiplier>" value="">
                        </form>
                    </div>
                    <div class="panel-body" >
                            <h5>Group List:</h5>

						<p>Groups are ranked up to 0. Making 0 the highest rank.</p>
                        <textarea class="data-box" readonly><?php $result = curl_get("/inistore/groups.ini");

                            if ($result[1] == 200) {
                                echo $result[0];
                            } else {
                                echo 'Failed to get group list';
                            }
                            ?></textarea></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
