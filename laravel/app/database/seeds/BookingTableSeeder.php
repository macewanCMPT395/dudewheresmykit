<?php
class BookingTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		$maxUser = count(User::all());
		$maxBranch = count(Branch::all());
		$maxKit= count(Kit::all());
		$maxStatus = count(Status::all());

		$booking = Booking::create(array(
				'destination_branch_id' => 1,
				'kit_id' => 1,
				'status_id' => 1,
				'shipped' => '2015-04-09',
				'start_date' => '2015-04-13',
				'end_date' => '2015-04-16',
				'event' => 'Important Workshop'
			));
		$booking->users()->attach(1);

		$booking = Booking::create(array(
				'destination_branch_id' => 2,
				'kit_id' => 2,
				'status_id' => 3,
				'start_date' => '2015-04-12',
				'end_date' => '2015-04-12',
				'event' => 'Very Important Workshop'
			));
		$booking->users()->attach(4);

		for($i = 0; $i < 50; ++$i){
			$startDay = $faker->dateTimeBetween($startDate = 'now', $endDate = '+6 months');
			$endDay = $startDay;
			date_add($endDay, date_interval_create_from_date_string('10 days'));
			$endDay = $faker->dateTimeBetween($startDate = $startDay, $endDate = $endDay);
			//Remove the timestamp
			$startDay = $startDay->format('Y-m-d');
			$endDay = $endDay->format('Y-m-d');

			$status_id = $startDate->format('U') <= date('U', strtotime('+1 days')) ? $faker->numberBetween(1, 2) : 3;
			if ($status_id != 3) {
				$shipped = Carbon\Carbon::now();
			} else {
				$shipped = '';
			}
			$kit = Kit::find($faker->numberBetween(1, $maxKit));
			$event = $kit->type->name;
			$event = $event . ' Workshop';
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
				$number = $faker->numberBetween(4, $maxUser);
				if (!in_array($number, $users)) {
					array_push($users, $number);
				}
			}
			$booking->users()->attach($users);
		}
	}
}
