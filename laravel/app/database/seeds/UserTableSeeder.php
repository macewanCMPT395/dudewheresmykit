<?php
class UserTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		$maxBranchId = count(Branch::all());

		//Static Users

		User::create(array(
			'First_Name' => 'John',
			'Last_Name' => 'Doe',
			'Email' => 'jDoe@email.com',
			'Password' => Hash::make('user'),
			'Phone_Number' => '+1(555)555-5555',
			'Permission_ID' => 0,
			'Branch_ID' => 1
		));

		User::create(array(
			'First_Name' => 'Jack',
			'Last_Name' => 'Doe',
			'Email' => 'jDoe2@email.com',
			'Password' => Hash::make('manager'),
			'Phone_Number' => '+1(555)555-5555',
			'Permission_ID' => 1,
			'Branch_ID' => 1
		));

		User::create(array(
			'First_Name' => 'Jane',
			'Last_Name' => 'Doe',
			'Email' => 'jDoe3@email.com',
			'Password' => Hash::make('admin'),
			'Phone_Number' => '+1(555)555-5555',
			'Permission_ID' => 2
		));

		//

		//20 users
		for($i = 0; $i < 20; ++$i){
			$name = explode(' ', $faker->name);
			User::create(array(
				'First_Name' => $name[0],
				'Last_Name' => $name[1],
				'Email' => $faker->unique->email,
				'Password' => Hash::make($faker->word),
				'Phone_Number' => $faker->phoneNumber,
				'Permission_ID' => 0,
				'Branch_ID' => $faker->numberBetween(1, $maxBranchId)
			));
		}
		//2 Managers
		for($i = 0; $i < 2; ++$i){
			$name = explode(' ', $faker->name);
			User::create(array(
				'First_Name' => $name[0],
				'Last_Name' => $name[1],
				'Email' => $faker->unique->email,
				'Password' => Hash::make($faker->word),
				'Phone_Number' => $faker->phoneNumber,
				'Permission_ID' => 1,
				'Branch_ID' => $faker->numberBetween(1, $maxBranchId)
			));
		}
	}
}