<?php

namespace Database\Seeders;

use App\Models\ProductWishlist;
use Illuminate\Database\Seeder;

class ProductWishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = ProductWishlist::create([
            'id_client'        => 1,
            'id_product'        => 1
        ]);
        $user->save();
    }
}
