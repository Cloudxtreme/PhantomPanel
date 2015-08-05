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
                        <h3 class="panel-title"><i class="fa fa-clock-o"></i>&nbsp;&nbsp; Time System
						<form action="" method="post" style="float:right;margin-top: -4px;margin-right: -8px;">
						<button id="killbot" class="btn btn-sm  btn-danger" name="message" style=" height: 30px;"value="!module disable ./systems/timesystem.js">Disable</button>
						</form></h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <button  class="btn btn-sm btn-default"  name="message" value="!timetoggle ">Toggle Time on/off</button>
                        </form>
                    </div>
                    <div class="panel-body">
                        <h5>Time Control:</h5>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!time ">Someone's Time</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!time give ">Add Time</button>
                            <input id="input2" type="text" name="message3" placeholder="<name> <amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!time take ">Deduct time</button>
                            <input id="input2" type="text" name="message3" placeholder="<name> <amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!time set ">Set Time</button>
                            <input id="input2" type="text" name="message3" placeholder="<name> <amount>" value="">
                        </form>
                        <br />
                        <br />
                        <br />
                        <h5>Promotions from Time:</h5>
                        <p>This feature enables to automatic group level up for viewers. Based on the amount of time set a viewer will become a Regular. (You cannot edit the group for it.)</p>
                        <form action="" method="post">
                            <button  class="btn btn-sm btn-default"  name="message" value="!timelevel ">Toggle Time Promoter on/off</button>
                        </form>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!timepromotehours ">Group Promote Hours</button>
                            <input id="input1" type="text" name="message3" placeholder="<hours>" value="">
                        </form>
                    </div>
                    <div class="panel-body" >
                        <h5>Recorded Time (seconds):</h5>
                        <textarea class="data-box" readonly><?php
                            $result = curl_get("/inistore/time.ini");

                            if ($result[1] == 200) {
                                echo $result[0];
                            } else {
                                echo 'Failed to get timelist';
                            }
                            ?></textarea></div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
