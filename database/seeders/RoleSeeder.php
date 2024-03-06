<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::updateOrCreate(
            ['name' => 'administrator'],
            ['name' => 'administrator']
        );
        Role::updateOrCreate(
            ['name' => 'manajemen'],
            ['name' => 'manajemen']
        );
        Role::updateOrCreate(
            ['name' => 'peminjam'],
            ['name' => 'peminjam']
        );
    }
}
