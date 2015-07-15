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
                        <h3 class="panel-title"><i class="fa fa-android fa-2x"></i>&nbsp;&nbsp; Chat Moderation</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!purge ">Purge</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>

                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!ban ">Ban</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>

                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!unban ">Un-Ban</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>

                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!timeout ">Time Out</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!autopurge ">Auto Purge</button>
                            <input id="input1" type="text" name="message3" placeholder="<phrase>" value="">
                        </form>


                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!autoban ">Auto Ban</button>
                            <input id="input1" type="text" name="message3" placeholder="<phrase>" value="">
                        </form>

                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!permit ">Permit</button>
                            <input id="input1" type="text" name="message3" placeholder="<name>" value="">
                        </form>
                    </div>

                    <div class="panel-body">
                        <h5>Warning Messages:</h5> <br />
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod warning1type ">Warning Type #1</button>
                            <input id="input3" type="text" name="message3" placeholder="purge/ban/timeout" value="">
                        </form>

                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod warning2type ">Warning Type #2</button>
                            <input id="input3" type="text" name="message3" placeholder="purge/ban/timeout" value="">
                        </form>

                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod warning3type ">Warning Type #3</button>
                            <input id="input3" type="text" name="message3" placeholder="purge/ban/timeout" value="">
                        </form>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod warning1message ">Warning Message #1</button>
                            <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                        </form>

                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod warning2message ">Warning Message #2</button>
                            <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                        </form>
                        <form action="" method="post" style="float: left; padding-right: 5px;">
                            <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod warning3message ">Warning Message #3</button>
                            <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                        </form>
                    </div>
                    <div class="panel-body">
                        <h4>Chat Moderation Settings:</h4>
                        <div class="panel-body">
                            <h5>Links/URL:</h5>	<br />
                            Links in Messages:
                            <form action="" method="post">
                                <button id="linksa" class="btn btn-sm  btn-default" name="message" value="!chatmod linksallowed true">Allow</button>
                                <button id="linksd" class="btn btn-sm  btn-default" name="message" value="!chatmod linksallowed false">Deny</button>
                            </form>
                            YouTube URLs: 
                            <form action="" method="post">
                                <button id="youtubea" class="btn btn-sm  btn-default" name="message" value="!chatmod youtubeallowed true">Allow</button>
                                <button id="youtubed" class="btn btn-sm  btn-default" name="message" value="!chatmod youtubeallowed false">Deny</button>
                            </form>
                            <br />
                            <br />
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod linksmessage ">Links Message</button>
                                <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                            </form>

                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!whitelist ">Whitelist</button>
                                <input id="input1" type="text" name="message3" placeholder="<URL>" value="">
                            </form>
                        </div>

                        <div class="panel-body">
                            <h5>Caps:</h5> <br />
                            Caps in Messages:
                            <form action="" method="post">
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod capsallowed true">Allow</button>
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod capsallowed false">Deny</button>
                            </form>
                            <br />
                            <br />
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod capsmessage ">Caps Message</button>
                                <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                            </form>
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod capstriggerratio ">Caps Ratio</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod capstriggerlength ">Caps Length</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                        </div>

                        <div class="panel-body">
                            <h5>Spam:</h5><br />
                            Spam in Messages: 
                            <form action="" method="post">
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod spamallowed true">Allow</button>
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod spamallowed false">Deny</button>
                            </form>
                            <br>
                            <br>
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod spammessage ">Spam Message</button>
                                <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                            </form>

                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod spamlimit ">Spam Limit</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                        </div>

                        <div class="panel-body">
                            <h5>Symbols:</h5><br />
                            Symbols in Messages: 
                            <form action="" method="post">
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod symbolsallowed true">Allow</button>
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod symbolsallowed false">Deny</button>
                            </form>
                            <br>
                            <br>
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod symbolsmessage ">Symbol Message</button>
                                <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                            </form>

                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod symbolslimit ">Symbol Limit</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>

                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod symbolsrepeatlimit ">!symbolsrepeatlimit</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                        </div>

                        <div class="panel-body">
                            <h5>Repeating:</h5><br />
                            Repeats in Messages: 
                            <form action="" method="post">
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod repeatallowed true">Allow</button>
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod repeatallowed false">Deny</button>
                            </form>
                            <br>
                            <br>
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod repeatmessage ">Repeat Message</button>
                                <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                            </form>

                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod repeatlimit ">Repeat Limit</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                        </div>			

                        <div class="panel-body">
                            <h5>Graphme:</h5><br />
                            Graphme in Messages: 
                            <form action="" method="post">
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod graphemeallowed true">Allow</button>
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod graphemeallowed false">Deny</button>
                            </form>
                            <br>
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod graphmemessage ">Graphme Message</button>
                                <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                            </form>
                            <form action="" method="post" style="float: left; padding-right: 5px;">
                                <button  class="btn btn-sm btn-default"  name="message2" value="!chatmod graphemelimit ">Grapheme Limit</button>
                                <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                            </form>
                        </div>			
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
