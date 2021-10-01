<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Vendor::create([
            'name'             => 'Seov Studio',
            'number'           => '085806650500',
            'city'             => 'Madiun',
            'id_user'          => '2',
            'id_category'      => '6'
        ]);
        $user->save();
    }
}
