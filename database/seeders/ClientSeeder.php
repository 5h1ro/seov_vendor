<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Client::create([
            'name'             => 'Bima Andriansyah',
            'number'           => '085806650500',
            'city'             => 'Madiun',
            'id_user'          => '3'
        ]);
        $user->save();
    }
}
