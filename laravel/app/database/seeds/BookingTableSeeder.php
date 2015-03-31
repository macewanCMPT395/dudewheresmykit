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
			$booking = Booking::create(array(
				'destination_branch_id' => $faker->numberBetween(1, $maxBranch),
				'kit_id' => $faker->numberBetween(1, $maxKit),
				'start_date' => $startDay,
				'end_date' => $endDay
			));

			// Get random user ids to attach.
			$users = array();
			for ($j = 0; $j < 4; $j++) {
				$number = $faker->numberBetween(1, $maxUser);
				if (!in_array($number, $users)) { 
					array_push($users, $number);
				}
			}
			$booking->users()->attach($users);
		}
	}
}
