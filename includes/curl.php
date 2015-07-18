<?php

function curl_put($message) {
    global $url, $baseport, $owner, $oauth;

    $curl = curl_init($url . ':' . $baseport);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    $curlpass = str_replace("oauth:", "", $oauth);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('user: ' . $owner, 'message: ' . urlencode($message), 'password: ' . $curlpass));
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    return array($result, $status);
}

function curl_get($uri) {
    global $url, $baseport, $oauth;

    if (substr($uri, 0, 1) == '/') {
        $uri = substr($uri, 1);
    }
    
    $curl = curl_init($url . ':' . $baseport . '/' . $uri);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curlpass = str_replace("oauth:", "", $oauth);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('password: ' . $curlpass));
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    return array($result, $status);
}

?>