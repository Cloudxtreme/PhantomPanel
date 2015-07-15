<?php require_once('../includes/includes.php'); ?>


<?php
$result = curl_get("/web/queue.txt");

if ($result[1] == 200) {
    echo $result[0];
} else {
    echo 'Failed to get songrequest queue';
}
?>
