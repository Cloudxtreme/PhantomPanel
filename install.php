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
                                    <label class="sr-only">The number of hours after which a user is automatically logged out</label>
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

                            $data1 = substr($data, 0, strpos($data, '/*expire_time_start*/'));
                            $data2 = substr($data, strpos($data, '/*expire_time_end*/'));
                            $data = $data1 . $expire_time_val . ' * 60 * 60' . $data2;
                            $data1 = substr($data, 0, strpos($data, '/*session_name_start*/'));
                            $data2 = substr($data, strpos($data, '/*session_name_end*/'));
                            $data = $data1 . '\'phantompanelsession' . $r . '\'' . $data2;
                            $data1 = substr($data, 0, strpos($data, '/*domain_start*/'));
                            $data2 = substr($data, strpos($data, '/*domain_end*/'));
                            $data = $data1 . '\'' . $_SERVER['HTTP_HOST'] . '\'' . $data2;
                            $data1 = substr($data, 0, strpos($data, '/*sk_start*/'));
                            $data2 = substr($data, strpos($data, '/*sk_end*/'));
                            $data = $data1 . '\'' . $sk . '\'' . $data2;
                            $data1 = substr($data, 0, strpos($data, '/*login_uri_start*/'));
                            $data2 = substr($data, strpos($data, '/*login_uri_end*/'));
                            $data = $data1 . '\'' . $uri . '\'' . $data2;

                            file_put_contents(__DIR__ . '/includes/config.php', $data) or print('<div class="error">Failed to write config data</div>');
                            ?>
                            <script type="text/javascript">
                                var index = 0;
                                function addinput() {
                                    index++;
                                    document.getElementById('logins').innerHTML += '<div class="input-group">'
                                        + '<input type="text" class="form-control"'
                                        + 'placeholder="Username" name="username[' + index + ']"> '
                                        + '<input type="password" class="form-control"'
                                        + 'placeholder="Password" name="password[' + index + ']">'
                                        + '</div>';
                                    document.getElementById("count").value = index + 1;
                                }
                            </script>
                            <h6>Create Logins</h6>
                            <div><em>All usernames must be unique. All usernames and passwords are case sensitive</em></div>
                            <form action="?step=5" method="post" class="installform">
                                <input type="hidden" name="count" id="count" value="1">
                                <div class="form-group" id="logins">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               placeholder="Username" name="username[0]"> 
                                        <input type="password" class="form-control"
                                               placeholder="Password" name="password[0]">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-default" onclick="addinput(); return false;">ADD MORE</button>&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;<button type="submit" class="btn btn-default">NEXT</button>
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

                            for ($i = 0; $i < intval($_POST['count']); $i++) {
                                if (empty($_POST['username'][$i])) {
                                    continue;
                                }

                                if (!in_array($_POST['username'][$i], $users)) {
                                    $logindata .= $newline . 'AddLogin(\'' . $_POST['username'][$i] . '\', \'' . $_POST['password'][$i] . '\');';
                                    $users[] = $_POST['username'][$i];
                                } else {
                                    $badusers = true;
                                }
                            }

                            $logindata .= $newline;

                            $data1 = substr($data, 0, strpos($data, '/*AddLogin_start*/'));
                            $data2 = substr($data, strpos($data, '/*AddLogin_end*/'));
                            $data = $data1 . $logindata . $data2;

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

                            $data1 = substr($data, 0, strpos($data, '/*baseport_start*/'));
                            $data2 = substr($data, strpos($data, '/*baseport_end*/'));
                            $data = $data1 . $baseport_val . $data2;
                            $data1 = substr($data, 0, strpos($data, '/*owner_start*/'));
                            $data2 = substr($data, strpos($data, '/*owner_end*/'));
                            $data = $data1 . '\'' . $_POST['owner'] . '\'' . $data2;
                            $data1 = substr($data, 0, strpos($data, '/*url_start*/'));
                            $data2 = substr($data, strpos($data, '/*url_end*/'));
                            $data = $data1 . '\'' . $_POST['url'] . '\'' . $data2;
                            $data1 = substr($data, 0, strpos($data, '/*oauth_start*/'));
                            $data2 = substr($data, strpos($data, '/*oauth_end*/'));
                            $data = $data1 . '\'' . $_POST['oauth'] . '\'' . $data2;

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
                            } else {
                                ?>
                                <form action="?step=6" method="post" class="installform">
                                    <div class="warning">
                                        Config file was written but bot could not be contacted
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <form action="?step=7" method="post" class="installform">
                                    <button type="submit" class="btn btn-default">SKIP TEST</button>
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
