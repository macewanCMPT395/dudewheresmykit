# Dude, Where's my Kit?! 

## Description:
Welcome to the kit management system README, This document includes everything
you'll need to know for setting up and getting started. The Kit MTS is a system created
to help users effectively manage bookings within the EPL. Included in the webapp is the ability to:
* Create Bookings
* Create new kits
* View personal and branch bookings
* Handle branch kit transfers

Along with all of these great features, the home page also conviently list all trasnfers that require attention.
This includes both incoming and outgoing transfers. The home page also lists any new kit types that have been added so that users can stay up to date on available kit types.


## Requirements

1. PHP >= 5.4
2. MCrypt PHP Extension
3. PHP5-sqlite

## Installation:

Run the following commands: 

```bash
	$ git clone https://github.com/macewanCMPT395/dudewheresmykit.git
    $ cd laravel
    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar install
    $ php artisan migrate
```

The following command is optional, and prepopulates the sample data.

```bash
	$ php artisan db:seed
```

To run the webapp just execute:

```bash
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
