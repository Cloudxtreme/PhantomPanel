<?php require_once('includes/includes.php'); ?>

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
        <title>PhantomBot Control Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/sandstone/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />

        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>


    <body>
        <?php
        if (file_exists(__DIR__ . '/install.php')) {
            ?>
            <div class="error">
                install.php has not been deleted. This is a security risk. Please delete the file immediately
            </div>
            <?php
        }
        ?>
        <div class="container">
            <br>
            <!-- Navigation Menu-->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand">Control Panel <br /> <span style="font-size:12px;padding-left: 20px;color: gray;">version 1.2.1</span></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Commands <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <!--<li class="divider"></li>-->
                                    <li><a target="main" href="modules/addcommand.php"><i class="fa fa-wrench"></i>&nbsp;Custom Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/pointsystem.php"><i class="fa fa-money"></i>&nbsp; Point Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/timesystem.php"><i class="fa fa-clock-o"></i>&nbsp;Time Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/permissions.php"><i class="fa fa-users"></i>&nbsp;Group Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/notices.php"><i class="fa fa-bullhorn"></i>&nbsp;Notice Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/chatmod.php"><i class="fa fa-eye"></i>&nbsp;ChatMod Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/follows.php"><i class="fa fa-heart"></i>&nbsp;Follow Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/subscribers.php"><i class="fa fa-credit-card"></i>&nbsp;Subscriber Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/hosting.php"><i class="fa fa-share"></i>&nbsp;Host Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/greeting.php"><i class="fa fa-exclamation-circle"></i>&nbsp;Greeting Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/marathon.php"><i class="fa fa-flag"></i>&nbsp;Marathon Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/quote.php"><i class="fa fa-quote-right"></i>&nbsp;Quote Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/misc.php"><i class="fa fa-cog"></i>&nbsp;Misc Commands</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Games<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <!--<li class="divider"></li>-->
                                    <li><a target="main" href="games/bankheist.php"><i class="fa fa-gamepad"></i>&nbsp;BankHeist Commands</a>
                                    </li>
                                    <li><a target="main" href="games/rafflesystem.php"><i class="fa fa-ticket"></i>&nbsp;Raffle Commands</a>
                                    </li>
                                    <li><a target="main" href="games/betsystem.php"><i class="fa fa-usd"></i>&nbsp;Bet Commands</a>
                                    </li>
                                    <li><a target="main" href="games/polls.php"><i class="fa fa-check-square-o"></i>&nbsp;Poll Commands</a>
                                    </li>
                                    <li><a target="main" href="games/bids.php"><i class="fa fa-gavel"></i>&nbsp;Bid Commands</a>
                                    </li>
                                    <li><a target="main" href="games/slot.php"><i class="fa fa-gift"></i>&nbsp;Slot Commands</a>
                                    </li>
                                    <li><a target="main" href="games/roll.php"><i class="fa fa-trophy"></i>&nbsp;Roll Commands</a>
                                    </li>
                                    <li><a target="main" href="http://www.challonge.com">Challonge</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a onClick=" hide2();">Toggle Music</a>
                            </li>
                            <li><a href="#" onClick=" hide();">Toggle Chat</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="logout.php">logout</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Donate <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <!--<li class="divider"></li>-->
                                    <li><a href="https://www.twitchalerts.com/donate/phantomindex" target="_blank">PhantomIndex</a>
                                    </li>
                                    <li><a href="https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=LyzZlnqqcjmuYkFXcco71-2CL8E0uWEW9eR7WhwvVUS1mJ7U9kynCSqrW38&dispatch=5885d80a13c0db1f8e263663d3faee8de6030e9239419d79c3f52f70a3ed57ec" target="_blank">GloriousEggRoll</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="http://www.phantombot.net" target="_blank">Forums</a>
                            </li>
                            <li>
                                <form action="" method="post" style="margin-top: 14px;">
                                    <button id="killbot" class="btn btn-sm  btn-danger" name="message" value="!d !exit"><i class="fa fa-power-off"></i>&nbsp;Shut Down</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="page-header">
            </div>

            <div class="container">
                <div class="col-lg">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                       <span style="color: #ffffff;"> <i class="fa fa-twitch "></i>&nbsp;&nbsp;Video Stream</span>
                                    </a>  
                                    <span id="followers" style="color:#fff;float:right;"><i class="fa fa-heart" style="color:#a68ed2;"></i>&nbsp;&nbsp;
                                        <!-- FOLLOWER/VIEWER COUNT -->
                                        <?php
                                        $json = file_get_contents('https://api.twitch.tv/kraken/channels/' . $owner . '/follows.json?limit=100');
                                        $obj = json_decode($json);
                                        echo $obj->_total;
                                        ?>
                                    </span>
                                    <span id="viewers" style="float:right;padding-right: 10px;"><i class="fa fa-eye" style="color:#a68ed2" ></i>&nbsp;&nbsp;			
                                        <div id="viewer_counter" style="color:#fff;display:inline;"></div>
                                    </span>

                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <object id="video" bgcolor='#000000' data='//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf' id='clip_embed_player_flash' type='application/x-shockwave-flash'>
                                    <param name='movie' value='//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf' />
                                    <param name='allowScriptAccess' value='always' />
                                    <param name='allowNetworking' value='all' />
                                    <param name='allowFullScreen' value='true' />
                                    <param name='flashvars' value='channel=<?php echo $owner ?>&start_volume=25&auto_play=true' />
                                </object>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Bot Commands Panel -->
            <iframe class="iframe1" src="modules/botcommands.php" frameborder="0" scrolling="no" height="100%" width="100%"></iframe>
            <!-- Iframe that will display any panel selected in the navigation menu -->
            <iframe class="iframe2" name="main" frameborder="0" scrolling="no" height="100%" width="100%"></iframe>

        </div>
        <!-- Right Sidebar for Twitch Chat -->
        <div id="chatsidebar" name="chat">
            <iframe id="chat" src="http://www.twitch.tv/<?php echo $owner ?>/chat?popout=" frameborder="0" scrolling="no" height="100%"></iframe>
        </div>
        <!-- Left Sidebar using iframe to display Music player content -->
        <div id="musicsidebar">
            <iframe name="music" src="youtube/youtubeplayer.html" frameborder="0" scrolling="no" height="100%" width="350px"> </iframe>
        </div>


        <div class="footer">
            <hr>
            <img src="images/pblogo2.png" style="width:300px;padding-bottom: 20px;" />
        </div>

    </body>

