# Dude, Where's my Kit?! 

## Requirements

1. PHP >= 5.4
2. MCrypt PHP Extension
3. PHP5-sqlite

## Installation:

First clone the repository and cd into it  Then execute the following commands:
```bash
    $ cd laravel
    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar install
    $ php artisan migrate
    $ php artisan db:seed
    $ php artisan serve
```
## Email Instructions: 

To change the 'from' email address of the notification emails, edit the file `laravel/app/config/mail.php`. The fields that you will be interested in are:
 * PORT - It will be dependent on your email provider
 * HOST - It will be your email provider's address
 * DRIVER - It will be dependent on your email provider
 * USERNAME - Your specific email log in
 * PASSWORD - Your private password
 * FROM - The from address to be displayed
