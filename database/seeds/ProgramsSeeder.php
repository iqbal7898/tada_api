<?php

use Illuminate\Database\Seeder;
use App\program;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        program::create([
        	'program_name' => 'Voucher 50rbu',
        	'master_program' => 'XL Birthday Rewards', 
        	'item_name' => '', 
        	'value' => '50000', 
        	'ter_condition' => '', 
        	'image' => '/egifts/images/sweet_sallie.jpg'
        ]);

        program::create([
        	'program_name' => 'Voucher 75rbu',
        	'master_program' => 'XL Birthday Rewards', 
        	'item_name' => '', 
        	'value' => '75000', 
        	'ter_condition' => '', 
        	'image' => '/egifts/images/sweet_sallie.jpg'
        ]);

        program::create([
        	'program_name' => '1 1/2 Cup BlackIce Cream',
        	'master_program' => 'XL Birthday Rewards', 
        	'item_name' => '1 1/2 Cup Black Ice Cream', 
        	'value' => '75000', 
        	'ter_condition' => '', 
        	'image' => '/egifts/images/orig_plain.jpg'
        ]);

        program::create([
        	'program_name' => '1 Cup Black IceCream',
        	'master_program' => 'XL Birthday Rewards', 
        	'item_name' => '1 Cup Black Ice Cream', 
        	'value' => '50000', 
        	'ter_condition' => '', 
        	'image' => '/egifts/images/orig_plain.jpg'
        ]);
    }
}
