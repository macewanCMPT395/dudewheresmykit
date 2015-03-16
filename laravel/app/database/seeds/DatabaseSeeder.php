<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('Users seeded');
	}

}

class UserTableSeeder extends Seeder {

    public function run() {

        Eloquent::unguard();

        User::create(array(
            'First_Name' => 'Lee',
            'Last_Name' => 'Humeniuk',    
            'Email' => 'admin@outlook.com',
            'Password' => Hash::make('Admin'),
            'Phone_Number' => '7806606199'
    ));

    }

}