</html>

<script>
    $(function() {

        var $sidebar = $("#chatsidebar"),
        $window = $(window),
        offset = $sidebar.offset()

        $window.scroll(function() {
            if ($window.scrollTop() > offset.top) {
                $sidebar.stop().animate({
                    marginTop: $window.scrollTop() - offset.top 
                });
            } else {
                $sidebar.stop().animate({
                    marginTop: 0
                });
            }
        });

    });

    function hide() {
        if (document.getElementById("chatsidebar").style.display=="none") {
            document.getElementById("chatsidebar").style.display="block";
        } else {
            document.getElementById("chatsidebar").style.display="none";
        }
    }

    function hide2() {
        if (document.getElementById("musicsidebar").style.display=="none") {
            document.getElementById("musicsidebar").style.display="block";
        } else {
            document.getElementById("musicsidebar").style.display="none";
        }
    }

    $(function() {

        var $sidebar = $("#musicsidebar"),
        $window = $(window),
        offset = $sidebar.offset()


        $window.scroll(function() {
            if ($window.scrollTop() > offset.top) {
                $sidebar.stop().animate({
                    marginTop: $window.scrollTop() - offset.top
                });
            } else {
                $sidebar.stop().animate({
                    marginTop: 0
                });
            }
        });

    });

</script>

<script type="text/javascript">
    var username = "<?php echo $owner; ?>";
			
    // JMR's Viewer Counter
    $(document).ready(function() {
        loadViewers();
        function loadViewers(){
            $.getJSON('https://api.twitch.tv/kraken/streams/'+encodeURIComponent(username)+"?callback=?", function(data) {

                if(data["stream"]!=null){
                    if(data['streams']){
                        $('#viewer_counter').html("0");
                    }else{
                        var viewer_count = data['stream']['viewers'];
                        $('#viewer_counter').html(viewer_count);
                        console.log(data);
                    }
                }else{
                    $('#viewer_counter').html("Offline");
                }
            });
        }
        setInterval(function(){
            loadViewers();
        }, 10000);
    });
</script>
