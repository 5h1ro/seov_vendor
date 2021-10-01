<?php

namespace Database\Seeders;

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
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            ClientSeeder::class,
            VendorSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            VendorWishlistSeeder::class,
            ProductWishlistSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
