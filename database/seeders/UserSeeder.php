<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = [
            'admin@admin.com',
            'vendor@vendor.com',
            'client@client.com',
        ];

        $role = [
            'admin',
            'vendor',
            'client'
        ];

        for ($i = 0; $i < count($email); $i++) {
            $user = User::create([
                'email'             => $email[$i],
                'password'          => Hash::make('password'),
                'role'              => $role[$i]
            ]);
            $user->save();
        };
    }
}
