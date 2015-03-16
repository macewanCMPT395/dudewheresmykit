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

        User::create(array(
            'First_Name' => 'Lee',
            'Last_Name' => 'Humeniuk',    
            'Email' => 'lee.humeniuk@outlook.com',
            'Password' => 'Admin',
            'Phone_Number' => '7806606199'
    ));

    }

}
