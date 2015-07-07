<?php

session_start();

 
if ($_SESSION['loggedin'] != 1) { 
        header("Location: index.php");
        exit;
}

?>
