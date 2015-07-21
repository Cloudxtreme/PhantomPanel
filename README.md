# PhantomBot
PhantomPanel is a web panel for the twitch.tv chat bot PhantomBot.


REQUIREMENTS:
1. Must have dedicated web server (nginx, apache, lighttpd etc), these files cannot be run in the bot's web server.
2. Dedicated web server must have PHP installed and enabled.
3. PHP must have curl, mcrypt, csprng enabled.

This is the start of implementing a web-based control panel for the bot. Thanks to crunchprank for his starting work on the previous interface test. 
If at all possible, we would like any contributors to add extra fields to the panel as needed by the bot per different commands, 
and attach them to this thread. 

Steps:
1. Extract the files to your web server.
2. Open includes/config.php
3. Fill in the variables as instructed by the comments

WARNING: Do not erase any 'quotes' or semicolons (;) otherwise the script will error out

The $url variable is the IP address or url of the bot, NOT the control panel

Then navigate to the the index.php you extracted to your web server, via your browser. 
Login. Test the buttons. check the bot console periodically to make sure the commands show up and no odd errors occur. If they do please report them.

MUSIC PLAYER:
To enable the queue list you must first follow these steps.
Steps:
1. Find the path to your bot (On linux, cd to the bot folder, then run the command pwd)
2. In chat, run the following command: !song storepath web/
3. In chat, run the following command: !song storing
    Make sure the bot responds that playlists will be exported
4. Toggle !song titles for html output.
