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
                        <h3 class="panel-title"><i class="fa fa-share"></i>&nbsp;&nbsp; Host Commands</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <button class="btn btn-sm  btn-default" name="message" value="!hostcount">Host Count</button>
                            <button class="btn btn-sm  btn-default" name="message" value="!hostlist">Host List</button>
                        </form>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!hostmessage ">Host Message</button>
                            <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                        </form>

                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!hostreward ">Host Reward</button>
                            <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                        </form>

                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!hosttime ">Host Cooldown</button>
                            <input id="input1" type="text" name="message3" placeholder="<minutes>" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
