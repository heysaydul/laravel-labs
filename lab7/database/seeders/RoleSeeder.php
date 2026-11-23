<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::upsert([
            ['name' => 'Moderator', 'slug' => 'moderator'],
            ['name' => 'Reader',    'slug' => 'reader'],
        ], ['slug'], ['name']);
    }
}