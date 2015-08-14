<?php
require_once(__DIR__ . '../includes/includes.php');
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
                        <h3 class="panel-title"><i class="fa fa-wrench"></i>&nbsp;&nbsp; Custom Commands
						<form action="" method="post" style="float:right;margin-top: -4px;margin-right: -8px;">
						<button id="killbot" class="btn btn-sm  btn-danger" name="message" style=" height: 30px;"value="!module disable ./commands/addCommand.js">Disable</button>
						</form></h3>
                    </div>
                    <div class="panel-body">
                        <h5>Command Creation Tags:</h5>
                        <ul>
                            <li>(sender) - displays the user of the command</li>
                            <li>(count) - displays the amount of times the command has been used</li>
                            <li>(random) - chooses a random person in the channel</li>
                            <li>(code) - generates a 8 character code using A-Z and 1-9</li>
                            <li>(#) - generates a random number 1-100</li>
                            <li>(1) - this targets the first argument in a command.</li>
                            <li>(2) - this targets the second argument in a command.</li>
                        </ul>
                        <br />
                        <h5>Command Creation Panel:</h5>
                        <div class="panel-body">
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!addcom ">Create Command</button>
                                <input id="input3" type="text" name="message3" placeholder="<command> <message>" value="">
                            </form>
                        </div>
                        <div class="panel-body">
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!delcom ">Delete Command</button>
                                <input id="input3" type="text" name="message3" placeholder="<command>" value="">
                            </form>
                        </div>
                        <div class="panel-body">
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!editcom ">Modify Command</button>
                                <input id="input3" type="text" name="message3" placeholder="<command> <message>" value="">
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        <h5>Command Attributes Guide:</h5>
                        <p><b>Note:</b> !Permcom uses a "<b>mode</b>" system, which is for targeting what groups has access to the command.<br />
                        <ul>
                            <li>1: Setting the mode as "<b>1</b>" will set the command to be accessible by <u>ONLY</u> the chosen group.</li>
                            <li>2: Setting the mode as "<b>2</b>" will set the command to be accessible by the chosen group you and any group ranked higher.</li>
                        </ul>
                        <p><b>Alias:</b> Alias means another word for the same command. If you set !points with an alias as wallet, the command will respond to !wallet.</p>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!aliascom ">Set Alias</button>
                            <input id="input3" type="text" name="message3" placeholder="<command> <alias>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!pricecom ">Set Price</button>
                            <input id="input3" type="text" name="message3" placeholder="<command> <amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!permcom ">Set Permission</button>
                            <input id="input4" type="text" name="message3" placeholder="<command> <group> <mode>" value="">
                        </form>
                    </div>
                    <div class="panel-body" style="float:left;">

                        <h5>Custom Commands:</h5>
                        <textarea class="data-box" readonly><?php
                            $result = curl_get("/inistore/command.ini");


                            if ($result[1] == 200) {
                                echo $result[0];
                            } else {
                                echo 'Failed to get command list';
                            }
                            ?></textarea></div>
                    <div class="panel-body" >
                        <div style="float:right;">
                            <h5>Command Aliases:</h5>
                            <textarea class="data-box" readonly><?php
                                $result = curl_get("/inistore/aliases.ini");

                                if ($result[1] == 200) {
                                    echo $result[0];
                                } else {
                                    echo 'Failed to get alias list';
                                }
                                ?></textarea>
                        </div></div>
                    <div class="panel-body" style="float:left;">

                        <h5>Command Prices:</h5>
                        <textarea class="data-box" readonly><?php
                            $result = curl_get("/inistore/pricecom.ini");

                            if ($result[1] == 200) {
                                echo $result[0];
                            } else {
                                echo 'Failed to get pricecom list';
                            }
                            ?></textarea></div>
                    <div class="panel-body">
                        <div style="float:right;">
                            <h5>Command Permissions:</h5>
                            <textarea class="data-box" readonly><?php
                                $result = curl_get("/inistore/permcom.ini");

                                if ($result[1] == 200) {
                                    echo $result[0];
                                } else {
                                    echo 'Failed to get commandperm list';
                                }
                                ?></textarea>
                        </div></div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
