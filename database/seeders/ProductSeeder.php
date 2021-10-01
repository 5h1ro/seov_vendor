<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Paket Hemat Prewedding',
            'Paket Hemat Pernikahan'
        ];

        $price = [
            300000,
            500000
        ];

        $amount = [
            '50 Foto + 1 Chinematic Video',
            '100 Foto + 2 Chinematic Video'
        ];

        $location = [
            'Madiun, Ponorogo, Magetan, Ngawi',
            'Madiun, Ponorogo'
        ];

        for ($i = 0; $i < count($name); $i++) {
            $user = Product::create([
                'name'             => $name[$i],
                'id_vendor'        => 1,
                'price'            => $price[$i],
                'amount'           => $amount[$i],
                'detail'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac nulla metus. Morbi semper ornare ante eu fermentum. Duis bibendum justo magna, non dictum turpis egestas at. Cras fermentum quis urna in aliquet. Nam ac aliquam purus, quis accumsan diam. Morbi et lectus tincidunt, ultrices ante scelerisque, eleifend metus. Praesent at mauris ullamcorper, vehicula nisi nec, elementum justo. In volutpat magna sit amet purus interdum, sed sodales est molestie. Ut ligula felis, convallis vel orci cursus, gravida vulputate leo.',
                'location'         => $location[$i],
            ]);
            $user->save();
        };
    }
}
