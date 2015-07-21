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
                        <h3 class="panel-title"><i class="fa fa-eye"></i>&nbsp;&nbsp; Chat Protection</h3>
                    </div>
                    <div class="panel-body">
                        <h4>Chat Control:</h4>
                        <br />
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
                        <h5>Warning Messages:</h5> 
                        <p>Customize the warning messages when someone triggers chat protection.</p>
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
                            <h5>Links/URL:</h5>	
                            <p>Auto-Purges links/URLs in chat.</p>
                            <form action="" method="post">
                                <button id="linksa" class="btn btn-sm  btn-default" name="message" value="!chatmod linksallowed true">Allow Links</button>
                                <button id="linksd" class="btn btn-sm  btn-default" name="message" value="!chatmod linksallowed false">Deny Links</button>
                            </form>
                            <br />
                            <h5>YouTube URLs:</h5>
                            <p>Auto-Purges <span style="color:red">ONLY YouTube links/URLs</span> in chat</p>			
                            <form action="" method="post">
                                <button id="youtubea" class="btn btn-sm  btn-default" name="message" value="!chatmod youtubeallowed true">Allow YT Links</button>
                                <button id="youtubed" class="btn btn-sm  btn-default" name="message" value="!chatmod youtubeallowed false">Deny YT Links</button>
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
                        <hr>
                        <div class="panel-body">
                            <h5>Chat Caps:</h5>
                            <p>Auto-Purges Caps in chat.</p>
                            <form action="" method="post">
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod capsallowed true">Allow Caps</button>
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod capsallowed false">Deny Caps</button>
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
                        <hr>
                        <div class="panel-body">
                            <h5>Chat Spam:</h5>
                            <p>Auto-Purges Spam in chat.</p> 
                            <form action="" method="post">
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod spamallowed true">Allow Spam</button>
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod spamallowed false">Deny Spam</button>
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
                        <hr>
                        <div class="panel-body">
                            <h5>Chat Symbols:</h5>
                            <p>Auto-Purges Symbols in chat, like: "!$#%&*"</p>
                            <form action="" method="post">
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod symbolsallowed true">Allow Symbols</button>
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod symbolsallowed false">Deny Symbols</button>
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
                        <hr>
                        <div class="panel-body">
                            <h5>Chat Repeats:</h5>
                            <p>Auto-Purges repeating words in a message.</p> 
                            <form action="" method="post">
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod repeatallowed true">Allow Repeats</button>
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod repeatallowed false">Deny Repeats</button>
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
                        <hr>
                        <div class="panel-body">
                            <h5>Chat Graphmes:</h5>
                            <p>Auto-Purges graphemes in chat.</p>
                            <form action="" method="post">
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod graphemeallowed true">Allow Graphmes</button>
                                <button class="btn btn-sm  btn-default" name="message" value="!chatmod graphemeallowed false">Deny Graphmes</button>
                            </form>
                            <br>
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
