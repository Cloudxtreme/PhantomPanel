<?php

require_once('includes/nocache.php');
require_once('includes/session.php');
require_once('includes/config.php');
require_once('includes/func.php');

create_session();
$session_data['loggedin'] = false;

header("Location: $login_url");
die();

?>