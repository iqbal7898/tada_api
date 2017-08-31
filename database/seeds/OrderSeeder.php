<?php

use Illuminate\Database\Seeder;
use App\order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        order::create([
            'trx_time' => '31/10/2016 10:59:59',
            'referral_code' => 'ABCdef123',
            'purchase_id' => '[1, 2, 3]'
        ]);
    }
}
