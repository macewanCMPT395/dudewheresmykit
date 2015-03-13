# dudewheresmykit

Installation instructions:

Clone the repository:

git clone https://www.github.com/macewanCMPT395/dudewheresmykit.git

Execute the following commands in the repository root directory:

--changes into the app directory

    $ cd laravel/

--installs composer, migrates and seeds the database

    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar install
    $ php artisan migrate
    $ php artisan db:seed

--clean autoload files

    $ php artisan dump-autoload

Test installation:

    $ php artisan serve
