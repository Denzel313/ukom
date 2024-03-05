<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummySeeder extends Seeder
{
    public function run(): void
    {
        for ($i=3000; $i < 10001; $i++) { 
            # code...
            User::create([
                'name' => 'User Ke'.$i,
                'email' => 'user'.$i.'@gmail.com',
                'password' => Hash::make('inipassword')
            ]);
        }
    }
}
