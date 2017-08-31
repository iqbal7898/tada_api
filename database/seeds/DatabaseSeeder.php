<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(GiftsSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ProgramsSeeder::class);
        $this->call(PurchaseSeeder::class);
    }
}
