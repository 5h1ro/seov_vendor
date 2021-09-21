<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Make Up',
            'Pakaian',
            'Hiburan',
            'Catering',
            'Venue',
            'Dokumentasi',
            'Dekorasi',
            'Lainnya',
        ];

        foreach ($data as $array) {
            $user = Category::create([
                'name'             => $array
            ]);
            $user->save();
        };
    }
}
