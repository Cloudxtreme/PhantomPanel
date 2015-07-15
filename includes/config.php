<?php

require_once('func.php');

/*
 * Security settings
 */

//Session timeout, in seconds (after this time of not having the page open, you are automatically logged out)
$expire_time = 6 * 60 * 60;

/*
 * User Logins
 */

//To add additional logins, just make a copy of the AddLogin line below and set the username/password for the other users
//Username and password must each be at least 3 characters. Can only use a particular username once. Case-Sensitive
AddLogin('username', 'password');

/*
 * Bot Configuration
 */

//The baseport of the bot (HTTP Server Port)
$baseport = 25000;
//The bot owner
$owner = 'channel owner';
//The IP address or url to the bot itself (not this control panel)
$url = 'url to your bot';
//The oauth key used by the bot to login to chat (used so only this script can access the bot)
$oauth = 'your oauth key';

?>