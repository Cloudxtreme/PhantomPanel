<?php

require_once(__DIR__ . '/nocache.php');
require_once(__DIR__ . '/func.php');
require_once(__DIR__ . '/config.php');

$session_errors = "";
$debugdata = "";
$debugtrace = ">>>TRACE START<<<";
$erridx = 0;
$error_reporting_level = error_reporting();

function url_origin($s, $use_forwarded_host = false) {
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true : false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
    $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

function full_url($s, $use_forwarded_host = false) {
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}

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
    global $session_errors, $debugtrade, $erridx;

    $debugtrace .= '<br>error ' . $erridx;
    $session_errors .= "<br />" . FriendlyErrorType($errno) . " #$erridx ($errfile@$errline): $errstr";

    $erridx++;

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

global $session_data;

$debugtrace .= '<br>ini_set';

ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 1);
ini_set("session.cookie_domain", "");
ini_set("session.save_path", "");

$debugtrace .= '<br>session setup';
register_shutdown_function('session_write_close');
register_shutdown_function('save_session');
session_name($session_name);
session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);

$debugdata .= '<br><pre>cookies=' . print_r($_COOKIE, true) . '</pre><br>';

if (isset($_COOKIE[$session_name]) && strlen($_COOKIE[$session_name]) > 0) {
    $debugtrace .= '<br>session restore sid=' . $_COOKIE[$session_name];
    session_id($_COOKIE[$session_name]);
}

session_start();
$session_data = array();

$debugtrace .= '<br>session_start sid=' . session_id();

function load_session() {
    global $session_data, $_SESSION, $_SERVER, $expire_time, $sk, $iv, $hmac_algo, $session_debug, $debugdata, $debugtrace;

    $debugtrace .= '<br>load_session start';

    if (file_exists(__DIR__ . '/.sessions')) {
        $debugtrace .= '<br>load_session exists';
        $data = file_get_contents(__DIR__ . '/.sessions');

        if (strlen($data) > 0) {
            $debugtrace .= '<br>load_session hasdata';
            $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

            mcrypt_generic_init($mc, substr($sk, 0, mcrypt_enc_get_key_size($mc)), base64_decode($iv));

            $debugtrace .= '<br>load_session decrypt';
            $data = mdecrypt_generic($mc, base64_decode($data));

            $data = rtrim($data, chr(0));

            mcrypt_generic_deinit($mc);
            mcrypt_module_close($mc);

            $debugtrace .= '<br>load_session decode';
            $jdata = json_decode($data, true);

            if ($session_debug === true) {
                $debugdata .= '<br><pre>jdata=' . print_r($jdata, true) . '</pre><br>';
            }

            if (is_array($jdata)) {
                $debugtrace .= '<br>load_session isarray';
                
                if (array_key_exists(session_id(), $jdata)) {
                    $debugtrace .= '<br>load_session haskey';
                    $_SESSION = $jdata[session_id()];
                }
            }
        }
    }
}

function create_session() {
    global $session_data, $_SESSION, $_SERVER, $expire_time, $sk, $iv, $hmac_algo, $debugtrace;

    $debugtrace .= '<br>create_session start';

    $_SESSION = array();
    $session_data = array();

    session_regenerate_id(true);

    $debugtrace .= '<br>create_session newsid=' . session_id();

    $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

    $session_data['ip'] = $_SERVER['REMOTE_ADDR'];
    $session_data['ua'] = substr($_SERVER['HTTP_USER_AGENT'], 0, 64);
    $_SESSION['iv'] = base64_encode(mcrypt_create_iv(mcrypt_enc_get_iv_size($mc), MCRYPT_DEV_URANDOM));

    mcrypt_module_close($mc);

    $debugtrace .= '<br>create_session save';
    save_session();
}

