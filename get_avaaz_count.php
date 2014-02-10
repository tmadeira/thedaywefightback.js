<?php
Header("Content-type: text/javascript; charset=utf-8");
if (!file_exists("/tmp/asilo_snowden") || filemtime("/tmp/asilo_snowden") < time() - 60) {
    shell_exec("wget http://avaaz.org/asilo_snowden -O /tmp/asilo_snowden");
    touch("/tmp/asilo_snowden");
}
$counter = shell_exec("grep window.counterdata /tmp/asilo_snowden");
$cb = $_GET["callback"];
$obj = trim(preg_replace('/^.*({[^}]*}).*/', '\1', $counter));
echo "typeof $cb === 'function' && $cb($obj);";

