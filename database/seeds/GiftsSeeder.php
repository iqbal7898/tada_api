<?php

use Illuminate\Database\Seeder;
use App\gift;

class GiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        gift::create([
            'brand' => 'HotStone',
            'programs' => '[1, 2, 3, 4]',
        ]);

        gift::create([
            'brand' => 'Sweet Sallie',
            'programs' => '[1, 2, 3, 4]',
        ]);
    }
}
