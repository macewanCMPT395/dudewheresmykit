<?php
class ItemTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		//Gen types of items
		$names = array();
		$descs = array();
		$count = 5;
		for($i = $count; $i > -1; --$i){
			array_push($names, $faker->word);
			array_push($descs, $faker->text(64));
		}

		for($i = 0; $i < 20; ++$i){
			$index = $faker->numberBetween(0, $count - 1);
			if($faker->numberBetween(0, 10) == 5){
				Item::create(array(
					'name' => $names[$index],
					'description' => $descs[$index],
					'asset_tag' => '31221' . $faker->unique()->numberBetween(100000, 999999),
					'note' => $faker->text(64)
				));
			}else{
				Item::create(array(
					'name' => $names[$index],
					'description' => $descs[$index],
					'asset_tag' => '31221' . $faker->unique()->numberBetween(100000, 999999)
				));
			}
		}
	}
}