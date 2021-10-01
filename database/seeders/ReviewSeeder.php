<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Review::create([
            'id_order'         => 1,
            'message'          => 'Sangat Membantu',
            'rating'           => 5,
            'date'             => '2021-10-02'
        ]);
        $user->save();
    }
}
