<?php
$step = 1;

if (isset($_GET['step'])) {
    $step = intval($_GET['step']);
}

function echopost() {
    global $_POST;

    foreach ($_POST as $k => $v) {
        echo '<input type="hidden" name="' . $k . '" value="' . $v . '" />';
    }
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
            <div class="col-md-6 col-md-offset-3">
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
                            $missing = false;

                            if (!defined('PHP_VERSION_ID')) {
                                $missing = true;
                                ?>
                                <div class="error">
                                    You must have PHP version 5.2.7 or later
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="success">
                                    You are using PHP version 5.2.7 or later
                                </div>
                                <?php
                            }

                            if (!function_exists('curl_init')) {
                                $missing = true;
                                ?>
                                <div class="error">
                                    You must have cURL for PHP installed and enabled
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="success">
                                    cURL for PHP is installed and enabled
                                </div>
                                <?php
                            }

                            if (!function_exists("mcrypt_generic")) {
                                $missing = true;
                                ?>
                                <div class="error">
                                    You must have Mcrypt for PHP installed and enabled
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="success">
                                    Mcrypt for PHP is installed and enabled
                                </div>
                                <?php
                            }

                            if ($missing) {
                                ?>
                                <form action="?step=1&tryagain=1" method="post" class="installform">
                                    <div class="error">
                                        One or more pre-requisites have failed the test. Please correct the issue then try again. <br />
                                        <br />
                                        Common fixes:<br />
                                        <ul>
                                            <li>Update your PHP version from http://php.net or use your package manager</li>
                                            <li>Install missing modules through your package manager</li>
                                            <li>Check your PHP configuration to ensure required modules are enabled</li>
                                            <li>After performing any of the above steps, restart your server software (lighttpd, httpd, nginx, etc)</li>
                                            <li>Resources
                                                <ul>
                                                    <li>Install/Update: http://php.net/manual/en/install.php</li>
                                                    <li>cURL: http://php.net/manual/en/curl.installation.php</li>
                                                    <li>Mcrypt: http://php.net/manual/en/mcrypt.installation.php</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
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
                            file_put_contents("testFile", "test");
                            $user = fileowner("testFile");
                            unlink("testFile");
                            ?>
                            <h6>Write Check</h6>
                            <?php
                            if (!is_writable(__DIR__ . '/includes/config.php') && !chmod(__DIR__ . '/includes/config.php', 0777)) {
                                ?>
                                <form action="?step=2&tryagain=1" method="post" class="installform">
                                    <div class="error">
                                        Unable to change permissions on config file. Please change the permissions of <strong>includes/config.php</strong>
                                        to allow writing by all (on linux this is <em>chmod 0777 includes/config.php</em>)

                                        You should also change the file owner to match the web server's user. This user is <strong><?php echo $user; ?></strong> 
                                        (on linux this is <em>chown <?php echo $user; ?> includes/.sessions</em>)
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
                            <h6>Security Settings</h6><br />
                            <em>NOTE: The url/ip settings requested on this page are for the website hosting this PhantomPanel installation, and not for the bot</em>
                            <?php
                            $domain = $_SERVER['HTTP_HOST'];

                            $uri = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'));

                            if (substr($uri, -1) != '/') {
                                $uri .= '/';
                            }

                            $uri .= 'index.php';

                            $uri = str_ireplace('http://', '', str_ireplace('https://', '', $uri));

                            $uri = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $uri;
                            ?>
                            <form action="?step=4" method="post" class="installform">
                                <div class="form-group">
                                    <label>The number of hours after which a user is automatically logged out</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               value="6" name="expire_time"
                                               onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>The domain name or IP address to this PhantomPanel installation</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               value="<?php echo $domain; ?>" name="domain">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>The url to this PhantomPanel installation</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               value="<?php echo $uri; ?>" name="uri">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">NEXT</button>
                            </form>
                            <?php
                        } else if ($step == 4) {
                            ?>
                            <h6>Create Logins</h6>
                            <script type="text/javascript">
                                var index = 0;
                                function addinput() {
                                    index++;
                                    document.getElementById('logins').innerHTML += '<div class="input-group">'
                                            + '<input type="text" class="form-control"'
                                            + 'placeholder="Username" name="username' + index + '"> '
                                            + '<input type="password" class="form-control"'
                                            + 'placeholder="Password" name="password' + index + '">'
                                            + '</div>';
                                    document.getElementById("count").value = index + 1;
                                }
                            </script>
                            <div><em>All usernames must be unique. All usernames and passwords are case sensitive</em></div>
                            <form action="?step=5" method="post" class="installform">
                                <?php echopost(); ?>
                                <input type="hidden" name="count" id="count" value="1">
                                <div class="form-group" id="logins">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               placeholder="Username" name="username0"> <input
                                               type="password" class="form-control"
                                               placeholder="Password" name="password0">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-default" onclick="addinput();
                                        return false;">ADD MORE</button>&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;<button type="submit" class="btn btn-default">NEXT</button>
                            </form>
                            <?php
                        } else if ($step == 5) {
                            ?>
                            <h6>Bot Settings</h6>
                            <?php
                            for ($i = 0; $i < intval($_POST['count']); $i++) {
                                if (empty($_POST['username' . $i]) || empty($_POST['password' . $i])) {
                                    continue;
                                }

                                if (!in_array($_POST['username' . $i], $users)) {
                                    $users[] = $_POST['username' . $i];
                                } else {
                                    $badusers = true;
                                }
                            }

                            if ($badusers) {
                                ?>
                                <div class="warning">Some usernames were not added due to being duplicates</div>
                                <?php
                            }
                            ?>
                            <form action="?step=6" method="post" class="installform">
                                <?php echopost(); ?>
                                <div class="form-group">
                                    <label>Bot baseport setting (HTTP server port)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               value="25000" name="baseport"
                                               onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Bot owner setting</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               placeholder="owner" name="owner">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Bot IP address or hostname (The server running the actual bot program)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               placeholder="IP address or hostname of the bot" name="url">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Bot chat oauth setting</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               placeholder="oauth (not apioauth) of bot" name="oauth">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">NEXT</button>
                            </form>
                            <?php
                        } else if ($step == 6) {
                            ?>
                            <h6>Write Config</h6>
                            <?php
                            $data = file_get_contents(__DIR__ . '/includes/config.php');
                            $w = false;
                            $badfile = false;

                            if ($data !== false) {
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
                                
                                $mc = mcrypt_module_open(MCRYPT_RIJNDAEL_256, "", MCRYPT_MODE_CBC, "");
                                $iv = base64_encode(mcrypt_create_iv(mcrypt_enc_get_iv_size($mc), MCRYPT_DEV_URANDOM));
                                mcrypt_module_close($mc);

                                $domain = $_SERVER['HTTP_HOST'];

                                if (isset($_POST['domain']) && !empty($_POST['domain'])) {
                                    $domain = $_POST['domain'];

                                    $domain = str_ireplace('http://', '', $domain);
                                    $domain = str_ireplace('https://', '', $domain);

                                    if (strpos($domain, '/') !== false) {
                                        $domain = substr($domain, 0, strpos($domain, '/'));
                                    }
                                }

                                $uri = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'));

                                if (substr($uri, -1) != '/') {
                                    $uri .= '/';
                                }

                                $uri .= 'index.php';

                                $uri = str_ireplace('http://', '', str_ireplace('https://', '', $uri));

                                $uri = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $uri;

                                if (isset($_POST['uri']) && !empty($_POST['uri'])) {
                                    $uri = $_POST['uri'];

                                    $uri = str_ireplace('\\', '/', $uri);

                                    if (substr($uri, 0, 7) != 'http://' && substr($uri, 0, 8) != 'https://') {
                                        $uri = 'http://' . $uri;
                                    }

                                    if (substr($uri, -10) != '/index.php') {
                                        if (strtolower(substr($uri, -4)) == '.php' || strtolower(substr($uri, -4)) == '.htm' || strtolower(substr($uri, -5)) == '.html') {
                                            $uri = substr($uri, 0, strrpos($uri, '/'));
                                        }

                                        if (substr($uri, -1) != '/') {
                                            $uri .= '/';
                                        }

                                        $uri .= 'index.php';
                                    }
                                }

                                if (strtolower(substr($uri, 0, 7)) == 'http://') {
                                    $uri = substr($uri, 7);
                                }

                                if (strtolower(substr($uri, 0, 8)) == 'https://') {
                                    $uri = substr($uri, 8);
                                }

                                if (strtolower(substr($uri, 0, strlen($domain))) == strtolower($domain)) {
                                    $uri = substr($uri, strlen($domain));
                                }

                                $pos = strpos($data, '/*expire_time_start*/') + 21;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*expire_time_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . $expire_time_val . ' * 60 * 60' . $data2;
                                $pos = strpos($data, '/*session_name_start*/') + 22;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*session_name_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . '\'phantompanelsession' . $r . '\'' . $data2;
                                $pos = strpos($data, '/*domain_start*/') + 16;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*domain_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . '\'' . $domain . '\'' . $data2;
                                $pos = strpos($data, '/*sk_start*/') + 12;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*sk_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . '\'' . $sk . '\'' . $data2;
                                $pos = strpos($data, '/*iv_start*/') + 12;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*iv_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . '\'' . $iv . '\'' . $data2;
                                $pos = strpos($data, '/*login_uri_start*/') + 19;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*login_uri_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . '\'' . $uri . '\'' . $data2;

                                $newline = "\n";

                                if (strpos($data, "\r\n") !== false) {
                                    $newline = "\r\n";
                                } else if (strpos($data, "\r") !== false) {
                                    $newline = "\r";
                                }

                                $logindata = "";
                                $users = array();

                                for ($i = 0; $i < intval($_POST['count']); $i++) {
                                    if (empty($_POST['username' . $i]) || empty($_POST['password' . $i])) {
                                        continue;
                                    }

                                    if (!in_array($_POST['username' . $i], $users)) {
                                        $logindata .= $newline . 'AddLogin(\'' . $_POST['username' . $i] . '\', \'' . $_POST['password' . $i] . '\');';
                                        $users[] = $_POST['username' . $i];
                                    }
                                }

                                $logindata .= $newline;

                                $pos = strpos($data, '/*AddLogin_start*/') + 18;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*AddLogin_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . $logindata . $data2;

                                $baseport_val = 25000;

                                if (isset($_POST['baseport']) && is_numeric($_POST['baseport']) && intval($_POST['baseport']) > 0) {
                                    $baseport_val = intval($_POST['baseport']);
                                }

                                $pos = strpos($data, '/*baseport_start*/') + 18;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*baseport_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . $baseport_val . $data2;
                                $pos = strpos($data, '/*owner_start*/') + 15;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*owner_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . '\'' . $_POST['owner'] . '\'' . $data2;
                                $pos = strpos($data, '/*url_start*/') + 13;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*url_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . '\'' . $_POST['url'] . '\'' . $data2;
                                $pos = strpos($data, '/*oauth_start*/') + 15;
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data1 = substr($data, 0, $pos);
                                $pos = strpos($data, '/*oauth_end*/');
                                if ($pos === false) {
                                    $badfile = true;
                                }
                                $data2 = substr($data, $pos);
                                $data = $data1 . '\'' . $_POST['oauth'] . '\'' . $data2;

                                $w = file_put_contents(__DIR__ . '/includes/config.php', $data);
                            }

                            if ($data === false) {
                                ?>
                                <form action="?step=6&tryagain=1" method="post" class="installform">
                                    <?php echopost(); ?>
                                    <div class="warning">
                                        Unable to read the config file. Please check that the file <strong>includes/config.php</strong> exists and has full read/write permissions
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <?php
                            } else if ($badfile) {
                                ?>
                                <form action="?step=6&tryagain=1" method="post" class="installform">
                                    <?php echopost(); ?>
                                    <div class="warning">
                                        The file <strong>includes/config.php</strong> is corrupt, please replace it with an unedited copy and chmod it to 0777
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <?php
                            } else if ($w === false) {
                                ?>
                                <form action="?step=6&tryagain=1" method="post" class="installform">
                                    <?php echopost(); ?>
                                    <div class="warning">
                                        Unable to write the config file. Please check that the file <strong>includes/config.php</strong> exists and has full write permissions<br />
                                        <br />
                                        Alternatively, follow these instructions to edit the file manually
                                        <ol>
                                            <li>Open <strong>includes/config.php</strong> in your favorite text editor (vim, notepad, etc)</li>
                                            <li>Erase all existing text in the file</li>
                                            <li>Paste the text in the box below into the file</li>
                                            <li>Save the file</li>
                                            <li>Click the <strong>I HAVE EDITED THE FILE MANUALLY</strong> button</li>
                                        </ol>
                                        <textarea name="alt_data"><?php echo str_replace('<', '&lt;', str_replace('&', '&amp;', $data)); ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <form action="?step=7" method="post" class="installform">
                                    <button type="submit" class="btn btn-default">I HAVE EDITED THE FILE MANUALLY</button>
                                </form>
                                <?php
                            } else {
                                ?>
                                <form action="?step=7" method="post" class="installform">
                                    <div class="success">
                                        Success! Config file written
                                    </div>
                                    <button type="submit" class="btn btn-default">NEXT</button>
                                </form>
                                <?php
                            }
                        } else if ($step == 7) {
                            ?>
                            <h6>Test Bot Connection</h6>
                            <?php
                            require_once(__DIR__ . '/includes/config.php');
                            require_once(__DIR__ . '/includes/curl.php');

                            $result = curl_get('/inistore/init.ini');

                            if ($result[1] == 200) {
                                ?>
                                <form action="?step=8" method="post" class="installform">
                                    <div class="success">
                                        Success! Bot can be contacted
                                    </div>
                                    <button type="submit" class="btn btn-default">NEXT</button>
                                </form>
                                <?php
                            } else {
                                require_once(__DIR__ . '/includes/func.php');
                                ?>
                                <form action="?step=7&tryagain=1" method="post" class="installform">
                                    <div class="warning">
                                        Bot could not be contacted<br />
                                        <?php if ($result[1] > 0) { ?>
                                            HTTP <?php echo $result[1] . ' ' . http_status_code_string($result[1]); ?><br />
                                            <?php echo $result[0]; ?>
                                        <?php } else { ?>
                                            Error #: <?php echo $result[2]; ?><br />
                                            <?php echo $result[3]; ?>
                                        <?php } ?>
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <form action="?step=8" method="post" class="installform">
                                    <button type="submit" class="btn btn-default">SKIP TEST</button>
                                </form>
                                <?php
                            }
                        } else if ($step == 8) {
                            ?>
                            <h6>Make config file read only</h6>
                            <?php
                            if (is_writable(__DIR__ . '/includes/config.php') && !chmod(__DIR__ . '/includes/config.php', 0644)) {
                                ?>
                                <form action="?step=8&tryagain=1" method="post" class="installform">
                                    <div class="error">
                                        Unable to change permissions on config file. Please change the permissions of <strong>includes/config.php</strong>
                                        to block writing by all (on linux this is <em>chmod 0644 includes/config.php</em>)
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <?php
                            } else {
                                ?>
                                <form action="?step=9" method="post" class="installform">
                                    <div class="success">
                                        Success! Config file is now read only
                                    </div>
                                    <button type="submit" class="btn btn-default">NEXT</button>
                                </form>
                                <?php
                            }
                        } else if ($step == 9) {
                            file_put_contents("testFile", "test");
                            $user = fileowner("testFile");
                            unlink("testFile");
                            ?>
                            <h6>Create and test sessions file</h6>
                            <?php
                            if (!file_exists(__DIR__ . '/includes/.sessions') && !touch(__DIR__ . '/includes/.sessions')) {
                                ?>
                                <form action="?step=9&tryagain=1" method="post" class="installform">
                                    <div class="error">
                                        Unable to create sessions file. Please create a file named <strong>.sessions</strong> in the <strong>includes</strong> folder
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <?php
                            } else if ((!is_writable(__DIR__ . '/includes/.sessions') || !is_readable(__DIR__ . '/includes/.sessions')) && !chmod(__DIR__ . '/includes/.sessions', 0600)) {
                                ?>
                                <form action="?step=9&tryagain=1" method="post" class="installform">
                                    <div class="error">
                                        Unable to change permissions on sessions file. Please change the permissions of <strong>includes/.sessions</strong>
                                        to allow reading & writing by the owner and, preferably, block everyone else 
                                        (on linux this is <em>chmod 0600 includes/.sessions</em>)

                                        You should also change the file owner to match the web server's user. This user is <strong><?php echo $user; ?></strong> 
                                        (on linux this is <em>chown <?php echo $user; ?> includes/.sessions</em>)
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <?php
                            } else if (file_get_contents(__DIR__ . '/includes/.sessions') === false) {
                                ?>
                                <form action="?step=9&tryagain=1" method="post" class="installform">
                                    <div class="error">
                                        Unable to read sessions file. Please change the permissions of <strong>includes/.sessions</strong>
                                        to allow reading & writing by the owner and, preferably, block everyone else 
                                        (on linux this is <em>chmod 0600 includes/.sessions</em>)

                                        You should also change the file owner to match the web server's user. This user is <strong><?php echo $user; ?></strong> 
                                        (on linux this is <em>chown <?php echo $user; ?> includes/.sessions</em>)
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <?php
                            } else if (file_put_contents(__DIR__ . '/includes/.sessions', file_get_contents(__DIR__ . '/includes/.sessions'), LOCK_EX) === false) {
                                ?>
                                <form action="?step=9&tryagain=1" method="post" class="installform">
                                    <div class="error">
                                        Unable to write sessions file. Please change the permissions of <strong>includes/.sessions</strong>
                                        to allow reading & writing by the owner and, preferably, block everyone else 
                                        (on linux this is <em>chmod 0600 includes/.sessions</em>)

                                        You should also change the file owner to match the web server's user. This user is <strong><?php echo $user; ?></strong> 
                                        (on linux this is <em>chown <?php echo $user; ?> includes/.sessions</em>)
                                    </div>
                                    <button type="submit" class="btn btn-default">TRY AGAIN</button>
                                </form>
                                <?php
                            } else {
                                ?>
                                <form action="?step=10" method="post" class="installform">
                                    <div class="success">
                                        Success! Session file exists and is usable
                                    </div>
                                    <button type="submit" class="btn btn-default">NEXT</button>
                                </form>
                                <?php
                            }
                        } else if ($step == 10) {
                            ?>
                            <h6>Delete install.php</h6>
                            <?php
                            if (!unlink(__DIR__ . '/install.php')) {
                                require_once(__DIR__ . '/includes/config.php');
                                ?>
                                <div class="error">
                                    Unable to delete install.php, please do this now otherwise security may be compromised<br />
                                    Once this is done, PhantomPanel is ready for use, click <a href="<?php echo $login_uri; ?>" target="_self">here</a> to login
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
