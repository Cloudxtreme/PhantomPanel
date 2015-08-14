<?php require_once(__DIR__ . '../includes/includes.php'); ?>


<?php

$result = curl_get("requests.html");

if ($result[1] == 200) {
    echo $result[0];
} else {
    echo 'Failed to get songrequest queue';
}
?>