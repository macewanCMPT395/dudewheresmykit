<?php
class KitTypeSeeder extends Seeder {
	public function run() {
		$types = ['iPads','iPods','Laptops','Arduinos','Raspberry Pis'];
		foreach($types as $name) {
			KitType::create(array('name' => $name));
		}
	}
}
