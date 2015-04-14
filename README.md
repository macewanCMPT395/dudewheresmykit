# dudewheresmykit

Installation instructions:

First clone the repository and cd into it  Then execute the following commands:

    $ cd laravel
    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar install
    $ php artisan migrate
    $ php artisan db:seed
    $ php artisan serve

Email Instructions: 

To change the email notifications to an actual sending email address:

    $ cd laravel/app/config
    $ vim mail.php
    
Change the values in each of the fields to match the required fields for the EPL mail:
    This includes the PORT, HOST, DRIVER, USERNAME, PASSWORD, and FROM.
    

    
