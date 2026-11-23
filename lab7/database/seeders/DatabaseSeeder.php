<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $roles = Role::pluck('id', 'slug');

        User::factory()->create([
            'name'    => 'Moderator',
            'email'   => 'moderator@example.com',
            'role_id' => $roles['moderator'],
        ]);

        User::factory()->create([
            'name'    => 'Test Reader',
            'email'   => 'test@example.com',
            'role_id' => $roles['reader'],
        ]);

        Article::factory()->count(25)->create();
    }
}