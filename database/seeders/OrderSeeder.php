<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Order::create([
            'id_client'        => 1,
            'id_product'       => 2,
            'amount'           => 1,
            'total'            => 500000,
            'event_date'       => '2021-09-30',
            'status'           => 'Belum Dibayar'
        ]);
        $user->save();
    }
}
