<?php

return array(

	'driver' => 'smtp',

	'host' => 'smtp.gmail.com',

	'port' => 465,

	'from' => array('address' => 'randomtestmailer@gmail.com', 'name' => 'KIT-MTS',

	'encryption' => 'SSL',

	'username' => 'randomtestmailer',

    'password' => 'P2ssword1234',

	'sendmail' => '/usr/sbin/sendmail -bs',

	'pretend' => false,

));
