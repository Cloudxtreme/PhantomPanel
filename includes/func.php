<?php

$logins = array();

function AddLogin($username, $password) {
    global $logins;
    
    if (strlen($username) < 3 || strlen($password) < 3 || array_key_exists($username, $logins)) {
        return;
    }
    
    $logins[$username] = $password;
}

function CheckLogin($username, $password) {
    global $logins;

    return isset($logins[$username]) && $logins[$username] == $password;
}

?>
