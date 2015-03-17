<?php
class BookingTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		$maxUser = count(User::all());
		$maxBranch = count(Branch::all());
		$maxKit= count(Kit::all());

		for($i = 0; $i < 25; ++$i){
			$startDay = $faker->dateTimeBetween($startDate = 'now', $endDate = '+30 years');
			$endDay = $faker->dateTimeBetween($startDate = $startDay, $endDate = '+31 years');
			$users = array();
			for($j = $faker->randomDigitNotNull; $j >= 0; --$j){
				array_push($users, $faker->numberBetween(0, $maxUser));
			}
			Booking::create(array(
				'User_IDs' => serialize($users),
				'Destination_Branch_ID' => $faker->numberBetween(0, $maxBranch),
				'Kit_ID' => $faker->numberBetween(0, $maxKit),
				'Start_Date' => $startDay,
				'End_Date' => $endDay
			));
		}

	}
}