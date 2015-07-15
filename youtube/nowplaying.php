<?php include( '../includes/includes.php'); ?>


<?php
$myfile = fopen("localhost/addons/youtubePlayer/currentsong.txt", "r") or die("currentsong.txt is missing!");
echo fread($myfile,filesize("localhost/addons/youtubePlayer/currentsong.txt"));
fclose($myfile);
?>

