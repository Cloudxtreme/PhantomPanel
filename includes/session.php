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

function set_loggedin($bool) {
    global $_SESSION;
    
    if (!file_exists(__DIR__."/sessions")) {
        mkdir(__DIR__."/sessions", 0777);
    }
    
    if ($bool) {
        file_put_contents(__DIR__."/sessions/".session_id(), $_SESSION['hash']);
    } else {
        if (file_exists(__DIR__."/sessions/".session_id())) {
            unlink(__DIR__."/sessions/".session_id());
        }
    }
}

if (!isset($_SESSION['expires']) || !isset($_SESSION['iv']) || !isset($_SESSION['data'])
        || !isset($_SESSION['hash']) || strlen($_SESSION['iv']) == 0) {
    create_session();
} else {
    $k = hash_hmac($hmac_algo, session_id() . $_SESSION['expires'], $sk);

    $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");

    mcrypt_generic_init($mc, substr($k, 0, mcrypt_enc_get_key_size($mc)), $_SESSION['iv']);

    $data = mdecrypt_generic($mc, $_SESSION['data']);

    $data = rtrim($data, chr(0));

    mcrypt_generic_deinit($mc);
    mcrypt_module_close($mc);

    $hash = hash_hmac($hmac_algo, session_id().$_SESSION['expires'].$data, $k);

    if ($_SESSION['expires'] < time() || $_SESSION['hash'] != $hash) {
        create_session();
    } else {
        $session_data = json_decode($data, true);
    }
}

$dir = scandir(__DIR__."/sessions");

for ($i = 0; $i < count($dir); $i++) {
    if ($dir[$i] != "." && $dir[$i] != ".." && is_file(__DIR__."/sessions/".$dir[$i]) && filemtime(__DIR__."/sessions/".$dir[$i]) + $expire_time < time()) {
        unlink(__DIR__."/sessions/".$dir[$i]);
    }
}

if (file_exists(__DIR__."/sessions/".session_id())) {
    $data = file_get_contents(__DIR__."/sessions/".session_id());
    
    if ($session_data['ip'] != $_SERVER['REMOTE_ADDR'] || $session_data['ua'] != substr($_SERVER['HTTP_USER_AGENT'], 0, 64) || $_SESSION['hash'] != $data) {
        create_session();
        $session_data['loggedin'] = false;
    } else {
        save_session();
        set_loggedin(true);
        
        $session_data['loggedin'] = true;
    }
}

if (!isset($session_data['loggedin'])) {
    $session_data['loggedin'] = false;
}

if ($session_data['loggedin'] == false && substr($_SERVER['REQUEST_URI'], 0, strlen($login_uri)) != $login_uri) {
    header("Location: $login_url");
    die();
}

?>
