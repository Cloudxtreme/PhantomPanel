<?php

require_once(__DIR__ . '/nocache.php');
require_once(__DIR__ . '/func.php');
require_once(__DIR__ . '/config.php');

$session_errors = "";
$error_reporting_level = error_reporting();

function FriendlyErrorType($type) {
    switch ($type) {
        case E_ERROR:
            return 'E_ERROR';
        case E_WARNING:
            return 'E_WARNING';
        case E_PARSE:
            return 'E_PARSE';
        case E_NOTICE:
            return 'E_NOTICE';
        case E_CORE_ERROR:
            return 'E_CORE_ERROR';
        case E_CORE_WARNING:
            return 'E_CORE_WARNING';
        case E_COMPILE_ERROR:
            return 'E_COMPILE_ERROR';
        case E_COMPILE_WARNING:
            return 'E_COMPILE_WARNING';
        case E_USER_ERROR:
            return 'E_USER_ERROR';
        case E_USER_WARNING:
            return 'E_USER_WARNING';
        case E_USER_NOTICE:
            return 'E_USER_NOTICE';
        case E_STRICT:
            return 'E_STRICT';
        case E_RECOVERABLE_ERROR:
            return 'E_RECOVERABLE_ERROR';
        case E_DEPRECATED:
            return 'E_DEPRECATED';
        case E_USER_DEPRECATED:
            return 'E_USER_DEPRECATED';
    }

    return "";
}

function session_error_handler($errno, $errstr, $errfile, $errline) {
    global $session_errors;

    $session_errors .= "<br />" . FriendlyErrorType($errno) . " ($errfile#$errline): $errstr";

    return false;
}

if ($session_debug === true) {
    set_error_handler("session_error_handler");
    error_reporting(E_ALL);
}

$lifetime = 0;
$path = "/";
$secure = isset($_SERVER['HTTPS']);
$httponly = true;

$hmac_algo = "sha256";

$login_url = $login_uri;

$debugdata = "";

global $session_data;

ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 1);
ini_set("session.cookie_domain", "");
ini_set("session.save_path", "");

register_shutdown_function('session_write_close');
session_name($session_name);
session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);
session_start();
$session_data = array();

function create_session() {
    global $session_data, $_SESSION, $_SERVER, $expire_time, $sk, $hmac_algo;

    $_SESSION = array();
    $session_data = array();

    session_regenerate_id(true);

    $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

    $session_data['ip'] = $_SERVER['REMOTE_ADDR'];
    $session_data['ua'] = substr($_SERVER['HTTP_USER_AGENT'], 0, 64);
    $_SESSION['iv'] = base64_encode(mcrypt_create_iv(mcrypt_enc_get_iv_size($mc), MCRYPT_DEV_URANDOM));

    mcrypt_module_close($mc);

    save_session();
}

function save_session() {
    global $session_data, $_SESSION, $_SERVER, $expire_time, $sk, $hmac_algo;

    $_SESSION['expires'] = time() + $expire_time;
    $data = json_encode($session_data);

    $k = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'], $sk);

    $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

    mcrypt_generic_init($mc, substr($k, 0, mcrypt_enc_get_key_size($mc)), base64_decode($_SESSION['iv']));

    $_SESSION['data'] = base64_encode(mcrypt_generic($mc, $data));

    mcrypt_generic_deinit($mc);
    mcrypt_module_close($mc);

    $hash = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'] . $data, $k);

    $_SESSION['hash'] = $hash;
}

function set_loggedin($bool) {
    global $session_data, $_SESSION, $_SERVER, $expire_time, $sk, $hmac_algo;

    $session_data['loggedin'] = $bool;

    save_session();
}

if (!isset($_SESSION['expires']) || !isset($_SESSION['iv']) || !isset($_SESSION['data']) || !isset($_SESSION['hash']) || strlen($_SESSION['iv']) == 0) {
    $debugdata .= '<br>>>cs1 ' . (isset($_SESSION['expires']) ? 't' : 'f') . (isset($_SESSION['iv']) ? 't' : 'f')
            . (isset($_SESSION['data']) ? 't' : 'f') . (isset($_SESSION['hash']) ? 't' : 'f') . ' ' . (isset($_SESSION['iv']) ? strlen($_SESSION['iv']) : '0');
    create_session();
} else {
    $k = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'], $sk);

    $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

    mcrypt_generic_init($mc, substr($k, 0, mcrypt_enc_get_key_size($mc)), base64_decode($_SESSION['iv']));

    $data = mdecrypt_generic($mc, base64_decode($_SESSION['data']));

    $data = rtrim($data, chr(0));

    mcrypt_generic_deinit($mc);
    mcrypt_module_close($mc);

    $hash = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'] . $data, $k);

    if ($_SESSION['expires'] < time() || $_SESSION['hash'] != $hash) {
        $debugdata .= '<br>>>cs2 ' . ($_SESSION['expires'] < time() ? 't' : 'f') . ($_SESSION['hash'] != $hash ? 't' : 'f') . '(' . $_SESSION['expires']
                . ' vs ' . time() . ' | ' . $_SESSION['hash'] . ' vs ' . $hash . ' )';
        create_session();
    } else {
        $session_data = json_decode($data, true);
    }
}

if ($session_data['ip'] != $_SERVER['REMOTE_ADDR'] || $session_data['ua'] != substr($_SERVER['HTTP_USER_AGENT'], 0, 64)) {
    $debugdata .= '<br>>>cs3 ' . ($session_data['ip'] != $_SERVER['REMOTE_ADDR'] ? 't' : 'f')
            . ($session_data['ua'] != substr($_SERVER['HTTP_USER_AGENT'], 0, 64) ? 't' : 'f')
            . '(' . $session_data['ip'] . ' vs ' . $_SERVER['REMOTE_ADDR'] . ' | '
            . $session_data['ua'] . ' vs ' . substr($_SERVER['HTTP_USER_AGENT'], 0, 64) . ' )';
    create_session();
} else {
    save_session();
}

if (strlen($debugdata) > 0) {
    $debugdata = '>>>Session Debug Start<<<<br>sn=' . $session_name . '<br>lt=' . $lifetime . '<br>p=' . $path . '<br>dn=' . $domain
            . '<br>s=' . ($secure ? 't' : 'f') . '<br>ho=' . ($httponly ? 't' : 'f') . '<br>ha=' . $hmac_algo . '<br>et=' . $expire_time
            . '<br>sk=' . $sk . '<br>lu=' . $login_uri . '<br><br>' . print_r($_SESSION, true) . '<br><br>' . print_r($session_data, true)
            . '<br>' . $debugdata;
}

if (!isset($session_data['loggedin'])) {
    $debugdata .= '<br>>>nli';
    $session_data['loggedin'] = false;
}

if ($session_data['loggedin'] == false && substr($_SERVER['REQUEST_URI'], 0, strlen($login_uri)) != $login_uri) {
    $debugdata .= '<br>>>rdr (' . substr($_SERVER['REQUEST_URI'], 0, strlen($login_uri)) . ' vs ' . $login_uri . ')';

    if ($session_debug === true) {
        error_reporting($error_reporting_level);
        restore_error_handler();

        die($debugdata . $session_errors);
    }

    header("Location: $login_url");
    die();
}

if ($session_debug === true) {
    error_reporting($error_reporting_level);
    restore_error_handler();

    echo($debugdata . $session_errors);
}
?>