function save_session() {
    global $session_data, $_SESSION, $_SERVER, $expire_time, $sk, $iv, $hmac_algo, $debugtrace;

    $debugtrace .= '<br>save_session start';

    $_SESSION['expires'] = time() + $expire_time;
    $data = json_encode($session_data);

    $k = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'], $sk);

    $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

    mcrypt_generic_init($mc, substr($k, 0, mcrypt_enc_get_key_size($mc)), base64_decode($_SESSION['iv']));

    $debugtrace .= '<br>save_session encrypt';
    $_SESSION['data'] = base64_encode(mcrypt_generic($mc, $data));

    mcrypt_generic_deinit($mc);
    mcrypt_module_close($mc);

    $debugtrace .= '<br>save_session hash';
    $hash = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'] . $data, $k);

    $_SESSION['hash'] = $hash;

    $debugtrace .= '<br>save_session loadjdata';

    $jdata = array();

    $debugtrace .= '<br>save_session lock';
    $fh = fopen(__DIR__ . '/.sessions', 'c');

    flock($fh, LOCK_EX);

    $debugtrace .= '<br>save_session loadjdata';

    if (file_exists(__DIR__ . '/.sessions')) {
        $debugtrace .= '<br>save_session loadjdata exists';
        $data = file_get_contents(__DIR__ . '/.sessions');

        if (strlen($data) > 0) {
            $debugtrace .= '<br>save_session loadjdata hasdata';
            $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

            mcrypt_generic_init($mc, substr($sk, 0, mcrypt_enc_get_key_size($mc)), base64_decode($iv));

            $debugtrace .= '<br>save_session loadjdata decrypt';
            $data = mdecrypt_generic($mc, base64_decode($data));

            $data = rtrim($data, chr(0));

            mcrypt_generic_deinit($mc);
            mcrypt_module_close($mc);

            $debugtrace .= '<br>save_session loadjdata decode';
            $jdata = json_decode($data, true);

            if (!is_array($jdata)) {
                $debugtrace .= '<br>save_session loadjdata notarray';
                $jdata = array();
            }
        }
    }

    $debugtrace .= '<br>save_session savejdata';

    $jdata[session_id()] = $_SESSION;

    $debugtrace .= '<br>save_session savejdata encode';
    $data = json_encode($jdata);

    $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

    mcrypt_generic_init($mc, substr($sk, 0, mcrypt_enc_get_key_size($mc)), base64_decode($iv));

    $debugtrace .= '<br>save_session savejdata encrypt';
    $data = base64_encode(mcrypt_generic($mc, $data));

    mcrypt_generic_deinit($mc);
    mcrypt_module_close($mc);

    $debugtrace .= '<br>save_session savejdata write';
    ftruncate($fh, 0);
    fwrite($fh, $data);
    fflush($fh);
    
    $debugtrace .= '<br>save_session unlock';
    flock($fh, LOCK_UN);
    fclose($fh);
}

function set_loggedin($bool) {
    global $session_data, $_SESSION, $_SERVER, $expire_time, $sk, $iv, $hmac_algo, $debugtrace;

    $debugtrace .= '<br>set_loggedin val=' . ($bool ? 'true' : 'false');

    $session_data['loggedin'] = $bool;

    $debugtrace .= '<br>set_loggedin save';
    save_session();
}

$debugtrace .= '<br>load';
load_session();

$debugtrace .= '<br>post-load <pre>session=' . print_r($_SESSION, true) . '</pre>';

