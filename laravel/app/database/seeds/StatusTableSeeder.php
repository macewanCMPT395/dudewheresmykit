<?php
class StatusTableSeeder extends Seeder {
	public function run() {
            $codes = array(
            	'T' => 'currently in transit.',
            	'S' => 'in stock, not in use.',
            	'P' => 'prepairing to be shipped',
            	'N' => 'has not arrived yet.'
            );
            foreach ($codes as $key => $value){
                  Status::create(array(
                        'Status_Code' => $key,
                        'Status_Description' => $value
                  ));
            }
	}
}