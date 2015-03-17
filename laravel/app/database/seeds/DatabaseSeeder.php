<?php
class DatabaseSeeder extends Seeder {
	//Grabs the content of the XML tag $needle from the XML information $haystack
	public static function grabTag($haystack, $needle){
		$index = strpos($haystack, "<$needle>") + strlen($needle) + 2;
		return substr($haystack, $index, strpos($haystack, "</$needle>", $index) - $index);
	}

	public function run() {
		Eloquent::unguard();
		//Standard
		$this->call('BlackoutTableSeeder');
		$this->call('BranchTableSeeder');
		$this->call('StatusTableSeeder');

		//Random
		$this->call('UserTableSeeder');
		$this->call('ItemTableSeeder');
		$this->call('KitTableSeeder');
		$this->call('BookingTableSeeder');
	}
}