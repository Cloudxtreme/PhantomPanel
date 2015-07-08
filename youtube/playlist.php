<?php include( '../includes/includes.php'); ?>


<?php
$myfile = fopen("$botpath/web/queue.txt", "r") or die("Bot Path not set in config.php!");
echo fread($myfile,filesize("$botpath/web/queue.txt"));
fclose($myfile);
?>
