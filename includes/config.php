<?php

require_once('func.php');

/*
 * Security settings
 * 
 * NEVER REVEAL THE $sk SETTING OR SECURITY IS LOST
 */

//Session timeout, in seconds (after this time of not having the page open, you are automatically logged out)
$expire_time = /*expire_time_start*/6 * 60 * 60/*expire_time_end*/;
$session_name = /*session_name_start*/'phantompanelsession12345'/*session_name_end*/;
$domain = /*domain_start*/'localhost'/*domain_end*/;
$sk = /*sk_start*/'invalidsk'/*sk_end*/;
$login_uri = /*login_uri_start*/'/index.php'/*login_uri_end*/;

/*
 * User Logins
 */

//To add additional logins, just make a copy of the AddLogin line below (remove the // from the front) and set the username/password
//for the other users Username and password must each be at least 3 characters. Can only use a particular username once. Case-Sensitive
//AddLogin('username', 'password');
/*AddLogin_start*/
/*AddLogin_end*/

/*
 * Bot Configuration
 */

//The baseport of the bot (HTTP Server Port)
$baseport = /*baseport_start*/25000/*baseport_end*/;
//The bot owner
$owner = /*owner_start*/'channel owner'/*owner_end*/;
//The IP address or url to the bot server itself (not this control panel)
$url = /*url_start*/'url to your bot'/*url_end*/;
//The oauth key used by the bot to login to chat (used so only this script can access the bot)
$oauth = /*oauth_start*/'your oauth key'/*oauth_end*/;

?>