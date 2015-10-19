<?php
require_once(__DIR__ . '/../includes/includes.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Phantombot Youtube Player</title>
        <script type="text/javascript" src="../js/app.js"></script>
        

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />

        <link rel="stylesheet" type="text/css" href="../css/youtube.css">
        <?php
        if (isset($_GET['hd']) && $_GET['hd'] == "yes") {
            echo '<script type="text/javascript">usehd = true;</script>';
        }
        ?>
    </head>

    <body>
        <div id="player"></div>
    </body>
</html>
