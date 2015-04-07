<?php
class BookingTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		$maxUser = count(User::all());
		$maxBranch = count(Branch::all());
		$maxKit= count(Kit::all());
		$maxStatus = count(Status::all());

		for($i = 0; $i < 50; ++$i){
			$startDay = $faker->dateTimeBetween($startDate = 'now', $endDate = '+6 months');
			$endDay = $faker->dateTimeBetween($startDate = $startDay, $endDate = '+1 years');
			$status_id = $faker->numberBetween(1, $maxStatus);
			if ($status_id != 3) {
				$shipped = Carbon\Carbon::now();
			} else {
				$shipped = '';
			}
			$kit = Kit::find($faker->numberBetween(1, $maxKit));
			$event = $kit->type->name;
			$event = substr($event, 0, strlen($event) - 1) . ' Workshop';
			$booking = Booking::create(array(
				'destination_branch_id' => $faker->numberBetween(1, $maxBranch),
				'kit_id' => $kit->id,
				'status_id' => $status_id,
				'shipped' => $shipped,
				'start_date' => $startDay,
				'end_date' => $endDay,
				'event' => $event
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
