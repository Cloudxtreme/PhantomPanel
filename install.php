<?php
$step = 1;

if (isset($_GET['step'])) {
    $step = intval($_GET['step']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>PhantomBot</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/sandstone/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>

    <body>
        <div class="container" style="margin-top:5%">
            <div class="col-md-3 col-md-offset-4">
                <div class="panel member_signin">
                    <div class="panel-body">
                        <div class="fa_user">
                            <img src="http://i.imgur.com/a0h0zM5.png" />
                        </div>
                        <h5>PhantomPanel Install</h5>
                        <?php
                        if ($step == 1) {
                            ?>
                            <h6>Pre-Requisite Check</h6>
                            <?php
                            if (!defined('PHP_VERSION_ID')) {
                                ?>
                                <div class="error">
                                    You must have PHP version 5.2.7 or later
                                </div>
                                <?php
                            } else if (!function_exists('curl_init')) {
                                ?>
                                <div class="error">
                                    You must have cURL for PHP installed and enabled
                                </div>
                                <?php
                            } else if (!function_exists("mcrypt_generic")) {
                                ?>
                                <div class="error">
                                    You must have Mcrypt for PHP installed and enabled
                                </div>
                                <?php
                            } else {
                                ?>
                                <form action="?step=2" method="post" class="installform">
                                    <div class="success">
                                        Success! Pre-requisites met<br />
                                        Before continuing, please make sure the bot is running and your server firewall will allow connections from this website
                                    </div>
                                    <button type="submit" class="btn btn-default">NEXT</button>
                                </form>
                                <?php
                            }
                        } else if ($step == 2) {
                            ?>
                            <h6>Write Check</h6>
                            <?php
                            if (!is_writable(__DIR__ . '/includes/config.php') && !chmod(__DIR__ . '/includes/config.php', 0777)) {
                                ?>
                                <form action="?step=2" method="post" class="installform">
                                    <div class="error">
                                        Unable to change permissions on config file. Please change the permissions of <strong>includes/config.php</strong> 
                                        to allow writing by all (on linux this is <em>chmod 0777 includes/config.php</em>)
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <?php
                            } else {
                                ?>
                                <form action="?step=3" method="post" class="installform">
                                    <div class="success">
                                        Success! Config file is writable
                                    </div>
                                    <button type="submit" class="btn btn-default">NEXT</button>
                                </form>
                                <?php
                            }
                        } else if ($step == 3) {
                            ?>
                            <h6>Security Settings</h6>
                            <form action="?step=4" method="post" class="installform">
                                <div class="form-group">
                                    <label class="sr-only">Session expire time, in hours</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               value="6" name="expire_time"
                                               onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">NEXT</button>
                            </form>
                            <?php
                        } else if ($step == 4) {
                            $data = file_get_contents(__DIR__ . '/includes/config.php') or print('<div class="error">Failed to read config data</div>');

                            $expire_time_val = 6;

                            if (isset($_POST['expire_time']) && is_numeric($_POST['expire_time']) && intval($_POST['expire_time']) > 0) {
                                $expire_time_val = intval($_POST['expire_time']);
                            }

                            $r = mt_rand(10000, 99999);

                            $sk = '';

                            for ($i = 0; $i < 36; $i++) {
                                $n = mt_rand(1, 2);

                                if ($n == 1) {
                                    $sk .= chr(mt_rand(97, 122));
                                } else {
                                    $sk .= mt_rand(0, 9);
                                }
                            }

                            $uri = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'));

                            if (substr($uri, -1) != '/') {
                                $uri .= '/';
                            }

                            $uri .= 'index.php';

                            $data = substr($data, 0, strpos($data, '/*expire_time_start*/')) . $expire_time_val . ' * 60 * 60' . substr($data, strpos($data, '/*expire_time_end*/'));
                            $data = substr($data, 0, strpos($data, '/*session_name_start*/')) . '\'phantompanelsession' . $r . '\'' . substr($data, strpos($data, '/*session_name_end*/'));
                            $data = substr($data, 0, strpos($data, '/*domain_start*/')) . '\'' . $_SERVER['HTTP_HOST'] . '\'' . substr($data, strpos($data, '/*domain_end*/'));
                            $data = substr($data, 0, strpos($data, '/*sk_start*/')) . '\'' . $sk . '\'' . substr($data, strpos($data, '/*sk_end*/'));
                            $data = substr($data, 0, strpos($data, '/*login_uri_start*/')) . '\'' . $uri . '\'' . substr($data, strpos($data, '/*login_uri_end*/'));

                            file_put_contents(__DIR__ . '/includes/config.php', $data) or print('<div class="error">Failed to write config data</div>');
                            ?>
                            <script type="text/javascript">
                                var lastlevel = 0;
                                function addinput(level) {
                                    if (lastlevel < level) {
                                        lastlevel = level;
                                                                        
                                        document.getElementById('logins').innerHTML += '<div class="input-group">'
                                            + '<input type="text" class="form-control"'
                                            + 'placeholder="Username" name="username[]"'
                                            + 'onfocus="addinput(' + (level + 1) + ');"> '
                                            + '<input type="password" class="form-control"'
                                            + 'placeholder="Password" name="password[]">'
                                            + '</div>';
                                    }
                                }
                            </script>
                            <h6>Create Logins</h6>
                            <div><em>All usernames must be unique. All usernames and passwords are case sensitive</em></div>
                            <form action="?step=5" method="post" class="installform">
                                <div class="form-group" id="logins">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               placeholder="Username" name="username[]"
                                               onfocus="addinput(1);"> 
                                        <input type="password" class="form-control"
                                               placeholder="Password" name="password[]">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">NEXT</button>
                            </form>
                            <?php
                        } else if ($step == 5) {
                            $data = file_get_contents(__DIR__ . '/includes/config.php') or print('<div class="error">Failed to read config data</div>');

                            $newline = "\n";

                            if (strpos($data, "\r\n") !== false) {
                                $newline = "\r\n";
                            } else if (strpos($data, "\r") !== false) {
                                $newline = "\r";
                            }

                            $logindata = "";
                            $users = array();
                            $badusers = false;

                            for ($i = 0; $i < cout($_POST['username']); $i++) {
                                if (!in_array($_POST['username'][$i], $users)) {
                                    $logindata .= $newline . 'AddLogin(\'' . $_POST['username'][$i] . '\', \'' . $_POST['password'][$i] . '\');';
                                    $users[] = $_POST['username'][$i];
                                } else {
                                    $badusers = true;
                                }
                            }

                            $data = substr($data, 0, strpos($data, '/*AddLogin_start*/')) . $logindata . substr($data, strpos($data, '/*AddLogin_end*/'));

                            file_put_contents(__DIR__ . '/includes/config.php', $data) or print('<div class="error">Failed to write config data</div>');

                            if ($badusers) {
                                ?>
                                <div class="warning">Some usernames were not added due to being duplicates</div>
                                <?php
                            }
                            ?>
                            <h6>Bot Settings</h6>
                            <form action="?step=6" method="post" class="installform">
                                <div class="form-group">
                                    <label class="sr-only">Bot baseport setting (HTTP server port)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               value="25000" name="baseport"
                                               onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Bot owner setting</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               placeholder="owner" name="owner">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Bot IP address or hostname</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               placeholder="IP address or hostname of the bot" name="url">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Bot chat oauth setting</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               placeholder="oauth (not apioauth) of bot" name="oauth">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">NEXT</button>
                            </form>
                            <?php
                        } else if ($step == 6) {
                            $data = file_get_contents(__DIR__ . '/includes/config.php') or print('<div class="error">Failed to read config data</div>');

                            $baseport_val = 25000;

                            if (isset($_POST['baseport']) && is_numeric($_POST['baseport']) && intval($_POST['baseport']) > 0) {
                                $baseport_val = intval($_POST['baseport']);
                            }

                            $data = substr($data, 0, strpos($data, '/*baseport_start*/')) . $baseport_val . substr($data, strpos($data, '/*baseport_end*/'));
                            $data = substr($data, 0, strpos($data, '/*owner_start*/')) . '\'' . $_POST['owner'] . '\'' . substr($data, strpos($data, '/*owner_end*/'));
                            $data = substr($data, 0, strpos($data, '/*url_start*/')) . '\'' . $_POST['url'] . '\'' . substr($data, strpos($data, '/*url_end*/'));
                            $data = substr($data, 0, strpos($data, '/*oauth_start*/')) . '\'' . $_POST['oauth'] . '\'' . substr($data, strpos($data, '/*oauth_end*/'));

                            file_put_contents(__DIR__ . '/includes/config.php', $data) or print('<div class="error">Failed to write config data</div>');

                            require_once(__DIR__ . '/includes/config.php');
                            require_once(__DIR__ . '/includes/curl.php');


                            $result = curl_get('/inistore/init.ini');

                            if ($result[1] == 200) {
                                ?>
                                <form action="?step=7" method="post" class="installform">
                                    <div class="success">
                                        Success! Config file written and bot can be contacted
                                    </div>
                                    <button type="submit" class="btn btn-default">NEXT</button>
                                </form>
                                <?php
                            }
                        } else if ($step == 7) {
                            ?>
                            <h6>Delete install.php and make config file read only</h6>
                            <?php
                            if (is_writable(__DIR__ . '/includes/config.php') && !chmod(__DIR__ . '/includes/config.php', 0644)) {
                                ?>
                                <form action="?step=7" method="post" class="installform">
                                    <div class="error">
                                        Unable to change permissions on config file. Please change the permissions of <strong>includes/config.php</strong> 
                                        to block writing by all (on linux this is <em>chmod 0644 includes/config.php</em>)
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <?php
                            } else if (!unlink(__DIR__ . '/install.php')) {
                                ?>
                                <div class="error">
                                    Unable to delete install.php, please do this now otherwise security may be compromised
                                </div>
                                <?php
                            } else {
                                require_once(__DIR__ . '/includes/config.php');
                                ?>
                                <div class="success">
                                    Success! PhantomPanel is now ready for use, click <a href="<?php echo $login_uri; ?>" target="_self">here</a> to login
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
