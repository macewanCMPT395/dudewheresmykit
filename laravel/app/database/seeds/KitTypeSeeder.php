<?php
class KitTypeSeeder extends Seeder {
	public function run() {
		$types = ['iPad','iPod','Laptop','Arduino','Raspberry Pi'];
		foreach($types as $name) {
			KitType::create(array('name' => $name));
		}
	}
}
