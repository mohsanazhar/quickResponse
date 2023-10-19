<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // creating default admin
         \App\Models\User::factory()->create([
             'first_name' => 'Admin',
             'last_name'=>'User',
             'email' => 'admin@example.com',
             'user_type'=>'admin',
             'user_name'=>'admin_user',
             'status'=>'active',
             'password'=>'admin'
         ]);

    }
}
