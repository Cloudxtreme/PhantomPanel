<?php

if (include('autoconfig.php') === false) {
    $r = random_int(10000, 99999);
    
    $sk = '';
    
    for ($i = 0; $i < 36; $i++) {
        $n = random_int(1, 2);
        
        if ($n == 1) {
            $sk .= chr(random_int(97, 122));
        } else {
            $sk .= random_int(0, 9);
        }
    }
    
    $uri = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'));
    
    if (substr($uri, -1) != '/') {
        $uri .= '/';
    }
    
    $uri .= 'index.php';
    
    file_put_contents(__DIR__.'/autoconfig.php', '<?php $session_name = "phantompanelsession'.$r.'"; $domain = "'.$_SERVER['HTTP_HOST'].'"; $sk = "'.$sk.'"; $login_uri = "'.$uri.'"; ?>');
}

require_once('autoconfig.php');

if (!isset($logins)) {
    $logins = array();
}

function AddLogin($username, $password) {
    global $logins;
    
    if (strlen($username) < 3 || strlen($password) < 3 || array_key_exists($username, $logins)) {
        return;
    }
    
    array_merge($logins, array($username => $password));
}

function CheckLogin($username, $password) {
    global $logins;
    
    return isset($logins[$username]) && $logins[$username] === $password;
}

?>
