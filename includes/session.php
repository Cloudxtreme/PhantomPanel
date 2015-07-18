<?php

require_once('nocache.php');
require_once('func.php');
require_once('config.php');

$lifetime = 0;
$path = "/";
$secure = isset($_SERVER['HTTPS']);
$httponly = true;

$hmac_algo = "sha256";

$login_url = $login_uri;

session_register_shutdown();
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
    $_SESSION['iv'] = mcrypt_create_iv(mcrypt_enc_get_iv_size($mc), MCRYPT_DEV_URANDOM);

    mcrypt_module_close($mc);

    save_session();
}

function save_session() {
    global $session_data, $_SESSION, $_SERVER, $expire_time, $sk, $hmac_algo;

    $_SESSION['expires'] = time() + $expire_time;
    $data = json_encode($session_data);

    $k = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'], $sk);

    $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

    mcrypt_generic_init($mc, substr($k, 0, mcrypt_enc_get_key_size($mc)), $_SESSION['iv']);

    $_SESSION['data'] = mcrypt_generic($mc, $data);

    mcrypt_generic_deinit($mc);
    mcrypt_module_close($mc);

    $hash = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'] . $data, $k);

    $_SESSION['hash'] = $hash;
}

if (!isset($_SESSION['expires']) || !isset($_SESSION['iv']) || !isset($_SESSION['data'])
        || !isset($_SESSION['hash']) || strlen($_SESSION['iv']) == 0) {
    create_session();
} else {
    $k = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'], $sk);

    $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

    mcrypt_generic_init($mc, substr($k, 0, mcrypt_enc_get_key_size($mc)), $_SESSION['iv']);

    $data = mdecrypt_generic($mc, $_SESSION['data']);

    if (ord(substr($data, -1)) == 0) {
        $data = substr($data, 0, -1);
    }

    mcrypt_generic_deinit($mc);
    mcrypt_module_close($mc);

    //$hash = hash_hmac($hmac_algo, session_id().$_SESSION['expires'].$data, $k);

    if ($_SESSION['expires'] < time() /* || $_SESSION['hash'] != $hash */) {
        create_session();
    } else {
        $session_data = json_decode($data, true);
    }
}

if ($session_data['isloggedin'] == "yes") {
    $session_data['loggedin'] = true;
}

if ($session_data['ip'] != $_SERVER['REMOTE_ADDR'] || $session_data['ua'] != substr($_SERVER['HTTP_USER_AGENT'], 0, 64)) {
    create_session();
    $session_data['loggedin'] = false;
}

if (!isset($session_data['loggedin'])) {
    $session_data['loggedin'] = false;
}
if (substr($_SERVER['REQUEST_URI'], 0, strlen($login_uri)) != $login_uri) { die('<pre>'.print_r($_SESSION, true).print_r($session_data, true).'</pre>'); }
if ($session_data['loggedin'] == false && substr($_SERVER['REQUEST_URI'], 0, strlen($login_uri)) != $login_uri) {
    header("Location: $login_url");
    die();
}

?>
