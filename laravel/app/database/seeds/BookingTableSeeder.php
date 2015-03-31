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
				array_push($users, $faker->numberBetween(1, $maxUser));
			}
			Booking::create(array(
				'user_ids' => serialize($users),
				'destination_branch_id' => $faker->numberBetween(1, $maxBranch),
				'kit_id' => $faker->numberBetween(1, $maxKit),
				'start_date' => $startDay,
				'end_date' => $endDay
			));
		}

	}
}
