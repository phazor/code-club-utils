# codeclub-utils
Utilities that provide dynamic content and functionality to Code Club websites

## mailer.php
PHP Mailer backend for facilitating the sending of emails between Code Club participants

## search.php
PHP search utility that enables club and volunteer search.
This lets query to the google sheet take place in the backend, to avoid exposing email addresses and other sensitive data.

## Removed fields

When you look through the code, you'll see that a number of values that are country/instance specific have been removed. You'll need to replace these with your instance's values to get the code working.

Examples:
 * Google doc sheet token
 * Google form token
 * Sender email address

## Deployment

Deploy anywhere that runs php. I recommend Digital Ocean $5/mo small droplets if traffic is not expected to be significant.

I would suggest following instructions from here: https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-14-04 and then to follow some basic security setup through pages like these: http://www.cyberciti.biz/tips/php-security-best-practices-tutorial.html

It is an entirely manual deployment process (I need to ssh on to the machine and pull down changes). If I was doing it again I’d probably use something like Docker to help automate things: https://www.digitalocean.com/community/tutorials/how-to-use-the-dokku-one-click-digitalocean-image-to-run-a-php-app.

It currently uses a 'public' sheet which is not ideal. To authenticate using a private sheet would require using OAuth 2.0, it’s not something that I have gotten around to yet. Any help with this would be massively appreciated :)

## What else?

Please acknowledge that there are terrible, even insecure, bits within the code enclosed - there is much to be improved. Such is the nature of volunteer projects.

What we are doing here is enabling education and computer literacy for a new generation of kids, especially those that are underprivileged.

If you do have improvements to suggest, or spot bugs or flaws in the code, please do the right thing and disclose to me at support@codeclub.nz or raise an issue against the repo.