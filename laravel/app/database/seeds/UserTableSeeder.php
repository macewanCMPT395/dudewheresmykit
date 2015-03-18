<?php
class UserTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		$maxBranchId = count(Branch::all());

		//Static Users

		User::create(array(
			'first_name' => 'John',
			'last_name' => 'Doe',
			'email' => 'jdoe@email.com',
			'password' => Hash::make('user'),
			'phone' => '+1(555)555-5555',
			'permission_id' => 0,
			'remember_token' => str_random(64),
			'branch_id' => 1
		));

		User::create(array(
			'first_name' => 'Jack',
			'last_name' => 'Doe',
			'email' => 'jdoe2@email.com',
			'password' => Hash::make('manager'),
			'phone' => '+1(555)555-5555',
			'permission_id' => 1,
			'remember_token' => str_random(64),
			'branch_id' => 1
		));

		User::create(array(
			'first_name' => 'Jane',
			'last_name' => 'Doe',
			'email' => 'jdoe3@email.com',
			'password' => Hash::make('admin'),
			'phone' => '+1(555)555-5555',
			'remember_token' => str_random(64),
			'permission_id' => 2
		));

		//

		//20 users
		for($i = 0; $i < 20; ++$i){
			$name = explode(' ', $faker->name);
			User::create(array(
				'first_name' => $name[0],
				'last_name' => $name[1],
				'email' => strtolower($faker->unique->email),
				'password' => Hash::make($faker->word),
				'phone' => $faker->phoneNumber,
				'permission_id' => 0,
				'remember_token' => str_random(64),
				'branch_id' => $faker->numberBetween(1, $maxBranchId)
			));
		}
		//2 Managers
		for($i = 0; $i < 2; ++$i){
			$name = explode(' ', $faker->name);
			User::create(array(
				'first_name' => $name[0],
				'last_name' => $name[1],
				'email' => strtolower($faker->unique->email),
				'password' => Hash::make($faker->word),
				'phone' => $faker->phoneNumber,
				'permission_id' => 1,
				'remember_token' => str_random(64),
				'branch_id' => $faker->numberBetween(1, $maxBranchId)
			));
		}
	}
}