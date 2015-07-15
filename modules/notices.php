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
                        <h3 class="panel-title"><i class="fa fa-ticket fa-2x"></i>&nbsp;&nbsp; Notices/Announcements</h3>
                    </div>
                    <div class="panel-body">
                        <h5>Notice Settings:</h5>
                        <div class="panel-body">
                            <form action="" method="post">
                                <button class="btn btn-sm btn-default" name="message" value="!notice toggle">Notices on/off</button>
                            </form>
                            <br />
                            <br />
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!addnotice ">Create Notice</button>
                                <input id="input1" type="text" name="message3" placeholder="<message>" value="">
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
                                <button  class="btn btn-sm btn-default"  name="message2" value="!notice insert ">Notice Order</button>
                                <input id="input4" type="text" name="message3" placeholder="<Notice ID #> <message>" value="">
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
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
                        <div style="height:200px;width:400px;border:1px solid #ccc;overflow:auto;font-size:13px;">

                            <?php
                            $result = curl_get("/inistore/notices.ini");

                            if ($result[1] == 200) {
                                echo $result[0];
                            } else {
                                echo 'Failed to get notice list';
                            }
                            ?>

                        </div></div>

                </div>
            </div>
        </div>
    </body>
</html>
