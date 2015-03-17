<?php
class KitTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		$maxStatusCode = count(Status::all());
		$maxItemID = count(Item::all());
		for($j = 0; $j < 20; ++$j){
			$itemArr = array();
			$count = 5;
			for($i = $count; $i > -1; --$i){
				array_push($itemArr, $faker->numberBetween(0, $maxItemID));
			}
			Kit::create(array(
				'Kit_Code' => $faker->unique()->numberBetween(0, 255655),
				'Kit_Description' => $faker->text(64),
				'Items' => serialize($itemArr),
				'Status_ID' => $faker->numberBetween(0, $maxStatusCode),
			));
		}
	}
}