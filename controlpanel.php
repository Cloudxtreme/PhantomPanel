<?php include( 'includes/includes.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>PB WebPanel v1.1.2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/sandstone/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
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
                    <a class="navbar-brand">PhantomBot</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Modules <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <!--<li class="divider"></li>-->
                                <li><a target="main" href="/modules/addcommand.php">Custom Commands</a>
                                </li>
                                <li><a target="main" href="/modules/pointsystem.php">Point Commands</a>
                                </li>
                                <li><a target="main" href="/modules/timesystem.php">Time Commands</a>
                                </li>
                                <li><a target="main" href="/modules/permissions.php">Group Commands</a>
                                </li>
                                <li><a target="main" href="/modules/notices.php">Notice Commands</a>
                                </li>
                                <li><a target="main" href="/modules/chatmod.php">ChatMod Commands</a>
                                </li>
                                <li><a target="main" href="/modules/follows.php">Follow Commands</a>
                                </li>
                                <li><a target="main" href="/modules/subscribers.php">Subscriber Commands</a>
                                </li>
                                <li><a target="main" href="/modules/hosting.php">Host Commands</a>
                                </li>
                                <li><a target="main" href="/modules/greeting.php">Greeting Commands</a>
                                </li>
                                <li><a target="main" href="/modules/marathon.php">Marathon Commands</a>
                                </li>
                                <li><a target="main" href="/modules/misc.php">Misc Commands</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Games <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <!--<li class="divider"></li>-->
                                <li><a target="main" href="/games/bankheist.php">BankHeist Commands</a>
                                </li>
                                <li><a target="main" href="/games/rafflesystem.php">Raffle Commands</a>
                                </li>
                                <li><a target="main" href="/games/betsystem.php">Bet Commands</a>
                                </li>
                                <li><a target="main" href="/games/polls.php">Poll Commands</a>
                                </li>
                                <li><a target="main" href="/games/bids.php">Bid Commands</a>
                                </li>
                                <li><a target="main" href="/games/roll.php">Roll Commands</a>
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Music Player<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <!--<li class="divider"></li>-->
                                <li><a target="music" href="/youtube/youtubeplayer.html">Music Player</a>
                                </li>
                                <li><a target="music" href="/youtube/blank.html">Exit Music Player</a>
                                </li>
                            </ul>
                        </li>
											 <li><a href="#" onClick=" hide();">Toggle Chat</a>
                        </li>
                    </ul>



                    <!--      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
                    <ul class="nav navbar-nav navbar-right">
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
	          Video
	        </a>
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

        <iframe class="iframe1" src="/modules/botcommands.php" frameborder="0" scrolling="no" height="100%" width="100%"></iframe>
        <iframe class="iframe2" name="main" frameborder="0" scrolling="no" height="100%" width="100%"></iframe>

    </div>
    <div id="sidebar" name="chat">
        <iframe id="chat" src="http://www.twitch.tv/<?php echo $owner ?>/chat?popout=" frameborder="0" scrolling="no" height="100%" width="350px"></iframe>

    </div>

    <div id="sidebar2" name="music">
        <iframe name="music" frameborder="0" scrolling="no" height="100%" width="100%"> </iframe>

    </div>


</body>

</html>

<script>
    $(function() {

        var $sidebar = $("#sidebar"),
            $window = $(window),
            offset = $sidebar.offset(),
            topPadding = 15;

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

<SCRIPT>
    function hide() {
        if (document.getElementById('chat').style.visibility == 'hidden') {
            document.getElementById('chat').style.visibility = 'visible';
        } else {
            document.getElementById('chat').style.visibility = 'hidden';
        }
    }
</SCRIPT>

<script>
    $(function() {

        var $sidebar = $("#sidebar2"),
            $window = $(window),
            offset = $sidebar.offset(),
            topPadding = 15;

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