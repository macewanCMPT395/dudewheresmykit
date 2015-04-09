<?php
class KitTypeSeeder extends Seeder {
	public function run() {
		$types = ['iPad','iWatch','Laptop','Arduino','Raspberry Pi'];
		foreach($types as $name) {
			KitType::create(array('name' => $name));
		}
	}
}
