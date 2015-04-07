<?php
class ItemTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		foreach(Kit::all() as $kit){
			$type = $kit->type->name;
			$type = substr($type, 0, strlen($type) - 1);
			for($i = 0; $i < 5; ++$i){
				Item::create(array(
					'name' => $type,
					'kit_id' => $kit->id,
					'asset_tag' => $faker->unique()->numberBetween(100000, 999999),
					'note' => ($faker->numberBetween(0, 20) == 5) ? (($faker->numberBetween(0, 20) == 5) ? "Badly damaged" : "Slightly damaged") : '',
				));
			}
			$type .= ' Power Cable';
			for($i = 0; $i < 5; ++$i){
				Item::create(array(
					'name' => $type,
					'kit_id' => $kit->id,
					'asset_tag' => $faker->unique()->numberBetween(100000, 999999),
					'note' => ($faker->numberBetween(0, 20) == 5) ? (($faker->numberBetween(0, 20) == 5) ? "Badly damaged" : "Slightly damaged") : '',
				));
			}
		}
	}
}
