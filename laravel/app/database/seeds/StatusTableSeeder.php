<?php
class StatusTableSeeder extends Seeder {
	public function run() {
            $codes = array(
            	'S' => 'Shipped',
            	'R' => 'Received',
            	'N' => 'Not in Transit'
            );
            foreach ($codes as $key => $value){
                  Status::create(array(
                        'code' => $key,
                        'description' => $value
                  ));
            }
	}
}
