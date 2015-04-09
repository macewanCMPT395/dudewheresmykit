<?php
class KitTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		$maxStatusCode = count(Status::all());
		$maxKitType = count(KitType::all());
		$maxBranchType = count(Branch::all());
		$kitTypes = KitType::all();
		$vowels = ['a', 'e', 'i', 'o', 'u'];

		Kit::create(array(
			'code' => '3122' . $faker->unique()->numberBetween(1000000000, 1999999999), //Barcode 14 digit, starting with 31221
			'description' => "This is an iPad kit.",
			'note' => '',
			'branch_id' => 2,
			'status_id' => 1,
			'type_id' => 1
		));
		Kit::create(array(
			'code' => '3122' . $faker->unique()->numberBetween(1000000000, 1999999999), //Barcode 14 digit, starting with 31221
			'description' => "This is an iPad kit.",
			'note' => '',
			'branch_id' => 1,
			'status_id' => 2,
			'type_id' => 1
		));

		for($i = count($kitTypes) - 1; $i >= 0; --$i){
			$kitType = $kitTypes[$i]->name;
			if(in_array($kitType[0], $vowels)) $kitType = "n $kitType";
			else $kitType = " $kitType";
			for($j = 0; $j < 7; ++$j){
				Kit::create(array(
					'code' => '3122' . $faker->unique()->numberBetween(1000000000, 1999999999), //Barcode 14 digit, starting with 31221
					'description' => "This is a$kitType kit.",
					'note' => ($faker->numberBetween(0, 10) == 5) ? 'Case is damaged' : '',
					'branch_id' => $faker->numberBetween(1, $maxBranchType),
					'status_id' => $faker->numberBetween(1, $maxStatusCode),
					'type_id' => $kitTypes[$i]->id
				));
			}
		}
	}
}
