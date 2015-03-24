<?php

return array(

	'driver' => 'smtp',

	'host' => 'smpt.gmail.com',

	'port' => 587,

	'from' => array('address' => 'randomtestmailer@gmail.com', 'name' => 'KIT-MTS',

	'encryption' => 'tls',

	'username' => 'randomtestmailer@gmail.com',

    'password' => 'P2ssword1234',

	'sendmail' => '/usr/sbin/sendmail -bs',

	'pretend' => false,

));
