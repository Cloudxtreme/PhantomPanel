<?php

require_once('includes/includes.php');

set_loggedin(false);
create_session();
$session_data['loggedin'] = false;

header("Location: $login_url");
die();
?>