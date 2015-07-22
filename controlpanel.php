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
        <title>PhantomBot Control Panel v1.2.0</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/sandstone/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />

        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>


    <body>
        <div class="container">
            <br>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand">PhantomBot Control Panel <br /> <span style="font-size:12px;padding-left: 10px;color: gray;">version 1.2.0</span></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Commands <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <!--<li class="divider"></li>-->
                                    <li><a target="main" href="modules/addcommand.php">Custom Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/pointsystem.php">Point Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/timesystem.php">Time Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/permissions.php">Group Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/notices.php">Notice Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/chatmod.php">ChatMod Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/follows.php">Follow Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/subscribers.php">Subscriber Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/hosting.php">Host Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/greeting.php">Greeting Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/marathon.php">Marathon Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/quote.php">Quote Commands</a>
                                    </li>
                                    <li><a target="main" href="modules/misc.php">Misc Commands</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Games/Other <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <!--<li class="divider"></li>-->
                                    <li><a target="main" href="games/bankheist.php">BankHeist Commands</a>
                                    </li>
                                    <li><a target="main" href="games/rafflesystem.php">Raffle Commands</a>
                                    </li>
                                    <li><a target="main" href="games/betsystem.php">Bet Commands</a>
                                    </li>
                                    <li><a target="main" href="games/polls.php">Poll Commands</a>
                                    </li>
                                    <li><a target="main" href="games/bids.php">Bid Commands</a>
                                    </li>
                                    <li><a target="main" href="games/slot.php">Slot Commands</a>
                                    </li>
                                    <li><a target="main" href="games/roll.php">Roll Commands</a>
                                    </li>
                                    <li><a target="main" href="http://www.challonge.com">Challonge</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a onClick=" hide2();">Toggle Music</a>
                            </li>
                            <li><a href="#" onClick=" hide();">Toggle Chat</a>
                            </li>
                            <li><a href="logout.php">logout</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Donate <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <!--<li class="divider"></li>-->
                                    <li><a href="https://www.twitchalerts.com/donate/phantomindex">PhantomIndex</a>
                                    </li>
                                    <li><a href="https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=LyzZlnqqcjmuYkFXcco71-2CL8E0uWEW9eR7WhwvVUS1mJ7U9kynCSqrW38&dispatch=5885d80a13c0db1f8e263663d3faee8de6030e9239419d79c3f52f70a3ed57ec">GloriousEggRoll</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="http://www.phantombot.net">Forums</a>
                            </li>
                            <li>
                                <form action="" method="post" style="margin-top: 14px;">
                                    <button id="killbot" class="btn btn-sm  btn-danger" name="message" value="!d !exit">Shut Down</button>
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
										<i class="fa fa-twitch "></i>&nbsp;&nbsp;Video Stream
									</a>  
									<span id="followers" style="color:#a68ed2;float:right;"><img src="images/followers.png" style="height: 15px;padding-left: 5px;padding-right: 5px;display:inline;" />	
									<!-- FOLLOWER/VIEWER COUNT -->
									<?php		
										$json = file_get_contents('https://api.twitch.tv/kraken/channels/'.$owner.'/follows.json?limit=100');
										$obj = json_decode($json);
										echo $obj->_total;
									?>
									</span>
									<span id="viewers" style="float:right;padding-right: 10px;"><img src="images/viewers.png" style="height: 20px;padding-left: 5px;padding-right: 5px;display:inline;" />			
										<div id="viewer_counter" style="color:#a68ed2;display:inline;">0</div>
									</span>
								</h4>
									</div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body" id="dashboard">
                                    <iframe id="video" src="http://www.twitch.tv/<?php echo $owner ?>/embed" frameborder="0" scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <iframe class="iframe1" src="modules/botcommands.php" frameborder="0" scrolling="no" height="100%" width="100%"></iframe>
            <iframe class="iframe2" name="main" frameborder="0" scrolling="no" height="100%" width="100%"></iframe>

        </div>
        <div id="chatsidebar" name="chat">
            <iframe id="chat" src="http://www.twitch.tv/<?php echo $owner ?>/chat?popout=" frameborder="0" scrolling="no" height="100%"></iframe>
        </div>

        <div id="musicsidebar">
            <iframe name="music" src="youtube/youtubeplayer.html" frameborder="0" scrolling="no" height="100%" width="350px"> </iframe>
        </div>


    </body>

</html>

<script>
    $(function() {

        var $sidebar = $("#chatsidebar"),
        $window = $(window),
        offset = $sidebar.offset(),
        topPadding = 0;

        $window.scroll(function() {
            if ($window.scrollTop() > offset.top) {
                $sidebar.stop().animate({
                    marginTop: $window.scrollTop() - offset.top + topPadding
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
        offset = $sidebar.offset(),
        topPadding = 0;

        $window.scroll(function() {
            if ($window.scrollTop() > offset.top) {
                $sidebar.stop().animate({
                    marginTop: $window.scrollTop() - offset.top + topPadding
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
					$('#viewer_counter').html("0");
			}
			});
		}
			setInterval(function(){
				loadViewers();
			}, 10000);
		});
</script>