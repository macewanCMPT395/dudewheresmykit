<?php
class KitTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		$maxStatusCode = count(Status::all());
		$maxKitType = count(KitType::all()); 
		$maxBranchType = count(Branch::all());
		for($j = 0; $j < 20; ++$j){
			$itemArr = array();
			$count = 5;
			Kit::create(array(
				'code' => $faker->unique()->numberBetween(0, 255655),
				'description' => $faker->text(64),
				'branch_id' => $faker->numberBetween(1, $maxBranchType),
				'status_id' => $faker->numberBetween(1, $maxStatusCode),
				'type_id' => $faker->numberBetween(1, $maxKitType)
			));
		}
	}
}
