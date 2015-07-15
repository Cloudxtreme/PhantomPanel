<?php include( '../includes/includes.php'); ?>

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
                    <h3 class="panel-title"><i class="fa fa-ticket fa-2x"></i>&nbsp;&nbsp; Bank Heist</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post">
                        <button class="btn btn-sm  btn-default" name="message" value="!bankheist start">Start Bank Heist</button>
                        <button class="btn btn-sm  btn-default" name="message" value="!bankheist toggle">Toggle Bank Heist on/off</button>
                    </form>
                </div>
                <div class="panel-body">
                    <h4>BankHeist Settings:</h4>
                    <br />
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist signupminutes ">Sign Up Time</button>
                        <input id="input1" type="text" name="message3" placeholder="<minutes>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist heistminutes ">Heist Session Length</button>
                        <input id="input1" type="text" name="message3" placeholder="<minutes>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist maxbet ">Max Bet</button>
                        <input id="input1" type="text" name="message3" placeholder="<amount>" value="">
                    </form>
                </div>

                <div class="panel-body">
				<h5>Ratio Messages:</h5>
				<p>Customize messages for each %</p>
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist ratio50 ">50% Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist ratio40 ">40% Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist ratio30 ">30% Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist ratio20 ">20% Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>
                    <br />
                    <br />
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist ratio10 ">10% Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>
                </div>
                <div class="panel-body">
				<h5>Message Chance</h5>
				<p>Customize the messages for each chance percentage.</p>
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist chances50 ">50% Chances</button>
                        <input id="input1" type="text" name="message3" placeholder="<number>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist chances40 ">40% Chances</button>
                        <input id="input1" type="text" name="message3" placeholder="<number>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist chances30 ">30% Chances</button>
                        <input id="input1" type="text" name="message3" placeholder="<number>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist chances20 ">20% Chances</button>
                        <input id="input1" type="text" name="message3" placeholder="<number>" value="">
                    </form>
                    <br />
                    <br />
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist chances10 ">10% Chances</button>
                        <input id="input1" type="text" name="message3" placeholder="<number>" value="">
                    </form>
                </div>
                <div class="panel-body">
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist heistcancelled ">Banks Are Open Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>
					 <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist stringstarting ">Starting Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>
				    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist startedheist ">Started Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist stringchancesare ">Chances Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>

                </div>
                <div class="panel-body">
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist stringnumberinvolved ">Message for Players Involved</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist stringnojoin ">No Players Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>
                </div>
                <div class="panel-body">
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist entrytimeend ">Entry Time End Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist banksclosed ">Banks Closed Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist stringalldead ">Everyone Died Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>
                    <br />
                    <br />
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist affordbet ">Afford Bet Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist alreadybet ">Already Bet Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist joinedheist ">Player Join Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>
                    <br />
                    <br />
                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist enterabet ">Enter Bet Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>

                    <form action="" method="post" style="float: left; padding-right: 5px;">
                        <button class="btn btn-sm btn-default" name="message2" value="!bankheist stringsurvivorsare ">Survivors Message</button>
                        <input id="input1" type="text" name="message3" placeholder="<message>" value="">
                    </form>

                </div>


            </div>
        </div>
    </div>
    </div>
</body>

</html>