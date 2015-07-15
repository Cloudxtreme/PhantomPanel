<?php include( '../includes/includes.php'); ?>


<?php
$myfile = fopen("localhost/addons/youtubePlayer/queue.txt", "r") or die("queue.txt is missing!");
echo fread($myfile,filesize("localhost/addons/youtubePlayer/queue.txt"));
fclose($myfile);
?>
