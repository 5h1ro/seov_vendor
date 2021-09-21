<?php

namespace Database\Seeders;

use App\Models\VendorWishlist;
use Illuminate\Database\Seeder;

class VendorWishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = VendorWishlist::create([
            'id_client'        => 1,
            'id_vendor'        => 1
        ]);
        $user->save();
    }
}
