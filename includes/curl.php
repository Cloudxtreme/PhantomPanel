<?php

$message = urlencode($_POST['message']);

if(isset($_POST['message2'])) {

$message = urlencode($_POST['message2'].$_POST['message3']);

}

$curl = curl_init($url.':'.$baseport);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
$curlpass = str_replace("oauth:", "", $oauth);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('user: '.$owner, 'message: '.$message, 'password: '.$curlpass));
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);
?>
