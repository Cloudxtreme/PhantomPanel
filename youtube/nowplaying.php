<?php require_once('../includes/includes.php'); ?>


<?php
$myfile = fopen("$botpath/addons/youtubePlayer/currentsong.txt", "r") or die("Bot Path not set in config.php!");
echo fread($myfile,filesize("$botpath/addons/youtubePlayer/currentsong.txt"));
fclose($myfile);
?>

