<?php

function init_curl($uri = "") {
    global $url, $baseport;
    
    if (!empty($uri) && substr($uri, 0, 1) != '/') {
        $uri = '/' . $uri;
    }
    
    $curl = curl_init($url . ':' . $baseport . $uri);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($curl, CURLOPT_TIMEOUT, 5);
    curl_setopt($curl, CURLOPT_USERAGENT, 'PhantomPanel/1.0');
    
    if (defined('CURLOPT_IPRESOLVE')) {
        curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    }
    
    return $curl;
}

function curl_put($message) {
    global $url, $baseport, $owner, $oauth;

    $curl = init_curl();
    
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    $curlpass = str_replace("oauth:", "", $oauth);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('user: ' . $owner, 'message: ' . urlencode($message), 'password: ' . $curlpass));
    $result = curl_exec($curl);
    $eno = curl_errno($curl);
    $err = curl_error($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    $eno = curl_errno($curl);
    
    curl_close($curl);

    return array($result, $status, $eno, $err);
}

function curl_get($uri) {
    global $url, $baseport, $oauth;

    $curl = init_curl($uri);
    
    $curlpass = str_replace("oauth:", "", $oauth);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('password: ' . $curlpass));
    $result = curl_exec($curl);
    $eno = curl_errno($curl);
    $err = curl_error($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    return array($result, $status, $eno, $err);
}

?>
