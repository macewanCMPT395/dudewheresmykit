<?php

class BranchTableSeeder extends Seeder {
	//Grabs the content of the XML tag $needle from the XML information $haystack
	function grabTag($haystack, $needle){
		$index = strpos($haystack, "<$needle>") + strlen($needle) + 2;
		return substr($haystack, $index, strpos($haystack, "</$needle>", $index) - $index);
	}
	public function run() {
		$XMLLoc = "http://www.epl.ca/opendata/branches/api/xml/";
		//Grab the XML file, and explode it on the tag
		$html = explode("<BranchInfo>", implode('', file($XMLLoc)));
		$len = count($html);

		for($i = 1; $i < $len; ++$i){
			Branch::create(array(
				'Name' => DatabaseSeeder::grabTag($html[$i], "Name"),
				'Branch_Code' => substr(DatabaseSeeder::grabTag($html[$i], "BranchId"), 3),
				'Address' => DatabaseSeeder::grabTag($html[$i], "Address"),
				'Phone_Number' => DatabaseSeeder::grabTag($html[$i], "PhoneNumber"),
			));
		}
	}
}