<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $role = \App\Models\Role::first();
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@keystream.com',
            'email_verified_at' => now(),
            'password' => bcrypt('@admin@'),
            'remember_token' => \Illuminate\Support\Str::random(10),
        ])->roles()->sync([$role->id]);
    }
}
