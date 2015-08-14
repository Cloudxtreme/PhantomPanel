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
                        <h3 class="panel-title"><i class="fa fa-bullhorn"></i>&nbsp;&nbsp; Notices/Announcements
						<form action="" method="post" style="float:right;margin-top: -4px;margin-right: -8px;">
						<button id="killbot" class="btn btn-sm  btn-danger" name="message" style=" height: 30px;"value="!module disable ./handlers/noticeHandler.js">Disable</button>
						</form></h3>
                    </div>
                    <div class="panel-body">
                        <h5>Channel Notices:</h5>
                        <p>Create announcements that are automatically shown in chat based in your set intervals and message count.</p>
                        <form action="" method="post">
                            <button class="btn btn-sm btn-default" name="message" value="!notice toggle">Notices on/off</button>
                        </form>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default" style="display:inline;"  name="message2" value="!addnotice ">Create Notice</button>
                            <textarea id="input1" type="text" name="message3" placeholder="<message>" value="" style="display:inline;max-height: 28px;margin-bottom: -10px;max-width: 800px;" ></textarea>
                        </form>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!delnotice ">Delete Notice</button>
                            <input id="input1" type="text" name="message3" placeholder="<Notice ID #>" value="">
                        </form>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!notice insert ">Insert Notice by Order</button>
                            <textarea id="input1" type="text" name="message3" placeholder="<ID> <message>" value="" style="display:inline;width:150px;max-height: 28px;margin-bottom: -10px;max-width: 800px;" ></textarea>
                        </form>
                    </div>
                    <div class="panel-body">
                        <h5>Notice Settings:</h5>
                        <p><b>Message Requirement</b> is the amount of message in chat that will trigger a notice.<br />
                            <b>Notice Interval</b> is amount of time before triggering from the amount of messages in chat.</p>
                        <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!notice req ">Message Requirement</button>
                            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!notice timer ">Notice Interval</button>
                            <input id="input1" type="text" name="message3" placeholder="<minutes>" value="">
                        </form>
                    </div>
                    <div class="panel-body" >
                        <h5>Notices:</h5>
                        <textarea class="data-box" readonly><?php
                            $result = curl_get("/inistore/notices.ini");

                            if ($result[1] == 200) {
                                echo $result[0];
                            } else {
                                echo 'Failed to get notice list';
                            }
                            ?> </textarea>
						 <h5>Settings:</h5>
                        <textarea style="width: 150px;height: 80px;"class="data-box" readonly><?php
                            $result = curl_get("/inistore/notice.ini");

                            if ($result[1] == 200) {
                                echo $result[0];
                            } else {
                                echo 'Failed to get notice setttings';
                            }
                            ?> </textarea></div>
                </div>
            </div>
        </div>
    </body>
</html>
