<?php require_once(__DIR__ . '../includes/includes.php'); ?>

<div style="width: 100%;display: block;float: left;height: 20px;">
<?php

$result = curl_get("/addons/youtubePlayer/currentsong.txt");

if ($result[1] == 200) {
    echo $result[0];
} else {
    echo 'Failed to get current song';
}
?>
</div>