if (!isset($_SESSION['expires']) || !isset($_SESSION['iv']) || !isset($_SESSION['data']) || !isset($_SESSION['hash']) || strlen($_SESSION['iv']) == 0) {
    $debugdata .= '<br>>>cs1 expire=' . (isset($_SESSION['expires']) ? 't' : 'f') . ' iv=' . (isset($_SESSION['iv']) ? 't' : 'f')
            . ' data=' . (isset($_SESSION['data']) ? 't' : 'f') . ' hash=' . (isset($_SESSION['hash']) ? 't' : 'f') . ' ivlen=' . (isset($_SESSION['iv']) ? strlen($_SESSION['iv']) : '0');

    $debugtrace .= '<br>check1 createonfail';
    create_session();
} else {
    $debugtrace .= '<br>check1 success';
    $k = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'], $sk);

    $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

    mcrypt_generic_init($mc, substr($k, 0, mcrypt_enc_get_key_size($mc)), base64_decode($_SESSION['iv']));

    $debugtrace .= '<br>check2 decrypt';
    $data = mdecrypt_generic($mc, base64_decode($_SESSION['data']));

    $data = rtrim($data, chr(0));

    mcrypt_generic_deinit($mc);
    mcrypt_module_close($mc);

    $debugtrace .= '<br>check2 hash';
    $hash = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'] . $data, $k);

    if ($_SESSION['expires'] < time() || $_SESSION['hash'] != $hash) {
        $debugdata .= '<br>>>cs2 expire=' . ($_SESSION['expires'] < time() ? 't' : 'f') . ' hash=' . ($_SESSION['hash'] != $hash ? 't' : 'f') . '(expirecomp=' . $_SESSION['expires']
                . ' vs ' . time() . ' | hashcomp=' . $_SESSION['hash'] . ' vs ' . $hash . ' )';
                
        $debugtrace .= '<br>check2 createonfail';
        create_session();
    } else {
        $debugtrace .= '<br>check2 success';
        $session_data = json_decode($data, true);
    }
}

if ($session_data['ip'] != $_SERVER['REMOTE_ADDR'] || $session_data['ua'] != substr($_SERVER['HTTP_USER_AGENT'], 0, 64)) {
    $debugdata .= '<br>>>cs3 ip=' . ($session_data['ip'] != $_SERVER['REMOTE_ADDR'] ? 't' : 'f')
            . ' ua=' . ($session_data['ua'] != substr($_SERVER['HTTP_USER_AGENT'], 0, 64) ? 't' : 'f')
            . '(ipcomp=' . $session_data['ip'] . ' vs ' . $_SERVER['REMOTE_ADDR'] . ' | uacomp='
            . $session_data['ua'] . ' vs ' . substr($_SERVER['HTTP_USER_AGENT'], 0, 64) . ' )';
            
    $debugtrace .= '<br>check3 createonfail';
    create_session();
} else {
    $debugtrace .= '<br>check3 success';
    save_session();
}

if (strlen($debugdata) > 0) {
    $debugdata = '>>>Session Debug Start<<<<br><br>sessionname=' . $session_name . '<br>lifetime=' . $lifetime . '<br>path=' . $path . '<br>domain=' . $domain
            . '<br>secure=' . ($secure ? 't' : 'f') . '<br>httponly=' . ($httponly ? 't' : 'f') . '<br>hmacalgo=' . $hmac_algo . '<br>expire=' . $expire_time
            . '<br>sk=' . $sk . '<br>loginurl=' . $login_uri . '<br>uri=' . full_url($_SERVER) . '<br>sid=' . session_id() . '<br><br><pre>session=' . print_r($_SESSION, true) . '</pre><br><br><pre>sessiondata=' . print_r($session_data, true)
            . '</pre><br>' . $debugdata;
}

$debugtrace .= '<br>>>>TRACE END<<<';

if (!isset($session_data['loggedin'])) {
    $debugdata .= '<br>>>notloggedin';
    $session_data['loggedin'] = false;
}

if ($session_data['loggedin'] == false && substr($_SERVER['REQUEST_URI'], 0, strlen($login_uri)) != $login_uri) {
    $debugdata .= '<br>>>redirect (uricomp=' . substr($_SERVER['REQUEST_URI'], 0, strlen($login_uri)) . ' vs ' . $login_uri . ')';

    if ($session_debug === true) {
        error_reporting($error_reporting_level);
        restore_error_handler();

        die($debugdata . '<br>' . $session_errors . '<br><br>' . $debugtrace . '<br>>>>Session Debug End<<<');
    }

    header("Location: $login_url");
    die();
}

if ($session_debug === true) {
    error_reporting($error_reporting_level);
    restore_error_handler();

    echo($debugdata . '<br>' . $session_errors . '<br><br>' . $debugtrace . '<br>>>>Session Debug End<<<');

    if (substr($_SERVER['REQUEST_URI'], 0, strlen($login_uri)) != $login_uri) {
        die();
    }
}
?>
