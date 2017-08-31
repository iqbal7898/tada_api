<?php

use Illuminate\Database\Seeder;
use App\purchase;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        purchase::create([
        	'brand' => 'HotStone', 
        	'egift_code' => '12345678', 
        	'program_name' => '1 1/2 Cup Black Ice Cream', 
        	'master_program' => 'XL Birthday Rewards', 
        	'item_name' => '1 1/2 Cup Black Ice Cream', 
        	'value' => '75000', 
        	'expired_date' => '15/11/2016 23:59:59', 
        	'url' => 'http://bit.ly/Wn2Xdz'
        ]);

        purchase::create([
        	'brand' => 'HotStone', 
        	'egift_code' => '93847162', 
        	'program_name' => '1 1/2 Cup Black Ice Cream', 
        	'master_program' => 'XL Birthday Rewards', 
        	'item_name' => '1 1/2 Cup Black Ice Cream', 
        	'value' => '75000', 
        	'expired_date' => '15/11/2016 23:59:59', 
        	'url' => 'http://bit.ly/Gn1Yds'
        ]);

        purchase::create([
        	'brand' => 'Sweet Sallie', 
        	'egift_code' => '88374617', 
        	'program_name' => '1 1/2 Cup Black Ice Cream', 
        	'master_program' => 'XL Member Rewards', 
        	'item_name' => '1 1/2 Cup Black Ice Cream', 
        	'value' => '75000', 
        	'expired_date' => '30/11/2016 23:59:59', 
        	'url' => 'http://bit.ly/Ax7Pwb'
        ]);

    }
}
