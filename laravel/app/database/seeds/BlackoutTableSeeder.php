<?php
class BlackoutTableSeeder extends Seeder {

	public function run() {
		//The location of the XML of a random branch to obtain closures
		//I don't think there are specific branch closures, but we'll need to look into that.
		$XMLLoc = "http://www.epl.ca/opendata/branches/api/xml/WOO";
		//Grab the XML file, and explode it on the tag
		$html = explode("<HolidayClosure>", implode('', file($XMLLoc)));
		$len = count($html);
		//Go through all of the closures
		for($i = 1; $i < $len; ++$i){
			//Find the holiday name
			Blackout::create(array(
				'day' => DatabaseSeeder::grabTag($html[$i], "HolidayDate"),
				'description' => DatabaseSeeder::grabTag($html[$i], "HolidayName")
			));

		}
	}
}